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
        <td colspan="6"><h1>DANH SÁCH THỂ LOẠI</h1></td>
        </tr>
      <tr>
        <td>idTL</td>
        <td>TenTL</td>
        <td>TenTL_KhongDau</td>
        <td>ThuTu</td>
        <td>AnHien</td>
        <td><a href="themTheLoai.php">Thêm</a></td>
      </tr>
      <?php
      $theloai = DanhSachTheLoai();
	  while($row_theloai = mysql_fetch_array($theloai)){
		  ob_start();
	  ?>
      <tr>
        <td>{idTL}</td>
        <td>{TenTL}</td>
        <td>{TenTL_KhongDau}</td>
        <td>{ThuTu}</td>
        <td>{AnHien}</td>
        <td><p><a href="suaTheLoai.php?idTL={idTL}">Sửa</a> - </p>
          <p><a onclick="return confirm('Bạn có chắc là mún xóa không?')" href="xoaTheLoai.php?idTL={idTL}">Xóa</a></p></td>
      </tr>
      <?php
	  		$s = ob_get_clean(); // chức năng bao gọn html lại thành 1 biến nào đó
			$s = str_replace("{idTL}", $row_theloai["idTL"], $s);
			$s = str_replace("{TenTL}", $row_theloai["TenTL"], $s);
			$s = str_replace("{TenTL_KhongDau}", $row_theloai["TenTL_KhongDau"], $s);
			$s = str_replace("{ThuTu}", $row_theloai["ThuTu"], $s);
			$s = str_replace("{AnHien}", $row_theloai["AnHien"], $s);
			
			echo $s;
	  }
	  ?>
    </table></td>
  </tr>
</table>
</body>
</html>