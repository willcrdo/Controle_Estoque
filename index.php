<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Login</title>
        <link rel="icon" type="image/x-icon" href="assets/toolssolid.ico" /> 
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Ajax -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    </head>
    <body id="page-top">
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="justify-content-center">
                            <h2 class="text-uppercase">Entre</h2>
                            <p class="item-intro text-muted">Faça seu login.</p>

                            <?php
                            if(isset($_SESSION['nao_autenticado'])):
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <p> Usuário ou senha inválidos!</p>
                            </div>
                            <?php    
                            endif;
                            unset($_SESSION['nao_autenticado']);
                            ?>
                            
                            <form action="login.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input name="usuario" class="form-control" id="usuario" type="text" value="" placeholder="Usuário" required />
                                    <label for="usuario">Usuário</label>
                                    <div class="invalid-feedback">Informe seu usuário</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Digite sua senha" required>
                                    <label for="inputPassword">Senha</label>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg" id="loginButton" type="submit">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        </script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS
        <script src="js/scripts.js"></script>-->
    </body>
</html>
