<?php
include "conn.php";
$status="";
$message="";
$data="";

// print_r($_REQUEST);exit;
if($_REQUEST['condition']==='insert' && isset($_REQUEST['su_name']) && isset($_REQUEST['su_email'])  && isset($_REQUEST['su_mo_no'])  && isset($_REQUEST['sup_name'])  && isset($_REQUEST['sup_qu']))
{
    $sql="insert into supplier(su_name,su_email,su_mo_no,sup_name,sup_qu) values ('{$_REQUEST['su_name']}','{$_REQUEST['su_email']}','{$_REQUEST['su_mo_no']}','{$_REQUEST['sup_name']}','{$_REQUEST['sup_qu']}')";
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
elseif ($_REQUEST['condition']==='get' && isset($_REQUEST['id']))
{
   $id=$_REQUEST['id'];
   $sql="SELECT * FROM supplier WHERE su_id=".$id;
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
elseif ($_REQUEST['condition']==='get_all' && isset($_REQUEST['id']))
{
   
   $sql="SELECT * FROM supplier";
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
elseif ($_REQUEST['condition']=='update' && isset($_REQUEST['id']) && isset($_REQUEST['su_name']) && isset($_REQUEST['su_email'])  && isset($_REQUEST['su_mo_no'])   && isset($_REQUEST['sup_name'])   && isset($_REQUEST['sup_qu']) )
{
    $sql="UPDATE supplier SET su_name='".$_REQUEST['su_name']."',su_email='".$_REQUEST['su_email']."',su_mo_no='".$_REQUEST['su_mo_no']."',sup_name='".$_REQUEST['sup_name']."',sup_qu='".$_REQUEST['sup_qu']."'WHERE su_id=".$_REQUEST['id'];
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
    $sql="DELETE FROM supplier WHERE su_id=".$id;
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
$response=array("status"=>$status,"message"=>$message,"data"=>$data);
echo json_encode($response);
exit;
?>
