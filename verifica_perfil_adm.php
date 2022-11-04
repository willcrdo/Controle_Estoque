<?php
if ($_SESSION['perfil'] != 1) {
    header('Location: index.php');
    exit();   
} 