<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <title>Document</title>
</head>

<body>
    <h1>  Pokemons</h1>
    <table class="table table-striped table-bordered table-responsive ">
        <th>
        <td>N°</td>
        <td>Image</td>
        <td>Name</td>
        </th>
        <tbody>
            {{-- @foreach ($datas as $data) --}}
                <tr>
                    <td> 1</td>
                    <td><img src="{{ $data['sprites']['front_default']}}" alt="image"></td>
                    <td>{{ $data['name'] }}</td>
                    {{-- <td>{{ $loop->index }}</td> --}}
                </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>



</body>

</html>
