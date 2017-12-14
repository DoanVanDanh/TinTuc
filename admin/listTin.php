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
    <td><table width="800" border="1">
      <tr>
        <td colspan="5"><h1>DANH DÁCH TIN</h1></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><a href="themTin.php">Thêm</a><br /></td>
        </tr>
        <?php
		$tin = DanhSachTin();
		while($row_tin = mysql_fetch_array($tin)){
			ob_start();
		?>
      <tr>
        <td><p>idTin:{idTin}</p>
          <p>{Ngay}</p></td>
        <td><p><a href="suaTin.php?idTin={idTin}">{TieuDe}</a></p>
          <p><img style="float:left; margin-right:5px"src="../upload/tintuc/{urlHinh}" width="152" height="96" /> {TomTat}</p></td>
        <td>{TenTL}<br />
          - <br />
          {Ten}
          </td>
        <td>Số lần xem: {SoLanXem} <br />
          
          {TinNoiBat} - {AnHien}
          
          </td>
        <td><p><a href="suaTin.php?idTin={idTin}">Sửa</a> -</p>
          <p><a onclick="return confirm('Bạn có chắc là mún xóa không?')" href="xoaTin.php?idTin={idTin}">Xóa</a></p></td>
        </tr>
        <?php
			$s = ob_get_clean();
			$s = str_replace("{idTin}", $row_tin["idTin"], $s);
			$s = str_replace("{Ngay}", $row_tin["Ngay"], $s);
			$s = str_replace("{TieuDe}", $row_tin["TieuDe"], $s);
			$s = str_replace("{TomTat}", $row_tin["TomTat"], $s);
			$s = str_replace("{urlHinh}", $row_tin["urlHinh"], $s);
			$s = str_replace("{TenTL}", $row_tin["TenTL"], $s);
			$s = str_replace("{Ten}", $row_tin["Ten"], $s);
			$s = str_replace("{SoLanXem}", $row_tin["SoLanXem"], $s);
			$s = str_replace("{TinNoiBat}", $row_tin["TinNoiBat"], $s);
			$s = str_replace("{AnHien}", $row_tin["AnHien"], $s);
			
			
			echo $s;
		
        }
		?>
    </table></td>
  </tr>
</table>
</body>
</html>