<?php

include '../config/conexao.php';
if(isset($_POST['cadastro_categoria'])){
    //echo var_dump($_POST);

    $nome_categoria = $_POST['nome_categoria'];

    try {
        $insertCategoria = "INSERT INTO categoria (nome)
        VALUES ('$nome_categoria')";

        $statement = $bd->prepare($insertCategoria);

        $statement->execute();

        $bd = null;
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} 
include 'formulario_cadastro_categoria.html';
?>