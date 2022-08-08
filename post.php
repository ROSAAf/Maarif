<?php 
    require "header.php";
    if(isset($_SESSION["username"]) && isset($_SESSION["privilege"])){
        if($_SESSION["privilege"]=="officer"){
?>
<section class="container p-3" style="background-color:#F0F8FF;">
    <form action="includes/post.inc.php" method="post" style="direction:rtl;" enctype="multipart/form-data">
        <article class="row text-center">
            <!-- Title of the passage is going here -->
            <div class="row pb-3">
                <div class="col">
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"]=="empty"){
                                echo "<p class='text-danger'>بخش های ضروری زا پر کنید</p>";
                            }
                            elseif($_GET["error"]=="lesslen"){
                                echo "<p class='text-danger'>متن مورد نظر از حد مجاز کمتر است</p>";
                            }elseif($_GET["error"]=="failedTosubmit"){
                                echo "<p class='text-danger'>مشکل اتصال به سرور </p>";
                            }else{
                                echo"";
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col">
                    <label>عنوان پست</label>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            <!-- Row for adding phot about passages -->
            <div class="row pb-3">
                <div class="col">
                    <label>اضافه نمودن عکس</label>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col">
                    <input type="file" name="images" class="form-control">
                </div>
            </div>
            <!-- The content goes here -->
            <div class="row pb-3">
                <div class="col">
                    <label class="mb-2">متن</label><br>
                </div>
            </div>
            <div class="row pb-3 text-center">
                <div class="col">
                    <textarea name="content" class="form-control" rows="10"></textarea>
                </div>
            </div>
            <!-- Our submit button to init post -->
            <div class="row pb-3">
                <div class="col">
                    <button type="submit" class="btn form-control text-white p-2 btn-primary" name="submit"><b>پست</b></button>
                </div>
            </div>
        </article>
    </form>
</section>
<?php
            // if privilege == ministry users the above codes will be access able otherwise not;
        }
        // if privilege != ministry the index page will show to users;
        else{
            header("location:index.php");
        }
    }// if privilege is not set the main page will be show to the users;
    else{
        header("location:index.php");
    }
    require "footer.php";
?>
