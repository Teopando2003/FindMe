<?php
	session_start();
          
      if($_SERVER["REQUEST_METHOD"]=="GET"){
          $code = $_GET['code'];
          $state = $_GET['state'];
      }
      if($_SERVER["REQUEST_METHOD"]=="POST"){
          $token = $_GET['acces_token'];
      }
      if($state =="123456789"){
      
                      $curl = curl_init();

                      curl_setopt_array($curl, [
                        CURLOPT_URL => "https://id.paleo.bg.it/oauth/token",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS =>"{\n  \"grant_type\": \"authorization_code\",\n  \"code\": \"$code\",\n  \"redirect_uri\": \"http://pandolfimatteo.altervista.org/FindMe/index.php\",\n  \"client_id\": \"6b23137dab32b78f8576550d08c2d55f\",\n  \"client_secret\": \"6b52d3a47cc95e33930ae1f3f35f5d6a4137110aeddf9f40f83729e924f87ba183fbdeeaabdb7a053f4f62723ca65a5d5cb2e9d5643f5e4512ae6aa104610b2f \"\n}",
                        CURLOPT_HTTPHEADER => [
                          "Content-Type: application/json"
                        ],
                      ]);

                      $response = curl_exec($curl);
                      $err = curl_error($curl);

                      curl_close($curl);

                      if ($err) {
                        echo "cURL Error #:" . $err;
                      } else {
                        $obj = json_decode($response);
                        $token = $obj->{'access_token'}; 
					}
                    if(isset($token)){
                                                  $curl = curl_init();

                              curl_setopt_array($curl, [
                                CURLOPT_URL => "https://id.paleo.bg.it/api/v2/user",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST =>"GET",
                                CURLOPT_HTTPHEADER => [
                                  "Authorization: Bearer $token",
                                  "Content-Type: application/json"
                                ],
                              ]);

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                $obj = json_decode($response);
                        		$matricola = $obj->{'matricola'}; 
                                $nome = $obj->{'nome'};
                                $cognome = $obj->{'cognome'};
                              }
               }
               if(isset($matricola)){
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
               }
                     

      }else{
          $credenziali = json_decode(file_get_contents("./Private/paleoId.json"));
          $_SESSION["state"] = "123456789";
          $clientId = $credenziali->client;
          $clientSecret = $credenziali->secret;
		  include("login.php");
      }

  ?>   
    
    