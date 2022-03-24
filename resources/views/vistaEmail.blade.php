<form id="form1" method="GET" name="form1" action="{{route('sendEmail')}}">
    @csrf
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                class="tab">Enviar Email</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign
                Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="name" class="label">Nombre</label>
                        <input id="name" type="text" class="input" name="name">
                    </div>
                    <div class="group">
                        <label for="phone" class="label">Teléfono</label>
                        <input id="phone" type="tel" class="input" name="phone">
                    </div>
                    <div class="group">
                        <label for="email" class="label">Email</label>
                        <input id="email" type="email" class="input" name="email">
                    </div>
                    <div class="group">
                        <input id="check2" type="checkbox" class="check" checked required>
                        <label for="check2"><span class="icon"></span> Acepto los términos y condiciones, política de privacidad y procesamiento de datos.*</label>
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Deseo recibir información acerca de los servicios de Ayuda T Soluciones Profesionales.</label>
                    </div>
                    <div class="group">
                        <button type="submit" class="button" name="btnEnviar">Enviar</button>
                    </div>
                    <div class="hr"></div>
                </div>
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Email Address</label>
                        <input id="pass" type="text" class="input">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script type="text/javascript">
    $(function () {
        $("[id*=btnSend]").click(function () {
            var toEmail = $.trim($("[id*=txtTo]").val());
            var subject = $.trim($("[id*=txtSubject]").val());
            var body = $.trim($("[id*=txtBody]").val());
            $.ajax({
                type: "POST",
                url: "Service.asmx/SendEmail",
                data: "{ toEmail: '" + toEmail + "', subject: '" + subject + "', body: '" + body + "' }",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (r) {
                    alert(r.d);
                },
                error: function (r) {
                    alert(r.responseText);
                },
                failure: function (r) {
                    alert(r.responseText);
                }
            });
            return false;
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        document.getElementById('form1').addEventListener('submit',
            manejadorValidacion)
    });

    function manejadorValidacion(e) {

        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;

        var expresion = /\w+@\w+\.+[a-z]/;


        if (name.length == 0) {
            console.log('El nombre está vacío');
            alert('El campo nombre es obligatorio');
            return false;
        }
        if (email.length == 0) {
            console.log('El email no es válido');
            alert('El campo email es obligatorio');
            return false;
        }

        if (!expresion.test(email)) {
            console.log('Formato de email no valido');
            alert('Email con formato no válido');
            return false;
        }
        if (phone.length != 9) {
            console.log('El phone no es válido');
            alert('El campo teléfono es un campo obligatorio');
            return false;
        }
        if (isNaN(phone)) {
            console.log('El phone no es válido');
            alert('Teléfono con formato no válido, debe tener 9 dígitos');
            return false;

        }
        alert('Correo enviado, gracias por su interés');

    this.submit();


</script>



<style>
    body {
        margin: 0;
        color: #6a6f8c;
        background: #c8c8c8;
        font: 600 16px/18px 'Open Sans', sans-serif;
    }

    *,
    :after,
    :before {
        box-sizing: border-box
    }

    .clearfix:after,
    .clearfix:before {
        content: '';
        display: table
    }

    .clearfix:after {
        clear: both;
        display: block
    }

    a {
        color: inherit;
        text-decoration: none
    }

    .login-wrap {
        width: 100%;
        margin: auto;
        max-width: 525px;
        min-height: 670px;
        position: relative;
        background: url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;
        box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
    }

    .login-html {
        width: 100%;
        height: 100%;
        position: absolute;
        padding: 90px 70px 50px 70px;
        background: rgba(40, 57, 101, .9);
    }

    .login-html .sign-in-htm,
    .login-html .sign-up-htm {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        transform: rotateY(180deg);
        backface-visibility: hidden;
        transition: all .4s linear;
    }

    .login-html .sign-in,
    .login-html .sign-up,
    .login-form .group .check {
        display: none;
    }

    .login-html .tab,
    .login-form .group .label,
    .login-form .group .button {
        text-transform: uppercase;
    }

    .login-html .tab {
        font-size: 22px;
        margin-right: 15px;
        padding-bottom: 5px;
        margin: 0 15px 10px 0;
        display: inline-block;
        border-bottom: 2px solid transparent;
    }

    .login-html .sign-in:checked+.tab,
    .login-html .sign-up:checked+.tab {
        color: #fff;
        border-color: #1161ee;
    }

    .login-form {
        min-height: 345px;
        position: relative;
        perspective: 1000px;
        transform-style: preserve-3d;
    }

    .login-form .group {
        margin-bottom: 15px;
    }

    .login-form .group .label,
    .login-form .group .input,
    .login-form .group .button {
        width: 100%;
        color: #fff;
        display: block;
    }

    .login-form .group .input,
    .login-form .group .button {
        border: none;
        padding: 15px 20px;
        border-radius: 25px;
        background: rgba(255, 255, 255, .1);
    }

    .login-form .group input[data-type="password"] {
        text-security: circle;
        -webkit-text-security: circle;
    }

    .login-form .group .label {
        color: #aaa;
        font-size: 12px;
    }

    .login-form .group .button {
        background: #1161ee;
    }

    .login-form .group label .icon {
        width: 15px;
        height: 15px;
        border-radius: 2px;
        position: relative;
        display: inline-block;
        background: rgba(255, 255, 255, .1);
    }

    .login-form .group label .icon:before,
    .login-form .group label .icon:after {
        content: '';
        width: 10px;
        height: 2px;
        background: #fff;
        position: absolute;
        transition: all .2s ease-in-out 0s;
    }

    .login-form .group label .icon:before {
        left: 3px;
        width: 5px;
        bottom: 6px;
        transform: scale(0) rotate(0);
    }

    .login-form .group label .icon:after {
        top: 6px;
        right: 0;
        transform: scale(0) rotate(0);
    }

    .login-form .group .check:checked+label {
        color: #fff;
    }

    .login-form .group .check:checked+label .icon {
        background: #1161ee;
    }

    .login-form .group .check:checked+label .icon:before {
        transform: scale(1) rotate(45deg);
    }

    .login-form .group .check:checked+label .icon:after {
        transform: scale(1) rotate(-45deg);
    }

    .login-html .sign-in:checked+.tab+.sign-up+.tab+.login-form .sign-in-htm {
        transform: rotate(0);
    }

    .login-html .sign-up:checked+.tab+.login-form .sign-up-htm {
        transform: rotate(0);
    }

    .hr {
        height: 2px;
        margin: 60px 0 50px 0;
        background: rgba(255, 255, 255, .2);
    }

    .foot-lnk {
        text-align: center;
    }

</style>
