<html>
	<head>
		<title>
			SQLI-CRUD
		</title>
	</head>

	<body>
		<h1>
			MySQLi
		</h1>
		<?php 
				require_once('conexao.php');

				$action = isset($_GET['action']) ?  $_GET['action'] : "";

				if ($action == 'deletado') {
					echo "Registro deletado!";
				}

				$query = "select * from crud";
				$result = $mysqli->query($query);

				$num_results = $result->num_rows;
				?>

				<div>
					<a href='add.php'>Criar Novo</a>
				</div>
				<?php 


				if($num_results){
					?>
					
					<table border='1'>
					<tr>
					<th>Nome:</th>
					<th>Sobrenome:</th>
					<th>Usuario: </th>
					</tr>
				<?php 
				
				while($row = $result->fetch_assoc()){
					extract($row);

					?>
					<tr>
					<td style="text-align: center;"><?php echo $nome; ?></td>
					<td style="text-align: center;"><?php echo $sobrenome; ?></td>
					<td style="text-align: center;"><?php echo $usuario; ?></td>
					<td>
					<a href='edit.php?id=<?php echo $id ?>'>Editar</a>	/ 
					<a href='delete.php?id=<?php echo $id ?>'>Deletar</a>
					</td>
					</tr>
					<?php 
				}

				?>

				</table>
				<?php
			}

			else{
					echo "Sem registros";
			}
			$result->free();
			$mysqli->close();
		?>



	</body>
</html>