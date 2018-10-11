<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Login KaPri</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <!--===============================================================================================-->
</head>
<body>
<?php
session_start();
require 'config.php';
if(!empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $sql = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = :email AND senha = :senha AND ativo = 1");
    $sql->bindValue(":email", $email);
    $sql->bindValue(":senha", md5($senha));
    $sql->execute();

    if ($sql->rowCount() > 0){
        $sql = $sql->fetch();
        $_SESSION['kaprilogin'] = $sql['id'];
//        header("Location: ../dash.php");
        echo "<script>window.location='adm/pages/dashboard.php';</script>";
        exit;

    } else{
        echo '<span class="formphp"> Usuário e/ou Senha errados! </span>';
    }
}

?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-85 p-b-20">

            <form method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-70">
						Login
					</span>
                <span class="login100-form-avatar">
						<img src="assets/img/Kapri_LOGOMARCA-3.png" alt="AVATAR">
					</span>

                <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
                    <input class="input100" type="email" name="email" id="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                    <input class="input100" type="password" name="senha" id="senha">
                    <span class="focus-input100" data-placeholder="Senha"></span>
                </div>

                <div class="container-login100-form-btn">
                    <input type="submit" value="Enviar" class="login100-form-btn">
                    </input>
                </div>

<!--
                <ul class="login-more p-t-190">
                    <li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

                        <a href="#" class="txt2">
                            Username / Password?
                        </a>
                    </li>

                    <li>
							<span class="txt1">
								Don’t have an account?
							</span>

                        <a href="#" class="txt2">
                            Sign up
                        </a>
                    </li>
                </ul>
-->
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
<script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="assets/js/login_main.js"></script>

</body>
</html>
