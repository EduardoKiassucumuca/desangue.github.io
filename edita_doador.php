<?php
      require_once "conexao.php";
	  session_start();
	  $session_email = $_SESSION['login'];
	  $session_senha = $_SESSION['senha'];
	  $id_doador=$_POST['id_doador'];
	  $id_endereco = 0;
	  $id_grpsanguineo = 0; 
	  $nome=$_POST['nome'];
	  $sobrenome=$_POST['sobrenome'];
	  $telefone_principal=$_POST['telefone_principal'];
	  $telefone_secundario=$_POST['telefone_secundario'];
	  $provincia=$_POST['provincia'];
	  $bairro=$_POST['bairro'];
	  $tipo_sanguineo=$_POST['grp_sanguineo'];
	  $data=date("dd-mm-yyyy");
	  $data=$_POST['data'];
	  $ano=date('Y',strtotime($data));
      $estado_doador = $_POST['estado_doador'];
      if ($estado_doador == "Disponível") {
      	$estado = 1;
      }elseif ($estado_doador == 0) {
      	$estado = 0;
      }
      $motivo_doador = $_POST['motivo_doador'];
	  $email=$_POST['email'];
	  $senha=$_POST['senha'];
	  
      $sql_idEndereco = mysqli_query($conexao, "Select * From tb_doador inner join tb_endereco on tb_doador.id_endereco = tb_endereco.id_endereco Where tb_doador.id_doador = '$id_doador'")or die(mysql_error());
      while($linha = mysqli_fetch_array($sql_idEndereco))
      {
      		$id_endereco = $linha['id_endereco'];
      		
	  }

	  $sql_idSangue = mysqli_query($conexao,"Select * From tb_grpsanguineo Where tipo_sanguineo = '$tipo_sanguineo'")or die(mysql_error());
	  while ($linha = mysqli_fetch_array($sql_idSangue)) {
	  		$id_grpsanguineo = $linha['id_grpsanguineo'];
	  }

	  $alterar_endereco = mysqli_query($conexao, "UPDATE tb_endereco SET bairro='$bairro',provincia='$provincia' where id_endereco='$id_endereco'");
	  if ($alterar_endereco) {
	  		
	  		$alterar_doador = mysqli_query($conexao, "UPDATE tb_doador SET nome='$nome', sobrenome='$sobrenome', telefone_principal = '$telefone_principal', telefone_secundario = '$telefone_secundario', id_grpsanguineo = '$id_grpsanguineo', id_endereco = '$id_endereco', data_nascimento = '$data', estado='$estado', motivo='$motivo_doador', email='$email', senha = '$senha' where id_doador='$id_doador'");
		  
			  if(!$alterar_doador){
				  
				 echo "<script type=\"text/javascript\">
					alert(\"Os dados não foram alterados com sucesso. \");
					</script>
					";
			  }else{
				   echo "
				   <META HTTP-EQUIV=REFRESH CONTENT='0; URL=https://localhost:8080/DeSangue/portal_doador.php'>
				   <script type=\"text/javascript\">
					alert(\"Os dados foram alterados com sucesso. \");
					</script>
					";
			  }
			}
?>