<?php
include "conn.php";
$status='';
$message='';
$data='';

if($_REQUEST['condition']=='get' && isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM emp where emp_id=".$id;
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    if($row!=""){
        $status=true;
        $message='Data Selected Succesfully';
        $data=$row;
    }else{
        $status=false;
        $message='Data Not Selected';
        $data='';
    }
}
elseif($_REQUEST['condition']=='get_all')
{
    $sql = "SELECT * FROM emp";
    $result=$conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    if($row!=""){
        $status=true;
        $message='Data Selected Succesfully';
        $data=$row;
    }else{
        $status=false;
        $message='Data Not Selected';
        $data='';
    }
}
elseif($_REQUEST['condition']=='insert' && isset($_REQUEST['emp_name']) && isset($_REQUEST['emp_email']) && isset($_REQUEST['emp_mo_no']) && isset($_REQUEST['emp_password']) && isset($_REQUEST['emp_address']) && isset($_REQUEST['emp_work']))
{
    $sql = "INSERT INTO emp(emp_name,emp_email,emp_mo_no,emp_password,emp_address,emp_work) VALUES('{$_REQUEST['emp_name']}','{$_REQUEST['emp_email']}','{$_REQUEST['emp_mo_no']}','{$_REQUEST['emp_password']}','{$_REQUEST['emp_address']}','{$_REQUEST['emp_work']}')";
    if($conn->query($sql)===TRUE) {
        $status=true;
        $message='New record inserted successfully';
        $data=$sql;
    }else{
        $status=false;
        $message='data is not inserted properly';
        $data='';
    }
}
elseif($_REQUEST['condition']=='update' && isset($_REQUEST['id']) && isset($_REQUEST['emp_name']) && isset($_REQUEST['emp_email']) && isset($_REQUEST['emp_mo_no']) && isset($_REQUEST['emp_password']) && isset($_REQUEST['emp_address']) && isset($_REQUEST['emp_work']))
{
    $sql = "UPDATE emp SET emp_name='".$_REQUEST["emp_name"]."',emp_email='".$_REQUEST["emp_email"]."',emp_mo_no='".$_REQUEST["emp_mo_no"]."',emp_password='".$_REQUEST["emp_password"]."',emp_address='".$_REQUEST["emp_address"]."',emp_work='".$_REQUEST["emp_work"]."' WHERE emp_id=".$_REQUEST['id'];
    if ($conn->query($sql) === TRUE) {
        $status=true;
        $message='Data updated Succesfully';
        $data='';
    }else{
        $status=false;
        $message='Data Not Selected';
        $data='';
    }
}
elseif($_REQUEST['condition']=='delete' && isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $sql="DELETE FROM emp WHERE emp_id=".$id;
    $result= $conn->query($sql);
    if ($result==TRUE) {
        $status=true;
        $message='Data deleted Succesfully';
        $data='';
    }else{
        $status=false;
        $message='Data Not Selected';
        $data='';
    }
    
}

$conn->close();
$response= array("status"=>$status, "message"=>$message, "data"=> $data);
echo json_encode($response);
exit;
?>
