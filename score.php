<?php
    require "header.php";
    if(isset($_SESSION["username"])&& isset($_SESSION["privilege"])){
        if($_SESSION["privilege"]=="manager"){
            // if user login as school users or manager the can see this page others cannot access this page
        
?>
<section class="container-fluid" style="background-color:#F0F8FF;">
    <h6 class="h6 p-3 bg-dark mb-0 text-white" style="text-align:center;">درج نمرات شاگردان</h6>
    <!-- creating table for classes -->
    <div style="direction:rtl;background-color:lightblue;">
            <div class="row text-center text-success p-4">
                برای ایجاد جدول برای شاگردان جدید صنف (۰) انتخاب نماید و برای ایجاد جدول درج نمرات شاگردان صنف شاگردان را انتخاب نماید.
            </div>
        <div class="row p-2">
            <div class="col">
                <div class="col-sm pb-1">
                    <label>سال تعلیمی</label>
                </div>
                <div class="col-sm pb-1">
                    <input type="number" name="year" id="year">
                </div>
            </div>
            <div class="col">
                <div class="col-sm pb-1">
                    <label>صنف</label>
                </div>
                <div class="col-sm pb-1">
                    <select name="newclass" id="newclass">
                        <option></option>
                        <?php
                        require "includes/connection.php";
                        $rows = mysqli_query($conn,"SELECT * FROM tabledata;");
                        while($arr=mysqli_fetch_assoc($rows)){
                        ?>
                        <option> <?php echo $arr["class"];?></option>
                        <?php };?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="col-sm pb-1 p-3"></div>
                <div class="col-sm pb-1">
                    <button type="button" class="btn btn-primary" id="createTable">ایجاد جدول</button>
                </div>
            </div>
            <!-- div to show error massages -->
            <div class="col mx-5">
                <div class="col-sm pb-1" id="massage"></div>
            </div>
        </div>
    </div>
<?php
# Teacher part is not showing;
}elseif($_SESSION["privilege"]=="teacher"){
?>
<!--###########################33 selecting tables#####################################################-->

<div style="direction:rtl;background-color:lightblue;">
    <div class="row p-2">
            <!-- this column for selecting tables for database -->
            <div class="col mx-3">
                <div class="col-sm pb-1">
                    <label>جدول نمرات</label>
                </div>
                <div class="col-sm pb-1">
                    <select name="newclass" id="newclass">
                    <?php
                        $dbname = $_SESSION["work"];
                        $db = mysqli_query($congeneral,"USE $dbname");
                        if($db){
                            $col = mysqli_query($congeneral,"SHOW TABLES;");
                            while($arr=mysqli_fetch_assoc($col)){
                                //////////##########################
                                $tables = "Tables_in_".$dbname;
                                $ro = $arr[$tables];
                                ///////////////#####################
                                echo "<option>$ro</option>";
                            }
                        }else{
                            # code...
                            echo "<option>---</option>";
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="col-sm pb-1">
                    <label>صنف</label>
                </div>
                <div class="col-sm pb-1">
                    <select  id="classval">
                    <?php
                        $rows = mysqli_query($conn,"SELECT * FROM tabledata;");
                        while($arr=mysqli_fetch_assoc($rows)){
                        ?>
                        <option> <?php if($arr["class"]==0){continue;}
                        else{echo $arr["class"];}?></option>
                        <?php };?>
                    </select>
                </div>
            </div>
            <!-- this table is for enter the id of student is exists -->
            <div class="col">
                <div class="col-sm pb-1">
                    <label>ای دی</label>
                </div>
                <div class="col-sm pb-1">
                    <input type="text" name="id" id="id">
                    <span id="result" class="mx-2"></span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- score for first grade upto 4  -->
    <section class="container p-2" style="background-color:#F0F8FF; direction:rtl;" id="4">
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1"><label>دری</label></div>
                <div class="col-sm pb-1"><input type="number" id="dari1"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>ریاضی</label></div>
                <div class="col-sm pb-1"><input type="number" id="math1"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>مهارت</label></div>
                <div class="col-sm pb-1"><input type="number" id="skills1"></div>
            </div>
            <div class="col text-success" id="message"></div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1"><label>قرآنکریم</label></div>
                <div class="col-sm pb-1"><input type="number" id="Quran1"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>علوم دینی</label></div>
                <div class="col-sm pb-1"><input type="number" id="islamic1"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>سپورت</label></div>
                <div class="col-sm pb-1"><input type="number" id="sport1"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-4"></div>
                <div class="col-sm pb-1"><button id="getnumbers1" class="btn btn-primary px-3">ثبت</button></div>
            </div>
        </div>
    </section>

    <!-- score form  grade 5 upto 7  -->
    <section class="container p-2" style="background-color:#F0F8FF; direction:rtl;" id="7">
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1"><label>قرآنکریم</label></div>
                <div class="col-sm pb-1"><input type="number" id="quran2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>علوم دینی</label></div>
                <div class="col-sm pb-1"><input type="number" id="islamic2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>دری</label></div>
                <div class="col-sm pb-1"><input type="number" id="dari2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>پشتو</label></div>
                <div class="col-sm pb-1"><input type="number" id="pashto2"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1"><label>عربی</label></div>
                <div class="col-sm pb-1"><input type="number" id="arabic2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>انگلیسی</label></div>
                <div class="col-sm pb-1"><input type="number" id="english2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>کیمیا</label></div>
                <div class="col-sm pb-1"><input type="number" id="chem2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>فیزیک</label></div>
                <div class="col-sm pb-1"><input type="number" id="py2"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1"><label>بیولوژی</label></div>
                <div class="col-sm pb-1"><input type="number" id="bio2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>ریاضی</label></div>
                <div class="col-sm pb-1"><input type="number" id="math2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>تاریخ</label></div>
                <div class="col-sm pb-1"><input type="number" id="history2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>جغرافیه</label></div>
                <div class="col-sm pb-1"><input type="number" id="geo2"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1"><label>تعلیمات مدنی</label></div>
                <div class="col-sm pb-1"><input type="number" id="civil2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>حرفه</label></div>
                <div class="col-sm pb-1"><input type="number" id="skill2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>مضامین انتخابی</label></div>
                <div class="col-sm pb-1"><input type="number" id="selective2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>هنر</label></div>
                <div class="col-sm pb-1"><input type="number" id="art2"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1"><label>سپورت</lable></div>
                <div class="col-sm pb-1"><input type="number" id="sport2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>تهذیب</lable></div>
                <div class="col-sm pb-1"><input type="number" id="reform2"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-4"></div>
                <div class="col-sm pb-1"><button class="btn btn-primary px-3" id="getnumnbers2">ثبت</button></div>
            </div>
            <div class="col" id="message"></div>
        </div>
    </section>
    
    <!-- score form  grade 8 upto 12  -->
    <section class="container p-2" style="background-color:#F0F8FF; direction:rtl;" id="12">
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1"><label>تفسیر</label></div>
                <div class="col-sm pb-1"><input type="number" id="inter3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>علوم دینی</label></div>
                <div class="col-sm pb-1"><input type="number" id="islamic3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>دری</label></div>
                <div class="col-sm pb-1"><input type="number" id="dari3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>پشتو</label></div>
                <div class="col-sm pb-1"><input type="number" id="pashto3"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1"><label>جیولوژی</label></div>
                <div class="col-sm pb-1"><input type="number" id="geol3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>انگلیسی</label></div>
                <div class="col-sm pb-1"><input type="number" id="english3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>کیمیا</label></div>
                <div class="col-sm pb-1"><input type="number" id="chem3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>فیزیک</label></div>
                <div class="col-sm pb-1"><input type="number" id="py3"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1"><label>بیولوژی</label></div>
                <div class="col-sm pb-1"><input type="number" id="bio3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>ریاضی</label></div>
                <div class="col-sm pb-1"><input type="number" id="math3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>تاریخ</label></div>
                <div class="col-sm pb-1"><input type="number" id="history3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>جغرافیه</label></div>
                <div class="col-sm pb-1"><input type="number" id="geo3"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1"><label>تعلیمات مدنی</label></div>
                <div class="col-sm pb-1"><input type="number" id="civil3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>کمپیوتر</label></div>
                <div class="col-sm pb-1"><input type="number" id="computer3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>مضامین انتخابی</label></div>
                <div class="col-sm pb-1"><input type="number" id="selective3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-1"><label>سپورت</lable></div>
                <div class="col-sm pb-1"><input type="number" id="sport3"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col-sm pb-1"><label>تهذیب</lable></div>
                <div class="col-sm pb-1"><input type="number" id="reform3"></div>
            </div>
            <div class="col">
                <div class="col-sm pb-4" id="message"></div>
                <div class="col-sm pb-1"><button class="btn btn-primary px-3" id="getnumbers3">ثبت</button></div>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </section>
<?php }?>
</section>
<?php
    }else{
        header("location:../index.php");
    }
    require "footer.php";
?>