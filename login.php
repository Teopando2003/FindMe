<head>
  <link rel="stylesheet" href="style.css">
  <title>Home FindMe!</title>
</head>
<body>
  <div class="container" id="container">
    <!-- sign in page -->
    <div class="form-container sign-in-container">
      <form method="POST" action="accedi.php" class="form" id="login">
        <h1 class="form__title">Login</h1>
        <div class="form__input-group">
          <label for="username">Mail: </label>
          <input type="text" class="form__input" name="mail" id="mail" maxlength="100" required> 
        </div>
        <div class="form__input-group">
          <label for="pass">Password: </label>
          <input type="password" class="form__input" name="pass" id="pass" maxlength="100" required> 
        </div>
        <div class="form__input-group">
          <button type="submit" class="form__button">Submit</button>
        </div>
     </form>
    </div>
    
   <!--  create account page -->
   <div class="form-container sign-up-container">
     <form method="POST" action="registrati.php" class="form" id="register">
       <h1 class="form__title">Registrati</h1>
       <div class="form__input-group">
         <label for="username"> Mail: </label>
         <input type="text" class="form__input" name="mail" id="mail" maxlength="100" required>
       </div>
        <div class="form__input-group">
          <label for="pass"> Password: </label>
          <input type="password" class="form__input" name="pass" id="pass" maxlength="100" required> 
        </div>
       <button class="form__button" type="submit" name="submit">Submit</button>
     </form>
   </div> 
    
   <div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Ciao!</h1>
				<p>Hai gia un account?</p>
				<button class="ghost" id="signIn">Accedi</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Bentornato!</h1>
				<p>Accedi con le tue credenziali oppure con la mail istituzionale</p>
                 <button class="ghost" onclick="location.href='https://id.paleo.bg.it/oauth/authorize?client_id=<?php echo $clientId;?>&response_type=code&state=<?php echo $_SESSION["state"];?>&redirect_uri=http://pandolfimatteo.altervista.org/FindMe/index.php'"> Accedi con la mail istituzionale</button>
				<br><p>Se non hai un account...</p><br>
                <button class="ghost" id="signUp">Registrati</button>
			</div>
		</div>
	</div>
 </div>
  
  <script src="main.js"></script>
  
</body>
 