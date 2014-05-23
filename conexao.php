<?php
	$host = "localhost";
	$db_name = "estudos";
	$username = "root";
	$password = "";


	$mysqli = new mysqli($host, $username, $password, $db_name);

	if(mysqli_connect_error()){
		echo "Erro na conexão com o banco de dados";
		exit;
	}

  ?>