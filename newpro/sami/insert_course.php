<?php
include("connection.php");
?>
<link rel="stylesheet" href="./styles/cour.css">
<link rel="stylesheet" href="./styles/style.css">
<link rel="stylesheet" href="./styles/index.css">

<nav style="margin-bottom:100px">
    <ul>
        <li><a href="index.php" >Home</a></li>
        <li><a href="./insert_sch.php"> schedule</a></li>
        <li><a href="./insert_class.php"> class</a></li>
        <li><a href="./insert_course.php"class="active"> Course</a></li>
    </ul>
</nav> 
<?php

if (isset($_POST["send"])) {
    $ID = $_POST['course_ID'];
    $title = $_POST['course_title'];
    $c_hour = $_POST['credit_hour'];


    $insert = "INSERT INTO `course`(`course_ID`, `course_title`, `credit_hour`) 
    VALUES ('$ID','$title','$c_hour')";
    $res = mysqli_query($conn, $insert);
}


$dis =  "SELECT course_ID, course_title, credit_hour FROM course ";

$res = mysqli_query($conn, $dis);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/class.css">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Document</title>
</head>

<body>
    <table border="1px">
        <tr>
            <th>course_ID</th>
            <th>course_title</th>
            <th>credit_hour</th>
            <th>update</th>
            <th>delete</th>

        </tr>


        <?php
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            $id = $row["course_ID"];
            echo "<td>" . $row["course_ID"] . "</td>";
            echo "<td>" . $row["course_title"] . "</td>";
            echo "<td>" . $row["credit_hour"] . "</td>";
            echo "<td> <a href = './update_class.php?id=$id' class ='btn btn-success'>update</a> </td>";
            echo "<td> <a href = './delete_course.php?id=$id' class ='btn btn-danger'>delete</a> </td>";
            echo "</tr>";
        }
        ?>
        </tr>

    </table>
    <h1>course </h1>
    <form method="post">

        <label>ID</label><input type="text" name="course_ID"><br>
        <label>title</label><input type="text" name="course_title"><br>
        <label>c_hour</label><input type="text" name="credit_hour"><br>

        <input type="submit" name="send" value="send"><br>

    </form>
    <a href="./index.php">go back</a>
</body>

</html>