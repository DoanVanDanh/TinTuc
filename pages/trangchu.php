<?php

    $theloai=DanhSachTheLoai();
    while($row_theloai=mysql_fetch_array($theloai)){
        $idTL=$row_theloai['idTL'];


?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#"><?php echo $row_theloai['TenTL']?></a>
        </div>
        <div class="child-cat">
        <?php
         $loaitin=DanhSachLoaiTin_Theo_TheLoai($idTL);
         while($row_loaitin=mysql_fetch_array($loaitin)){
        
        ?>
        	<a href="index.php?p=tintrongloai&idLT=<?php echo $row_loaitin['idLT']
                ?>"><?php echo $row_loaitin['Ten']?></a>
            <?php
            
         }
            ?>
         
        </div>
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col1">
            	<div class="news">
                <?php
                 
                    $tintrai=TinMoi_BenTrai($idTL);
                    $row_tintrai=mysql_fetch_array( $tintrai);
                
        
                
                ?>


                    <h3 class="title" ><a href="index.php?p=tintrongloai&idLT=<?php echo $row_tintrai['idLT']?>"><?php echo $row_tintrai['TieuDe']?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_tintrai['urlHinh']?>" align="left" />
                    <div class="des"><?php echo $row_tintrai['TomTat']?> </div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            <div class="col2">
            <?php
            $tinphai=TinMoi_BenPhai($idTL);
            while($row_tinphai=mysql_fetch_array($tinphai)){
            
            ?>
             <p class="tlq"><a href="index.php?p=tintrongloai&idLT=<?php echo $row_tinphai['idLT']?>"> <?php echo $row_tinphai['TieuDe']?> </a>
                </a></p>
           <?php
            }
           
           ?>
            </div>    
        </div>
    </div>
</div>
<div class="clear"></div>
<?php
    }
?>




