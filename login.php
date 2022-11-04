<?php
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select usuario_id, usuario, adm from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);
$getprofile = mysqli_fetch_array($result);

$row = mysqli_num_rows($result);


if($row == 1) {
    
    $perfil = $getprofile['adm'];
          


    if($perfil == 1) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['perfil'] = $perfil;
        header('Location: home.php');
        exit();
 
    } else {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['perfil'] = $perfil;
        header('Location: home_cliente.php');
        exit();    
    }
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}