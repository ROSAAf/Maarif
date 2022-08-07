<?php
    require "header.php";
    if(isset($_SESSION["privilege"])){
        if($_SESSION["privilege"]=="manager"){

?>
<section class="container" style="background-color:#F0F8FF;">
    <dv class="row text-center bg-info">
        <p class="h4"> درخواست ها</p>
    </dv>
    <table class="table table-striped text-center table-hover">
        <tr>
            <th>رد</th>
            <th>تایید</th>
            <th>صنف</th>
            <th>اسم پدر</th>
            <th>اسم متاقضی</th>
            <th>آی دی</th>
        </tr>
        <?php
            $SCHOOL = $_SESSION["work"];
            $db = mysqli_query($congeneral,"USE $SCHOOL;");
            if($db){
                $row = mysqli_query($congeneral,"SELECT * FROM requests;");
                while($arr = mysqli_fetch_assoc($row)){
                    $id=$arr["student_id"];
                    $grade =$arr["grade"];
        ?>
        <tr>
            <td><a class="btn btn-danger px-3"href="includes/reject.php?id=<?php if($id){ echo $id;}?>">رد</a></td>
            <td><a class="btn btn-success" href="includes/accept.php?id=<?php if($id){ echo $id;}?>">تایید</a></td>
            <td><?php echo $arr["grade"];?></td>
            <td><?php echo $arr["father_name"];?></td>
            <td><?php echo $arr["student_name"];?></td>
            <td><?php echo $arr["student_id"];?></td>
        </tr>
        <?php
                }}
        ?>
    </table>
</section>
<?php
    }// if privilege==manager;
}// if $_SESSION setted;
   require "footer.php";
?>