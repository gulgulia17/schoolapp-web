@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Hero Section</h1>
        </div>
        <div class="col-md-6">
            @include('includes.alert')
        </div>
       </div>
   </div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Hero Section Data</h5>
                </div>
                <div class="card-body table-responsive">
                   <table id="table" class="table text-center">
                       <thead>
                           <tr>
                               <th>Title</th>
                               <th>Description</th>
                               <th>Image</th>
                               <th>Action</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($herosection as $item)
                           <tr>
                            <td>{{$item->title}}</td>
                            <td class="w-25 text-justify">{!!$item->description!!}</td>
                            <td><img src="{{asset($item->image)}}" width="300" height="150"></td>
                            <td>
                                <a href="{{route('herosection.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('{{$item->id}}delete').submit();"
                                        class="btn btn-danger">Delete</a>
                                    <form action="{{route('herosection.destroy',$item->id)}}" method="post"
                                        class="d-none" id="{{$item->id}}delete">@csrf @method('delete')</form>
                            </td>
                        </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')@stop