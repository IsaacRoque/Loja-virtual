<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Loja DougLand | Cadastrar produto</title>
</head>
<body>
<div id="container">
        <h1>Lista de produtos</h1>
        <table>
            <thead>
                <th>Nome da produto</th>
                <th colspan="2" >Ações</th>
            </thead>
            <tbody>

            <?php
                include '../config/conexao.php';

                $consulta = "SELECT * FROM produto ORDER BY nome";

                foreach($bd->query($consulta) as $tupla_produto){
                    $produto_id = $tupla_produto['id'];
                    $nome_produto = $tupla_produto['nome'];

                    echo "<tr>" .
                            "<td>$nome_produto</td>" .
                            "<td><a href='editar.php?produto=$produto_id'><img src='../icones/editar.svg'></a></td>" .
                            "<td><a href='excluir.php?produto=$produto_id'><img src='../icones/excluir.svg'></a></td>" .
                        "</tr>";
                        

                }

            ?>
            </tbody>
            
        </table>
    </div>
</body>