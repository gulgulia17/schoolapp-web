<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'School App')
<img src="{{asset('images/logo/logo.jpg')}}" class="logo" alt="School App Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
