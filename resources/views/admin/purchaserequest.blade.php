@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Inquiry</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-reponsive">
                    <table class="table text-center" id="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>School</th>
                                <th>Contact Details</th>
                                <th>District</th>
                                <th>State</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchaserequest as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->school}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->district->district}}</td>
                                <td>{{$item->state->state}}</td>
                                {{--<td>
                                    <button type="button" class="btn p-0" data-toggle="modal" data-target="#modelId{{$item->id}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <div class="modal fade" id="modelId{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                            <img src="{{asset($item->logo)}}">
                                    </div>
                                </div>--}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $('#table').DataTable();
    </script>
@stop