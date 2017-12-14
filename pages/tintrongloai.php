<?php

$idLT=$_GET["idLT"];
settype($idLT,"int");
?>
<?php

$bc=breadCrumb($idLT);
$row_bc=mysql_fetch_array($bc);



?>

<div>
Trang chủ >><?php echo $row_bc["TenTL"] ?> >> <?php echo $row_bc["Ten"] ?>




</div>


<?php

$sotin1trang= 4;
if(isset($_GET["trang"])){
    $trang=$_GET["trang"];
    settype($trang,"int");
}else {
    $trang=1;
}
$from=($trang-1) * $sotin1trang;


$tin=TinTheoLoaiTin_PhanTrang($idLT,$from,$sotin1trang);
while($row_Tin=mysql_fetch_array($tin)){

?>
<div class="box-cat">
	<div class="cat1">
    	
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idLT=<?php echo $row_Tin['idLT']
                ?>&idTin=<?php echo $row_Tin['idTin']
                ?>"><?php echo $row_Tin['TieuDe']
                ?> </a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_Tin['urlHinh']
                ?>" align="left" />
                    <div class="des"> <?php echo $row_Tin['TomTat']
                ?> </div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            
        </div>
    </div>
</div>
<div class="clear"></div>
<?php
}

?>  

<hr/>
<?php

$t=TinTheoLoaiTin($idLT);
 $tongsotin=mysql_num_rows($t);
  $tongsotrang=ceil($tongsotin/$sotin1trang);
 for($i=1;$i<=$tongsotrang;$i++)
 {





?>
<a href="index.php?p=tintrongloai&idLT=<?php  echo $idLT ?>&trang=<?php  echo $i ?>"><?php  echo $i ?></a>
<?php
 }
?>



