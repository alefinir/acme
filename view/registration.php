<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Home -- ACME Foods">
	<meta name="author" content="Team 4 -- CIT 336 -- BYUI">
	<link href="https://fonts.googleapis.com/css?family=Bangers%7CLora" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/medium.css">
	<link rel="stylesheet" type="text/css" href="../css/small.css">
	<link rel="stylesheet" type="text/css" href="../css/large.css">
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<title>ACME</title>
</head>
<body>
	<header>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?> 
	</header>
	<div class="all">
	<h1>Registration</h1>

    <fieldset class="tight">
      <legend>Personal Information</legend>
      <label>
        First Name: <input type="text" name="clientFirstname" value="" placeholder="First Name" pattern="[a-z A-Z]{5,99}" required autofocus><br>
     </label>
      <label>
        Last Name: <input type="text" name="clientLastname" value="" placeholder="Last Name" pattern="[a-z A-Z]{5,99}" required autofocus><br>
     </label>      
      <label>
        eMail: <input type="email" name="email" placeholder="yourname@yourdomain.com" required><br>
      </label>
      <label>
        Password: <input type="password" name="clientPassword" value="" placeholder="Password" pattern="[a-zA-Z]{8,99}" required autofocus><br>
     </label>      
      <label>
        Confirm Password: <input type="password" name="clientConfirmpassword" value="" placeholder="Password" pattern="[a-zA-Z]{8,99}" required autofocus><br>
     </label>      

    </fieldset>  

        <div>
      <input type="submit" id="sbutton">
    </div>

	<footer>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?> 		
	</footer>
  </div>
  <script src='scripts/jquery-3.0.0.js' type='text/javascript'></script>
  <script src='scripts/script.js' type='text/javascript'></script>
</body>
</html>