<?php
session_start();
$dname =htmlspecialchars($_POST["dname"]);
$dtelno =htmlspecialchars($_POST["dtelno"]);
$dmail =htmlspecialchars($_POST["dmail"]);
$reserveNumber =htmlspecialchars($_POST["reserveNumber"]);
$checkin =htmlspecialchars($_POST["checkin"]);
$message =htmlspecialchars($_POST["message"]);

$_SESSION['reserve']['dname']=$dname;
$_SESSION['reserve']['dtelno']=$dtelno;

$_SESSION['reserve']['dmail']=$dmail;
$_SESSION['reserve']['reserveNumber']=$reserveNumber;
$_SESSION['reserve']['checkin']=$checkin;
$_SESSION['reserve']['message']=$message;

$errMsg=array();
if(empty($dname)==true){
$errMsg['dname']="名前を未入力です";
}
if(empty($dtelno)==true){
$errMsg['dtelno']="電話番号を未入力です";
}
if(empty($checkin)==true){
$errMsg['checkin']="チェックイン予定時間を未入力です";
}
if(empty($reserveNumber)==true){
$errMsg['reserveNumber']="宿泊人数を未入力です";
}else{
if(is_numeric($reserveNumber)!=true){
$errMsg['reserveNumber']="宿泊人数は数値で指定して下さい";

}else{
if(($reserveNumber<=0)){
$errMsg['reserveNumber']="宿泊人数は1名以上を指定して下さい";
}
}
}

if(count($errMsg)==0){
header("location:./reserveConfirm.php");
}else{
$_SESSION['errMsg']=$errMsg;
header("location:./reserveDetail.php?rno="
.$_SESSION['reserve']['roomno']);
}
exit();

?>