<?php 
require "header.php";
if(isset($_SESSION["username"])&& isset($_SESSION["privilege"])){
    if($_SESSION["privilege"]=="manager"){
        // if user login as school users or manager the can see this page others cannot access this page
?>
<section class="container" style="direction:rtl;background-color:#F0F8FF;">
    <div class="display-6 text-center p-4">ارسال نمرات</div>
    <div class="row p-3  text-success d-flex justify-content-center border">
        برای ارسال نمرات سه ساله شاگردان فقط سال فراغت را در فلید زیر درج کرد و دکمه ارسال را فشار دهید.
    </div>
    <div class="row p-2" >
        <div class="col">
            <div class="col-sm pb-1">
                <label> سال فراغت</label>
            </div>
            <div class="col-sm pb-1">
                <input type="number" id="finalyear" class="form-control">
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col">
            <button class="btn btn-primary" id="sendscores">ارسال</button>
        </div>
    </div>
</section>
<?php
         }
        }else{
            header("location:../index.php");
        }
    require "footer.php";
?>