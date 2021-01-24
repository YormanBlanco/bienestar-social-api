<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <title>Uptamca | Login</title> 
    <link rel="stylesheet" href={{asset('css/login.css')}}>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    @if(session('message'))
        <br>

            <script type="text/javascript">
                swal(
                    `{{session('message')}}`,
                    '',
                    'error'
                    )

            </script>

        <br>
    @endif
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">
                Inicio de sesión
            </div>
            <div class="title signup">
                Registro
            </div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Inicio</label>
                <label for="signup" class="slide signup">Registro</label>
                <div class="slider-tab">
                </div>
            </div>
            <div class="form-inner">
                <!-- form login -->
                <form action="{{ url('login') }}" method="POST" enctype="multipart/form-data" class="login">
                    {{ csrf_field() }}
                    <div class="field">
                        <input type="text" name="email" placeholder="Email" required>
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Contraseña" required>
                    </div>
                    <div class="pass-link">
                        <a href="#">¿Olvidaste la contraseña?</a></div>
                    <div class="field btn">
                        <div class="btn-layer">
                        </div>
                        <input type="submit" value="Iniciar sesión">
                    </div>
                    <div class="signup-link">
                        ¿no estas registrado? <a href="">Solicita que te registren ahora</a></div>
                </form>
                <!-- form registro -->
                <form action="{{ url('singup') }}" method="POST" enctype="multipart/form-data" class="signup">
                    {{ csrf_field() }}
                    <div class="field">
                        <input type="text" name="name" placeholder="Nombre y Apellido" required>
                    </div>
                    <div class="field">
                        <input type="text" name="email" placeholder="Email" required>
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Contraseña" required>
                    </div>
                    <div class="field">
                        <input type="password" name="password_confirmation" placeholder="Confirme contraseña" required>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer">
                        </div>
                        <input type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = (() => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (() => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (() => {
            signupBtn.click();
            return false;
        });
    </script>

</body>

</html>






