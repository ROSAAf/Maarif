<?php
    require "header.php";
?>
<section class="container p-2" style="direction:rtl;background-color:#F0F8FF;">
    <div class="row px-3">
        <h4 class="h4 text-center bg-info p-2">فورم درخواستی برای تبدیلی شاگردان </h4>
    </div>
    <div class="row text-info" id="tables">
        <!-- row for error and massages -->
    </div>
    <div class="row container text-center text-success">
    لطفا بعد از وارد کردن نمبر تذکره تان دکمه انتر را فشار دهید تا سیستم برسی نماید . آیا شما در سیستم ثبت استین با خیر اگر ثبت در سیستم بودید دکمه جدید برای تان ظاهر خواهد شد.
    </div>
    <div class="row p-3">
            <div class="col">
                <div class="col-sm pb-1">
                    <label>ازمکتب</label>
                </div>
                <div class="col-sm pb-1">
                    <select name="oldschool" id="oldschool" class="form-control-sm">
                            <option value="">---</option>
                    <?php
                        $row = mysqli_query($conn,"SELECT workplace FROM users where privilege='manager'");
                        if(mysqli_num_rows($row)>0){
                            while($arr = mysqli_fetch_assoc($row)){?>
                        <option><?php echo $arr["workplace"];?></option>
                    <?php }}else{ echo "<option>لیست موجود نیست</option>";}?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="col-sm pb-1">
                    <label>به مکتب</label>
                </div>
                <div class="col-sm pb-1">
                    <select  id="newschool" class="form-control-sm">
                        <option value="">---</option>
                        <?php
                            $row = mysqli_query($conn,"SELECT workplace FROM users where privilege='manager'");
                            if(mysqli_num_rows($row)>0){
                                while($arr = mysqli_fetch_assoc($row)){?>
                            <option><?php echo $arr["workplace"];?></option>
                        <?php }}else{ echo "<option>لیست موجود نیست</option>";}?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="col-sm pb-1">
                    <label>سال شمولیت در مکتب</label>
                </div>
                <div class="col-sm pb-1">
                    <input type="number" name="startschool" id="startschool">
                </div>
            </div>
            <div class="col">
                <div class="col-sm pb-1">
                    <label>نمبر تذکره</label>
                </div>
                <div class="col-sm pb-1">
                    <input type="number" name="idnumber" id="idnumber">
                </div>
            </div>
            <div class="col">
                <div class="col-sm pb-1">
                    <label>صنف</label>
                </div>
                <div class="col-sm pb-1">
                    <input type="number" name="grade" id="grade">
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary px-5" id="submitbtn">ثبت</button>
            </div>
        </div>
</section>
<?php
    require "footer.php";
?>