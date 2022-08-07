<?php 
    include "header.php";
?>
<div class="container" style="direction:rtl;background-color:#F0F8FF;" id="content">
    <?php
         $result = mysqli_query($conn,"SELECT * FROM `news`ORDER by news_id DESC LIMIT 5;");
        while($arr = mysqli_fetch_assoc($result)){
    ?>
    <div class="p-3">
        <!-- title and menu and date of post  -->
        <div class="row mb-3" style="border-bottom:1px solid lightgray;border-top:1px solid lightgray;">
            <div class="col col-sm-10">
                <h4 class="text-end"><?php echo $arr["title"]; ?></h4>
            </div>
            <!-- show date  -->
            <div class="col col-sm-1 mt-3">
                <p class="text-center text-success"><?php echo $arr["date"]; ?></p>
            </div>
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
        <!-- content of news -->
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
</div>
<!-- a link showing previous postes  -->
<div class="container p-2" style="direction:rtl;text-align:center;cursor:pointer;">
    <span id="more" style="color:blue">پوست های قبلی...</span>
</div>
<!-- footer -->
<?php
    include "footer.php"; 
?>