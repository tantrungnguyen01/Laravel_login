<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .mes {
            width: 90%;
            height: 35vh;
            background: beige;
            line-height: 30px;
            text-align: center;
            border: 2px solid;
            margin: 0 auto;
        }

        .but {
            background: #ff4081;
            padding: 12px 20px;
            width: 150px;
            height: 35px;
            border: 1px solid #ff4081;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="mes">

        <h2>{{ $compa->fullname }}</h2>
        <h3>{{$compa->status}}</h3>
        <h3>{{ $compa->phone }}</h3>
        <p>Thành Công  .Mời Bạn Kích Hoạt Tài Khoản</p>
        <a class="but" href="{{ route('compa.active', ['compa' => $compa->id, 'token' => $compa->token]) }}">Kích
            Hoạt</a>

    </div>
</body>

</html>
