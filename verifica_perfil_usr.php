<?php
if ($_SESSION['perfil'] != 0) {
    header('Location: index.php');
    exit();   
} 