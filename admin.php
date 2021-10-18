<?php
include "db.php";

$select = $db->query("SELECT * FROM questions");
$info = [];
$selected = [];

if($_POST["enter"]){
    $question = $_POST["question"];
    $ans1 = $_POST["firstq"];
    $ans2 = $_POST["secondq"];
    $ans3 = $_POST["thirdq"];
    $ans4 = $_POST["fourthq"];
    $correct = $_POST["number"];
    $db->query("INSERT INTO questions (question, ans1, ans2, ans3, ans4, correct) VALUES ('$question', '$ans1', '$ans2', '$ans3', '$ans4', '$correct')");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminstyle.css">
    <title>Document</title>
</head>
<body>
    <div id="header-container">
        <h1>Admin Panel</h1>
    </div>
    <form method="post">
        <div id="main-container">
            Jautājums:<input type="text" name="question">
            Atbilde 1:<input type="text" name="firstq">
            Atbilde 2:<input type="text" name="secondq">
            Atbilde 3:<input type="text" name="thirdq">
            Atbilde 4:<input type="text" name="fourthq">
            Pareizais:<input type="number" name="number" value="number" min="1" max="4">
        </div>
        <div id="edit-container">
        <?while($questions = $select->fetch_assoc()){?>
            <?echo $questions["id"]?><input type="checkbox" name="edit-btn" value="<?echo $questions["id"]?>"><?echo $questions["question"]?>
        </br>
        <?}?>
        </div>
        <div id="btns">
            <input type="submit" name="enter" value="enter" class="buttons">
            <input type="submit" name="edit" value="edit" class="buttons">
            <input type="submit" name="delete" value="delete" class="buttons">
        </div>
    </form>
</body>
</html>