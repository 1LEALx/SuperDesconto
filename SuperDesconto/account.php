<!DOCTYPE html>
<html lang="en">
<head>
    <?php require "db.php"; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/accountstyle.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <?php if (isset($_SESSION['cadastro'])) {
        var_dump($_SESSION);
        $_SESSION['cadastro'] = NULL;
    }?>
    <div class="container-fluid pb-3 pt-2" style="color:#41637b; background-color: #41637b;">
        <!-- #41637b -->
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-3 mt-1">
                <a href="index.php"><img src="imagens/logocomp.png" width="250px" height="62.5px"></a>
            </div>
            <div class="col-sm-1"></div>
            <div class="input-group container-search mt-2">
                <input type="text" class="form-control input-search" placeholder="Pesquisar" maxlength="100">
                <button class="button-search btn btn-outline-secondary" type="button">
                    <ion-icon class="icon-search mb-1 mt-1" name="arrow-forward-outline"></ion-icon>
                </button>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
                <?php if (isset($_SESSION['nome'])) { ?>
                    <a class="btn btn-primary ms-5 mt-2 button-profile" href="account.php" role="button">
                        <ion-icon class="icon-profile" name="person"></ion-icon>
                        &nbsp;
                        <?php
                        $nomeusuario = $_SESSION['nome'];
                        $formatnome = substr($nomeusuario, 1, -1);
                        echo strtok($formatnome, " ");
                        ?>
                    </a> 
                <?php } else { ?>
                    <a class="btn btn-primary mt-2 button-profile" href="profile.php" role="button">
                        <ion-icon class="icon-profile" name="person"></ion-icon>
                        &nbsp;Minha conta
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Painel Profile -->
    <div class="mt-5">&nbsp;</div>
    <div class="mt-5 course-container">
	    <div class="course">
		    <div class="course-preview">
                <?php
                if ($_SESSION["tipoconta"] == 2) {
                    echo '<h6>Empresa</h6>';
                } else if ($_SESSION["tipoconta"] == 1) {
                    echo '<h6>Cliente</h6>';
                } else {
                    echo '<h6>Cliente</h6>';
                }
                ?>
                <?php
                echo '<h2 class="mt-2 mb-4">' .substr($nomeusuario, 1, -1). '</h2>';
                ?>
                <?php
                echo '<a href="doLogout.php?token='.md5(session_id()).'"><button class="btn-panel-preview"><ion-icon class="me-2 exit-account" name="exit"></ion-icon> Sair</button></a>';
                ?>
		    </div>
		    <div class="course-info">
			    <h6>Complete seu cadastro</h6>
			    <h2 class="mt-3">Precisamos de mais<br>algumas informações...</h2>
			    <a href="#"><button class="btn-panel"><ion-icon class="me-2 config-account" name="settings"></ion-icon> Completar Cadastro</button></a>
		    </div>
	    </div>
    </div>
    <div class="card-container mt-5">
        <button class="card me-5">
            <div class="card-info">
                <ion-icon class="me-3 icon-h6" name="cart"></ion-icon>
                <h6 class="mt-1">Meus Pedidos</h6>
            </div>
        </button>
        <button class="card me-5">
            <div class="card-info">
                <ion-icon class="me-3 icon-h6" name="chatbubbles"></ion-icon>
                <h6 class="mt-1">Fale conosco</h6>
            </div>
        </button>
        <button class="card">
            <div class="card-info">
                <ion-icon class="me-3 icon-h6" name="heart"></ion-icon>
                <h6 class="mt-1">Favoritos</h6>
            </div>
        </button>
    </div>
</body>
</html>