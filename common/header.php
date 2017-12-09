<div class="box-father">
	<div class="logoizq">
		<a href="/acme"><img class="logo" src="/acme/images/site/logo.gif" alt="Logo ACME Foods"></a> 
		<a href="/acme"><img class="logo-small" src="/acme/images/site/logo-small.gif" alt="Logo ACME Foods CellPhone"></a>
	</div>
	<div class="account">
		<?php 
			//var_dump($cookieFirstname);
			//exit;
			$logueado=0;
			$welcome="";

			if(isset($_SESSION['loggedin'])){

				if ($_SESSION['loggedin']) {
					$logueado=1;
					//setcookie('firstime', $clientFirstname, strtotime('-1 year'), '/');  
				}
			}

		/*/if($logueado){

			if(isset($cookieFirstname)){
  					$welcome="<a href=\"/acme/accounts/index.php\"><span id=".'"welcomeName"'.">Welcome $cookieFirstname  |</span></a>";

			//} 
				echo "$welcome";

			if($logueado){	
			  echo "<form  method=\"post\" action=\"/acme/accounts/index.php\">
			    <div>
			        <input type=\"submit\" name=\"submit\" id=\"regbtn\" value=\"Logout\">
			        <input type=\"hidden\" name=\"action\" value=\"Logout\">        
			    </div>
			  </form>";
			}


					echo "<a href=\"/acme/accounts/?action=Login\">
					<img class=\"img-acc\" src=\"/acme/images/site/account-small.gif\" alt=\"Logo ACME Foods\"> 
					<h3>My Account</h3></a>";

			}
			else{

				echo"
				<a href=\"/acme/accounts/?action=Login\">
					<img class=\"img-acc\" src=\"/acme/images/site/account-small.gif\" alt=\"Logo ACME Foods\"> 
				<h3>My Account</h3></a>";

			}*/


			// we will check this part

			if(isset($cookieFirstname)){
				if($logueado){
  					$welcome="<a href=\"/acme/accounts/index.php\"><span id=".'"welcomeName"'.">Welcome $cookieFirstname  |</span></a>";
					echo "$welcome";
			  		echo "<form  method=\"post\" action=\"/acme/accounts/index.php\">
			    	<div>
			        	<input type=\"submit\" name=\"submit\" id=\"regbtn\" value=\"Logout\">
			        	<input type=\"hidden\" name=\"action\" value=\"Logout\">        
			    	</div>
			  		</form>";
				}
				else{
  					$welcome="<a href=\"/acme/accounts/index.php\"><span id=".'"welcomeName"'.">Welcome $cookieFirstname  |</span></a>";
					echo "$welcome";
					echo "
						<a href=\"/acme/accounts/?action=Login\">
						<img class=\"img-acc\" src=\"/acme/images/site/account-small.gif\" alt=\"Logo ACME Foods\"> 
						<h3>My Account</h3></a>";					

				}

			 }
			 else
			 	{
					echo "
						<a href=\"/acme/accounts/?action=Login\">
						<img class=\"img-acc\" src=\"/acme/images/site/account-small.gif\" alt=\"Logo ACME Foods\"> 
						<h3>My Account</h3></a>";
			}

		?> 

	</div>
</div> 
<nav class="navigation">
	   <button class="hamburger" onclick="toggleHam()">&#9776;</button>
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
