<?php
include "conn.php";
$status="";
$message="";
$data="";
if($_REQUEST['condition']=='insert' && isset ($_REQUEST['o_qu']) && isset ($_REQUEST['cu_id']))
{
    $sql="INSERT INTO `order`(`o_qu`, `cu_id`) VALUES ('{$_REQUEST['o_qu']}','{$_REQUEST['cu_id']}')";
    if($conn->query($sql)===TRUE){
      
        $status=true;
        $message="data is inserted prperly";
        $data=$sql;
    }else{
        $status=false;
        $message="data is not inserted properly";
        $data="";
    }
}

elseif($_REQUEST['condition']=='get' && isset ($_REQUEST['id']))
{
    $id=$_REQUEST['id'];
    $sql="SELECT c.cu_id FROM `customberbill` c JOIN `order`o ON c.cu_id = o.cu_id WHERE b1_id=".$id;
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
    $sql="SELECT * FROM `order`";
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
elseif($_REQUEST['condition']=='update' && isset($_REQUEST['id']) && isset($_REQUEST['o_qu']) && isset($_REQUEST['cu_id']))
{
    
    $sql="UPDATE `order` SET o_qu='".$_REQUEST['o_qu']."',cu_id='".$_REQUEST['cu_id']."'WHERE o_id=".$_REQUEST['id'];

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
$response=array("status"=>$status,"message"=>$message,"data"=>$data);
echo json_encode($response);
exit;
?>