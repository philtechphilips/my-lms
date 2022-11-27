
{{-- Recent Articles Starts Here --}}
<div class="home-page-sections-container" style="background-color: #fafafa">
    <div class="home-page-sections-container-header" style="margin-bottom: 20px">
        <h1>Recent Atricles</h1>
    </div>

    <div class="recent-articles-grid">
        @foreach ($blog as $blog)
        <div class="recent-articles-grid-body">
            <img src="{{ asset('blogImages/' . $blog->image) }}" width="300">
            <div class="recent-articles-grid-body-content">
                <a href="#">
                    <h2>
                        {{ $blog->name }}
                    </h2>
                </a>
                @php
                    $blogdetails = htmlspecialchars_decode(nl2br($blog->blog));
                @endphp
                <p>
                    {!! htmlspecialchars_decode(nl2br(Str::limit($blog->blog, 100))) !!}
                </p>
                <a href="#">3 Minute Read</a>
            </div>
        </div>
        @endforeach
    </div>

</div>
{{-- Recent Articles Ends Here --}}
