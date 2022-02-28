<?php
	function get_doadores_disponiveis($link, $provincia, $grupo_sanguineo)
	{
		if($stmt = mysqli_prepare($link, "Select * From tb_doador inner join tb_grpsanguineo on tb_doador.id_grpsanguineo = tb_grpsanguineo.id_grpsanguineo inner join tb_endereco on tb_doador.id_endereco = tb_endereco.id_endereco Where tb_grpsanguineo.tipo_sanguineo = ? and tb_endereco.provincia = ? LIMIT 4"))
		{
		
			mysqli_stmt_bind_param($stmt, "ss", $grupo_sanguineo, $provincia);
			mysqli_stmt_execute($stmt);
			$result = $stmt->get_result();
			return $result;
		}
	}

	function get_necessidades($link)
	{
		if($stmt = mysqli_prepare($link, "Select * From tb_necessidades inner join tb_hospital on tb_necessidades.fk_hospital = tb_hospital.id_hospital inner join tb_endereco on tb_endereco.id_endereco = tb_hospital.fk_endereco LIMIT 4"))
		{
			mysqli_stmt_execute($stmt);
			$result = $stmt->get_result();
			return $result;
		}
	}

	function get_campanhas($link)
	{
		if($stmt = mysqli_prepare($link, "Select * From tb_campanha inner join tb_hospital on tb_campanha.fk_hospital = tb_hospital.id_hospital LIMIT 4"))
		{
			mysqli_stmt_execute($stmt);
			$result = $stmt->get_result();
			return $result;
		}
	}
?>