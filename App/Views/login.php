<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../App/Views/includes/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../App/Views/includes/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../App/Views/includes/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../App/Views/includes/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../App/Views/includes/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../App/Views/includes/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../App/Views/includes/css/util.css">
    <link rel="stylesheet" type="text/css" href="../App/Views/includes/css/main.css">
    <!--===============================================================================================-->
    <title>Login</title>
</head>

<body>


    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../App/Views/includes/imagens/logowindti1.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="/autenticar">
                    <span class="login100-form-title">
                        Controle de Estoque 3.0
                    </span>

                    <div class="wrap-input100 validate-input">

                        <input class="input100" type="text" name="user" placeholder="Digite o seu usuario">

                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">


                        <input class="input100" type="password" name="pass" placeholder="Digite sua senha">



                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Entrar
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">

                        </span>
                        <a class="txt2" href="/esqueci-a-senha">
                            Esqueci minha senha
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <!--    <a class="txt2" href="#">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="../App/Views/includes/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../App/Views/includes/vendor/bootstrap/js/popper.js"></script>
    <script src="../App/Views/includes/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../App/Views/includes/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../App/Views/includes/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="../App/Views/includes/js/main.js"></script>


</body>

</html>