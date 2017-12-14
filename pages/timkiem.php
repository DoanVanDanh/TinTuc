<?php

$tukhoa=$_GET["q"];
$tin=TimKiem($tukhoa);
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