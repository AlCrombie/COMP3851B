<?php 
function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function uidExists($conn, $username) {
	$sql = "SELECT * FROM users WHERE userName = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $username)
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn,$username);

	if ($uidExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $uidExists["userPwd"];
	$checkPwd = password_verify($pwd, $pwdHased);

	if ($checkPwd === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	else if ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $uidExists["userID"];
		header("location: ../index.php");
		exit();
	}
}