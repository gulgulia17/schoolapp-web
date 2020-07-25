@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Newfeatures</h1>
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
                <div class="card-body table-responsive">
                    <table class="table text-center" id="table">
                        <thead>
                            <tr>
                                <th>Feature Name</th>
                                <th>Feature Description</th>
                                <th>Feature Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newfeature as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td class="w-50"><p class="text-justify">{{$item->desc}}</p></td>
                                <td><img src="{{asset($item->image)}}" class="w-50"></td>
                                <td>
                                    <a href="{{route('newfeatures.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('{{$item->id}}delete').submit();"
                                        class="btn btn-danger">Delete</a>
                                    <form action="{{route('newfeatures.destroy',$item->id)}}" method="post"
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