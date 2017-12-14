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
$idQC = $_GET["idQC"]; settype($idQC, "int");
$row_qc = ChiTietQC($idQC);
?>

<?php
if( isset($_POST["btnSua"]) ){
	$vitri = $_POST["vitri"] ; 
	$MoTa = $_POST["MoTa"];
	$Url = $_POST["Url"];
	$urlHinh = $_POST["urlHinh"];
	$SoLanClick = 0;
	 $qr = " 
	 		UPDATE quangcao SET
	        vitri = '$vitri',
			MoTa = '$MoTa',
			Url = '$Url',
			urlHinh = '$urlHinh',
			SoLanClick = '$SoLanClick'
			WHERE idQC='$idQC'
			";
	mysql_query($qr);
	header("location:listQC.php");		
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="layout.css"/>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>


<script type="text/javascript">
function BrowseServer( startupPath, functionData ){
	var finder = new CKFinder();
	finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
	finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
	finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
	finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
	//finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
	finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}
function ShowThumbnails( fileUrl, data ){	
	var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
	document.getElementById( 'thumbnails' ).innerHTML +=
	'<div class="thumb">' +
	'<img src="' + fileUrl + '" />' +
	'<div class="caption">' +
	'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
	'</div>' +
	'</div>';
	document.getElementById( 'preview' ).style.display = "";
	return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
}
</script>

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
    <td><form id="form1" name="form1" method="post" action="">
      <table width="700" border="1">
        <tr>
          <td colspan="2">SỬA QUẢNG CÁO</td>
          </tr>
        <tr>
          <td>vitri</td>
          <td><label for="vitri"></label>
            <label for="vitri2"></label>
            <input value="<?php echo $row_qc["vitri"] ?>" type="text" name="vitri" id="vitri2" />
          </td>
        </tr>
        <tr>
          <td>MoTa</td>
          <td><label for="MoTa"></label>
            <input value="<?php echo $row_qc["MoTa"] ?>" type="text" name="MoTa" id="MoTa" /></td>
        </tr>
        <tr>
          <td>Url</td>
          <td><label for="Url"></label>
            <input value="<?php echo $row_qc["Url"] ?>" type="text" name="Url" id="Url" /></td>
        </tr>
        <tr>
          <td>urlHinh</td>
          <td><label for="urlHinh"></label>
            <input  value="<?php echo $row_qc["urlHinh"] ?>" type="text" name="urlHinh" id="urlHinh" />
            <input onclick="BrowseServer('Images:/','urlHinh')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn Hình" /></td>
        </tr>
        <tr>
          <td>SoLanClick</td>
          <td><label for="SoLanClick"></label>
            <input value="<?php echo $row_qc["SoLanClick"] ?>" type="text" name="SoLanClick" id="SoLanClick" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="btnSua" id="btnSua" value="Sửa" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>