<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Page</title>
</head>

<body>
Enter Admin
<h3>Welcome <?php echo $_SESSION['userName']; ?></h3>
</body>

</html>