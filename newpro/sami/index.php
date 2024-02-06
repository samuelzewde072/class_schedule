<?php
include("connection.php");

$dis = "SELECT ID, class_ID, Monday, Tuesday, Wednesday, Thursday, Friday, time 
FROM schedule ";
$res = mysqli_query($conn, $dis);
?>

<!-- <link rel="stylesheet" href="./styles/style.css"> -->
<link rel="stylesheet" href="./styles/index.css">

<nav style="margin-bottom:100px">
    <ul>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="./insert_sch.php"> schedule</a></li>
        <li><a href="./insert_class.php"> class</a></li>
        <li><a href="./insert_course.php"> Course</a></li>
    </ul>
</nav>

<div class="schedule-section container-table100">
    <h2>Kolfe Industrial College </h2> <br></br>
    <h2>ICT class schedule</h2>
    <table class="schedule-table">
        <tr>
            <th>Class</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Time</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            $id =  $row["ID"];
            $class_id = $row['class_ID'];
            $class = mysqli_query($conn, "SELECT class_name FROM class WHERE class_ID = $class_id  ");
            if ($class_data = mysqli_fetch_assoc($class)) {
                echo "<td>" . $class_data["class_name"] . "</td>";
            }

            $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
            foreach ($days as $day) {
                $day_id = $row[$day];
                $course = mysqli_query($conn, "SELECT course_title FROM course WHERE course_ID = $day_id");
                if ($course_data = mysqli_fetch_assoc($course)) {
                    echo "<td>" . $course_data["course_title"] . "</td>";
                } else {
                    echo "<td></td>";
                }
            }

            echo "<td>" . $row["time"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</div>
<div class="flex">



    <div class="class-section">
        <h2>Classes</h2>
        <?php
        $dis = "SELECT class_ID, class_name, location FROM class ";
        $res = mysqli_query($conn, $dis);
        ?>

        <table class="class-table">
            <tr>
                <th>Class ID</th>
                <th>Class Name</th>
                <th>Location</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                $id = $row["class_ID"];
                echo "<td>" . $row["class_ID"] . "</td>";
                echo "<td>" . $row["class_name"] . "</td>";
                echo "<td>" . $row["location"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>

    </div>

    <div class="course-section">
        <h2>Courses</h2>
        <?php
        $dis = "SELECT course_ID, course_title, credit_hour FROM course ";
        $res = mysqli_query($conn, $dis);
        ?>

        <table class="course-table">
            <tr>
                <th>Course ID</th>
                <th>Course Title</th>
                <th>Credit Hour</th>

            </tr>

            <?php
            while ($row = mysqli_fetch_array($res)) {
                $id = $row["course_ID"];

                echo "<tr>";
                echo "<td>" . $row["course_ID"] . "</td>";
                echo "<td>" . $row["course_title"] . "</td>";
                echo "<td>" . $row["credit_hour"] . "</td>";

                echo "</tr>";
            }
            ?>
        </table>

    </div>
</div>