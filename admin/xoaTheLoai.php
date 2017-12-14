<?php
ob_start(); /* chuyển hướng không bị lỗi*/
session_start();/*khai báo session để tránh không đăng nhập vô admin*/
if( !isset($_SESSION["idUser"])){ /*isset là tồn tại để kt biến ss đã đăng nhập chưa còn thêm phải là admin ms vô*/
	header("location:../index.php"); /*nhảy về trang chủ*/
}else{
	if($_SESSION["idGroup"]!=1)
	header("location:../index.php");
}
require "../lib/dbCon.php";
require "../lib/Quantri.php";
?>

<?php
$idTL = $_GET["idTL"];
settype($idTL, "int");
$qr = "DELETE FROM theloai
       WHERE idTL='$idTL'";
mysql_query($qr);
header("location:listTheLoai.php");	   
?>