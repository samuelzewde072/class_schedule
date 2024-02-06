<link rel="stylesheet" href="./styles/update_sche.css">

<?php
include("./connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT `ID`, `class_ID`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `time`
 FROM `schedule` WHERE `ID`= $id ";
    $shedule = mysqli_query($conn, $select);

    if ($shed = mysqli_fetch_assoc($shedule)) { {
?>





            <form method="post">
                <label> ID</label> <input type="number" name="id" value="<?php echo $shed['class_ID'] ?>"> <br>
                <label> class </label>
                <select name="class" id="">
                    <?php
                    $class = mysqli_query($conn, "SELECT `class_ID`, `class_name`  FROM `class`");
                    while ($cla = mysqli_fetch_assoc($class)) {
                    ?>
                        <option value="<?php echo $cla['class_ID'] ?>" <?php if ($shed['class_ID'] == $cla['class_ID']) {
                                                                            echo "selected";
                                                                        } ?>> <?php echo $cla['class_name'] ?></option>
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
                        <option value="<?php echo $cou['course_ID']; ?>" <?php if ($shed['Monday'] == $cou['course_ID']) {
                                                                                echo "selected";
                                                                            } ?>> <?php echo $cou['course_title'] ?></option>
                    <?php
                    }
                    ?>



                </select><br>
                <label>Tuesday</label><select type="text" name="Tuesday">
                    <?php
                    $course = mysqli_query($conn, "SELECT `course_ID`, `course_title` FROM `course`");
                    while ($cou = mysqli_fetch_assoc($course)) {
                    ?>
                        <option value="<?php echo $cou['course_ID']; ?>" <?php if ($shed['Tuesday'] == $cou['course_ID']) {
                                                                                echo "selected";
                                                                            } ?>> <?php echo $cou['course_title'] ?></option>

                    <?php
                    }
                    ?>
                </select><br>

                <label>Wednesday</label><select type="text" name="Wednesday">
                    <?php
                    $course = mysqli_query($conn, "SELECT `course_ID`, `course_title` FROM `course`");
                    while ($cou = mysqli_fetch_assoc($course)) {
                    ?>
                        <option value="<?php echo $cou['course_ID']; ?>" <?php if ($shed['Wednesday'] == $cou['course_ID']) {
                                                                                echo "selected";
                                                                            } ?>> <?php echo $cou['course_title'] ?></option>
                    <?php
                    }

                    ?>
                </select><br>

                <label>Thursday</label><select type="text" name="Thursday">

                    <?php
                    $course = mysqli_query($conn, "SELECT `course_ID`, `course_title` FROM `course`");
                    while ($cou = mysqli_fetch_assoc($course)) {
                    ?>
                        <option value="<?php echo $cou['course_ID']; ?>" <?php if ($shed['Thursday'] == $cou['course_ID']) {
                                                                                echo "selected";
                                                                            } ?>><?php echo $cou['course_title'] ?></option>
                    <?php
                    }

                    ?>
                </select><br>





                <label>Friday</label><select type="text" name="Friday">

                    <?php
                    $course = mysqli_query($conn, "SELECT `course_ID`, `course_title` FROM `course`");
                    while ($cou = mysqli_fetch_assoc($course)) {
                    ?>
                        <option value="<?php echo $cou['course_ID']; ?>" <?php if ($shed['Friday'] == $cou['course_ID']) {
                                                                                echo "selected";
                                                                            } ?>> <?php echo $cou['course_title'] ?></option>
                    <?php
                    }

                    ?>
                </select><br>


                <label>time</label><input type="text" name="time" value='<?php echo $shed['time'] ?>'><br>


                <input type="submit" name="update" value="send"><br>


    <?php
        }
        if (isset($_POST['update'])) {



            $class_id = $_POST['class'];
            $Monday = $_POST['Monday'];
            $Tuesday = $_POST['Tuesday'];
            $Wednesday = $_POST['Wednesday'];
            $Thursday = $_POST['Thursday'];
            $Friday = $_POST['Friday'];
            $time = $_POST['time'];

            $update = "UPDATE `schedule` SET `class_ID`='$class_id',`Monday`='  $Monday',`Tuesday`=' $Tuesday',
    `Wednesday`='$Wednesday',`Thursday`=' $Thursday ',`Friday`='$Friday',`time`=' $time ' WHERE `ID`=$id";

            $res = mysqli_query($conn, $update);

            if ($res) {
                echo "updated successfully";
            } else {
                echo "failed" . mysqli_error($conn);
            }
        }
    }
}
    ?>
      <a href="./index.php">go back</a>