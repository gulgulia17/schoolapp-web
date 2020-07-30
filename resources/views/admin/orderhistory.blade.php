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
                                <th>Order Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderHistory as $item)
                            <tr>
                                <td>{{$item->ORDERID}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->TXNAMOUNT}}</td>
                                <td>{{$item->TXNDATE}}</td>
                                <td>
                                <form action="/changestatus/{{$item->id}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                    <select name="statuss" id="status{{$item->id}}" class="form-control">
                                            <option value="0" {{$item->statuss == 0 ? 'selected': ''}} class="text-danger bg-danger">Pending</option>
                                            <option value="1" {{$item->statuss == 1 ? 'selected': ''}} class="text-warning bg-warning">Process</option>
                                            <option value="2" {{$item->statuss == 2 ? 'selected': ''}} class="text-success bg-success">Delivered </option>
                                        </select>    
                                    </form>    
                                </td>
                               
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
   $(document).ready(function () {
        $('select[name=statuss]').change(function(){
            let value = $(this).val();
            let id = $(this).attr('id');
            id = id.split('status')[1];
            let _token = $('input[name=_token]').val();
            let _method = $('input[name=_method]').val();
            let url = `/changestatus/${id}`;
            $.ajax({
                type: "patch",
                url: url,
                data: {_token:_token,_method:_method,statuss:value},
                success: function (response) {
                    console.log(response);
                    // const { interest, total, loanamount, closing } = JSON.parse(response);
                    // $(`#label${id}`).html(interest);
                    // $(`#total${id}`).html(total);
                }
            });
         });
    });
</script>
@stop