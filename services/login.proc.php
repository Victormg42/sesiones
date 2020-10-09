<?php
include 'connection.php';
if (isset($_POST['email'])) {
    //echo md5($_POST['passwd']);
    $email=$_POST['email'];
    $passwd=md5($_POST['passwd']);
    $query='SELECT * FROM tbl_user WHERE email="'.$email.'" AND password="'.$passwd.'"';
    //echo $query;
    $result=mysqli_query($conn, $query);
    // El usuario existe y su passowrd es correcto
    if (mysqli_num_rows($result)==1) {
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['email']=$row['email'];
        $_SESSION['id']=$row['id_user'];
        header('Location:../view/home.php');
    } else {
        header('Location:../index.php');
    }



} else {
    header('Location:../index.php');
}
?>