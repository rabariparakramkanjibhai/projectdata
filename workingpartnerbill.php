<?php
include "conn.php";
$status="";
$message="";
$data="";
if($_REQUEST['condition']=='insert' && isset($_REQUEST['wb1_am']) && isset($_REQUEST['wp_id']))
{   
    
   $sql = "INSERT INTO  workingpartnerbill(wb1_am,wp_id) VALUES('{$_REQUEST['wb1_am']}','{$_REQUEST['wp_id']}')";
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
    $sql = "SELECT wp.wp_id FROM `workingpartner` wp JOIN `workingpartnerbill` wpb ON wp.wp_id = wpb.wp_id  WHERE wb1_id=".$id;
   
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
elseif($_REQUEST['condition']=='get_all' && isset($_REQUEST['id']))
{
   
    $sql="select * from workingpartnerbill";
    $result=$conn->query($sql);
    $row=$result->fetch_all(MYSQLI_ASSOC);
    if($row!=""){
        $status=true;
        $message="data is selected successfully";
        $data=$row;
    }else{
        $status=false;
        $message="data is not selected";;
        $data='';
    }
}
elseif($_REQUEST['condition']=='update' && isset($_REQUEST['id']) && isset($_REQUEST['wb1_am']) && isset($_REQUEST['wp_id']))
{
    $sql="update workingpartnerbill set wb1_am='".$_REQUEST['wb1_am']."', wp_id='".$_REQUEST['wp_id']."'WHERE wb1_id=".$_REQUEST['id'];
    if ($conn->query($sql)===TRUE)
    {
        $status=true;
        $message="data is updated successfully";
        $data=$sql;
    }else{
        $status=false;
        $message="data is not updated successfully";
        $data='';
    }
}
$conn->close();
$response= array("status"=>$status, "message"=>$message, "data"=> $data);
echo json_encode($response);
exit;
?>