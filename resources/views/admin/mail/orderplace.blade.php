<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SendMail</title>
    
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
   
@isset($data)
@if (!empty($data))
    @if ($data['statuss'] == 0)
        <div class="container py-5">
            <div class="row">
                <div class="col-md-10 mx-auto">
                <div class="card rounded-0">
                    <div class="card-header bg-white">
                        <h3 class="text-danger">Thank you {{$data['name']}}</h3>
                        <p>We have recieved your order. <br> This mail confirming the order.</p>
                    </div>
                    <div class="card-body">
                        <h3 class="font-weight-bold">
                            Order details
                        </h3>
                        <p>
                            <h1 class="text-primary">Order number is {{$data['ORDERID']}}</h1>  <br>
                            Txn ID is  {{$data['TXNID']}} <br>
                            Order Total is  {{$data['TXNAMOUNT']}} <br>
                            Payment Mode is  {{$data['PAYMENTMODE']}} <br>
                            Bank Name is  {{$data['BANKNAME']}} <br>
                            Our Team is Shortly Conforming.
                        </p>
                    </div>
                    <div class="card-footer border-0 bg-white text-right py-4">
                        <a href="http://schoolapp.info" class="button-custom">Go To Home</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @elseif($data['statuss'] == 1)
        <div class="container py-5">
            <div class="row">
                <div class="col-md-10 mx-auto">
                <div class="card rounded-0">
                    <div class="card-header bg-white">
                        <h3 class="text-danger">Your Order is Process,{{$data['name']}}</h3>
                        <p>We'll delivery your order Shortly. <br> Thank you</p>
                    </div>
                    <div class="card-body">
                        <h3 class="font-weight-bold">
                            Order details
                        </h3>
                        <p>
                           <h1 class="text-primary">Order number is {{$data['ORDERID']}}</h1>  <br>
                            Txn ID is  {{$data['TXNID']}} <br>
                            Order Total is  {{$data['TXNAMOUNT']}} <br>
                            Payment Mode is  {{$data['PAYMENTMODE']}} <br>
                            Bank Name is  {{$data['BANKNAME']}} <br>
                            Our Team is Shortly Conforming.
                        </p>
                    </div>
                    <div class="card-footer border-0 bg-white text-right py-4">
                        <a href="http://schoolapp.info" class="button-custom">Go To Home</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @else
        <div class="container py-5">
            <div class="row">
                <div class="col-md-10 mx-auto">
                <div class="card rounded-0">
                    <div class="card-header bg-white">
                        <h3 class="text-danger">Now the Product ready for Deliver,{{$data['name']}}</h3>
                        <p> You'll Send an email for product details shortly. <br> Thank you</p>
                    </div>
                    <div class="card-body">
                        <h3 class="font-weight-bold">
                            Order details
                        </h3>
                        <p>
                        <h1 class="text-primary">Order number is {{$data['ORDERID']}}</h1>  <br>
                            Txn ID is  {{$data['TXNID']}} <br>
                            Order Total is  {{$data['TXNAMOUNT']}} <br>
                            Payment Mode is  {{$data['PAYMENTMODE']}} <br>
                            Bank Name is  {{$data['BANKNAME']}} <br>
                            Our Team is Shortly Conforming.
                        </p>
                    </div>
                    <div class="card-footer border-0 bg-white text-right py-4">
                        <a href="http://schoolapp.info" class="button-custom">Go To Home</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @endif
   
@else
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
         <div class="card rounded-0">
             <div class="card-header bg-white">
                 <h3 class="text-danger">Oops..</h3>
                 <p>Its like you tried to order. <br> Please try again your payment has been failed.</p>
             </div>
             <div class="card-footer border-0 bg-white text-right py-4">
                 <a href="/purchasesubscription" class="button-custom">Return Back to Purchase</a>
             </div>
         </div>
        </div>
    </div>
</div>
@endif
@endisset
</body>
</html>