<?php
// $a = 1;
function ChiTietTin($idTin) {
	$qr = "SELECT * FROM tin
	       WHERE idTin = '$idTin' ";
	$Tin = mysql_query($qr);
	return mysql_fetch_array($Tin);

}
// Quan li TheLoai
function DanhSachTheLoai() {
	$qr = "SELECT * FROM theloai
	       ORDER BY idTL DESC ";
	return mysql_query($qr);
}
function ChiTietTheLoai($idTL) {
	$qr = "SELECT * FROM theloai
	       WHERE idTL='$idTL' ";
	$row = mysql_query($qr);
	return mysql_fetch_array($row);

}

//Quan li LoaiTin
function DanhSachLoaiTin() {
	$qr = "select DISTINCT loaitin.idLT,loaitin.Ten,loaitin.Ten_KhongDau,loaitin.ThuTu,loaitin.AnHien,theloai.TenTL from loaitin, theloai where loaitin.idTL=theloai.idTL

			order by idLT DESC ";
	return mysql_query($qr);
}
function ChiTietLoaiTin($idLT) {
	$qr = "SELECT * FROM loaitin
	       WHERE idLT = '$idLT' ";
	$loaitin = mysql_query($qr);
	return mysql_fetch_array($loaitin);

}
// Quản trị Tin
function DanhSachTin() {
	$qr = "SELECT tin.*, TenTL, Ten
			FROM tin, theloai, loaitin
			where theloai.idTL = loaitin.idTL
			and tin.idLT=loaitin.idLT
	       ORDER BY idTin DESC
		   limit 0,20 ";
	return mysql_query($qr);
}

// Quản trị quảng cáo
function DanhSachQC() {
	$qr = "SELECT * FROM quangcao
	       ORDER BY idQC DESC ";
	return mysql_query($qr);
}

function DanhSachvitri() {
	$qr = "SELECT distinct vitri FROM quangcao
	        ";
	return mysql_query($qr);
}

function ChiTietQC($idQC) {
	$qr = "SELECT * FROM quangcao
	       WHERE idQC='$idQC' ";
	$row = mysql_query($qr);
	return mysql_fetch_array($row);

}

function stripUnicode($str) {
	if (!$str) {
		return false;
	}

	$unicode = array(
		'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
		'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		'd' => 'đ',
		'D' => 'Đ',
		'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		'i' => 'í|ì|ỉ|ĩ|ị',
		'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
		'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		'y' => 'ý|ỳ|ỷ|Ỹ|ỵ',
		'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
	);
	foreach ($unicode as $khongdau => $codau) {
		$arr = explode("|", $codau);
		$str = str_replace($arr, $khongdau, $str);
	}
	return $str;
}
function changeTitle($str) {
	$str = trim($str);
	if ($str == "") {
		return "";
	}

	$str = str_replace('"', '', $str);
	$str = str_replace("'", '', $str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str, MB_CASE_TITLE, 'utf-8');
	$str = str_replace(' ', '-', $str);
	return $str;
}

?>