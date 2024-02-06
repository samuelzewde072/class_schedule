<link rel="stylesheet" href="./styles/update_cou.css">
<?php
include("./connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT `course_ID`, `course_title`, `credit_hour` FROM `course` WHERE `course_ID` = $id ";
    $course = mysqli_query($conn, $select);
    if ($cou = mysqli_fetch_assoc($course)) {
?>
        <form method="post">


            <label>title</label><input type="text" name="course_title" value="<?php echo $cou['course_title'] ?>"><br>
            <label>c_hour</label><input type="text" name="credit_hour" value="<?php echo $cou['credit_hour'] ?>"><br>

            <input type="submit" name="update" value="send"><br>

        </form>
<?php
    }




    if (isset($_POST['update'])) {
        $title = $_POST['course_title'];
        $c_hour = $_POST['credit_hour'];

        $update = "UPDATE `course` SET
      `course_title`='$title',`credit_hour`='$c_hour' WHERE course_ID= $id";
        $res = mysqli_query($conn, $update);

        if ($res) {
            echo "updated successfully";
        } else {
            echo "failed" . mysqli_error($conn);
        }
    }
}




?>
  <a href="./index.php">go back</a>