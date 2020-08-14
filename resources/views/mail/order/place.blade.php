@if (isset($data['statuss ']) && !empty($data['statuss ']))

@if ($data['statuss'] == 0)
@component('mail::message')
# Order Completed Successfully

@component('mail::panel')
Your order has been completed successfully, {{ $data['name'] ?? 'User' }}

Your order ID is {{$data['ORDERID'] ?? 'N|A'}}.
@endcomponent

@component('mail::table')
| Bank Name                      | TXN ID                      | Order Total                     | Payment Status  |
| :------------------------------ |:---------------------------:|:-------------------------------:| ---------------:|
| {{$data['BANKNAME'] ?? 'Not Available'}} | {{$data['TXNID'] ?? 'Not Available'}} | {{$data['TXNAMOUNT'] ?? 'Not Available'}} | {{$data['PAYMENTMODE'] ?? 'N|A'}}|
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
| Bank Name                      | TXN ID                      | Order Total                     | Payment Status  |
| :------------------------------ |:---------------------------:|:-------------------------------:| ---------------:|
| {{$data['BANKNAME'] ?? 'Not Available'}} | {{$data['TXNID'] ?? 'Not Available'}} | {{$data['TXNAMOUNT'] ?? 'Not Available'}} | <span style="color: red">Failed</span>|
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
| Bank Name                      | TXN ID                      | Order Total                     | Payment Status  |
| :------------------------------ |:---------------------------:|:-------------------------------:| ---------------:|
| {{$data['BANKNAME'] ?? 'Not Available'}} | {{$data['TXNID'] ?? 'Not Available'}} | {{$data['TXNAMOUNT'] ?? 'Not Available'}} | <span style="color: red">Failed</span>|
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
@endif