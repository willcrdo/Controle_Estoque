<?php
session_start();
include('verifica_conexao.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Controle de estoque</title>
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
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><i class="fas fa-tools"></i>Controle de estoque</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" href="#modalConsulta">Consultar Estoque</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" href="#modalAdicionar">Adicionar</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" href="#modalRemover">Remover</a></li>
<!--                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Oportunidades</h2>
                    <h3 class="section-subheading text-muted">Escolha aqui o seu destino</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1" onclick="getInfo()">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/informatica.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Cadastrar peças</div>
                                <div class="portfolio-caption-subheading text-muted">Cadastro de novas peças</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 2-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2" onclick="getConstr()">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/construcao-civil.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Adicionar estoque</div>
                                <div class="portfolio-caption-subheading text-muted">Adicionar quantidades de peça no estoque</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3" onclick="getAuto()">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/automotivo.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Remover estoque</div>
                                <div class="portfolio-caption-subheading text-muted">Remover quantidade de peças no estoque</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <!-- Portfolio item 4-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4" onclick="getEletrodom()">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/eletrodomesticos2.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Consultar estoque</div>
                                <div class="portfolio-caption-subheading text-muted">Consultar quantidade de peças no estoque</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Cadastre-se</h2>
                    <h3 class="section-subheading text-muted">Faça o seu cadastro e conecte-se com pessoas da sua região.</h3>
                </div>
                
                <form id="cadastroForm">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6 text-center">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#modalCadastroCliente">
                                <button class="btn btn-primary btn-xl text-uppercase" type="button">
                                    Sou Cliente
                                </button>
                            </a>
                        </div>
                        <div class="col-md-6 text-center">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#modalCadastroPrestador">
                                <button class="btn btn-primary btn-xl text-uppercase"  type="button">
                                    Sou Prestador
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="text-center">
<!--                     <h2 class="section-heading text-uppercase">Cadastre-se</h2> -->
                    <h3 class="section-subheading text-muted">Já é cadastrado? Faça o seu <a class="portfolio-link" data-bs-toggle="modal" href="#modalLogin">login</a>.</h3>
                    </div>
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
<!--                     <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Cadastrar</button></div> -->
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; PI Grupo 1 - CEU Quinta do sol - 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Termos de uso</a>
                    </div>
                </div>
            </div>
        </footer>
    
        </script>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Informática</h2>
                                    
                                    <p class="item-intro text-muted">Aqui você encontra profissionais na área de informática e tecnologia</p>
                                    <div class="container px-4 px-lg-5 mt-5">
                                        <div id="informatica" class="row gx-3 gx-lg-4 row-cols-2 row-cols-md-2 row-cols-xl-3 justify-content-center">        
                                            <script type="text/javascript">
                                                function getInfo() {

                                                    $.ajax({
                                                        dataType:"json",
                                                        url:"getInfo.php", 
                                                        type: "GET",
                                                        success:function(result){

                                                            if (result.mensagem == "Nenhum prestador encontrado") {
                                                                `
                                                                <div>
                                                                    ${document.getElementById("informatica").innerHTML = result.mensagem }
                                                                </div>
                                                                `

                                                            } else {

                                                                console.log(result.mensagem);
                                                                retornoObj = JSON.stringify(result);
                                                                retornoTxt = JSON.parse(retornoObj);
                                                                cliArray = retornoTxt.body;
                                                                console.log(cliArray);
                                                                varInfo = "";
                                                                cont = 0;
                                                                
                                                                for(let i in cliArray) {
                                                                    varInfo +=
                                                                    `
                                                                    <div class="col-lg-4 mb-5">
                                                                        <div class="card h-100 shadow border-0">
                                                                            <div class="card-header p-3">
                                                                                <h5 class="fw-bold">${cliArray[i]['nome']}</h5>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                    <p class="card-text mb-0">${cliArray[i]['desc_serv']}</p>
                                                                            </div>
                                                                            <div class="card-footer align-items-end p-4 pt-0 bg-transparent border-top-0">
                                                                                <div class="small">
                                                                                    <div class="text-muted"><b>Telefone:</b> ${cliArray[i]['telefone']}</div>
                                                                                    <div class="text-muted"><b>Celular:</b> ${cliArray[i]['celular']}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    `;
                                                                }
                                                                document.getElementById("informatica").innerHTML = varInfo;
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
        <!-- Portfolio item 2 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Construção Civil</h2>
                                    <p class="item-intro text-muted">Aqui você encontra profissionais da área de construção civil.</p>
                                    <div class="container px-4 px-lg-5 mt-5">
                                        <div id="construcao" class="row gx-3 gx-lg-4 row-cols-2 row-cols-md-2 row-cols-xl-2 justify-content-center">        
                                            <script type="text/javascript">
                                                function getConstr() {

                                                    $.ajax({
                                                        dataType:"json",
                                                        url:"getConstr.php", 
                                                        type: "GET",
                                                        success:function(result){

                                                            if (result.mensagem == "Nenhum prestador encontrado") {
                                                                `
                                                                <div>
                                                                    ${document.getElementById("construcao").innerHTML = result.mensagem }
                                                                </div>
                                                                `

                                                            } else {

                                                                retornoObj = JSON.stringify(result);
                                                                retornoTxt = JSON.parse(retornoObj);
                                                                cliArray = retornoTxt.body;
                                                                varInfo = "";
                                                                cont = 0;
                                                                
                                                                for(let i in cliArray) {
                                                                    varInfo +=
                                                                    `
                                                                    <div class="col-lg-4 mb-5">
                                                                        <div class="card h-100 shadow border-0">
                                                                            <div class="card-header p-3">
                                                                                <h5 class="fw-bold">${cliArray[i]['nome']}</h5>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                    <p class="card-text mb-0">${cliArray[i]['desc_serv']}</p>
                                                                            </div>
                                                                            <div class="card-footer align-items-end p-4 pt-0 bg-transparent border-top-0">
                                                                                <div class="small">
                                                                                    <div class="text-muted"><b>Telefone:</b> ${cliArray[i]['telefone']}</div>
                                                                                    <div class="text-muted"><b>Celular:</b> ${cliArray[i]['celular']}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    `;
                                                                }
                                                                document.getElementById("construcao").innerHTML = varInfo;
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
        <!-- Portfolio item 3 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Automotivo</h2>
                                    <p class="item-intro text-muted">Aqui você encontra os profissionais da área automotiva.</p>
                                    <div class="container px-4 px-lg-5 mt-5">
                                        <div id="automotivo" class="row gx-3 gx-lg-4 row-cols-2 row-cols-md-2 row-cols-xl-2 justify-content-center">        
                                            <script type="text/javascript">
                                                function getAuto() {

                                                    $.ajax({
                                                        dataType:"json",
                                                        url:"getAuto.php", 
                                                        type: "GET",
                                                        success:function(result){

                                                            if (result.mensagem == "Nenhum prestador encontrado") {
                                                                `
                                                                <div>
                                                                    ${document.getElementById("automotivo").innerHTML = result.mensagem }
                                                                </div>
                                                                `

                                                            } else {
                                                                retornoObj = JSON.stringify(result);
                                                                retornoTxt = JSON.parse(retornoObj);
                                                                cliArray = retornoTxt.body;
                                                                console.log(cliArray);
                                                                varInfo = "";
                                                                
                                                                for(let i in cliArray) {
                                                                    varInfo +=
                                                                    `
                                                                    <div class="col-lg-4 mb-5">
                                                                        <div class="card h-100 shadow border-0">
                                                                            <div class="card-header p-3">
                                                                                <h5 class="fw-bold">${cliArray[i]['nome']}</h5>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                    <p class="card-text mb-0">${cliArray[i]['desc_serv']}</p>
                                                                            </div>
                                                                            <div class="card-footer align-items-end p-4 pt-0 bg-transparent border-top-0">
                                                                                <div class="small">
                                                                                    <div class="text-muted"><b>Telefone:</b> ${cliArray[i]['telefone']}</div>
                                                                                    <div class="text-muted"><b>Celular:</b> ${cliArray[i]['celular']}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    `;  
                                                                }
                                                                document.getElementById("automotivo").innerHTML = varInfo;
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
        <!-- Portfolio item 4 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Eletrodomésticos</h2>
                                    <p class="item-intro text-muted">Aqui você encontra os profissionais da área de eletrodomésticos. </p>
                                    <div class="container px-4 px-lg-5 mt-5">
                                        <div id="eletrodomesticos" class="row gx-3 gx-lg-4 row-cols-2 row-cols-md-2 row-cols-xl-2 justify-content-center">        
                                            <script type="text/javascript">
                                                function getEletrodom() {

                                                    $.ajax({
                                                        dataType:"json",
                                                        url:"getEletrodom.php", 
                                                        type: "GET",
                                                        success:function(result){

                                                            if (result.mensagem == "Nenhum prestador encontrado") {
                                                                `
                                                                <div>
                                                                    ${document.getElementById("eletrodomesticos").innerHTML = result.mensagem }
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
                                                                                <h5 class="fw-bold">${cliArray[i]['nome']}</h5>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                    <p class="card-text mb-0">${cliArray[i]['desc_serv']}</p>
                                                                            </div>
                                                                            <div class="card-footer align-items-end p-4 pt-0 bg-transparent border-top-0">
                                                                                <div class="small">
                                                                                    <div class="text-muted"><b>Telefone:</b> ${cliArray[i]['telefone']}</div>
                                                                                    <div class="text-muted"><b>Celular:</b> ${cliArray[i]['celular']}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    `;   
                                                                }
                                                                document.getElementById("eletrodomesticos").innerHTML = varInfo;
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
        <!-- Portfolio item 5 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Eletroportáteis</h2>
                                    <p class="item-intro text-muted">Aqui você encontra os profissionais da área de eletroportáteis.</p>
                                    <div class="container px-4 px-lg-5 mt-5">
                                        <div id="eletroportateis" class="row gx-3 gx-lg-4 row-cols-2 row-cols-md-2 row-cols-xl-2 justify-content-center">        
                                            <script type="text/javascript">
                                                function getEletropor() {

                                                    $.ajax({
                                                        dataType:"json",
                                                        url:"getEletropor.php", 
                                                        type: "GET",
                                                        success:function(result){

                                                            if (result.mensagem == "Nenhum prestador encontrado") {
                                                                `
                                                                <div>
                                                                    ${document.getElementById("eletroportateis").innerHTML = result.mensagem }
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
                                                                                <h5 class="fw-bold">${cliArray[i]['nome']}</h5>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                    <p class="card-text mb-0">${cliArray[i]['desc_serv']}</p>
                                                                            </div>
                                                                            <div class="card-footer align-items-end p-4 pt-0 bg-transparent border-top-0">
                                                                                <div class="small">
                                                                                    <div class="text-muted"><b>Telefone:</b> ${cliArray[i]['telefone']}</div>
                                                                                    <div class="text-muted"><b>Celular:</b> ${cliArray[i]['celular']}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    `;    
                                                                }
                                                                document.getElementById("eletroportateis").innerHTML = varInfo;
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
        <!-- Portfolio item 6 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Transportes</h2>
                                    <p class="item-intro text-muted">Aqui você encontra os profissionais da área de transportes.</p>
                                    <div class="container px-4 px-lg-5 mt-5">
                                        <div id="transportes" class="row gx-3 gx-lg-4 row-cols-2 row-cols-md-2 row-cols-xl-2 justify-content-center">        
                                            <script type="text/javascript">
                                                function getTrans() {

                                                    $.ajax({
                                                        dataType:"json",
                                                        url:"getTrans.php", 
                                                        type: "GET",
                                                        success:function(result){

                                                            if (result.mensagem == "Nenhum prestador encontrado") {
                                                                `
                                                                <div>
                                                                    ${document.getElementById("transportes").innerHTML = result.mensagem }
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
                                                                                <h5 class="fw-bold">${cliArray[i]['nome']}</h5>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                    <p class="card-text mb-0">${cliArray[i]['desc_serv']}</p>
                                                                            </div>
                                                                            <div class="card-footer align-items-end p-4 pt-0 bg-transparent border-top-0">
                                                                                <div class="small">
                                                                                    <div class="text-muted"><b>Telefone:</b> ${cliArray[i]['telefone']}</div>
                                                                                    <div class="text-muted"><b>Celular:</b> ${cliArray[i]['celular']}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    `;    
                                                                }
                                                                document.getElementById("transportes").innerHTML = varInfo;
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
        <!-- Portfolio item 7 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Não encontrou?</h2>
                                    <p class="item-intro text-muted">Pesquise entre os demais profissionais cadastrados.</p>
                                    <div class="container px-4 px-lg-5 mt-5">
                                        <div id="outros" class="row gx-3 gx-lg-4 row-cols-2 row-cols-md-2 row-cols-xl-2 justify-content-center">        
                                            <script type="text/javascript">
                                                function getOthers() {

                                                    $.ajax({
                                                        dataType:"json",
                                                        url:"getOthers.php", 
                                                        type: "GET",
                                                        success:function(result){

                                                            if (result.mensagem == "Nenhum prestador encontrado") {
                                                                `
                                                                <div>
                                                                    ${document.getElementById("outros").innerHTML = result.mensagem }
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
                                                                                <h5 class="fw-bold">${cliArray[i]['nome']}</h5>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                    <p class="card-text mb-0">${cliArray[i]['desc_serv']}</p>
                                                                            </div>
                                                                            <div class="card-footer align-items-end p-4 pt-0 bg-transparent border-top-0">
                                                                                <div class="small">
                                                                                    <div class="text-muted"><b>Telefone:</b> ${cliArray[i]['telefone']}</div>
                                                                                    <div class="text-muted"><b>Celular:</b> ${cliArray[i]['celular']}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    `;   
                                                                }
                                                                document.getElementById("outros").innerHTML = varInfo;
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
        <!-- Modal Cadastro de Clientes-->
        <div class="portfolio-modal modal fade" id="modalCadastroCliente" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Cadastre-se!</h2>
                                    <p class="item-intro text-muted">E tenha acesso aos melhores profissionais da sua região</p>
                                    <div class="container px-5 my-5">
                                        <form id="CadastroCliForm" method="post" action="redirect.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="nomeCli" name="nomeCli" type="text" placeholder="Nome" required/>
                                                <label for="nomeCli">Nome</label>
                                                <div class="invalid-feedback">Informe seu nome</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="telefoneCli" name="telefoneCli" type="text" placeholder="Telefone"/>
                                                <label for="telefoneCli">Telefone</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="celularCli" name="celularCli" type="text" placeholder="Celular" required/>
                                                <label for="celularCli">Celular</label>
                                                <div class="invalid-feedback">Informe seu celular</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="emailCli" name="emailCli" type="email" placeholder="Email" required/>
                                                <label for="emailCli">Email</label>
                                                <div class="invalid-feedback">Informe seu e-mail</div>
                                                <div class="invalid-feedback">Digite um e-mail válido.</div>
                                            </div>
                                            <div class="d-grid">
                                                <input class="btn btn-primary btn-lg" id="submitCli" name ="submitCli" value="Cadastrar" type="submit" onclick="cadCli()">
                                                <script type="text/javascript" >
                                                    function cadCli() {
                                                        $.ajax({
                                                            //METODO DE ENVIO
                                                            type: "POST",
                                                            //URL PARA QUAL OS DADOS SERÃO ENVIADOS
                                                            url: "/cadastroCliente2.php",
                                                            //DADOS QUE SERÃO ENVIADOS
                                                            //data: $("#CadastroPresForm").serialize(),
                                                            data: $("#CadastroCliForm").serialize(),
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Cadastro de Prestadores-->
        <div class="portfolio-modal modal fade" id="modalCadastroPrestador" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Cadastre-se!</h2>
                                    <p class="item-intro text-muted">E forneça os melhores serviços da sua região</p>
                                    <div class="container px-5 my-5">
                                        <form id="CadastroPresForm" method="post" action="redirect.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="nomePres" name="nomePres" type="text" placeholder="Nome" value="" required/>
                                                <label for="nomePres">Nome</label>
                                                <div class="invalid-feedback">Informe seu nome</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="telefonePres" name="telefonePres" type="text" placeholder="Telefone" value=""/>
                                                <label for="telefonePres">Telefone</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="celularPres" name="celularPres" type="text" placeholder="Celular" value="" required/>
                                                <label for="celularPres">Celular</label>
                                                <div class="invalid-feedback">Informe seu celular</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="mail" name="mailPres" type="email" placeholder="Email" value="" required,email/>
                                                <label for="mailPres">Email</label>
                                                <div class="invalid-feedback">Informe seu e-mail</div>
                                                <div class="invalid-feedback">Digite um e-mail válido.</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="id_categoria" name="id_categoria" aria-label="Categoria">
                                                    <option value="Selecione...">Selecione...</option>
                                                    <option value="1">Informática</option>
                                                    <option value="2">Construção Civil</option>
                                                    <option value="3">Automotivo</option>
                                                    <option value="4">Eletrodomésticos</option>
                                                    <option value="5">Eletroportáteis</option>
                                                    <option value="6">Transportes</option>
                                                    <option value="7">Outros</option>
                                                </select>
                                                <label for="id_categoria">Categoria</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="desc_serv" name="desc_serv" type="text" value="" placeholder="Descreva suas habilidades" style="height: 10rem;" required></textarea>
                                                <label for="desc_serv">Conte um pouco sobre os seus serviços</label>
                                                <div class="invalid-feedback">Necessário descrever quais os serviços prestados</div>
                                            </div>
                                            <div class="d-grid">
                                                <input class="btn btn-primary btn-lg" id="submitPres" name ="submitPres" value="Cadastrar" type="submit" onclick="cadPrest()">
                                                <script type="text/javascript" >
                                                    function cadPrest() {
                                                        $.ajax({
                                                            //METODO DE ENVIO
                                                            type: "POST",
                                                            //URL PARA QUAL OS DADOS SERÃO ENVIADOS
                                                            url: "/cadastroPrestador2.php",
                                                            //DADOS QUE SERÃO ENVIADOS
                                                            //data: $("#CadastroPresForm").serialize(),
                                                            data: $("#CadastroPresForm").serialize(),
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Login-->
        <div class="portfolio-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="modal-body justify-content-center">
                                    <h2 class="text-uppercase">Entre</h2>
                                    <p class="item-intro text-muted">Faça seu login.</p>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="usuario" type="text" value="" placeholder="Usuário(e-mail)" required />
                                        <label for="usuario">E-mail</label>
                                        <div class="invalid-feedback">Informe seu e-mail</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" id="inputPassword" class="form-control" placeholder="Digite sua senha" required>
                                        <label for="inputPassword">Senha</label>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-lg" id="loginButton" type="submit">Entrar</button>
                                    </div>
                                    
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
