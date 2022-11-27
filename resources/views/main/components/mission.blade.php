{{-- How It Work Section Starts Here --}}
<div class="home-page-sections-container" style="background-color: #fff">
    <div class="home-page-sections-container-header" style="margin-bottom: 20px">
        <h1>Our Vision/Mission</h1>
    </div>

    <div class="our-vision-grid">
        <div class="our-vision-grid-left">
            <h3>Vision</h3>
            <p>{!! htmlspecialchars_decode(nl2br($vision->vision)) !!}</p>
            <br>
            <h3>Mission</h3>
            <p>{!! htmlspecialchars_decode(nl2br($mission->mission)) !!}</p>
        </div>

        <div class="our-vision-grid-right">
            <div class="plyr_video-embed" id="player">
                <iframe width="800" height="500" src="{{ $intro->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
{{-- How It Work Section Ends Here --}}
