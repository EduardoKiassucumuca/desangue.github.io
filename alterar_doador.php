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
<?php 
    
      $sql = mysqli_query($conexao, "Select * From tb_doador inner join tb_grpsanguineo on tb_doador.id_grpsanguineo = tb_grpsanguineo.id_grpsanguineo inner join tb_endereco on tb_doador.id_endereco = tb_endereco.id_endereco Where tb_doador.email = '$email' and tb_doador.senha = '$senha'")or die(mysql_error());
      while($linha = mysqli_fetch_array($sql)):
?>
<div class="row"style="">
  <div class="col-sm-4 col-md-4"> 

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
<div class="col-sm-6 col-md-6"style=""> 
     <div class="list" >
  <a  class="list-group-item active" style="z-index: 2; color: #fff; background-color: #ccc; border-color: #ccc;">
 Editar Doador
  </a>
  <?php 
  $id=$_GET['id'];
   $sql=mysqli_query($conexao, "Select * From tb_doador inner join tb_grpsanguineo on tb_doador.id_grpsanguineo = tb_grpsanguineo.id_grpsanguineo inner join tb_endereco on tb_doador.id_endereco = tb_endereco.id_endereco where tb_doador.id_doador='$id'");
     while($linha=mysqli_fetch_array($sql)):
    ?>
 <form method="POST" action="edita_doador.php" enctype="multipart/form-data">

 <input type="hidden" class="form-control" name="id_doador" value="<?php echo $linha['id_doador'];?>" placeholder="" >
  <label style="margin-top:2%">Nome</label>
  <input type="text" class="form-control" name="nome" value="<?php echo $linha['nome'];?>" placeholder="Primeiro nome" maxlength="25" title="Campo nome." pattern="[a-zà-úA-Z]+" required>


 <label style="margin-top:2%">Apelido</label>
 <input class="form-control" rows="4"  name="sobrenome" value="<?php echo $linha['sobrenome'];?>" placeholder="Ultimo nome" maxlength="25" title="Campo apelido." pattern="[a-zà-úA-Z]+" required>
 <label style="margin-top:2%">Telefone Principal</label>
 <div class=""style="margin-top:1%">
 
  <input type="text" class="form-control" name="telefone_principal" placeholder="999999999" value="<?php echo $linha['telefone_principal'];?>" maxlength="9" title="Campo telefone." pattern="[9]{1}['1,2,3,4,9']{1}['0,1,2,3,4,5,6,7,8,9']{1}[0-9]{6}" required>
</div>
<label style="margin-top:2%">Telefone Secundário</label>
 <div class=""style="margin-top:1%">
 
  <input type="text" class="form-control" name="telefone_secundario" placeholder="999999999" value="<?php echo $linha['telefone_secundario'];?>" maxlength="9" title="Campo telefone." pattern="[9]{1}['1,2,3,4,9']{1}['0,1,2,3,4,5,6,7,8,9']{1}[0-9]{6}" required>
</div>

<label style="margin-top:2%">Data de nascimento</label>
 <div class=""style="margin-top:1%">
 
  <input type="date" class="form-control" name="data" placeholder="Data de nascimento" value="<?php echo $linha['data_nascimento'];?>"  required>
</div>
<label style="margin-top:2%">Província</label>
 <div class=""style="margin-top:1%">
  <select class="form-control" name="provincia">
                            <option></option>
                            <option>Bengo</option>
                            <option>Benguela</option>
                            <option>Bié</option>
                            <option>Cabinda</option>
                            <option>Cuando-Cubango</option>
                            <option>Cuanza-Norte</option>
                            <option>Cuanza-Sul</option>
                            <option>Cunene</option>
                            <option>Huambo</option>
                            <option>Huíla</option>
                            <option>Luanda</option>
                            <option>Lunda-Norte</option>
                            <option>Lunda-Sul</option>
                            <option>Malanje</option>
                            <option>Moxíco</option>
                            <option>Namibe</option>
                            <option>Uíge</option>
                            <option>Zaire</option>
                        </select>
    </div>
    <label style="margin-top:2%">Bairro</label>
 <input class="form-control" rows="4"  name="bairro" value="" placeholder="Bairro" maxlength="35" title="Campo Bairro" required>

<label style="margin-top:2%">Grupo Sanguineo</label>
 <div class=""style="margin-top:1%">
  <select class="form-control" name="grp_sanguineo">
                      <option><?php echo $linha['tipo_sanguineo'];?></option>
                      <option></option>
                      <option>A+</option>
                      <option>A-</option>
                        <option>B-</option>
                        <option>B+</option>
                        <option>AB-</option>
                        <option>AB+</option>
                        <option>O-</option>
                        <option>O+</option>
                  </select>
    </div>
</div>
 
<label style="margin-top:2%">Estado</label>
 <div class=""style="margin-top:1%">
 <select class="form-control" name="estado_doador">
                      <option><?php
  if($linha['estado']==0)
   echo 'Indisponível';
  else if($linha['estado'] == 1)
  echo 'Disponível';
   ?></option>
                      
                      <option>Indisponível</option>
                      <option>Disponível</option>
                      
                  </select>
</div>
<label style="margin-top:2%">Motivo</label>
 <div class=""style="margin-top:1%">
  <textarea type="text" class="form-control" name="motivo_estado" placeholder="Porquê da Indisponiblidade caso esteja" value=""rows="3"></textarea>
</div>
<label style="margin-top:2%">Email</label>
 <div class=""style="margin-top:1%">
 
  <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $linha['email'];?>" required>
</div>
<label style="margin-top:2%">Senha</label>
 <div class=""style="margin-top:1%">
 
  <input type="password" class="form-control" name="senha" placeholder="Senha"  required>
</div>
 <button type="submit" style="margin-top:3%; color:#ffc425; cursor:pointer; border: 1px solid #ffc425; background-color:white;"  class="btn  btn-lg btn-default" value="Enviar">Editar</button>
 </form>
</div>
<?php endwhile;?>
</div>

 </div> 


   <!--<p style="margin-left: 10%;margin-bottom: 5%;"><a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal" role="button">Agendar Doação</a></p>-->
			 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src='js/fa_icons.js' crossorigin='anonymous'></script>
  
 </body>
 
 </html>