<?php
include_once 'addNewItem.php';

if($alerta == 1) {
    echo  "<script>alert('Peça cadastrada com sucesso!');</script>";
    header('Location: home.php');
    exit();    
} else {
    echo  "<script>alert('Erro ao cadastrar peça!');</script>";
    header('Location: home.php');
    exit(); 
}
