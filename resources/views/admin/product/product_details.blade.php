@extends('admin.master')
@section('page_header')
Product List<br/>

@endsection
@section('dashboard_body')

{{$single_product->product_name}}<br/>
{{$single_product->categoriesName}}<br/>

<img src="{{asset($single_product->product_image)}}" width="300" alt="Not">



@endsection