<?php
include "conn.php";
$status='';
$message='';
$data='';

if($_REQUEST['condition']=='get' && isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM admin where ad_id=".$id;
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
    $sql = "SELECT * FROM admin";
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
elseif($_REQUEST['condition']=='insert' && isset($_REQUEST['ad_password']) && isset($_REQUEST['ad_email']))
{
    $sql = "INSERT INTO  admin(ad_password,ad_email) VALUES('{$_REQUEST['ad_password']}','{$_REQUEST['ad_email']}')";
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

elseif($_REQUEST['condition']=='update' && isset($_REQUEST['id']) && isset($_REQUEST['ad_password']) && isset($_REQUEST['ad_email']))
{
    $sql = "UPDATE  admin SET ad_password='".$_REQUEST["ad_password"]."',ad_email='".$_REQUEST["ad_email"]."'WHERE ad_id=".$_REQUEST['id'];
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
     $sql="DELETE FROM admin WHERE ad_id=".$id;
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

