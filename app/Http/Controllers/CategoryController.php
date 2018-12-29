<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
	public function index() {
		return view('admin.category.category_add');

	}
	public function addCategory(Request $req) {
		$categoryEntry= new Category();
		$categoryEntry->name=$req->category;
		$categoryEntry->description=$req->category_description;
		$categoryEntry->votes=$req->publication_status;
		$categoryEntry->save();
		return redirect('/category/add')->with('message','Category Added Successfully');
		dd($req->all());

	}
	public function show() {
		$category_list = DB::table('categories')->paginate(5);
		//$category_list=Category::all();
		return view('admin.category.category_list',['category_list'=>$category_list]);
	}
	public function edit($id) {
		$category_edit=Category::where('id',$id)->first();
		return view('admin.category.category_edit',['category'=>$category_edit]);
			
	}
	public function update(Request $request) {
		
		$category_update=Category::find($request->categoryId);
		$category_update->name=$request->category;
		$category_update->description=$request->category_description;
		$category_update->votes=$request->publication_status;
		$category_update->save();
		return redirect('/category/show')->with('message','Edit Successfully');

	}
	public function delete($id) {
		$category_delete=Category::find($id);
		$category_delete->delete();
		return redirect('/category/show')->with('message','Edit Successfully');

	}
    //
}
