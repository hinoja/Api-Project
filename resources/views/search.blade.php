<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="s01">

        <form method="POST" action="{{ route('search') }}">
            @csrf
            <fieldset>
                <legend>Discover the Amazing City</legend>
            </fieldset>
            <div class="container">
                <div class="row">
                    @error('search')
                        <div class="text-center">
                            <span class="alert alert-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="inner-form">
                <div class="input-field first-wrap second-wrap">
                    <input id="search" type="text" name="search" style="font-size: 2em;"
                        placeholder="example@gmail.com" autocomplete="off" />
                </div>
                <div class="input-field third-wrap">
                    <button type="submit" class="btn-search" type="button">Search</button>
                </div><br>
            </div>

        </form>

    </div>


</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
