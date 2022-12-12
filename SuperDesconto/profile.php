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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
        $query = "INSERT into usuario (nome, email, senha, data_criacao) values ($username,$email,$password,$hoje)";
        if (mysqli_query($con, $query)) {
            $_SESSION["cadastro"] = "sucesso";
            $_SESSION["nome"] = $username;
            $_SESSION["email"] = $email;
            header("location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#" method="POST">
                <h1>Criar conta</h1>
                <div class="input-container">
                    <input maxlength="45" type="text" required="" name="nome">
                    <label>Nome</label>
                </div>
                <br>
                <div maxlength="110" class="input-container">
                    <input type="email" required="" name="email">
                    <label>Email</label>
                </div>
                <br>
                <div maxlength="30" class="input-container">
                    <input type="password" required="" name="senha">
                    <label>Senha</label>
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
            <form action="profile.php" method="POST">
                <h1>Entre com sua conta</h1>
                <br>
                <div class="input-container">
                    <input type="text" required="">
                    <label>Email</label>
                </div>
                <br>
                <div class="input-container">
                    <input type="password" required="">
                    <label>Senha</label>
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
<script src="js/profilejs.js"></script>
</html>