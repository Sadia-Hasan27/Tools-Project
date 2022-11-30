<?php
session_start();
require '../components/dbcon.php';

if(isset($_POST['delete']))
{
    $branch_id = mysqli_real_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM branches WHERE id='$branch_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Branch Deleted Successfully";
        header("Location: branch.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Branch Not Deleted";
        header("Location: branch.php");
        exit(0);
    }
}

if(isset($_POST['update']))
{
    $branch_id = mysqli_real_escape_string($con, $_POST['id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $street = mysqli_real_escape_string($con, $_POST['street']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $country = mysqli_real_escape_string($con, $_POST['country']);

    $query = "UPDATE branches SET name='$name', street='$street', city='$city', number='$number', country='$country' WHERE id='$branch_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Branch Updated Successfully";
        header("Location: branch.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Branch Not Updated";
        header("Location: branch.php");
        exit(0);
    }

}


if(isset($_POST['save']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $street = mysqli_real_escape_string($con, $_POST['street']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $country = mysqli_real_escape_string($con, $_POST['country']);

    $query = "INSERT INTO branches (name,street,city,number,country) VALUES ('$name','$street','$city','$number','$country')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Branch Created Successfully";
        header("Location: branchcreat.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Branch Not Created";
        header("Location: branchcreat.php");
        exit(0);
    }
}

?>