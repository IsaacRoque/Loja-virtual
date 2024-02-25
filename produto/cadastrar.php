<?php

include '../config/conexao.php';
if(isset($_POST['cadastro_produto'])){
    //echo var_dump($_POST);

    $nome_produto = $_POST['nome_produto'];
    $chave_categoria = $_POST['chave_categoria'];

    try {
        $insertProduto = "INSERT INTO produto (nome, categoria)
        VALUES ('$nome_produto','$chave_categoria')";

        $statement = $bd->prepare($insertProduto);

        $statement->execute();

        $bd = null;
        
        header('Location:lista.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
include 'formulario_cadastro_produto.php';
?>