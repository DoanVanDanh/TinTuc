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
    <td><table width="600" border="1">
      <tr>
        <td colspan="7"><h1>DANH SÁCH LOẠI TIN</h1></td>
        </tr>
      <tr>
        <td>idLT</td>
        <td>Ten</td>
        <td>Ten_KhongDau</td>
        <td>ThuTu</td>
        <td>AnHien</td>
        <td>idTL</td>
        <td><a href="themLoaiTin.php">Thêm</a></td>
      </tr>
      <?php
      $loaitin = DanhSachLoaiTin();

	  while($row_loaitin = mysql_fetch_array($loaitin)){
		  ob_start();


      
 	  ?>
      <tr>
        <td>{idLT}</td>
        <td>{Ten}</td>
        <td>{Ten_KhongDau}</td>
        <td>{ThuTu}</td>
        <td>{AnHien}</td>
        <td>{TenTL}</td>
        <td><p><a href="suaLoaiTin.php?idLT={idLT}">Sửa</a>-</p>
          <p><a onclick="return confirm('Bạn có chắc là mún xóa không?')" href="xoaLoaiTin.php?idLT={idLT}">Xóa</a></p></td>
      </tr>
      <?php
	  		$s = ob_get_clean();
			$s = str_replace("{idLT}", $row_loaitin["idLT"], $s);
			$s = str_replace("{Ten}", $row_loaitin["Ten"], $s);
			$s = str_replace("{Ten_KhongDau}", $row_loaitin["Ten_KhongDau"], $s);
			$s = str_replace("{ThuTu}", $row_loaitin["ThuTu"], $s);
			$s = str_replace("{AnHien}", $row_loaitin["AnHien"], $s);
			$s = str_replace("{TenTL}", $row_loaitin["TenTL"], $s);
			echo $s;
	  }
	  ?>
    </table></td>
  </tr>
</table>
</body>
</html>