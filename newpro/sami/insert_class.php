<?php
include("connection.php");
?>
    <link rel="stylesheet" href="./styles/style.css">
<link rel="stylesheet" href="./styles/index.css">

<nav style="margin-bottom:100px">
    <ul>
        <li><a href="index.php" >Home</a></li>
        <li><a href="./insert_sch.php"> schedule</a></li>
        <li><a href="./insert_class.php"class="active"> class</a></li>
        <li><a href="./insert_course.php"> Course</a></li>
    </ul>
</nav> 

<?php
if (isset($_POST["send"])) {
    $name = $_POST['class_name'];
    $location = $_POST['location'];

    $insert = "INSERT INTO `class`(`class_name`, `location`)
 VALUES ('$name','$location')";
    $res = mysqli_query($conn, $insert);

    if ($res) {
        echo "inserted";
    } else {
        echo "failed" . mysqli_error($conn);
    }
}


if (isset($_POST["update"])) {

    $name = $_POST['name'];
    $ID = $_POST['class_ID'];
    $location = $_POST['location'];

    $update = "UPDATE `class` SET
     `class_ID`=' $ID',`class_name`='$name',`location`='$location' WHERE =`class_ID`= $ID";


    if ($res) {
        echo "updated";
    } else {
        echo "failed" . mysqli_error($conn);
    }
}
if (isset($_POST["delete"])) {

    $ID = $_POST["class_ID"];

    $delete = "DELETE FROM `class` WHERE `class_ID`=$ID";
}

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
    <div class="display">
        <?php

        $dis = "SELECT `class_ID`, `class_name`, `location` FROM `class` ";

        $res = mysqli_query($conn, $dis);

        ?>
        <table border="1px">
            <tr>
                <th>class_ID</th>
                <th>class_name</th>
                <th>location</th>
                <th>update</th>
                <th>delete</th>

            </tr>


            <?php
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                $id = $row["class_ID"];
                echo "<td>" . $row["class_ID"] . "</td>";
                echo "<td>" . $row["class_name"] . "</td>";
                echo "<td>" . $row["location"] . "</td>";
                echo "<td> <a href = './update_class.php?id=$id' class ='btn btn-success'>update</a> </td>";
                echo "<td> <a href = './delete_class.php?id=$id' class ='btn btn-danger'>delete</a> </td>";
                echo "</tr>";
            }
            ?>
            </tr>

        </table>
    </div>
    <h1>class </h1>
    <form method="post">

        <label>ID</label><input type="text" name="class_ID"><br>
        <label>name</label><input type="text" name="class_name"><br>
        <label>location</label><input type="text" name="location"><br>


        <input type="submit" name="send" value="send"><br>



    </form>
    <a href="./index.php">go back</a>
</body>

</html>