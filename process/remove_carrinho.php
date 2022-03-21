<?php 
session_start();

$id = $_GET['id'];
unset($_SESSION['carrinho'][$id]);

if (isset($_SESSION['carrinho'])) {
    $link = key($_SESSION['carrinho']);
} else {
    $link = "";
};

header("Location: ../cadastros/carrinho.php?id=$link");