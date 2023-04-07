<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
    <title>Document</title>
</head>


<body>
    <div class="loader">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div class="contact-us">
        @if ($errors->count() > 0)
            <div id="ERROR_COPY" style="display:none">

                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach


            </div>
        @endif

        <form role="form" action="/admin/registerpost" method="POST">
            <input name="email" value="{{ old('email') }}" placeholder="Email" type="email" />
            <input name="password" placeholder="Password" type="password" />
            <input name="password_confirmation" placeholder="Confirm Password" type="password" />
            <input name="fullname" value="{{ old('fullname') }}" placeholder="Fullname" type="text" />
            <input name="address" value="{{ old('address') }}" placeholder="Address" type="text" />
            <input name="phone" value="{{ old('phone') }}" placeholder="Phone" type="text" />

            <div class="check-b">
                <div class="form-check">
                    <h2>Nam</h2>
                    <div class="toggleWrapper ">
                        <input type="radio" name="status" class="mobileToggle" id="toggle1" value="Nam"
                            {{ old('status', 'Nam') == 'Nam' ? 'checked' : '' }}>
                        <label for="toggle1" class="form-label"></label>
                    </div>
                </div>

                <div class="form-check">
                    <h2>Nữ</h2>
                    <div class="toggleWrapper">
                        <input type="radio" name="status" class="mobileToggle" id="toggle2" value="Nữ"
                            {{ old('status') == 'Nữ' ? 'checked' : '' }}>
                        <label for="toggle2" class="form-label"></label>
                    </div>
                </div>
            </div>
            <button type="submit">Register</button>
            @csrf
        </form>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        var hasErrors = {{ $errors->count() > 0 ? 'true' : 'false' }};

        // check if there are any validation errors and show an error message if so
        if (hasErrors) {
            Swal.fire({
                title: 'Error',
                icon: 'error',
                html: jQuery('#ERROR_COPY').html(),
                customClass: {
                    heightAuto: 'body.swal2-shown.swal2-height-auto'
                }
            });
        }

        // hide the loader when the page finishes loading
        $(window).on('load', function() {
            $('.loader').fadeToggle();
        });

        // prevent form submission from reloading the page
        $('form').on('submit', function(e) {


            // hide the loader immediately on form submission
            $('.loader').hide();

            // submit the form data here
        });
    });
</script>









</html>
