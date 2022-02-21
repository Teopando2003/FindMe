<?php
    
    function Check(){
          if($_SERVER["REQUEST_METHOD"]=="POST"){
          	$mail = $_POST['mail'];
          	$password = $_POST['pass'];
      }
	$con=mysqli_connect("localhost","pandolfimatteo","","my_pandolfimatteo");
    $query="select * from UtentiFindMe where mail='$mail'";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result) > 0) {
      return false; //Utente esiste 
    } else {
      return true;  //Utente non esiste
    }
  }
  $register = Check();
  
  if($register == true){
          function registrazione(){
          if($_SERVER["REQUEST_METHOD"]=="POST"){
          $mail = $_POST['mail'];
          $password = $_POST['pass'];
      }
    $con=mysqli_connect("localhost","pandolfimatteo","","my_pandolfimatteo");
    

    $query="INSERT INTO UtentiFindMe(mail, password) VALUES('".$mail."','".$password."')";

    	if (mysqli_query($con,$query)) {
      		return true; //Utente aggiunto
    			} else {
      		echo mysqli_error($con);
      		return false;  //Utente non aggiunto
    	}

}
    if(registrazione() == true){
      ?>
    <p>Registrazione avvenuta con successo; ora puoi accedere al tuo account!</p>
     <?php
     include("index.php");
    }
  }else{
  ?>
   <p>Utene già Registrato</p>
   <?php
   include("index.php");
  }
  
      

?>