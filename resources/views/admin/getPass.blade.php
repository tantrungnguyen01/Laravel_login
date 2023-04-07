<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    <title>Document</title>
</head>

<style>
    .max{
        margin-top: 25px;
    }
    .mm{
        margin-top: 40px
    }
    .forget {
        margin-left: 80px;
    }

    .bob {
        margin: 0;
        padding: 0;
        background-size: cover;
        overflow: hidden;

    }

    .loader {
        background: #111;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .loader div {
        background: #fff;
        width: 16px;
        height: 32px;
        margin-left: 10px;
        animation: loader 1.2s infinite;
    }

    @keyframes loader {
        50% {
            height: 64px;
        }
    }

    .loader div:nth-child(1) {
        background: #FF9F1A;
        animation-delay: -0.40s;
    }

    .loader div:nth-child(2) {
        background: #FED330;
        animation-delay: -0.20s;
    }

    .loader div:nth-child(3) {
        background: #FFFA65;
        animation-delay: 0s;
    }
</style>

<body class="bob">



    <div class="loader">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div class="panda">
        <div class="ear"></div>
        <div class="face">
            <div class="eye-shade"></div>
            <div class="eye-white">
                <div class="eye-ball"></div>
            </div>
            <div class="eye-shade rgt"></div>
            <div class="eye-white rgt">
                <div class="eye-ball"></div>
            </div>
            <div class="nose"></div>
            <div class="mouth"></div>
        </div>
        <div class="body"> </div>
        <div class="foot">
            <div class="finger"></div>
        </div>
        <div class="foot rgt">
            <div class="finger"></div>
        </div>

    </div>

    <form role="form" action="" method="POST">
      

        <div class="hand"></div>
        <div class="hand rgt"></div>
        <h1>Lấy Lại Mật Khẩu</h1>

       
        <div class="form-group">
           
            
            <div class="form-group">
                <i class="far fa-eye fa-xl" id="togglePassword" style="margin-left: 260px; cursor: pointer;"></i>
                <input type="password" required="required" name="password" class=" id_password form-control" id="password" placeholder="Password"  >
            </div>
            <div class="form-group">
               
                <input type="password" required="required" name="password_confirmation" class=" id_password form-control" id="password" placeholder="xác nhận lại Password">
            </div> 
            
          
      
            @include('sweetalert::alert')

            @if ($errors->any())
                <div class="alert  ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p class="log">{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif



           
            <button type="submit" class="btn  mm">Gửi Mail</button>
        </div>
        @csrf
    </form>

</body>

<script src="https://kit.fontawesome.com/d9876ed7d9.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="{{ asset('js/login.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/loading.js') }}"></script>

</html>
