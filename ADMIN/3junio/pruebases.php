<?php
// Start the session
session_start();
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
echo "Session variables are set. Your fav color is: " . $_SESSION["favcolor"];
?>
<a href="pag2.php">avr haz click</a>
</body>
</html>