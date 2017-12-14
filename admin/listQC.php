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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="layout.css"/>
</head>

<body>
<table width="1000" border="1" align="center">
  <tr>
    <td id="hangTieuDe">TRANG QUẢN TRỊ
    <div style="width:200px; float:right">
       <div>Chào anh,chị <?php echo $_SESSION["HoTen"] ?></div>  
    </div>
    </td>
  </tr>
  <tr>
    <td id="hang2"><?php require "menu.php";  ?></td>
  </tr>
  <tr>
    <td><table width="700" border="1">
      <tr>
        <td colspan="7"><h1>DANH SÁCH QUẢNG CÁO</h1></td>
        </tr>
      <tr>
        <td>idQC</td>
        <td>vitri</td>
        <td>MoTa</td>
        <td>Url</td>
        <td>urlHinh</td>
        <td>SoLanClick</td>
        <td><a href="themQC.php">Thêm</a><br /></td>
      </tr>
       <?php
      $qc = DanhSachQC();
	  while($row_qc = mysql_fetch_array($qc)){
		  ob_start();
	  ?>
      
      <tr>
        <td>{idQC}</td>
        <td>{vitri}</td>
        <td>{MoTa}</td>
        <td>{url}</td>
        <td><img src="../upload/quangcao/{urlHinh}" width="150" height="60" /></td>
        <td>{SoLanClick}</td>
        <td><a href="suaQC.php?idQC={idQC}">Sửa</a> - <a onclick="return confirm('Bạn có chắc là mún xóa không?')" href="xoaQC.php?idQC={idQC}">Xóa</a></td>
      </tr>
      
      <?php
	  		$s = ob_get_clean(); // chức năng bao gọn html lại thành 1 biến nào đó
			$s = str_replace("{idQC}", $row_qc["idQC"], $s);
			$s = str_replace("{vitri}", $row_qc["vitri"], $s);
			$s = str_replace("{MoTa}", $row_qc["MoTa"], $s);
			$s = str_replace("{url}", $row_qc["Url"], $s);
			$s = str_replace("{urlHinh}", $row_qc["urlHinh"], $s);
			$s = str_replace("{SoLanClick}", $row_qc["SoLanClick"], $s);
			
			echo $s;
	  }
	  ?>
    </table></td>
  </tr>
</table>
</body>
</html>