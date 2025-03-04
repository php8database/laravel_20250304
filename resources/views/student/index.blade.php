<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Hello student index
    <hr>
    <br>
    @php
        // dd($data);
    @endphp

    @foreach ($data as $value)
    {{$value['id']}} <br>
    {{$value['name']}} <br>
    {{$value['mobile']}} <br>
    <hr><br>    
    @endforeach
</body>
</html>