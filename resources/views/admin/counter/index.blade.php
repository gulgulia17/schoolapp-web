@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Counter</h1>
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
                    @isset($counter)
                    <table class="table text-center" id="table">
                        <thead>
                            <tr>
                                <th>Active Subscriptions</th>
                                <th>Total Updates</th>
                                <th>Cup Of Cofee(Mettings)</th>
                                <th>Facebook Fans</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$counter->active}}</td>
                                <td>{{$counter->updates}}</td>
                                <td>{{$counter->mettings}}</td>
                                <td>{{$counter->facebookfans}}</td>
                                <td><a href="{{route('counter.edit',$counter->id)}}" class="btn btn-warning">Edit</a></td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <div class="text-center">
                        <h2 class="text-uppercase">No Data Available Please add.</h2>
                        <a href="{{route('counter.create')}}" class="btn btn-primary btn-sm">Add New</a>
                    </div>
                    @endisset
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