@component('mail::message')

**{{$user->name}}**  Your Certificate For:  **{{$course->title}}** is now avaliable.
@php
    $app_url = getenv('APP_URL');
@endphp

@component('mail::button', ['url' => "{$app_url}/dashboard/certificate"])
Download Now
@endcomponent

@endcomponent
