<?php
require "includes/connection.php";
require "header.php";
if($_SESSION["privilege"]=="manager"){
?>
<section class="container">
<table class="table table-striped text-center table-hover">
    <tr>
        <th>تاریخ تولد</th>
        <th>اسم پدر کلان</th>
        <th>اسم پدر</th>
        <th>اسم</th>
        <th>آی دی</th>
    </tr>
    <?php
        $school = $_SESSION["work"];
        $db = mysqli_query($congeneral,"USE $school;");
        if($db){
            $row = mysqli_query($congeneral,"SELECT * FROM شهرت_شاگردان1401;");
            while ($arr=mysqli_fetch_assoc($row)) {
    ?>
    <tr>
                <td><?php echo $arr["dofbrith"];?></td>
                <td><?php echo $arr["grandfather_name"];?></td>
                <td><?php echo $arr["father_name"];?></td>
                <td><?php echo $arr["student_name"];?></td>
                <td><?php echo $arr["student_nid"];?></td>
    </tr>
    <?php
            }
        }
    ?>
</table>
</section>
<?php
}
require "footer.php";
?>