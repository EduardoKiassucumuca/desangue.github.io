<?php 
 require_once "conexao.php";

 $email= $_POST['email'];
 $senha= $_POST['senha'];

 if (isset($email) && isset($senha)) {

     $SQL= mysqli_query($conexao, "SELECT * FROM tb_doador WHERE email ='$email' AND senha ='$senha'");
     $CONTAR = mysqli_num_rows($SQL);

      if($CONTAR>0){
        while($linha = mysqli_fetch_array($SQL)){
        	session_start();

          $_SESSION["login"] = $email;
          $_SESSION["senha"] = $senha;
          $_SESSION["id_doador"] = $linha['id_doador'];
          header("Location:http://localhost:8080/DeSangue/portal_doador.php");

    }
  }else{

    	unset($email);
    	unset($senha);
      echo"
       
         <META HTTP-EQUIV=REFRESH CONTENT='0; URL=http://localhost:8080/DeSangue/login.html'>
        <script type=\"text/javascript\">
        alert(\"Erro: email ou senha inválidos!\");
        </script>
        ";
    }
  }
 ?>