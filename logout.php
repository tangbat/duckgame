<?php
session_start();
/*
header('Location: login.php?logoutMsg=Logout Successful');
session_destroy();   // function that Destroys Session 
*/
header('Refresh:2; url=index.php');
?>

<!DOCTYPE html>

<head>
    <title>Logging out</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" 
        rel="stylesheet" media="screen">   
</head>
 <body>

<?php 
    echo '<span style="font-weight: bold; color: rgb(24, 118, 20); "> 
        Logout Successful </span>';
//echo "<a href='login.php'> Return to login page</a> ";
   
?>

</body>
</html>