@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Testimonial</h1>
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
        @foreach ($testimonial as $item)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{$item->name}}'s Testimonial</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false"></button>
                            <div class="dropdown-menu dropdown-menu-right text-right" role="menu"
                                x-placement="bottom-end">
                                <a href="{{route('testimonial.edit',$item->id)}}" class="dropdown-item">Edit</a>
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('{{$item->id}}delete').submit();"
                                    class="dropdown-item">Delete</a>
                                <form action="{{route('testimonial.destroy',$item->id)}}" method="post" class="d-none"
                                    id="{{$item->id}}delete">@csrf @method('delete')</form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <img src="{{asset($item->logo)}}" class="img-fluid">
                    <p>{{$item->testimonial}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')@stop