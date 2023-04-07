    // panda
    $("#password").focusin(function() {
        $("form").addClass("up");
    });
    $("#password").focusout(function() {
        $("form").removeClass("up");
    });
    // Panda Eye move
    $(document).on("mousemove", function(event) {
        var dw = $(document).width() / 15;
        var dh = $(document).height() / 15;
        var x = event.pageX / dw;
        var y = event.pageY / dh;
        $(".eye-ball").css({
            width: x,
            height: y
        });
    });

    //validation
    $(".btn").click(function() {
        $("form").addClass("wrong-entry");
        setTimeout(function() {
            $("form").removeClass("wrong-entry");
        }, 3000);
    });
    // end panda


    // eye see password
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('.id_password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });
    //end eye