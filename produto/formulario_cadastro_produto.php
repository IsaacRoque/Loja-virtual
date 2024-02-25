<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Loja DougLand | Cadastrar produto</title>
</head>
<body>
	<div class="container" >
			<h1>Cadastro de Produto</h1>
			<form method="POST" action="">
				<fieldset>
					<div class="form-group">
						<label for="input_nome_produto">Nome do produto</label>
						<input class="form-control" id="input_nome_produto" type="text" name="nome_produto" required>

						<label for="input_chave_categoria">Chave categoria</label>
						<select class="form-control" name="chave_categoria" id="input_chave_categoria">
							<?php
							include "../config/conexao.php";

							$consulta = "SELECT * FROM categoria";

							foreach ( $bd->query($consulta) as $tupla ) {
								$categoria_id = $tupla['id'];
                    			$nome_categoria = $tupla['nome'];

								echo "<option value='$categoria_id'>$nome_categoria</option>";
							}

							?>
						</select>
						
						<!--
						<input class="form-control" id="input_chave_categoria" type="text" name="chave_categoria" required>
						-->
					</div>
					<button class="btn" type="submit" name="cadastro_produto">Cadastrar</button>
				</fieldset>
			</form>
	</div>
</body>
</html>