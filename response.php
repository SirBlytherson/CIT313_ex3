<?php

spl_autoload_register(function ($class) {
    include './classes/' . $class . '.class';
});

$user = new RegisteredUser('newuser', 'regular');

$user->__set('first_name', $_POST['first_name']);
$user->__set('last_name', $_POST['last_name']);
$user->__set('email_address', $_POST['email']);

function checkType($object) {
	if(is_a($object, 'RegisteredUser')) {
		return true;
	}
	return false;
}

?>

<!DOCTYPE html>
<html>

<head>
<title>Response</title>
</head>

<style></style>

<body>

<main>
<?php

if(checkType($user)) {
	echo "Registration Successful!<br><br>\n";
	echo "<ul>\n";
	echo "<li>User Level: ".$user->__get('user_level')."</li>\n";
	echo "<li>Registered User ID: ".$user->__get('user_id')."</li>\n";
	echo "<li>Registered User Type: ".$user->__get('user_type')."</li>\n";
	echo "<li>Registered First Name: ".$user->__get('first_name')."</li>\n";
	echo "<li>Registered Last Name:".$user->__get('last_name')."</li>\n";
	echo "<li>Registered Email Address: ".$user->__get('email_address')."</li>\n";
	echo "</ul>\n";
} else {
	echo "Registration Unsuccessful...<br><br>\n";
}

?>

	<form action='./index.php' method='post'>
		<input style="display: none" type="text" value="back-around" name="back">
		<input type='submit' value='Return to Index'>
	</form>
	
</main>

</body>

</html>