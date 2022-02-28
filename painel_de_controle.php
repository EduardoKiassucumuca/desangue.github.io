<?php
 require_once "conexao.php";
 ?>
<!Doctype html>
<html>
<meta charset="utf-8">
<head>
<title>Painel de controle</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/estilo_painel.css" rel="stylesheet">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font4-awesome.min.css">
<style type="text/css">
.dropbtn {
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>
 <body>
 <nav class="navbar navbar-default" style="background-color:#d9534f;">

 
 
 
  <a class="navbar-brand" href="index.php" style="color: White;font-size: 20px;">DêSangue</a>
<div class="dropdown" style="float: right; margin-right: 3%;">
  <a class="btn btn-default dropbtn" href="#" style="background-color:#d9534f; color:white;">Settings <i class="fas fa-angle-down" style="font-size:15px; color: white;"></i></a>
  <div class="dropdown-content">
    <a href="#">Alterar dados</a>
    <a href="l#">Sair</a>
  </div>
</div>
 
</nav>
<div class="row"style="">
  <div class="col-sm-3 col-md-3" style=""> 

<div class="panel panel-default panel-profile m-b-0">
            <div class="panel-heading" style="background-image: url(fotos/fundo.jpg);"></div>
            <div class="panel-body text-center">
              <img class="panel-profile-img" src="fotos/muka.jpg" style="width:30%">
              <h5 class="panel-title">Eduardo Kiassucumuca</h5>
              <p class="m-b">Funcionário</p>
          </div>
       </div>
</div>
 <div class="col-sm-8 col-md-8" style=""> 
		
<a  class="list-group-item active" style="z-index: 2; color: #fff; background-color: #ccc; border-color: #ccc; width: 100%;">
Feedback
  </a>

 <div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead>
       <tr>
            <th>#ID</th>
            <th>FeedBack</th>
         </tr>
    </thead>
    
  <tbody>
         <?php 
  
  $sql_feedback=mysqli_query($conexao, "select * from tb_feedback");
     while($linha=mysqli_fetch_array($sql_feedback)):
    ?>
                <tr>
                  <td><?php echo $linha['id_feedback'];?></td>
                  <td><?php echo $linha['descricao_visitante'];?></td>
    
          <?php                              
           endwhile;
          ?>
      </tr>                    
  </tbody>
  </table>


<a  class="list-group-item active" style="z-index: 2; color: #fff; background-color: #ccc; border-color: #ccc; width: 100%;">
Necessidades
  </a>

 <div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead>
       <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Hospital</th>
            <th>Grupo Sanguineo</th>
            <th>Data</th>
            <th>Hora</th>
         </tr>
    </thead>
    
  <tbody>
         <?php 
  
  $sql_feedback=mysqli_query($conexao, "select * from tb_necessidades inner join tb_doador on tb_doador.id_doador = tb_necessidades.fk_doador inner join tb_hospital on tb_hospital.id_hospital = tb_necessidades.fk_hospital;");
     while($linha=mysqli_fetch_array($sql_feedback)):
    ?>
                <tr>
                  <td><?php echo $linha['id_necessidade'];?></td>
                  <td><?php echo $linha['nome']." ".$linha['sobrenome'];?></td>
                  <td><?php echo $linha['telefone_principal'];?></td>
                  <td><?php echo $linha['nome_hospital'];?></td>
                  <td><?php echo $linha['grupo_sanguineo'];?></td>
                  <td><?php echo $linha['data'];?></td>
                  <td><?php echo $linha['hora'];?></td>
    
          <?php                              
           endwhile;
          ?>
      </tr>                    
  </tbody>
  </table>
</div>
			 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src='js/fa_icons.js' crossorigin='anonymous'></script>
  
 </body>
 
 </html>