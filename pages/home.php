<?php

?>

<html>
<head>
    <title>home</title>

</head>

<body>
<?php include("header.php"); ?>

</body>


<?php
if (isset($_SESSION['userID'])){
    echo $_SESSION['userID'];
}
else {
    echo 'Not Logged In.';
}
include("footer.php");
?>