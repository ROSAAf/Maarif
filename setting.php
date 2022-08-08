<?php
    require "header.php";
    require "includes/connection.php";   
    if(isset($_SESSION["username"])){
?>
<section class="container" style="background-color:#F0F8FF;">
    <!-- updating profile picutre -->
    <div id="profile">
        <div class="row p-2 ">
            <!-- image display -->
            <div class="col border" id="imageforchange">
                <div class="col-sm">
                <?php
                    if(isset($_SESSION["username"])){
                        $user = $_SESSION["username"];
                        $row = mysqli_query($conn,"SELECT * FROM users WHERE username= '$user';");      
                        while($arr = mysqli_fetch_assoc($row)){
                            $pic = $arr["photo"];
                            $newpic = explode("/",$pic);
                            $position = "images/".end($newpic);
                            echo "<img src='$position' id='newphoto' width='250'>";
                        }
                    }
                ?>
                </div>
            </div>
            <!-- the input section for update profle image -->
            <div class="col flex-grow-1">
                <div style="direction:rtl;" class="text-success p-5">
                    برای تبدیل نمودن عکس تان اول یک عکس را انتخاب کیند بعدا دکمه تغییر عکس را کیلیک کنید
                </div>
                <form action="includes/getpic.php?" method="post" enctype="multipart/form-data">
                    <div class="col-sm pb-1">
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="col-sm pb-1">
                        <input type="submit" name="pic" value="تغییر عکس" class="form-control btn-primary">
                        <div id="showmessage" class="col-sm mt-2">
                        <?php
                            if(isset($_GET["error"])){
                                echo "<p style='color:red;text-align:center;'>هیچ عکس انتخاب نکردین</p>";
                            }
                        ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- updating password -->
    <div id="password" style="direction:rtl;">
        <div class="row">
            <div class="col text-success">
                    <p>برای تغییر دادن رمز عبور اول رمز فعلی تان را وارد نماید و اینتر نماید</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1">
                    <label>پسورد فعلی</label>
                </div>
                <div class="col-sm pb-1">
                    <input type="password" name="oldpassword" id="oldpassword">
                </div>
            </div>
            <div class="col" id="answer">
            </div>
            <div class="col" id="new-pass">
                <div class="col-sm pb-1">
                    <label>پسورد جدبد</label>
                </div>
                <div class="col-sm pb-1">
                    <input type="password" name="newpassword" id="newpassword">
                </div>
            </div>
            <div class="col" id="re-pass">
                <div class="col-sm pb-1">
                    <label>تکرار پسورد</label>
                </div>
                <div class="col-sm pb-1">
                    <input type="password" name="re-password" id="re-password">
                </div>
            </div>
        </div>
        <div class="row p-3">
            <div class="col">
                    <div class="col-sm pb-1">
                        <button class="btn border p-2 btn-primary" id="changepassword">تغییر دادن رمز عبور</button>
                    </div>
                    <div class="col-sm pb-1" id="resultshow">
                    </div>
            </div>
        </div>
    </div>
</section>
<?php
    }// if any user logined into the system this page will appear;
    //else Main page will be shown to users;
    else{
        header("location:index.php");
    }
    require "footer.php";
?>