<?php  
include("conn.php");
global $connection;

session_start();

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['import_button']))
{
    
    $allowed_ext =  ['xls','csv','xlsx'];
    $fileName = $_FILES['import_file']['name'];
    $checking = explode(".",$fileName);
    $file_ext = end($checking);

    if(in_array($file_ext,$allowed_ext))
    {
        $targetPath = $_FILES ['import_file']['tmp_name'];
        /** Load $inputFileName to a Spreadsheet object **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load( $targetPath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        // echo "<pre>";print_r($data); 
    foreach($data as $row){
        
            $userid = $row['0']; 
            $name = $row['1'];
            $contact = $row['2'];
            $email = $row['3'];
            $webaddress = $row['4'];
            $category = $row['5'];
            $description  = $row['6'];
            $assigned = $row['7'];
            $checkUser = "SELECT userid FROM user WHERE userid='$userid' ";
            $result = mysqli_query($connection, $checkUser);
            if(mysqli_num_rows($result) > 0)
            {
                $up_query = "UPDATE user SET  name='$name',contact='$contact',email= '$email', webaddress = '$webaddress ',category= '$category',description ='$description',assigned= '$assigned' WHERE userid='$userid' ";
                $up_result = mysqli_query($connection, $up_query);                
                $msg = 1;
            }
            else
            {
             // New record  INSERT
                $in_query= "INSERT INTO user (name,contact,email,webaddress,category,description,assigned ) VALUES ('$name','$contact','$email','$webaddress','$category','$description','$assigned')";
                $in_result = mysqli_query($connection, $in_query);
                $msg = 1;
            }
        }
        if(isset($msg))
        {
            $_SESSION['status'] = "Xl import successfully";
            header("location:index.php");
    
        }
        else
        {    
            $_SESSION['status'] = "Failed";
            header("location:index.php");
    
        }
    }
    else
    {
       $_SESSION['status'] = "Invalid File";
       header("location:index.php");
       exit(0);
    }
}
?>
