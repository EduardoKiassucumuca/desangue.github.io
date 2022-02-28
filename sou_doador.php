<?php
	require_once 'conexao.php';
	$con = new Conexao();
	$conexao = $con->crear_conexao();

	$codigo_doador = $_POST['codigo'];
	$hospital = $_POST['hospital'];
	$id_doador = 0;
	$sql_doador = "Select * from tb_doador inner join tb_doacoes on tb_doador.id_doador=tb_doacoes.fk_doador Where tb_doador.id_doador = ? LIMIT 1";
	$stmt_doador = $conexao->prepare($sql_doador);
	//echo "result1" + $result1;
	$stmt_doador->bind_param("s", $codigo_doador);
	$stmt_doador->execute();
	$result_doador = $stmt_doador->get_result();
	while ($row = $result_doador->fetch_assoc()) {
		
		$id_doador = $row['id_doador'];
	
	}
    $sql_hospital = "Select * from tb_hospital inner join tb_necessidades on tb_hospital.id_hospital = tb_necessidades.fk_hospital Where tb_hospital.nome_hospital = ?";
	$stmt_hospital = $conexao->prepare($sql_hospital);
	//echo "result1" + $result1;
	$stmt_hospital->bind_param("s", $hospital);
	$stmt_hospital->execute();
	$result_hospital = $stmt_hospital->get_result();
	while ($row = $result_hospital->fetch_assoc()) {
		
		$id_hospital = $row['id_hospital'];
		$id_necessidade = $row['id_necessidade'];
	}
	$sql_necessidade = "Update tb_necessidades Set fk_doador=? WHERE id_necessidade=?";
	$stmt_necessidade=$conexao->prepare($sql_necessidade);
	$stmt_necessidade->bind_param("ii", $id_doador, $id_necessidade);
	$stmt_necessidade->execute();
	$result_necessidade = $stmt_necessidade->get_result();
	if ($result_necessidade) {
		echo json_encode($result_necessidade);
	}

?>