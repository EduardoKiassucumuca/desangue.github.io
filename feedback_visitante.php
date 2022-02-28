<?php
	require_once('conexao.php');
	$con = new Conexao();
	$conexao = $con->crear_conexao();
	$feedback = $_POST['feedback'];
	echo $feedback;
		$stmt = $conexao->prepare("Insert Into tb_feedback(descricao_visitante)Values(?);");
		$stmt->bind_param("s", $feedback);
		$stmt->execute();
		if ($stmt->get_result()) {
			return $stmt->get_result();
		}
	
?>