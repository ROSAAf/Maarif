<?php
    require "header.php";
?>
<div class="d-flex" style="background-color:#F0F8FF;">
    <div class="mx-auto bg-light m-5 p-5 border" style="box-shadow:10px 10px 10px grey;">
        <div class="row pb-3">
            <div class="h3" style="text-align:center;">فورم ورودی به سیستم</div>
        </div>
        <span class="d-flex justify-content-center" style="color:red;">
            <?php
            if(isset($_GET["error"])){
                if($_GET["error"]=="empty"){
                    echo "لطفا بخش های خالی را پر کنید";
                }
                elseif($_GET["error"]=="lenght"){
                    echo "اسم کاربر باید بیستر از ۳ عدد و پسورد بیشتر از ۸ باشد.";
                }
                elseif($_GET["error"]=="incorrectpass"){
                    echo "پسورد اشتباه است";
                }
                elseif($_GET["error"]=="notfound"){
                    echo "کاربر مورد نظر در سیستم موجود نیست";
                }
            }
            ?>
        </span>
        <form action="includes/login.inc.php" method="post" class="d-flex flex-column" style="direction:rtl;">
           <div class="row">
                <div class="col">
                    <label >اسم کاربر یا ایمل</label>
                    <input type="text" name="username" class="form-control">
                </div>
           </div>
           <div class="row">
                <div class="col">
                    <label>پسورد</label>
                    <input type="password" name="pwd" class="form-control">
                </div>
            </div>
           <button type="submit" name="login" class="btn pt-2 mt-3 btn-primary">ورود به سیستم</button>
        </form>
    </div>
</div>

<?php
require "footer.php";
?>