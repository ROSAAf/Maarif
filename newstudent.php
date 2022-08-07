<?php
    require "header.php";
    require "includes/connection.php";
?>
<section class="container p-2" style="direction:rtl;background-color:#F0F8FF;">
    <div class="row px-3">
        <h4 class="h4 text-center bg-info p-2">فورم درخواستی برای جذب شاگردان جدید</h4>
    </div>
    <form action="includes/newstudent2.php" method="post"  enctype="multipart/form-data">
        <div class="row p-3">
            <div class="col">
                <div class="col-sm pb-1"><label>اسم مکتب</label></div>
                <div class="col-sm pb-1">
                    <select id="schoollist" name="schoollist">
                        <option value="">--انتخاب کنید--</option>
                    <?php
                        $row = mysqli_query($conn,"SELECT workplace FROM users where privilege='manager'");
                        if(mysqli_num_rows($row)>0){
                            while($arr = mysqli_fetch_assoc($row)){?>
                        <option><?php echo $arr["workplace"];?></option>
                        <?php }}else{ echo "<option>لیست موجود نیست</option>";}?>
                    </select>
                </div>
            </div>
            <div class="col text-primary" id="tables"></div>
        </div>
        <div class="row p-3 form" >
            <div class="col">
                <div class="col-sm pb-1"><label> اسم</label></div>
                <div class="col-sm pb-1"><input type="text" name="name"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>اسم پدر</label></div>
                <div class="col-sm pb-1"><input type="text" name="fathername"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>اسم پدر کلان</label></div>
                <div class="col-sm pb-1"><input type="text" name="grandfather"></div>
            </div>
        </div>  
        <div class="row p-3 form" >
            <div class="col">
                <div class="col-sm pb-1"><label>تاریخ تولد</label></div>
                <div class="col-sm pb-1"><input type="date" name="dofb"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>نمبر تذکره</label></div>
                <div class="col-sm pb-1"><input type="number" name="nid"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>عکس</label></div>
                <div class="col-sm pb-1"><input type="file" name="image"></div>
            </div>
        </div>
        <div class="row form">
            <div class="col">
                <button type="submit" class="btn btn-primary px-5" name="submit">ثبت</button>
            </div>
            <div class="col text-info">
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]=="nameinvalid"){
                            echo "<p style='color:red;'>اسم و اسم پدر و پدرکلان فقط با حروف دری قبل تایید است</p>";
                        }
                        elseif($_GET["error"]=="fnameinvalid"){
                            echo "<p style='color:red;'>اسم و اسم پدر و پدرکلان فقط با حروف دری قبل تایید است</p>";
                        }
                        elseif($_GET["error"]=="gfnameinvalid"){
                            echo "<p style='color:red;'>اسم و اسم پدر و پدرکلان فقط با حروف دری قبل تایید است</p>";
                        }
                        elseif($_GET["error"]=="nidinvalid"){
                            echo "<p style='color:red;'>نمبر تذکره تان درست نیست .لطفا با اعداد انگلیسی بنویسید</p>";
                        }
                        elseif($_GET["error"]=="dofbinvalid"){
                            echo "<p style='color:red;'>تاریخ تولد درست را وارد نماید</p>";
                        }
                        elseif($_GET["error"]=="bigsize"){
                            echo "<p style='color:red;'>اندازه عکس باید کمتر از ۵ ام بی باشد</p>";
                        }
                        elseif($_GET["error"]=="notsubmit"){
                            echo "<p style='color:red;'>ثبت نشد دوباره کوشش کنید</p>";
                        }
                        elseif($_GET["error"]=="connectiondown"){
                            echo "<p style='color:red;'>در شبکه وصل نیستید</p>";
                        }
                    }elseif(isset($_GET["success"])) {
                        echo "درخواست تان موفقانه ثبت شد";
                    }
                ?>
            </div>
        </div>
    </form>
</section>
<?php
    require "footer.php";
?>