<?php
include "conn.php";
$status="";
$message="";
$data="";
if($_REQUEST['condition']=='insert' && isset($_REQUEST['wp_name']) && isset($_REQUEST['wp_mo_no']) && isset($_REQUEST['wp_email']))
{   
    
   $sql = "INSERT INTO  workingpartner(wp_name,wp_mo_no,wp_email) VALUES('{$_REQUEST['wp_name']}','{$_REQUEST['wp_mo_no']}','{$_REQUEST['wp_email']}')";
    if($conn->query($sql)===TRUE) 
    
    {
        
        $status=true;
        $message='New record inserted successfully';
        $data=$sql;
    }else{
        $status=false;
        $message='data is not inserted properly';
        $data='';
    }
}
elseif($_REQUEST['condition']=='get' && isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $sql = "SELECT * FROM workingpartner where wp_id=".$id;
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
    $sql = "SELECT * FROM workingpartner";
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
elseif($_REQUEST['condition']=='update' && isset($_REQUEST['id']) && isset($_REQUEST['wp_name']) && isset($_REQUEST['wp_mo_no']) && isset($_REQUEST['wp_email']))
{
 $sql="update  workingpartner SET wp_name='".$_REQUEST['wp_name']."',wp_mo_no='".$_REQUEST['wp_mo_no']."',wp_email='".$_REQUEST['wp_email']."'WHERE wp_id=".$_REQUEST['id'];
 if($conn->query($sql)===TRUE) {
    $status=true;
    $message='Data updated successfully';
    $data=$sql;
 }else{
    $status=false;
    $message='Data is not updated successfully';
    $data='';
 }   
}
elseif($_REQUEST['condition']=='delete' && isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $sql="DELETE FROM workingpartner WHERE wp_id=".$id;
    $result=$conn->query($sql);
    if ($result==TRUE){
        $status=true;
        $message="Data is deleted successfully";
        $data="";
    }else{
        $status=false;
        $message="Data is not deleted successfully";
        $data="";
    }
}
$conn->close();
$response= array("status"=>$status, "message"=>$message, "data"=> $data);
echo json_encode($response);
exit;
?>
