@extends('main')
@section('title','Purchase')
@section('content')
@isset($response)
    @if ($response['RESPCODE'] == "01")
       <div class="container py-5">
           <div class="row">
               <div class="col-md-10 mx-auto">
                <div class="card rounded-0">
                    <div class="card-header bg-white">
                        <h3 class="text-danger">Thank you {{$response['name']}}</h3>
                        <p>We have recieved your order. <br> You'll recieve an email confirming the order details shortly.</p>
                    </div>
                    <div class="card-body">
                        <h3 class="font-weight-bold">
                            Order details
                        </h3>
                        <table class="table mt-3">
                            <tr>
                                <th>Order number</th>
                                <td>
                                    {{$response['ORDERID']}} <br>
                                </td>
                            </tr>
                            <tr>
                                <th>Txn ID</th>
                                <td>{{$response['TXNID']}}</td>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <td>{{$response['TXNAMOUNT']}}</td>
                            </tr>
                            <tr>
                                <th>Payment Mode</th>
                                <td>{{$response['PAYMENTMODE']}}</td>
                            </tr>
                            <tr>
                                <th>Bank Name</th>
                                <td>{{$response['BANKNAME']}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer border-0 bg-white text-right py-4">
                        <a href="/" class="button-custom">Go To Home</a>
                    </div>
                </div>
               </div>
           </div>
       </div>
    @else
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
             <div class="card rounded-0">
                 <div class="card-header bg-white">
                     <h3 class="text-danger">Oops..</h3>
                     <p>Its like you tried to order. <br> Please try again your payment has been failed.</p>
                     <p>{{$response['RESPMSG']}}</p><p>{{$response['RESPCODE']}}</p>
                 </div>
                 {{-- <div class="card-body">
                     <h3 class="font-weight-bold">
                         Order details
                     </h3>
                     <table class="table mt-3">
                         <tr>
                             <th>Order number</th>
                             <td>{{$response['ORDERID']}}</td>
                         </tr>
                         <tr>
                             <th>Txn ID</th>
                             <td>{{$response['TXNID']}}</td>
                         </tr>
                         <tr>
                             <th>Order Total</th>
                             <td>{{$response['TXNAMOUNT']}}</td>
                         </tr>
                         <tr>
                             <th>Payment Mode</th>
                             <td>{{$response['PAYMENTMODE']}}</td>
                         </tr>
                         <tr>
                             <th>Bank Name</th>
                             <td>{{$response['BANKNAME']}}</td>
                         </tr>
                     </table>
                 </div> --}}
                 <div class="card-footer border-0 bg-white text-right py-4">
                     <a href="/purchasesubscription" class="button-custom">Return Back to Purchase</a>
                 </div>
             </div>
            </div>
        </div>
    </div>
    @endif
@endisset
@endsection
@section('style')
    <style>
        .button-custom{
        color: #1e1e1e;
        background: transparent;
        border: none;
        font-weight: 600;
        width: 100%;
        padding: 16px;
        border: 2px solid #1e1e1e;
        border-radius: 50px;
        cursor: pointer;
        text-transform: uppercase;
    }
    .button-custom:hover{
        color: #1e1e1e;
    }
    </style>
@endsection