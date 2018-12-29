@extends('admin.master')
@section('page_header')
Category List<br/>
{{Session::get('message')}}
Total  {{$category_list->total()}}
@endsection
@section('dashboard_body')


<table class="table">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Votes</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
  	$counter=0;
  	?>
  	@foreach($category_list as $category)

    <tr>
      <th scope="row">{{ ++$counter }}</th>
      <td>{{$category->name}}</td>
      <td>{{$category->description}}</td>
      <td>{{($category->votes==1)?'Voted':'Not Voted'}}</td>
      <td><a href="{{ url('/category/edit/'.$category->id)}}" class="btn btn-primary">Edit</a> <a href="{{url('/category/delete/'.$category->id)}}" class="btn btn-danger">Delete</a></td>
    </tr>
   
    @endforeach

  </tbody>
</table>
{{ $category_list->links() }}
@endsection