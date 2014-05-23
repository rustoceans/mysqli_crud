<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Editar</title>
 	<link rel="stylesheet" href="">


 </head>
 <body>

 	<h1>Editar Registro</h1>

 	<?php 
 			require_once('conexao.php');

 			if($_POST){
 					$sql = "UPDATE crud SET	nome = ?, sobrenome = ?, usuario = ?, senha = ? WHERE id = ?";
 			$stmt = $mysqli->prepare($sql);

 			$stmt->bind_param(
 					'ssssi',
 					$_POST['nome'],
 					$_POST['sobrenome'],
 					$_POST['usuario'],
 					$_POST['senha'],
 					$_POST['id']);

 			if($stmt->execute()){
 					echo "Usuario Alterado!";

 					$stmt->close();
 			} else{
 				die("Sem conteúdo para alterar.");
 			}
 		}


 		$sql = "SELECT id, nome, sobrenome, usuario, senha 
 		FROM crud 
 		WHERE 
 			id = ".$mysqli->real_escape_string($_REQUEST['id']). "
 				LIMIT 
 					0,1";

 		$result = $mysqli->query($sql);

 		

 		$row = $result->fetch_assoc();

 		
 		
 	
 		
 	?>

 	<form action="edit.php?id=<?php echo $id; ?>" method="POST">
			<table>
				<tr>
					<td>Nome: </td>
					<td><input type="text" name="nome" value="<?php echo $row['nome'] ?>"/></td>
				</tr>
				<tr>
					<td>sobrenome: </td>
					<td><input type="text" name="sobrenome" value="<?php echo $row['sobrenome'] ?>"/></td>
				</tr>
				<tr>
					<td>usuario: </td>
					<td><input type="text" name="usuario" value="<?php echo $row['usuario'] ?>"/></td>
				</tr>
				<tr>
					<td>senha: </td>
					<td><input type="text" name="senha" value="<?php echo $row['senha'] ?>"/></td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
						<input type="submit" value="editar"/>
						<a href="index.php">Home</a>
					</td>
				</tr>
			</table>	
	</form>
 	
 </body>
 </html> 