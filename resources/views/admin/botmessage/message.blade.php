@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1>Message</h1>
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
                    @isset($message)
                    <table class="table text-center" id="table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>User</th>
                                <th>Bot Repay</th>
                                <th>Ip Address of User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->message}}</td>
                                <td>{{$item->botmessage}}</td>
                                <td>{{$item->ip}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="text-center">
                        <h2 class="text-uppercase">No Data Available Please add.</h2>
                    </div>
                    @endisset
                    <form method="post">
                        @csrf
                    </form>
                </div>
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
    $(document).ready(function(){
        setInterval(function(){
            var dt = new Date();
            const _token = $('input[name="_token"]').val();
            var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
            if (time == "00:00:00") {
                $.ajax({
                    type: "post",
                    url: "/cleartable",
                    data: {'time':time, '_token':_token},
                    success: function (result) {
                    true;
                    }
                });
            }
        }, 1000);
    });
</script>
@stop