<?php

session_start();
$conn = mysqli_connect('localhost', 'root', '' , 'uon_orientation') or die ('Unable to connect');
//Connects the database or says it cannot
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Login University of Newcastle Admin</h1>
<h2>Log In</h2>
<div>

<form method = "post">
    <fieldset>
        <legend>Login</legend>
        <input type="text" class = "field" name = "enterName" placeholder="Username" />
        <input type="password" class = "field" name = "enterPass" placeholder="Password" />
        <button type="submit" class = "field" name="btnlogin" value = "login">Sign in</button>
    </fieldset>
</form>
</div>

<?php

	if (isset($_POST["btnlogin"])){
		$userName = $_POST["enterName"];
		$userPass = $_POST["enterPass"];
		//When the button is pressed the values in the boxes are made to variables

	$select = mysqli_query($conn, "SELECT * FROM users WHERE userName = '$userName' AND userPass = '$userPass' ");
	$row = mysqli_fetch_array($select);
		//The variables are checked against the database and the array of the matches are 

	if(is_array($row)){
		$_SESSION["userName"] = $row ["userName"];
		$_SESSION["userPass"] = $row ["userPass"];
	}
		else {
			echo '<script type = "text/javascript">';
			echo 'alert("Invalid Username or Password!");';
			echo 'window.location.href = "login.php"';
			echo '</script>';

	
	}

	if(isset($_SESSION["userName"])){
		header("Location:adminPage.php");
	}
	}


?>
</body>

</html>