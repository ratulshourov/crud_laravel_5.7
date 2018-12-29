@extends('admin.master')
@section('page_header')
Category Entry<br/>
{{Session::get('message')}}
@endsection
@section('dashboard_body')

	{!! Form::open(['url' => '/category/save','method'=>'post','role'=>'form']) !!}
  <div class="form-group">
    <label for="exampleInputEmail1">CategoryName</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category" placeholder="Enter category name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" id="exampleInputPassword1" placeholder="Description" name="category_description"></textarea>
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
@endsection