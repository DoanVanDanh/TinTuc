<?php
function TinMoiNhat_MotTin() {
	$qr = "
	SELECT * FROM tin
	ORDER BY idTin DESC
	LIMIT 0,1
	";
	return mysql_query($qr);
}

function TinMoiNhat_BonTin() {
	$qr = "
	SELECT * FROM tin
	ORDER BY idTin DESC
	LIMIT 1,4
	";
	return mysql_query($qr);
}
function TinXem_NhieuNhat() {
	$qr = "
	SELECT * FROM tin
	ORDER BY SoLanXem DESC
	LIMIT 0,6
	";
	return mysql_query($qr);
}
function TinMoiNhat_TheoLoaiTin_MotTin($idLT) {
	$qr = "
	SELECT * FROM tin
	WHERE idLT=$idLT
	ORDER BY idTin DESC
	LIMIT 0,1
	";
	return mysql_query($qr);
}
function TinMoiNhat_TheoLoaiTin_BonTin($idLT) {
	$qr = "
	SELECT * FROM tin
	WHERE idLT=$idLT
	ORDER BY idTin DESC
	LIMIT 1,6
	";
	return mysql_query($qr);
}
function TenLoaiTin($idLT) {
	$qr = "SELECT Ten
	FROM loaitin
	WHERE idLT=$idLT
	";
	$loaitin = mysql_query($qr);
	$row = mysql_fetch_array($loaitin);
	return $row['Ten'];
}
function QuangCao($vitri) {
	$qr = "
	SELECT * FROM quangcao
	WHERE vitri = $vitri
	";
	return mysql_query($qr);
}

// chè
//lấy thông tin các bài đăng mới nhất--> trang chủ : pages/trangchu.php
function TinMoi_BenTrai($idTL) {
	$qr = "
   		SELECT tin.* FROM tin, theloai, loaitin
         where theloai.idTL = loaitin.idTL
         and tin.idLT=loaitin.idLT
         and  theloai.idTL=$idTL
         ORDER BY idTin DESC
   		LIMIT 0,1
   		";
	return mysql_query($qr);
}

function TinMoi_BenPhai($idTL) {
	$qr = "
   		SELECT tin.* FROM tin, theloai, loaitin
         where theloai.idTL = loaitin.idTL
         and tin.idLT=loaitin.idLT
         and  theloai.idTL=$idTL
         ORDER BY idTin DESC
   		LIMIT 1,2
   		";
	return mysql_query($qr);
}
//bổ sung vào
function DanhSachTheLoai() {
	$qr = "select * from theloai";
	return mysql_query($qr);
}

function DanhSachLoaiTin_Theo_TheLoai($idTL) {
	$qr = "select * from loaitin
               where idTL=$idTL";
	return mysql_query($qr);
}
// ending: lấy thông tin các bài đăng mới nhất

//các tin tức  trong  cùng 1 loại tin (có phân trang)--> tintrongloai.php
function breadCrumb($idLT) {
	$qr = "
      SELECT TenTL, Ten
      FROM theloai, loaitin
      WHERE theloai.idTL = loaitin.idTL
      AND idLT = $idLT
      ";
	return mysql_query($qr);
}

function TinTheoLoaiTin_PhanTrang($idLT, $from, $sotintrang) {
	$qr = "
   		SELECT *FROM tin
   		WHERE idLT=$idLT
   		ORDER BY idTin DESC
   		LIMIT $from, $sotintrang
   		";
	return mysql_query($qr);
}

function TinTheoLoaiTin($idLT) {
	$qr = "
         SELECT * FROM tin
         WHERE idLT=$idLT
         ORDER BY idTin DESC
         ";
	return mysql_query($qr);
}
// ending các tin tức  trong  cùng 1 loại tin (có phân trang)--> tintrongloai.php

//chi tiết tin đang xem + hiển thị tin cùng loại+cập nhật số lần xem tin: chitiettin.php
function ChiTietTin($idTin) {
	$qr = "
   		SELECT * FROM tin
   		WHERE idTin=$idTin
   		";
	return mysql_query($qr);
}

function TinCungLoaiTin($idTin, $idLT) {
	$qr = "
   		SELECT * FROM tin
   		WHERE idTin <> $idLT
   		AND idLT = $idLT
   		ORDER BY RAND()
   		LIMIT 0,3
   		";
	return mysql_query($qr);
}
//bảo
function CapNhatSoLanXemTin($idTin) {
	$qr = "
               update tin
               set SoLanXem= SoLanXem +1
               where idTin=$idTin
            ";
	return mysql_query($qr);
}

// ending : chitiettin.php

//pages/timkiem.php
function TimKiem($tukhoa) {
	$qr = "
                select * from tin
                where TieuDe regexp '$tukhoa'
                order by idTin desc
            ";
	return mysql_query($qr);
}
//edning pages/timkiem.php

?>