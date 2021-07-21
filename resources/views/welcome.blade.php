<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Offers</title>
</head>
<body>
    <h1>Latest offers from the sudanese stores on Twitter</h1>
        <div id="main-container" class="main-container">

        @foreach($tweets as $tweet)
            <div class="slide slide1" style="background: 'burlywood' no-repeat center center; background-size: cover;">
                <img class="tweet-image" src="{{ property_exists($tweet->entities, 'media') ? $tweet->entities->media[0]->media_url_https : '' }}"/>
                <div class="tweet-content">
                    <p>{{ preg_replace('~https://t.co/\w{10}~' , "" ,$tweet->full_text) }}</p>
                </div>
                <button class="goto"><a href="{{preg_match('~https://t.co/\w{10}~', $tweet->full_text, $link) ? $link[0] : ''}}"  target="_blank"  rel="noopener noreferrer">Go To Tweet</a></button>
            </div>
            @endforeach
            
    </div>

</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>