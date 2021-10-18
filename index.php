<?php
include "db.php";
if(isset($_POST["enter"])){
    $name = $_POST["name"];
    $sql = "INSERT INTO user_info (name, score) VALUES ('$name', 0)";
    if (mysqli_query($db, $sql)) {
    //echo "New record created successfully !";
    } else {
    echo "Error: " . $sql . " " . mysqli_error($db);
    }
    mysqli_close($db);

}

function redirect(){
    $admin = "nutzijs33";
    if($_POST["name"] == $admin){
        $redirect = "admin.php";
        header("Refresh:0; url=admin.php");
    }else{
        $redirect = " ";
    }
    return $redirect;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginstyle.css">
    <title>Register</title>
</head>
<body>
    <div id="container">
        <form method="post">
            Vārds:<input type="text" name="name" id="name">
            <div id="btns">
                <input type="submit" name="enter" value="enter" id="enter" onclick="window.location.href='<?echo redirect()?>'">
        </form>
            <a href="main.php">Tālāk</a>
        </div>
    </div>
</body>
</html>