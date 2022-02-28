<?php 
	require('consulta.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doadores</title>
</head>
<body>
<!Doctype html>
<html>
<head>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="css/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/jumbotron/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>DêSangue</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #cccccc00;border-color: #cccccc00;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#" style="color: red;font-size: 20px;text-align: center;position:absolute;left: 30%;">Dê Sangue</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse"style="left: 50px;">
         <ul class="nav navbar-nav navbar-right" style="color: white;">
        <li class="active"><a href="#" style="font-size: 23px;">Início</a></li>
        <li><a class="nav-link" href="#" style="font-size: 18px;">Sobre</a></li>
              <li> <a class="nav-link" href="#" style="font-size: 18px;">Entrar</a></li>
       
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <div class="imagem-fundo">
        <img src="fotos/blood3.jpg" class="img-principal">
      </div>
      </div>
    </div>

  
        <div class="container">

        <div class="col-md-10" style="background-color: white;border-radius: 5px;">
        
        	 <?php require('consulta.php');?>
            <h2 style="color: #dd7b7b;position: absolute;top: -25%;">Lista de doadores do grupo "<?php echo $grupo_sanguineo;?>" e da província "<?php echo$provincia;?>"</h2>
            <br>
        

            <table class="table table-bordered" style="color: #393131bf; font-size: 15px;">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Telefone principal</th>
                    <th>Telefone secundário</th>
                    <th>Município</th>
                    <th>Genero</th>
                    
                </tr>
                </thead>
                <tbody>
          <?php if (isset($grupo_sanguineo) || isset($provincia)) {
		
		
		$busca = "Select * From tb_doador inner join tb_grpsanguineo on tb_doador.id_grpsanguineo = tb_grpsanguineo.id_grpsanguineo inner join tb_endereco on tb_doador.id_endereco = tb_endereco.id_endereco Where tb_grpsanguineo.tipo_sanguineo = '$grupo_sanguineo' || tb_endereco.provincia = '$provincia'";
		$resultado = mysqli_query($conexao,$busca);

		if(mysqli_num_rows($resultado)>0)
		{
			while ($row = mysqli_fetch_assoc($resultado))
			 {
				?>
   
                <tr>
                    <td><?php echo $row["nome"];?></td>
                    <td><?php echo $row["sobrenome"];?></td>
                    <td><?php echo $row["telefone_principal"];?></td>
                    <td><?php echo $row["telefone_secundario"];?></td>
                     <td><?php echo$row["cidade"];?></td>
                    <td><?php echo $row["genero"];?></td>
                   
                </tr>
              
                </tbody>
                 <?php }?>
            </table>
        <?php }else{echo "Nenhum registro encontrado!";}}?>
        </div>


 <hr>

      <footer>
        <p>&copy; 2021 Empresa, DêSangue</p>
      </footer></div>
  </body>

  




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./Cover Template for Bootstrap_files/jquery-3.1.1.slim.min.js.download" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="./Cover Template for Bootstrap_files/tether.min.js.download" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="./Cover Template for Bootstrap_files/bootstrap.min.js.download"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="./Cover Template for Bootstrap_files/ie10-viewport-bug-workaround.js.download"></script>


</body></html>
</body>
</html>