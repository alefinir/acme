<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Home -- ACME Foods">
	<meta name="author" content="Team 4 -- CIT 336 -- BYUI">
	<link href="https://fonts.googleapis.com/css?family=Bangers%7CLora" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="/acme/css/main.css">
	<link rel="stylesheet" type="text/css" href="/acme/css/medium.css">
	<link rel="stylesheet" type="text/css" href="/acme/css/small.css">
	<link rel="stylesheet" type="text/css" href="/acme/css/large.css">
	<link rel="stylesheet" type="text/css" href="/acme/css/normalize.css">
	<title>ACME</title>
</head>
<body>
	<header>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?> 
	</header>
	<div class="all">
	<h1>Acme Login</h1>
		<?php
		if (isset($message)) {
		 echo $message;
		}
		?>	
	<div class="ablock">
<form action="/acme/accounts/" method="post"> 
    <fieldset class="tight">
    <label>	
        eMail: <input type="email" name="clientEmail" id="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> required autofocus><br>
    </label>
<label for="clientPassword">Password:
<input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"></label><br>
<span id="message">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>

        </fieldset>
    <div >
      <input type="submit" id="sbutton">
      <input type="hidden" name="action" value="Login"> 
		<a href="/acme/accounts/index.php?action=register">Create an Account</a>      
    </div>
    </form>  
</div>
	<footer>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?> 		
	</footer>
  </div>
  	<script src='/acme/scripts/jquery-3.0.0.js'></script>
  <script src='/acme/scripts/script.js'></script>
<script src="/acme/scripts/hamburger.js"></script>
</body>
</html>