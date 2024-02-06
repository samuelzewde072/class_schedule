<?php
include("connection.php");

?>
<?php
if (isset($_GET['id'])){
    $id=$_GET['id'];
    echo $id;
  $delete=" DELETE FROM `course` WHERE course_ID=$id" ;
  $res=mysqli_query($conn,$delete);

  if(!$res){
    die("delete failed". mysqli_error($conn));
}
else{
    echo"DELETED";
}
}
?>
  <a href="./index.php">go back</a>
  <style>
   
   a {
           display: block;
           text-align: center;
           margin-top: 20px;
           text-decoration: none;
           color: #4CAF50;
           font-weight: bold;
       }
       
 
 
 </style>