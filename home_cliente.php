<?php
session_start();
include('verifica_conexao.php');
include('verifica_perfil_usr.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Controle de clientes</title>
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
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><i class="fa-regular fa-scanner-keyboard"></i>Controle de Clientes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" href="#modalCadCli">Novo cliente</a></li>
<!--                        <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" href="#modalAltCli">Alterar</a></li> -->
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" href="#modalRemCli">Remover cliente</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" href="#modalConCliente">Consultar clientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <div id="mensagem">
                    </div>
                    <h2 class="section-heading text-uppercase">Bem-vindo, <?php echo $_SESSION['usuario'] ?>!</h2>
                    <h3 class="section-subheading text-muted">Escolha qual a sua ação</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#modalCadCli">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="img/addItem.png" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Novo cliente</div>
                                <div class="portfolio-caption-subheading text-muted">Cadastro de novos clientes</div>
                            </div>
                        </div>
                    </div>
<!--
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#modalAltCli">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="img/addItem.png" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Alterar</div>
                                <div class="portfolio-caption-subheading text-muted">Alterar cadastro do cliente</div>
                            </div>
                        </div>
                    </div>
-->
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#modalRemCli">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="img/removeItem.png" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Remover cliente</div>
                                <div class="portfolio-caption-subheading text-muted">Remover cadastro dos clientes</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <!-- Portfolio item 4-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#modalConCliente" onclick="getClientes()">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="img/search.png" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Consultar clientes</div>
                                <div class="portfolio-caption-subheading text-muted">Consultar cadastro dos clientes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Univesp - PI Grupo 3 - Sala 6 - 2022</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/univespoficial"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/univespoficial/"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://br.linkedin.com/company/univesp"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Termos de uso</a>
                    </div>
                </div>
            </div>
        </footer>
    
        </script>
        <!-- Modais-->
        <!-- Modal cadastro de peças-->
        <div class="portfolio-modal modal fade" id="modalCadCli" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Novo Cliente</h2>
                                    
                                    <p class="item-intro text-muted">Cadastro de novos clientes</p>
                                    <div class="container px-5 my-5">
                                        <form id="CadClienteForm" method="post" action="home_cliente.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="nomeCli" name="nomeCli" type="text" placeholder="nomeCli" required/>
                                                <label for="nomeCli">Nome do Cliente</label>
                                                <div class="invalid-feedback">Informe o nome do cliente</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="endCli" name="endCli" type="text" placeholder="endCli"required/>
                                                <label for="endCli">Endereço</label>
                                                <div class="invalid-feedback">Informe o endereço do cliente</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="numeroEndCli" name="numeroEndCli" type="text" placeholder="numeroEndCli" required/>
                                                <label for="numeroEndCli">Nº</label>
                                                <div class="invalid-feedback">Informe o número do endereço</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="telCli" name="telCli" type="text" placeholder="telCli" required/>
                                                <label for="telCli">Telefone</label>
                                                <div class="invalid-feedback">Informe o número do telefone</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="celCli" name="celCli" type="text" placeholder="celCli" required/>
                                                <label for="celCli">Celular</label>
                                                <div class="invalid-feedback">Informe o número do celular</div>
                                            </div>
                                            <div class="d-grid">
                                                <input class="btn btn-primary btn-lg" id="submitCadNewItem" name ="submitCadNewItem" value="Cadastrar" type="submit" onclick="cadastroCliente()">
                                                <script type="text/javascript" >
                                                    function cadastroCliente() {
                                                        $.ajax({
                                                            //METODO DE ENVIO
                                                            type: "POST",
                                                            //URL PARA QUAL OS DADOS SERÃO ENVIADOS
                                                            url: "/addCliente.php",
                                                            //DADOS QUE SERÃO ENVIADOS
                                                            data: $("#CadClienteForm").serialize(),
                                                            //TIPOS DE DADOS QUE O AJAX TRATA
                                                            dataType: "json",
                                                            success: function(){
                                                            }                                                            
                                                        });
                                                    }
                                                </script>
                                            </div>
                                        </form>
                                    </div>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-times me-1"></i>
                                        Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--
        <div class="portfolio-modal modal fade" id="modalAltCli" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Alterar</h2>
                                    
                                    <p class="item-intro text-muted">Alterar cadastro do cliente</p>
                                    <div class="container px-5 my-5">
                                        <form id="AltCliForm" method="post" action="home_cliente.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="codCliAlt" name="codCliAlt" type="text" placeholder="codCliAlt" required/>
                                                <label for="codPecaAdd">Código do cliente</label>
                                                <div class="invalid-feedback">Informe o código do cliente</div>
                                            </div>
                                            <div class="d-grid">
                                                <input class="btn btn-primary btn-lg" id="submitAltCli" name ="submitAltCli" value="Alterar" type="submit" onclick="AltCliente()">
                                                <script type="text/javascript" >
                                                    function AltCliente() {
                                                        $.ajax({
                                                            //METODO DE ENVIO
                                                            type: "POST",
                                                            //URL PARA QUAL OS DADOS SERÃO ENVIADOS
                                                            url: "/AltCliente.php",
                                                            //DADOS QUE SERÃO ENVIADOS
                                                            data: $("#AltCliForm").serialize(),
                                                            //TIPOS DE DADOS QUE O AJAX TRATA
                                                            dataType: "json",
                                                            success: function(){
                                                            }                                                            
                                                        });
                                                    }
                                                </script>
                                            </div>
                                        </form>
                                    </div>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-times me-1"></i>
                                        Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
-->
        <!-- Portfolio item 3 modal popup-->
        <div class="portfolio-modal modal fade" id="modalRemCli" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Remover cliente</h2>
                                    
                                    <p class="item-intro text-muted">Remover cadastro do cliente</p>
                                    <div class="container px-5 my-5">
                                        <form id="RemCliForm" method="post" action="home_cliente.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="codCliRem" name="codCliRem" type="text" placeholder="codCliRem" required/>
                                                <label for="codCliRem">Código do cliente</label>
                                                <div class="invalid-feedback">Informe o código do cliente</div>
                                            </div>
                                            <div class="d-grid">
                                                <input class="btn btn-primary btn-lg" id="submitRemCli" name ="submitRemCli" value="Remover" type="submit" onclick="RemCliente()">
                                                <script type="text/javascript" >
                                                    function RemCliente() {
                                                        $.ajax({
                                                            //METODO DE ENVIO
                                                            type: "POST",
                                                            //URL PARA QUAL OS DADOS SERÃO ENVIADOS
                                                            url: "/remCliente.php",
                                                            //DADOS QUE SERÃO ENVIADOS
                                                            data: $("#RemCliForm").serialize(),
                                                            //TIPOS DE DADOS QUE O AJAX TRATA
                                                            dataType: "json",
                                                            success: function(){
                                                                alert("Item removido com sucesso!");
                                                            }                                                            
                                                        });
                                                    }
                                                </script>
                                            </div>
                                        </form>
                                    </div>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-times me-1"></i>
                                        Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 4 modal popup-->
        <div class="portfolio-modal modal fade" id="modalConCliente" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Consultar clientes</h2>
                                    <p class="item-intro text-muted"> Todas os cadastros dos clientes </p>
                                    <div class="container px-4 px-lg-5 mt-5">
                                        <div id="cliente" class="row gx-3 gx-lg-4 row-cols-2 row-cols-md-2 row-cols-xl-2 justify-content-center">        
                                            <script type="text/javascript">
                                                function getClientes() {

                                                    $.ajax({
                                                        dataType:"json",
                                                        url:"getClientes.php", 
                                                        type: "GET",
                                                        success:function(result){

                                                            if (result.mensagem == "Nenhum cliente encontrado") {
                                                                `
                                                                <div>
                                                                    ${document.getElementById("cliente").innerHTML = result.mensagem }
                                                                </div>
                                                                `

                                                            } else {

                                                                retornoObj = JSON.stringify(result);
                                                                retornoTxt = JSON.parse(retornoObj);
                                                                cliArray = retornoTxt.body;
                                                                varInfo = "";
                                                                
                                                                for(let i in cliArray) {
                                                                    varInfo +=
                                                                    `
                                                                    <div class="col-lg-4 mb-5">
                                                                        <div class="card h-100 shadow border-0">
                                                                            <div class="card-header p-3">
                                                                                <h5 class="fw-bold">${cliArray[i]['cli_id']}</h5>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                    <p class="card-text mb-0">${cliArray[i]['nomeCli']}</p>
                                                                            </div>
                                                                            <div class="card-footer align-items-end p-4 pt-0 bg-transparent border-top-0">
                                                                                <div class="small">
                                                                                    <div class="text-muted"><b>Endereço:</b> ${cliArray[i]['endCli']}</div>
                                                                                    <div class="text-muted"><b>Nº:</b> ${cliArray[i]['numeroEndCli']}</div>
                                                                                    <div class="text-muted"><b>Telefone:</b> ${cliArray[i]['telCli']}</div>
                                                                                    <div class="text-muted"><b>Celular:</b> ${cliArray[i]['celCli']}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    `;   
                                                                }
                                                                document.getElementById("cliente").innerHTML = varInfo;
                                                            }
                                                        }
                                                    });
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-times me-1"></i>
                                        Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
