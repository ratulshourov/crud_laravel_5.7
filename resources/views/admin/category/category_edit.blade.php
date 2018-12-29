@extends('admin.master')
@section('page_header')
Category Edit<br/>
{{Session::get('message')}}
@endsection
@section('dashboard_body')
{!! Form::open(['url' => '/category/update','method'=>'post','role'=>'form','name'=>'edit_form']) !!}
  <div class="form-group">
  	<input type="hidden" name="categoryId" value="{{$category->id}}">
    <label for="exampleInputEmail1">CategoryName</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category" value="{{$category->name}}" placeholder="Enter category name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" id="exampleInputPassword1" placeholder="Description" name="category_description">{{$category->description}}</textarea>
  </div>
  <div class="form-group">
  	<label for="exampleInputPassword1">Status</label>
    <select name="publication_status">
    	<option value='1'>published</option>
    	<option value="0">Unpublished</option>
    </select>
    
  </div>
  <button type="submit" value="submit" class="btn btn-primary">Submit</button>

{!! Form::close() !!}
<script type="text/javascript">
	document.forms['edit_form'].elements['publication_status'].value={{$category->votes}}
</script>
@endsection