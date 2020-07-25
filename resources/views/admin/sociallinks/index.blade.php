@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Social Links</h1>
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
                    <h5 class="card-title">ALL Social Links</h5>
                </div>
                <div class="card-body">
                   <table id="table" class="table text-center">
                       <thead>
                           <tr>
                               <th>Icon</th>
                               <th>Link</th>
                               <th>Icon Name</th>
                               <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sociallinks as $item)
                            <tr>
                                <td><i class="{{$item->icon}}" aria-hidden="true"></i></td>
                                <td>{{$item->url}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <a href="{{route('sociallinks.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('{{$item->id}}delete').submit();"
                                        class="btn btn-danger">Delete</a>
                                    <form action="{{route('sociallinks.destroy',$item->id)}}" method="post"
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