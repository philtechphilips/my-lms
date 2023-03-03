@component('mail::message')

**{{getenv('APP_FULL_NAME')}}** Posted a new blogpost: **{{$blogname->name}}**


{!! htmlspecialchars_decode(nl2br(Str::limit($blogname->blog, 600, '...'))) !!}


@php
    $app_url = getenv('APP_URL');
@endphp

@php
    $id = Crypt::encrypt($blogname->id);
@endphp


@component('mail::button', ['url' => "{$app_url}/main/read-blog-post/{$id}"])
Read Full Content
@endcomponent

@endcomponent
