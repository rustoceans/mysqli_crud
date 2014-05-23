<?php 
		header('Content-Type: text/html; charset=utf-8');
		require_once('conexao.php');

		$sql = "DELETE FROM crud WHERE id = ?";

		if($stmt  = $mysqli->prepare($sql)){
				$stmt->bind_param("i", $_GET['id']);

			if($stmt->execute()){
				$stmt->close();
				header('Location: index.php?action=deletado');
			}else {
				die("Não há registros para serem deletados.");


			}
		}

 ?>