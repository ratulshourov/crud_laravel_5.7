<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class ProductController extends Controller
{
    //
    public function index() {
    	$category_list=Category::where('votes',1)->get();
    	return view('admin.product.product_add',['categories'=>$category_list]);
    }
    public function entry(Request $request) {
    	
	 $product=new Product();
	 //dd($request->all());
	 $product->category_id=$request->category_id;
	 $product->product_name=$request->productName;
	 $product->short_description=$request->short_description;
	 
	 $product->long_description=$request->long_description;
	 $product->product_image='picture';
	 $product->qty=$request->qty;
	 $product->price=$request->price;
	 $product->publication_status=$request->publication_status;
	 $product->save();
	 
	 $last_id=$product->id;
	 $picture_info=$request->file('pic');
	 $pic_name_only=$last_id.$picture_info->getClientOriginalName();
	 $folder_path='product_image/';
	 $picture_info->move($folder_path,$pic_name_only);
	 
	 $pic_url_for_db=$folder_path.$pic_name_only;
	 $product_update_for_picture=Product::find($last_id);
	 $product_update_for_picture->product_image=$pic_url_for_db;
	 $product_update_for_picture->save();

	// echo $pic_name_only;



    }
    public function product_list() {
    	$products_list=DB::table('products')
    							->join('categories','categories.id','=','category_id')
    							->select('products.*','categories.name as categoriesName')
    							->paginate(10);

    	return view('admin.product.product_list',['products'=>$products_list]);
    }
    public function single_product_view($id) {
    	$single_product=DB::table('products')
    						->join('categories','categories.id','=','category_id')
    						->select('products.*','categories.name as categoriesName')
    						->where('products.id',$id)
    						->first();

    	return view('admin.product.product_details',['single_product'=>$single_product]);
    }
    public function edit_product($id) {
    	$product =Product::where('id',$id)->first();
    	$categories=Category::where('votes',1)->get();
    	return view('admin.product.edit_product',['product'=>$product,'categories'=>$categories]);

    }
    public function update(Request $request) {
    	// dd($request->all());
         $product=Product::where('id',$request->product_id)->first();
         $picinfo=$request->file('pic');
         //To get the image name only
        
         
         if(isset($picinfo)) {
           if(file_exists($product->pic)) {
            unlink($product->pic);
           }
             $picture_image_name=$request->product_id.$picinfo->getClientOriginalName();
             $folder_path='product_image/';
             $pic_url=$folder_path.$picture_image_name;
             $picinfo->move($folder_path,$picture_image_name);
            echo "Update Hbe".$pic_url;
         } else {
            echo "old thakbe";
         } 
         //insert db 
         $product_table_work=Product::find($request->product_id);
         $product_table_work->product_image=$pic_url;
         $product_table_work->save();



    }
    public function delete($id) {
        $product =Product::where('id',$id)->first(); 
        if(file_exists($product->pic)) {
            unlink($product->pic);
        }
        $product_delete=Product::find($id);
        $product_delete->delete();
        return redirect('/product/list')->with('message','Product Deleted Successfully');
       
    }
}
