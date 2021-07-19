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
    <h1>Latest offers<br> from the sudanese stores<br> on Twitter</h1>
        <div id="main-container" class="main-container">

        @foreach($tweets as $tweet)
            <div class="slide slide1">
                <p>{{ $tweet->text }}</p>
            </div>        

            @endforeach
            
    </div>

</body>
<script src="{{ asset('js/app.js') }}"></script>
</html>