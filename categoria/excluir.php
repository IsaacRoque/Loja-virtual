<?php
echo "<a href='lista.php'>lista</a>";

if (isset($_GET['categoria'])) {
    $categoria_id = $_GET['categoria'];
    include "../config/conexao.php";

    try {
        
        $consulta = "SELECT nome FROM categoria WHERE id=$categoria_id";
        
        foreach($bd->query($consulta) as $tupla){
            $nome_categoria = $tupla['nome'];
            
            include 'formulario_exclusão_categoria.html';
        }

        //conexao encerrada
        $bd = null;
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

if(isset($_POST['confirmar_exclusao'])){
    $categoria_id = $_GET['categoria'];
    include "../config/conexao.php";

    try{
        $excluirCategoria = "DELETE FROM categoria WHERE id = $categoria_id";

        $statement = $bd->prepare($excluirCategoria);
        
        $statement->execute();

        //conexao encerrada
        $bd = null;
        
        echo '<script>Document.location="lista.php"</script>';
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>