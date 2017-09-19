<?php

spl_autoload_register(function ($class) {
    include './classes/' . $class . '.class';
});

$admin = new Admin('Administrator','blrbrown');
$user = new RegisteredUser('Regular User','crdillon');

$admin->__set('first_name', 'Blythe');
$admin->__set('last_name', 'Brown');
$admin->__set('email_address', 'blrbrown@iupui.edu');

$user->__set('first_name', 'Rob');
$user->__set('last_name', 'Dillon');
$user->__set('email_address', 'rdillon@iupui.edu');

function output() {
	global $admin, $user;
	
	$response = "<ul>\n";
	$response .= "<li>User Level: ".$user->__get('user_level')."</li>\n";
	$response .= "<li>Registered User ID: ".$user->__get('user_id')."</li>\n";
	$response .= "<li>Registered User Type: ".$user->__get('user_type')."</li>\n";
	$response .= "<li>Registered First Name: ".$user->__get('first_name')."</li>\n";
	$response .= "<li>Registered Last Name:".$user->__get('last_name')."</li>\n";
	$response .= "<li>Registered Email Address: ".$user->__get('email_address')."</li>\n";
	$response .= "</ul>\n";

	$response .= "<hr >\n";

	$response .= "<ul>\n";
	$response .= "<li>User Level: ".$admin->__get('user_level')."</li>\n";
	$response .= "<li>Admin User ID: ".$admin->__get('user_id')."</li>\n";
	$response .= "<li>Admin User Type: ".$admin->__get('user_type')."</li>\n";
	$response .= "<li>Admin First Name: ".$admin->__get('first_name')."</li>\n";
	$response .= "<li>Admin Last Name: ".$admin->__get('last_name')."</li>\n";
	$response .= "<li>Admin Email Address: ".$admin->__get('email_address')."</li>\n";
	$response .= "</ul>\n";
	
	return $response;
}

?>

<!DOCTYPE html>
<html>

<head>
<title>CIT 313 Exercise 2: OOP</title>

<script><?php if($_POST['back'] === 'back-around') {echo "window.onload = function () {var win = window.open('https://www.youtube.com/watch?v=dQw4w9WgXcQ', '_blank');win.focus();}";}?></script>

</head>

<style>
	ul {
		list-style-type: none;
		padding: 0;
		margin: 0;
		
	}
</style>

<body>

<main>

<form action="#" method="post">
<?php 
if(!isset($_POST['a']) && !isset($_POST['b'])) {
	echo 'A: <input type="text" name="a" value=1>';
	echo 'B: <input type="text" name="b" value=2><br>';
} else {
	echo 'A: <input type="text" name="a" value='.$_POST['a'].'>';
	echo 'B: <input type="text" name="b" value='.$_POST['b'].'><br>';
}
?>
  <input type="submit" value="Calculate">&nbsp;Result:&nbsp;
 <?php 
if(!isset($_POST['a']) && !isset($_POST['b'])) {
	echo Admin::math(1,2) . "<br>";
} else {
	echo Admin::math($_POST['a'],$_POST['b']) . "<br>";
}
?>
</form><br>

<form action="./response.php" method="post">
  First name: <input type="text" name="first_name"><br>
  Last name: <input type="text" name="last_name"><br>
  Email: <input type="email" name="email"><br>
  <input type="submit" value="Submit">
</form>

</main>

</body>

</html>
