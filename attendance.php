<?php
include "conn.php";
$status="";
$message="";
$data="";
if($_REQUEST['condition']=='insert' && isset($_REQUEST['a_date']) && isset($_REQUEST['emp_id']))
{   
    
   $sql = "INSERT INTO  attendance(a_date,emp_id) VALUES('{$_REQUEST['a_date']}','{$_REQUEST['emp_id']}')";
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
    $sql = "SELECT e.emp_id FROM `emp` e JOIN `attendance` a where a_id=".$id;
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
    $sql = "SELECT * FROM attendance";
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
elseif($_REQUEST['condition']==='update' && isset($_REQUEST['id']) && isset($_REQUEST['a_date']) && isset($_REQUEST['emp_id']))
{
 $sql="update  attendance SET a_date='".$_REQUEST['a_date']."',emp_id='".$_REQUEST['emp_id']."'WHERE a_id=".$_REQUEST['id'];
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
    $sql="DELETE FROM attendance WHERE a_id=".$id;
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

