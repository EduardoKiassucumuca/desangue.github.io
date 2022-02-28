<?php
	require 'conexao.php';

	$hospital = $_POST['hospital'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
	$telefone_principal = $_POST['telefone_principal'];
	$telefone_secundario = $_POST['telefone_secundario'];
	$grupo_sanguineo = $_POST['grupo_sanguineo'];


	$id_grpsanguineo = 0;
	$ultimo_idEndereco;
	$sql_grpSanguineo = "Select * from tb_grpsanguineo Where tipo_sanguineo = '$grupo_sanguineo'";
	$result1 = mysqli_query($conexao,$sql_grpSanguineo);
	//echo "result1" + $result1;
	while ($row = mysqli_fetch_assoc($result1)) {
		
		$id_grpsanguineo = $row['id_grpsanguineo'];
		//echo("idg: " + $id_grpsanguineo);
	}
	$sql_hospital = "Select * from tb_hospital Where nome_hospital = '$hospital'";
	$result2 = mysqli_query($conexao,$sql_hospital);
	//echo "result1" + $result1;
	while ($row = mysqli_fetch_assoc($result2)) {
		
		$id_hospital = $row['id_hospital'];
	}

	$sql_endereco = "Insert into tb_doador(nome,provincia,numero_rua,numero_predio,localizacao)Values('$cidade','$provincia','$rua','$numero_predio','$bairro')";
	$result2 = mysqli_query($conexao,$sql_endereco);

	if ($result2) {
		$ultimo_idEndereco = mysqli_insert_id($conexao);
		//echo("ide:" + $ultimo_idEndereco);
	}
	else
	{
		//echo "result2" + $result2;
	}

	$sql_doador = "Insert into tb_doador (id_endereco,id_grpsanguineo,genero,nome,sobrenome,telefone_principal,telefone_secundario)Values('$ultimo_idEndereco','$id_grpsanguineo','$genero','$nome','$sobrenome','$telefone_principal','$telefone_secundario')";
	$result3 = mysqli_query($conexao,$sql_doador);
	if($result3)
	{
		echo("Registro efectuado com sucesso");
	}
	else
	{
		//echo "result3" + $result3;
		echo "Registro não efectuado";
	}
?>