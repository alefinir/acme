<div class="box-father">
	<div class="logoizq">
		<img class="logo" src="/acme/images/site/logo.gif" alt="Logo ACME Foods"> 
		<img class="logo-small" src="/acme/images/site/logo-small.gif" alt="Logo ACME Foods CellPhone"> 
	</div>
	<div class="account">
		<?php 
			$logueado=0;
			$welcome="";

		if($logueado){
  				echo "<h3>Logout</h3>";
			}
			else{

			if(isset($cookieFirstname)){
  					$welcome="<span id=".'"welcomeName"'.">Welcome $cookieFirstname</span>";
			} 
				echo "$welcome";
				echo"
				<a href=\"/acme/accounts/index.php\">
					<img class=\"img-acc\" src=\"/acme/images/site/account-small.gif\" alt=\"Logo ACME Foods\"> 
				</a>
				<h3>My Account</h3>";

			}


		?> 

	</div>
</div> 
<nav class="navigation">
	<?php
	echo $navList;
	/*<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="anvils.php">Anvils</a></li>
		<li><a href="cannons.php">Cannons</a></li>
		<li><a href="protection.php">Protection</a></li>
		<li><a href="rockets.php">Rockets</a></li>
		<li><a href="traps.php">Traps</a></li>
	</ul>*/
	?>
</nav>
