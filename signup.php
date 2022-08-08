<?php
    require "header.php";
    if(isset($_SESSION["username"]) && isset($_SESSION["privilege"])){
        if($_SESSION["privilege"]=="officer"){
?>
<div class="d-flex" style="background-color:#F0F8FF;">
    <div class="mx-auto bg-light m-4 p-5 border" style="box-shadow:10px 10px 10px grey;">
        <div class="row p-2">
            <div class="h2" style="text-align:center;">ایجاد حساب</div>
        </div>
        <div class="row p-2 text-danger" style="direction:rtl;">
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]=="emptyuser"){
                        echo "اسم کاربر را وارد نماید";
                    }
                    elseif($_GET["error"]=="emptypassword"){
                        echo "رمز ورودی را وارد نماید";
                    }
                    elseif($_GET["error"]=="incurrectuser"){
                        echo "اسم کاربر  باید حروف دری  باشد";
                    }
                    elseif($_GET["error"]=="lenght"){
                        echo "اسم کاربر باید بیشتر از ۳ کرکتر باشد";
                    }
                    elseif($_GET["error"]=="weakpass"){
                        echo "رمز عبور باید پیچیده باشد(باید شامل اعداد٬سمبول٬حروف خورد و بزرک)";
                    }
                    elseif($_GET["error"]=="founduser"){
                        echo "کاربر مورد نظر در سیستم موجود است";
                    }
                    elseif($_GET["error"]=="notsubmit"){
                        echo "درخواست تان در سیستم ثبت نشد";
                    }
                    elseif($_GET["error"]=="emptytable"){
                        echo "صلاحیت کاربر را مشخص نماید";
                    }
                    elseif($_GET["error"]=="emptyschool"){
                        echo "لطفا نام مکتب را درج کنید";
                    }
                    elseif($_GET["error"]=="schoolnum"){
                        echo "نام مکتب شامل اعداد بود نمی تواند";
                    }
                    elseif($_GET["error"]=="notsubmitdata"){
                        echo "کاربر مورد نظر ثبت در سیستم نشد";
                    }
                }elseif(isset($_GET["success"])){
                    echo "<p class='text-success'>در سیستم ثبت شد</p>";
                }
                else{
                    echo "";
                }
            ?>
        </div>
        <form action="includes/signup.inc.php" method="post" class="d-flex flex-column pb-3" style="direction:rtl;">
           <div class="row">
                <div class="col">
                    <label >اسم کاربر </label>
                    <input type="text" name="username" class="form-control">
                </div>
           </div>
           <div class="row">
                <div class="col">
                    <label>رمز عبور</label>
                    <input type="password" name="pwd" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>صلاحیت</label>
                    <select name="privilege" class="form-control" id="privilege">
                        <option value="empty">---</option>
                        <option value="officer">آمر</option>
                        <option value="manager">مدیر</option>
                        <option value="teacher">استاد</option>
                    </select>
                </div>
            </div>
            <div class="row" id="schoolname">
                <div class="col">
                    <label>نام مکتب</label>
                    <input type="text" name="schoolname" class="form-control">
                </div>
            </div>
           <button type="submit" name="signup" class="btn pt-2 mt-3 btn-primary">ایجاد حساب</button>
        </form>
    </div>
</div>

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