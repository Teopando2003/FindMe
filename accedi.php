<?php
	
  
            
             function login(){
             
                 if($_SERVER["REQUEST_METHOD"]=="POST"){
          				$mail = $_POST['mail'];
          				$password = $_POST['pass'];
                        }
                        
    $con=mysqli_connect("localhost","pandolfimatteo","","my_pandolfimatteo");
    $query="select * from UtentiFindMe where mail='$mail'";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      if($password == $row["password"]){
        return true;
      }
    } else {
      return false;
    }
  }
  
  if(login()==true){
                 ?>
               <head>
  				<link rel="stylesheet" href="style.css">
  				<title>Home FindMe!</title>
				</head>
               <body>
         		 <h1>Autenticazione effettuata con successo! Benvenuto <?php echo " "; echo $nome; echo " "; echo $cognome;  ?></h1>
               <button onclick="location.href='http://pandolfimatteo.altervista.org/FindMe/FindMe.php'">Entra nel mondo di FindMe!</button>
               </body>	
               <?php
  }else{
  ?>
  <p>Utente non registrato. Registrati!</p>
<?php
  include("index.php");
}            
?>