<?php
	require_once 'conexao.php';
	$con = new Conexao();
	$conexao = $con->crear_conexao();

	$hospital = $_POST['hospital'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$telefone_principal = $_POST['telefone_principal'];
	$telefone_secundario = $_POST['telefone_secundario'];
	$grupo_sanguineo = $_POST['grupo_sanguineo'];
	$senha = '123ab';
    $id_necessidade = 0;
    $ultimo_idDoador = 0;
    $id_endereco = 36;

	$sql_grpSanguineo = "Select * from tb_grpsanguineo Where tipo_sanguineo = ?";

	$stmt_sanguineo = $conexao->prepare($sql_grpSanguineo);
	$stmt_sanguineo->bind_param("s", $grupo_sanguineo);
	$stmt_sanguineo->execute();
	$result_sanguineo = $stmt_sanguineo->get_result();

	while ($row = $result_sanguineo->fetch_assoc()) {

		$id_grpsanguineo = $row['id_grpsanguineo'];
	}

	$sql_doador = "Insert into tb_doador(nome,sobrenome,email,senha,telefone_principal,telefone_secundario,id_endereco,id_grpsanguineo)Values(?,?,?,?,?,?,?,?)";
	$stmt_doador = $conexao->prepare($sql_doador);
	$stmt_doador->bind_param("ssssssii", $nome, $sobrenome, $email, $senha, $telefone_principal, $telefone_secundario, $id_endereco, $id_grpsanguineo);
	$stmt_doador->execute();
	$result_doador = $stmt_doador->get_result();
	$ultimo_idDoador = $stmt_doador->insert_id;
		 
	$sql_hospital = "Select * from tb_hospital inner join tb_necessidades on tb_hospital.id_hospital = tb_necessidades.fk_hospital Where tb_hospital.nome_hospital = ?";
	$stmt_hospital = $conexao->prepare($sql_hospital);
	$stmt_hospital->bind_param("s",$hospital);
	$stmt_hospital->execute();
	$result_hospital = $stmt_hospital->get_result();

	while ($row= $result_hospital->fetch_assoc()) {
		
		$id_hospital = $row['id_hospital'];
		$id_necessidade = $row['id_necessidade'];
	}
	$sql_necessidade = "Update tb_necessidades Set fk_doador=? WHERE id_necessidade=?";
	$stmt_necessidade=$conexao->prepare($sql_necessidade);
	$stmt_necessidade->bind_param("ii", $ultimo_idDoador, $id_necessidade);
	$stmt_necessidade->execute();
	$result_necessidade = $stmt_necessidade->get_result();
	if ($result_necessidade) {
		
		echo json_encode($result_necessidade);
		
	}
	

?>