@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Bot Message</h1>
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
                                <th>S.no</th>
                                <th>Question</th>
                                <th>Reply</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($botMessage as $key => $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->question}}</td>
                                <td>{{$item->reply}}</td>
                                <td><a href="{{route('botmessage.edit',$item->id)}}" class="btn btn-warning">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="text-center">
                        <h2 class="text-uppercase">No Data Available Please add.</h2>
                        <a href="{{route('botMessage.create')}}" class="btn btn-primary btn-sm">Add New</a> --}}
                    {{-- </div> --}}
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