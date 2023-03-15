<?php
include "conn.php";
$status="";
$message="";
$data="";
if($_REQUEST['condition']=='insert' && isset($_REQUEST['b1_am']) && isset($_REQUEST['cu_id']))
{
    $sql="insert into customerbill(b1_am,cu_id) values ('{$_REQUEST['b1_am']}','{$_REQUEST['cu_id']}')";
    if($conn->query($sql)===TRUE){
        $status=true;
        $message="data inserted successfully";
        $data=$sql;
    }else{
        $status=false;
        $message="data is not inserted properly";
        $data="";
    }
}
elseif ($_REQUEST['condition']=='get' && isset($_REQUEST['id']))
{
   $id=$_REQUEST['id'];
   $sql="SELECT * FROM customerbill WHERE b1_id=".$id;
   $result=$conn->query($sql);
   $row=$result->fetch_assoc();
   if($row!=""){
    $status=true;
    $message="data is scelected successfully";
    $data=$row;
   }else{
    $status=false;
    $message="data is not selected";
    $data="";
   }
}
elseif ($_REQUEST['condition']=='get_all' && isset($_REQUEST['id']))
{
   
   $sql="SELECT * FROM customerbill";
   $result=$conn->query($sql);
   $row=$result->fetch_all(MYSQLI_ASSOC);
   if($row!=""){
    $status=true;
    $message="data is scelected successfully";
    $data=$row;
   }else{
    $status=false;
    $message="data is not selected";
    $data="";
   }
}
elseif($_REQUEST['condition']=='update' && isset($_REQUEST['id']) && isset($_REQUEST['b1_am']) && isset($_REQUEST['cu_id']))
{
    $sql="UPDATE customerbill SET b1_am='".$_REQUEST['b1_am']."',cu_id='".$_REQUEST['cu_id']."'WHERE b1_id=".$_REQUEST['id'];
    if($conn->query($sql)===TRUE){
        $status=true;
        $message="data is updated successfully";
        $data="";
    }else{
        $status=false;
        $message="data is not selected successfully";
        $data="";
    }
}
elseif($_REQUEST['condition']=='delete' && isset($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $sql="DELETE FROM customerbill WHERE b1_id=".$id;
    $result=$conn->query($sql);
    if($result==TRUE){
        $status=true;
        $message="data is deleted successfully";
        $data="";
    }else{
        $status=false;
        $message="data is not deleted properly";
        $data="";
    }

}
$conn->close();
$response= array("status"=>$status, "message"=>$message, "data"=> $data);
echo json_encode($response);
exit;
?>
