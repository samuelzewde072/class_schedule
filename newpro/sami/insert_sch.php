<?php
include("connection.php");
?>
<link rel="stylesheet" href="./styles/sched.css">
<link rel="stylesheet" href="./styles/style.css">
<link rel="stylesheet" href="./styles/index.css">

<nav style="margin-bottom:100px">
    <ul>
        <li><a href="index.php" >Home</a></li>
        <li><a href="./insert_sch.php"class="active"> schedule</a></li>
        <li><a href="./insert_class.php"> class</a></li>
        <li><a href="./insert_course.php"> Course</a></li>
    </ul>
</nav> 

<?php

if (isset($_POST["send"])) {
    $id = $_POST['id'];
    $class_id = $_POST['class'];
    $Monday = $_POST['Monday'];
    $Tuesday = $_POST['Tuesday'];
    $Wednesday = $_POST['Wednesday'];
    $Thursday = $_POST['Thursday'];
    $Friday = $_POST['Friday'];
    $time = $_POST['time'];



    $insert = "INSERT INTO `schedule`( `ID`, `class_ID`,`Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `time`) VALUES ( $id ,$class_id, $Monday, $Tuesday, $Wednesday,$Thursday,$Friday,$time)";

    $res = mysqli_query($conn, $insert);


    if ($res) {
        echo "inserted";
    } else {
        echo "failed" . mysqli_error($conn);
    }
}

?>

<?php
include("connection.php");

$dis = "SELECT `ID`, `class_ID`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `time` 
FROM `schedule` ";
$res = mysqli_query($conn, $dis);
?>
<link rel="stylesheet" href="./styles/style.css">
<link rel="stylesheet" href="./styles/index.css">


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="display">

        <table border=1px>

            <tr>
                <th>Class </th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday </th>
                <th>time</th>
                <th>update</th>
                <th>delete</th>

            </tr>
            <?php
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";

                $id =  $row["ID"];
                $class_id = $row['class_ID'];
                $class = mysqli_query($conn, "SELECT `class_name` FROM `class` WHERE `class_ID` = $class_id  ");
                if ($class_data = mysqli_fetch_assoc($class)) {
                    echo "<td>" . $class_data["class_name"] . "</td>";
                }
                $day_id =  $row["Monday"];
                $day = mysqli_query($conn, "SELECT  `course_title`FROM `course` WHERE `course_ID` = $day_id  ");
                if ($day_data = mysqli_fetch_assoc($day)) {
                    echo "<td>" . $day_data["course_title"] . "</td>";
                }
                $day_id =  $row["Tuesday"];
                $day = mysqli_query($conn, "SELECT  `course_title`FROM `course` WHERE `course_ID` = $day_id  ");
                if ($day_data = mysqli_fetch_assoc($day)) {
                    echo "<td>" . $day_data["course_title"] . "</td>";
                }
                $day_id =  $row["Wednesday"];
                $day = mysqli_query($conn, "SELECT  `course_title`FROM `course` WHERE `course_ID` = $day_id  ");
                if ($day_data = mysqli_fetch_assoc($day)) {
                    echo "<td>" . $day_data["course_title"] . "</td>";
                }
                $day_id =  $row["Thursday"];
                $day = mysqli_query($conn, "SELECT  `course_title`FROM `course` WHERE `course_ID` = $day_id  ");
                if ($day_data = mysqli_fetch_assoc($day)) {
                    echo "<td>" . $day_data["course_title"] . "</td>";
                }
                $day_id =  $row["Friday"];
                $day = mysqli_query($conn, "SELECT  `course_title`FROM `course` WHERE `course_ID` = $day_id  ");
                if ($day_data = mysqli_fetch_assoc($day)) {
                    echo "<td>" . $day_data["course_title"] . "</td>";
                }
                echo "<td>" . $row["time"] . "</td>";
                echo "<td> <a href = './update_sch.php?id=$id' class ='btn btn-success'>update</a> </td>";
                echo "<td> <a href = './delete_sch.php?id=$id' class ='btn btn-danger'>delete</a> </td>";
                echo "</tr>";
            } ?>

        </table>
    </div>
    <h1>schedule</h1>
    <form method="post">
        <label> ID</label> <input type="number" name="id"> <br>
        <label> class </label>
        <select name="class" id="">
            <?php
            $class = mysqli_query($conn, "SELECT `class_ID`, `class_name`  FROM `class`");
            while ($cla = mysqli_fetch_assoc($class)) {
            ?>
                <option value="<?php echo $cla['class_ID'] ?>"> <?php echo $cla['class_name'] ?></option>
            <?php
            }
            ?>
        </select>
        <br>


        <label>Monday</label><select name="Monday" id="">
            <?php
            $course = mysqli_query($conn, "SELECT `course_ID`, `course_title` FROM `course`");
            while ($cou = mysqli_fetch_assoc($course)) {
            ?>
                <option value="<?php echo $cou['course_ID'] ?>"> <?php echo $cou['course_title'] ?> </option>
            <?php
            }
            ?>



        </select><br>
        <label>Tuesday</label><select type="text" name="Tuesday">
            <?php
            $course = mysqli_query($conn, "SELECT `course_ID`, `course_title` FROM `course`");
            while ($cou = mysqli_fetch_assoc($course)) {
            ?>
                <option value="<?php echo $cou['course_ID'] ?> "> <?php echo $cou['course_title'] ?></option>

            <?php
            }
            ?>
        </select><br>

        <label>Wednesday</label><select type="text" name="Wednesday">
            <?php
            $course = mysqli_query($conn, "SELECT `course_ID`, `course_title` FROM `course`");
            while ($cou = mysqli_fetch_assoc($course)) {
            ?>
                <option value="<?php echo $cou['course_ID'] ?> "> <?php echo $cou['course_title'] ?></option>
            <?php
            }

            ?>
        </select><br>

        <label>Thursday</label><select type="text" name="Thursday">

            <?php
            $course = mysqli_query($conn, "SELECT `course_ID`, `course_title` FROM `course`");
            while ($cou = mysqli_fetch_assoc($course)) {
            ?>
                <option value="<?php echo $cou['course_ID'] ?> "> <?php echo $cou['course_title'] ?></option>

            <?php
            }

            ?>
        </select><br>





        <label>Friday</label><select type="text" name="Friday">

            <?php
            $course = mysqli_query($conn, "SELECT `course_ID`, `course_title` FROM `course`");
            while ($cou = mysqli_fetch_assoc($course)) {
            ?>
                <option value="<?php echo $cou['course_ID'] ?> "> <?php echo $cou['course_title'] ?></option>
            <?php
            }

            ?>
        </select><br>


        <label>time</label><input type="text" name="time"><br>


        <input type="submit" name="send" value="send"><br>
    </form>
    <a href="./index.php">go back</a>

</body>

</html>