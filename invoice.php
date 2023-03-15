<?php
include "conn.php";
$status="";
$message="";
$data="";
if($_REQUEST['condition']=='insert' && isset($_REQUEST['inv_no']) && isset($_REQUEST['su_id']))
{   
    
   $sql = "INSERT INTO  invoice(inv_no,su_id) VALUES('{$_REQUEST['inv_no']}','{$_REQUEST['su_id']}')";
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
    $sql = "SELECT s.su_id FROM `supplier` s JOIN `invoice` i ON s.su_id = i.su_id WHERE inv_id=".$id;
    
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
    $sql = "SELECT * FROM invoice";
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
elseif($_REQUEST['condition']==='update' && isset($_REQUEST['id']) && isset($_REQUEST['inv_no']) && isset($_REQUEST['su_id']))
{
 $sql="update  invoice set inv_no='".$_REQUEST['inv_no']."',su_id='".$_REQUEST['su_id']."'WHERE inv_id=".$_REQUEST['id'];
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
$conn->close();
$response= array("status"=>$status, "message"=>$message, "data"=> $data);
echo json_encode($response);
exit;
?>