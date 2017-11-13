<?php
if (!$_SESSION['loggedin']) {
      header("Location: http://localhost/acme/" );
     }
?>
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
    <?php
    //var_dump($infoClient);
    //exit;
    ?>
	<h1>Update Account</h1>
  <?php
    if (isset($message)) {
     echo $message;
}
?>
<div class="ablock">  
  <form  method="post" action="/acme/accounts/index.php">
    <fieldset class="tight">
      <legend>Use this form to update your name or email information</legend>
      <label>
        First Name: <input type="text" name="clientFirstname" id="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}elseif(isset($infoClient['clientFirstname'])) {echo "value='$infoClient[clientFirstname]'"; } ?>  required autofocus><br>
     </label>
      <label>
        Last Name: <input type="text" name="clientLastname" id="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}elseif(isset($infoClient['clientLastname'])) {echo "value='$infoClient[clientLastname]'"; } ?>  required><br>
     </label>      
      <label>
        eMail: <input type="email" name="clientEmail" id="clientEmail" <?php if(isset($clientEmail)){echo "value='$clientLastname'";}elseif(isset($infoClient['clientLastname'])) {echo "value='$infoClient[clientLastname]'"; } ?>  required><br>
      </label>
    </fieldset>
    <div>
        <input type="submit" name="submit" id="upbtn" value="Update Account">
        <input type="hidden" name="action" value="modifyAccount">
        <input type="hidden" name="clientId" value="<?php if(isset($infoClient['clientId'])){ echo $infoClient['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">        
        
    </div>
  </form>

<br>

  <?php
    if (isset($message)) {
     echo $message;
}
?>

  <form  method="post" action="/acme/accounts/index.php">
    <fieldset class="tight">
      <legend>Use this form to change your password</legend>

<label for="clientPassword">Password:
<input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"></label><br>
<span id="message">Passwords must be at least 8 characters and contain at least 1 number, <br>1 capital letter and 1 special character</span>
</fieldset>  

    <div>
        <input type="submit" name="submit" id="upbtn" value="Change Password">
        <input type="hidden" name="action" value="modifyPass">
        <input type="hidden" name="clientId" value="<?php if(isset($infoClient['clientId'])){ echo $infoClient['clientId'];} elseif(isset($clientId)){ echo $clientId; } ?>">        

    </div>
  </form>


</div>
	<footer>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?> 		
	</footer>
  </div>
  <script src='/acme/scripts/jquery-3.0.0.js' type='text/javascript'></script>
  <script src='/acme/scripts/script.js' type='text/javascript'></script>
</body>
</html>