<?php
echo "<a href='lista.php'>lista</a>";

if (isset($_GET['produto'])) {
    $produto_id = $_GET['produto'];
    include "../config/conexao.php";

    try {
        
        $consulta = "SELECT nome FROM produto WHERE id=$produto_id";
        
        foreach($bd->query($consulta) as $tupla){
            $nome_produto = $tupla['nome'];
            
            include 'formulario_exclusão_produto.html';
        }

        //conexao encerrada
        $bd = null;
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

if(isset($_POST['confirmar_exclusao'])){
    $produto_id = $_GET['produto'];
    include "../config/conexao.php";

    try{
        $excluirProduto = "DELETE FROM produto WHERE id = $produto_id";

        $statement = $bd->prepare($excluirProduto);
        
        $statement->execute();

        //conexao encerrada
        $bd = null;
        
        header('Location:lista.php');
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>