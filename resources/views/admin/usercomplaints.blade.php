
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>User Complaints</h1>
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
                                <th>Comaplint Subject</th>
                                <th>Ticket Number</th>
                                <th>See Logo</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($usercomplaints as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->subject}}</td>
                                <td>{{$item->ticket}}</td>
                                <td>
                                    <button type="button" class="btn p-0" data-toggle="modal" data-target="#modelId{{$item->id}}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <div class="modal fade" id="modelId{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                 <h5 class="modal-title">{{$item->name}}'s Complaint</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="font-weight-bold mb-0">Comaplint Message</p>
                                                            <div class="divider"></div>
                                                            <p class="text-justify">{{$item->message}}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><img src="{{asset($item->logo)}}" class="w-100"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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