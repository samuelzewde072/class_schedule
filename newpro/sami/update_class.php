<link rel="stylesheet" href="./styles/update_sche.css">

<?php
include("./connection.php");
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  if (isset($_POST['update'])) {
    $name = $_POST['name'];

    $location = $_POST['location'];

    $update = "UPDATE `class` SET
  `class_name`='$name',`location`='$location' WHERE `class_ID`=$id";
    $res = mysqli_query($conn, $update);

    if ($res) {
      echo "updated successfully";
    } else {
      echo "failed" . mysqli_error($conn);
    }
  }
  $class = mysqli_query($conn, "SELECT * FROM `class` ");
  if ($cla = mysqli_fetch_assoc($class)) {
?>
    <form method="post">

      <label for="id"> name </label><input type="text" name='name' value='<?php echo $cla['class_name'] ?>'>
      <label for="id"> location </label><input type="text" name='location' value='<?php echo $cla['location'] ?>'>

      <input type="submit" name="update" value="update"><br>




    </form>



<?php
  }
}

?>
  <a href="./index.php">go back</a>