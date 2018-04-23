@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'http://larcasts.com'])
Start Browsing
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
