@if (isset($data) && !empty($data))

@if ($data['STATUS'] == 0)
@component('mail::message')
# Order Completed Successfully

@component('mail::panel')
Your order has been completed successfully, {{ $data['name'] ?? 'User' }}

Your order ID is {{$data['ORDERID'] ?? 'Not Available'}}.
@endcomponent

@component('mail::table')
<table>
    <tr>
        <th align="left">Bank Name</th>
        <th align="right" style="font-weight: 400">{{$data['BANKNAME'] ?? 'Not Available'}}</th>
    </tr>
    <tr>
        <th align="left">TXN ID</th>
        <th align="right" style="font-weight: 400">{{$data['TXNID'] ?? 'Not Available'}}</th>
    </tr>
    <tr>
        <th align="left">Order Total</th>
        <th align="right" style="font-weight: 400">{{$data['TXNAMOUNT'] ?? 'Not Available'}}</th>
    </tr>
    <tr>
        <th align="left">Payment Mode</th>
        <th align="right" style="font-weight: 400">{{$data['PAYMENTMODE'] ?? 'Not Available'}}</th>
    </tr>
</table>
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
@else
@component('mail::message')
# Order Failed

@component('mail::panel')
Your order has been failed, <strong>{{ $data['name'] ?? 'User' }}</strong>
@endcomponent
@component('mail::table')
<table>
    <tr>
        <th align="left">Bank Name</th>
        <th align="right" style="font-weight: 400;">{{$data['BANKNAME'] ?? 'Not Available'}}</th>
    </tr>
    <tr>
        <th align="left">TXN ID</th>
        <th align="right" style="font-weight: 400">{{$data['TXNID'] ?? 'Not Available'}}</th>
    </tr>
    <tr>
        <th align="left">Order Total</th>
        <th align="right" style="font-weight: 400">{{$data['TXNAMOUNT'] ?? 'Not Available'}}</th>
    </tr>
    <tr>
        <th align="left">Payment Status</th>
        <th align="right" style="font-weight: 400;color: red">Failed</th>
    </tr>
</table>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
@endif

@else
@component('mail::message')
# Order Failed

@component('mail::panel')
Your order has been failed, <strong>{{ $data['name'] ?? 'User' }}</strong>
@endcomponent
@component('mail::table')
<table>
    <tr>
        <th align="left">Bank Name</th>
        <th align="right" style="font-weight: 400">{{$data['BANKNAME'] ?? 'Not Available'}}</th>
    </tr>
    <tr>
        <th align="left">TXN ID</th>
        <th align="right" style="font-weight: 400">{{$data['TXNID'] ?? 'Not Available'}}</th>
    </tr>
    <tr>
        <th align="left">Order Total</th>
        <th align="right" style="font-weight: 400">{{$data['TXNAMOUNT'] ?? 'Not Available'}}</th>
    </tr>
    <tr>
        <th align="left">Payment Status</th>
        <th align="right" style="font-weight: 400;color: red">Failed</th>
    </tr>
</table>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
@endif