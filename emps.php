<?php
include "conn.php";
$status="";
$message="";
$data="";
if($_REQUEST['condition']=='insert' && isset($_REQUEST['a_id']) && isset($_REQUEST['emp_id']))
{
    $sql="INSERT INTO emps(a_id,emp_id) values ('{$_REQUEST['a_id']}','{$_REQUEST['emp_id']}')";
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
    $sql="SELECT e.emp_id FROM `emp` e JOIN `emps` es ON e.emp_id = es.emp_id  WHERE sa_id=".$id;
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    if($row!=""){
         $status=true;
        $message='New record selected successfully';
        $data=$row;
    }else{
        $status=false;
        $message='data is not selected properly';
        $data='';
    }
}
elseif($_REQUEST['condition']=='get_all')
{
    $sql="SELECT * FROM emps";
    $result=$conn->query($sql);
    $row=$result->fetch_all(MYSQLI_ASSOC);
    if($row!=""){
        $status="ture";
        $message="all data is selected successfully";
        $data=$row;
    }else{
        $status=false;
        $messahe="data is not selected successfully";
        $data="";   
    }
}
elseif($_REQUEST['condition']=='update' && isset($_REQUEST['id']) && isset($_REQUEST['a_id']) && isset($_REQUEST['emp_id']))
{
    
    $sql="UPDATE emps SET a_id='".$_REQUEST['a_id']."',emp_id='".$_REQUEST['emp_id']."'WHERE sa_id=".$_REQUEST['id'];

    if($conn->query($sql)===TRUE){
        $status=true;
        $message="data is updated successfully";
        $data=$sql;
    }else{
        $status=false;
        $message="data is not updated successfully";
        $data="";
    }
}
elseif($_REQUEST['condition']=='delete' && isset($_REQUEST['id']))
{
   
    $id=$_REQUEST['id'];
    $sql="DELETE FROM emps WHERE sa_id=".$id;
    $result=$conn->query($sql);
    if($result==TRUE){
        $status=true;
        $message="data is deleted successfully";
        $data="";
    }else{
        $status=false;
        $message="data is not deleted successfully";
        $data="";
    }
}
$conn->close();
$response= array("status"=>$status, "message"=>$message, "data"=> $data);
echo json_encode($response);
exit;
?>
