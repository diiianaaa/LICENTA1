@component('mail::message')
{{ $mailInfo['title'] }}

Reservation has been confirmed

@component('mail::button', ['url' => $mailInfo['url']])
Cheers!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent