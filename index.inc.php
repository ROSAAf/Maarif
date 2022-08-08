<?php
    require "includes/connection.php";
    $postnewcount = $_POST["postNewcount"];
    $result = mysqli_query($conn,"SELECT * FROM `news`ORDER by news_id DESC LIMIT $postnewcount;");
    while($arr = mysqli_fetch_assoc($result)){
?>
<div class="p-3">
    <div class="row mb-3" style="border-bottom:1px solid lightgray;border-top:1px solid lightgray;">
        <div class="col col-sm-11">
            <h4 class="text-end"><?php echo $arr["title"]; ?></h4>
        </div>
        <div class="col col-sm-1">
        <?php
            if(isset($_SESSION["privilege"])){
                if($_SESSION["privilege"]=="officer"){
                    $idnumber = $arr["news_id"];
                    echo '
                    <div class="col col-sm-1">    
                        <a href="includes/delete.inc.php?id='.$idnumber.'">
                            <i class="bi bi-trash3 text-black float-start" style="font-size:36px;"></i>
                        </a>
                    </div>
                    ';
                }
            }
            ?>    
        </div>
    </div>
    <div class="d-flex flex-column flex-fill">
            <?php 
                 $imagepath = $arr["image"];
                 if($imagepath == null){
                     echo "";
                 }else{
                    $spilt = explode("/",$imagepath);
                     $pic = "images/".end($spilt); 
                     echo '<div class="mx-auto"><img src="'.$pic.'" class="img img-responsive" height=200></div>';
                 }
            ?>
        <div class="d-flex text-end px-5">
            <?php
                echo $arr["content"];
            ?>
        </div>
    </div>
</div>
<?php } ?>