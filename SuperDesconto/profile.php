<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <script src="https://kit.fontawesome.com/f653a2c6ae.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/profilestyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <?php
    require('db.php');
    if (isset($_REQUEST['nome']) && isset($_REQUEST['email']) && isset($_REQUEST['senha'])) {
        $username = stripslashes($_REQUEST['nome']);
        $username = mysqli_real_escape_string($con, $username);
        $username =  '"' . $username . '"';
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $email =  '"' . $email . '"';
        $password = stripslashes($_REQUEST['senha']);
        $password = mysqli_real_escape_string($con, $password);
        $password =   '"' . $password . '"';
        $hoje = date('Y/m/d');
        $hoje = '"' . $hoje . '"';
        $cliente = 1;
        $cliente = '"' . $cliente . '"';
        $query = "INSERT INTO usuario (nome, email, senha, data_criacao, tipoconta) VALUES ($username,$email,md5($password),$hoje,$cliente)";
        if (mysqli_query($con, $query) === TRUE) {
            $_SESSION["cadastro"] = "sucesso";
            $_SESSION["nome"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["tipoconta"] = $tipoconta;
            header("location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
    else if((isset($_POST['email'])) && (isset($_POST['senha']))){
        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $email =  '"' . $email . '"';
        $password = stripslashes($_POST['senha']);
        $password = mysqli_real_escape_string($con, $_POST['senha']);
        $password = '"' . $password . '"';

        $result_usuario = "SELECT * FROM usuario WHERE email = $email AND senha = md5($password) LIMIT 1";
        $resultado_usuario = mysqli_query($con, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        $username = '"' . $resultado['nome'] . '"';
        
        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['idusuario'];
            $_SESSION['nome'] = $username;
            $_SESSION['email'] = $resultado['email'];
            $_SESSION['tipoconta'] = $resultado['tipoconta'];
            header("Location: index.php");
        }else{    
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: profile.php");
        }
    }
    ?>
    <div class="container-fluid pb-3 pt-2 mb-5" style="color:#41637b; background-color: #41637b;">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-6 mt-1">
                <a href="index.php"><img src="imagens/logocomp.png" width="250px" height="62.5px"></a>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="space">&nbsp;</div>
    <div class="space">&nbsp;</div>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#" method="POST">
                <h1>Criar conta</h1>
                <div class="input-container">
                    <input maxlength="45" type="text" required="" name="nome">
                    <label>Nome</label>
                </div>
                <br>
                <div class="input-container">
                    <input maxlength="110" type="email" required="" name="email">
                    <label>Email</label>
                </div>
                <br>
                <div id="input" class="input-container">
                    <div class="input-group container-input">
                        <input maxlength="30" class="form-control input-pass" id="pass" type="password" required="" name="senha">
                        <div class="button-see">
                            <img class="mb-1" id="eye" onclick="trocar()" src="imagens/eye-slash-solid.svg" width="20px">
                        </div>
                        <label>Senha</label>
                    </div>
                </div>
                <br>
                <button class="main-button" type="submit" value="submit">Realizar cadastro</button>
                <div class="social-container">
                    <a href="#" class="social btn btn-outline-primary"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social s-1 btn btn-outline-primary"><i class="fa-brands fa-google"></i></a>
                </div>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#" method="POST">
                <h1>Entre com sua conta</h1>
                <br>
                <div class="input-container">
                    <input maxlength="110" type="text" required="" name="email">
                    <label>Email</label>
                </div>
                <br>
                <div id="input-login" class="input-container">
                    <div class="input-group container-input">
                        <input maxlength="30" class="form-control input-pass contador" type="password" required="" name="senha">
                        <div class="button-see">
                            <img class="mb-1" id="eye-login" onclick="trocarLogin()" src="imagens/eye-slash-solid.svg" width="20px">
                        </div>
                        <label>Senha</label>
                    </div>
                </div>
                <a href="#">Esqueceu sua senha?</a>
                <button class="main-button">Login</button>
                <div class="social-container">
                    <a href="#" class="social btn btn-outline-primary"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social s-1 btn btn-outline-primary"><i class="fa-brands fa-google"></i></a>
                </div>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bem vindo(a) novamente!</h1>
                    <p>Escolha uma forma de login para ter acesso a descontos imperdíveis!</p>
                    <button class="main-button ghost" id="signIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Primeira vez por aqui?</h1>
                    <p>Crie agora sua conta e tenha acesso a descontos imperdíveis!</p>
                    <button class="main-button ghost" id="signUp">Realizar cadastro</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/profilejs.js"></script>
</html>
