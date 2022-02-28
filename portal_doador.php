<?php
 require_once "conexao.php";
 session_start();
 if(isset($_SESSION['login']) && isset($_SESSION['senha'])){
      $email= $_SESSION['login'];
      $senha= $_SESSION['senha'];
      $id_doador = $_SESSION['id_doador'];
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
    <a href="alterar_doador.php? id=<?php echo $id_doador;?>">Alterar dados</a>
    <a href="logout.php">Sair</a>
  </div>
</div>
 
</nav>
<div class="row"style="">
  <?php 
    
      $sql = mysqli_query($conexao, "Select * From tb_doador inner join tb_grpsanguineo on tb_doador.id_grpsanguineo = tb_grpsanguineo.id_grpsanguineo inner join tb_endereco on tb_doador.id_endereco = tb_endereco.id_endereco Where tb_doador.email = '$email' and tb_doador.senha = '$senha'")or die(mysql_error());
      while($linha = mysqli_fetch_array($sql)):
?>
  <div class="col-sm-3 col-md-3" style=""> 

<div class="panel panel-default panel-profile m-b-0">
            <div class="panel-heading" style="background-image: url(fotos/fundo.jpg);"></div>
            <div class="panel-body text-center">
              <img class="panel-profile-img" src="fotos/muka.jpg" style="width:30%">
              <h5 class="panel-title"><?php echo $linha['nome']." ".$linha['sobrenome'];?></h5>
              <p class="m-b">Grupo Sanguineo: <?php echo $linha['tipo_sanguineo'];?></p>
              <a href="#" style="color: #d9534f; text-decoration: underline;">
              <?php
               if($linha['estado'] == 0)
               {
                 echo "Indisponível";

               }else if ($linha['estado'] == 1) {
                 echo "Disponível";
               }
              ?>
              </a>
              
          
          </div>
       </div>
     <?php
     endwhile;
   }else{
     header("Location:https://Localhost:8080/DeSangue/login.html");
   }
     ?>
    
</div>
 <div class="col-sm-8 col-md-9" style=""> 
		
<a  class="list-group-item active" style="z-index: 2; color: #fff; background-color: #ccc; border-color: #ccc; width: 80%;">
 Editar Doador
  </a>

  <div class="row" >
        <div class="col-sm-5 col-md-5" style="margin-left: 2%;margin-top: 3%; background-color: white; border: 1px solid #ddd; border-radius: 8px;">
          
         <i class='far fa-calendar-alt' style='font-size:48px;color:#d9534f;margin-left: 0%;'></i>
         <h3 style="display: inline-block;"><b>Hospital Josina</b></h3>
         <p>Local: Maianga</p>
         <p>Data/Hora: 2021-07-17 12:00</p>
        </div>
        <div class="col-sm-5 col-md-4" style="margin-left: 2%;margin-top: 3%; background-color: white; border: 1px solid #ddd; border-radius: 8px;">
          
         <i class='far fa-calendar-alt' style='font-size:48px;color:#d9534f;margin-left: 0%;'></i>
         <h3 style="display: inline-block;"><b>Hospital Josina</b></h3>
         <p>Local: Maianga</p>
         <p>Data e Hora: 2021-07-17 12:00</p>
        </div>
        <div class="col-sm-5 col-md-5" style="margin-left:2%;margin-top: 3%; background-color: white; border: 1px solid #ddd; border-radius: 8px;">
          
         <i class='far fa-calendar-alt' style='font-size:48px;color:#d9534f;margin-left: 0%;'></i>
         <h3 style="display: inline-block;"><b>Hospital Josina</b></h3>
         <p>Local: Maianga</p>
         <p>Data e Hora: 2021-07-17 12:00</p>
        </div>
         <div class="col-sm-5 col-md-4" style="margin-left: 2%;margin-top: 3%; background-color: white; border: 1px solid #ddd; border-radius: 8px;">
          
         <i class='far fa-calendar-alt' style='font-size:48px;color:#d9534f;'></i>
         <h3 style="display: inline-block;"><b>Hospital Josina</b></h3>
         <p>Local: Maianga</p>
         <p>Data e Hora: 2021-07-17 12:00</p>
        </div>
		</div><br>
 <a  class="list-group-item active" style="z-index: 2; color: #fff; background-color: #ccc; border-color: #ccc;width: 80%;">
 Pessoas Que Ajudaste
  </a><br>
<div class="row" style="background-color: #f8f9fa!important;">
          <div class="col-sm-3 col-md-3">

            <div class="panel panel-default panel-profile m-b-0">
               <div class="panel-heading" style="background-image: url(fotos/fundo.jpg);"></div>
                  <div class="panel-body text-center">
                    <img class="panel-profile-img" src="fotos/mirian.jfif" style="width:50%">
                    <h4 class="panel-title">Miriãn Hamate</h4><br>
                    <p class="m-b" style="color: #d9534f;display: inline-block;">Grupo Sanguíneo: </p><p style="display: inline-block;margin-left: 5px;">O-</p><br>
                    <p class="m-b" style="color: #d9534f;display: inline-block;">Provincia: </p><p style="display: inline-block;margin-left: 5px;">Luanda</p><br>
                    <p class="m-b" style="color: #d9534f;display: inline-block;">Telefone: </p><p style="display: inline-block;margin-left: 5px;">934003433/992320033</p>
              </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-3">

            <div class="panel panel-default panel-profile m-b-0">
               <div class="panel-heading" style="background-image: url(fotos/fundo.jpg);"></div>
                  <div class="panel-body text-center">
                    <img class="panel-profile-img" src="fotos/kiole.jpg" style="width:50%">
                    <h4 class="panel-title">Miriãn Hamate</h4><br>
                    <p class="m-b" style="color: #d9534f;display: inline-block;">Grupo Sanguíneo: </p><p style="display: inline-block;margin-left: 5px;">O-</p><br>
                    <p class="m-b" style="color: #d9534f;display: inline-block;">Provincia: </p><p style="display: inline-block;margin-left: 5px;">Luanda</p><br>
                    <p class="m-b" style="color: #d9534f;display: inline-block;">Telefone: </p><p style="display: inline-block;margin-left: 5px;">934003433/992320033</p>
              </div>
            </div>
        </div>
        <div class="col-sm-3 col-md-3">

            <div class="panel panel-default panel-profile m-b-0">
               <div class="panel-heading" style="background-image: url(fotos/fundo.jpg);"></div>
                  <div class="panel-body text-center">
                    <img class="panel-profile-img" src="fotos/feduma.jfif" style="width:50%">
                    <h4 class="panel-title">Alfredo Vidinhas</h4><br>
                    <p class="m-b" style="color: #d9534f;display: inline-block;">Grupo Sanguíneo: </p><p style="display: inline-block;margin-left: 5px;">O-</p><br>
                    <p class="m-b" style="color: #d9534f;display: inline-block;">Provincia: </p><p style="display: inline-block;margin-left: 5px;">Luanda</p><br>
                    <p class="m-b" style="color: #d9534f;display: inline-block;">Telefone: </p><p style="display: inline-block;margin-left: 5px;">934003433/992320033</p>
              </div>
            </div>
        </div>
  </div>


   <!--<p style="margin-left: 10%;margin-bottom: 5%;"><a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal" role="button">Agendar Doação</a></p>-->
</div>
			 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src='js/fa_icons.js' crossorigin='anonymous'></script>
  
 </body>
 
 </html>