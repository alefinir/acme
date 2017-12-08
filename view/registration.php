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
	<h1>Registration</h1>
  <?php
    if (isset($message)) {
     echo $message;
}
?>
<div class="ablock">  
  <form  method="post" action="/acme/accounts/index.php">
    <fieldset class="tight">
      <legend>Personal Information</legend>
      <label>
        First Name: <input type="text" name="clientFirstname" id="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?>  pattern="[a-z A-Z]{4,99}" required autofocus><br>
     </label>
      <label>
        Last Name: <input type="text" name="clientLastname" id="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?>  pattern="[a-z A-Z]{4,99}" required><br>
     </label>      
      <label>
        eMail: <input type="email" name="clientEmail" id="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?>  required><br>
      </label>
<label for="clientPassword">Password:
<input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"></label><br>
<span id="message">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
</fieldset>  

    <div>
        <input type="submit" name="submit" class="regbtn" value="Register">
        <input type="hidden" name="action" value="register">        
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