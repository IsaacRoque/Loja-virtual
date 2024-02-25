<?php
echo "<a href='lista.php'>lista</a>";

//Quando o icone editar na lista é clicado 
//o id da categoria é recebido via GET

if(isset($_GET['categoria'])){
    include '../config/conexao.php';

    $categoria_id = $_GET['categoria'];

    try{

        $consulta = "SELECT nome FROM categoria WHERE id=$categoria_id";

        foreach($bd->query($consulta) as $tupla_categoria){
            $nome_categoria = $tupla_categoria['nome'];

            include 'formulario_edição_categoria.html';
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }

    if(isset($_POST['edicao_categoria'])){

        $nome_categoria = $_POST['nome_categoria'];
        $categoria_id = $_POST['categoria_id'];

        try {

            $updateCategoria = "UPDATE categoria SET nome = '$nome_categoria'  WHERE id = $categoria_id";

            $satatement= $bd->prepare($updateCategoria);
            $satatement->execute();
            $bd = null;

            header('Location:lista.php');
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }


    }
}

?>