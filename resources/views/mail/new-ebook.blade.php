@component('mail::message')

Hello {{$user->name}} We just published a new e-book
**Title: {{$title}}** on our website. You can check it out using the link below
{!! htmlspecialchars_decode(nl2br(Str::limit($description, 600))) !!}
@php
    $app_url = getenv('APP_URL');
@endphp

@php
    $id = Crypt::encrypt($id);
@endphp


@component('mail::button', ['url' => "{$app_url}/main/ebook/{$id}"])
View E-Book
@endcomponent

@endcomponent
