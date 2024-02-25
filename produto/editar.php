<?php
echo "<a href='lista.php'>lista</a>";

//Quando o icone editar na lista é clicado 
//o id da produto é recebido via GET

if(isset($_GET['produto'])){
    include '../config/conexao.php';

    $produto_id = $_GET['produto'];

    try{

        $consulta = "SELECT nome FROM produto WHERE id=$produto_id";

        foreach($bd->query($consulta) as $tupla_produto){
            $nome_produto = $tupla_produto['nome'];

            include 'formulario_edição_produto.html';
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }

    if(isset($_POST['edicao_produto'])){

        $nome_produto = $_POST['nome_produto'];
        $produto_id = $_POST['produto_id'];

        try {

            $updateproduto = "UPDATE produto SET nome = '$nome_produto'  WHERE id = $produto_id";

            $satatement= $bd->prepare($updateproduto);
            $satatement->execute();
            $bd = null;

            header('Location:lista.php');
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }


    }
}

?>