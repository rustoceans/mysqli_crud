<html>
	<head>
		<title>
			
		</title>
	<body>
		<h1>Registro</h1>
		<?php 
		if($_POST){

				require_once("conexao.php");

				$sql = "INSERT INTO crud (nome, sobrenome, usuario, senha) VALUES (?,?,?,?)";


				if($stmt = $mysqli->prepare($sql)) {
					$stmt->bind_param(
							"ssss",
							$_POST["nome"],
							$_POST["sobrenome"],
							$_POST["usuario"],
							$_POST["senha"]);
				if($stmt->execute()){
						echo "Usuário foi salvo!";
						$stmt->close();

				}else {
						die("Sem registro para salvar.");
				}
			}else {
					die("Nenhuma preparação declarada.");
			}

			$mysqli->close();
		}
		?>

		<form action="add.php" method="POST">
			<table>
				<tr>
					<td>Nome: </td>
					<td><input type="text" name="nome"/></td>
				</tr>
				<tr>
					<td>sobrenome: </td>
					<td><input type="text" name="sobrenome"/></td>
				</tr>
				<tr>
					<td>usuario: </td>
					<td><input type="text" name="usuario"/></td>
				</tr>
				<tr>
					<td>senha: </td>
					<td><input type="text" name="senha"/></td>
				</tr>
				<tr>
					<td><input type="submit" value="Salvar"/></td>
					<a href="index.php">Home</a>
				</tr>
			</table>




		</form>


	</body>
	</head>
</html>

