<?php
    require "header.php";
    if(isset($_SESSION["username"]) && isset($_SESSION["privilege"])){
        if($_SESSION["privilege"]=="officer"){
?>
    <section class="container p-0" style="background-color:#F0F8FF;direction:rlt;">
        <table class="table table-striped text-center table-hover">
            <tr>
                <th>صلاحیت</th>
                <th>محل وظیفه</th>
                <th>کاربرها</th>
                <th>#</th>
            </tr>
        <?php 
            $result = mysqli_query($conn,"SELECT * FROM users;");
            $x=1;
            while($arr = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td>
                <?php   
                    if($arr["privilege"]=="officer"){
                        echo "آمر";
                    }elseif($arr["privilege"]=="manager"){
                        echo"مدیر";
                    }elseif($arr["privilege"]=="teacher"){
                        echo "استاد";
                    };
                ?></td>
                <td>
                    <?php
                        if($arr["workplace"]==null){
                            echo "ریاست معارف";
                        }else {
                            echo $arr["workplace"];
                        }
                    ?>
                </td>
                <td><?php echo $arr["username"];?></td>
                <td><?php echo $x++;?></td>
            </tr>
        <?php
            }
        ?>
        </table>
    </section>
<?php
           // if privilege == ministry users the above codes will be access able otherwise not;
        }
        // if privilege != ministry the index page will show to users;
        else{
            header("location:../index.php");
        }
    }// if privilege is not set the main page will be show to the users;
    else{
        header("location:../index.php");
    }
    require "footer.php";
?>