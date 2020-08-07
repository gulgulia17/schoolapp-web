@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Plans</h1>
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
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plan as $key => $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->amount}}</td>
                                <td>{{$item->desc}}</td>
                                <td>



                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Features of {{$item->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            {!!$item->features!!}
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <a href="{{route('plans.edit',$item->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
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