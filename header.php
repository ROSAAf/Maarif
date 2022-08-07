<?php
    session_start();
    require "includes/connection.php";
?>
<!DOCTYPE html>
<html lang="utf-8">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>وزارت معارف</title>
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-icons.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
    <script src="script/jquery.min.js"></script>
    <script src="script/scripting.js"></script>
    <script src="script/score.js"></script>
    <script src="script/request.js"></script>
    <script src="script/finalscore.js"></script>
    
    <link rel="shortcut icon" href="images/Ministry.png" type="image/x-icon">
</head>
<body>
<div>
    <header class="d-flex flex-row bg-primary p-4">
            <div>
                <img src="images/logo3.png" alt="Islamic Republic Afghanistan" class="img img-responsive" width="100">
            </div>
            <div class="flex-grow-1 flex-shrink-1 mt-4" style="text-align:center">
                <p class="h4"><strong> جمهوری اسلامی افغانستان</strong></p>
                <p class="h4 text-white"><strong>وزارت معارف</strong></p>
            </div>
            <div>
                <img src="images/Ministry.png" alt="Islamic Republic Afghanistan" class="img img-responsive" width="100">
            </div>
    </header>
    <!-- navbar  -->
    <nav class="d-flex  bg-white border">
    <!-- profile showes here-->
        <article class=" flex-fill d-flex flex-col">
            <div class=" mx-2" id="profileshow">
                <?php
                    if(isset($_SESSION["username"])){
                        $privilege = $_SESSION["privilege"];
                        $user = $_SESSION["username"];
                        $row = mysqli_query($conn,"SELECT * FROM users WHERE username='$user'");
                        while($arr = mysqli_fetch_assoc($row)){
                            if($arr["photo"]==null){
                                echo "<i class='bi bi-person-circle' style='font-size:36px;text-align:center;color:blue'></i>";
                                
                            }else{
                                $image = $arr["photo"];
                                $spilt = explode("/",$image);
                                $pic = "images/".end($spilt);
                                echo "<img src=$pic width=40 class='rounded-circle mx-2 border' id='image'/>";
                                
                            }
                        }
                    }
                ?>
            </div>
            <!-- username -->
            <div class="mx-0 mt-4 text-primary" id="user">
                <p><?php if(isset($_SESSION["username"])){ echo $_SESSION["username"];}?></p>
            </div>
        </article>
        <!-- menu and login button -->
        <article class="flex-fill justify-content-end" style="direction:rtl;">
            <?php
                if(isset($_SESSION["username"])){
                    echo '<a href="includes/logout.inc.php" class="px-2"><i class="bi bi-box-arrow-left px-2" style="font-size: 40px;"></i></a>';
                }
                else{
                    echo '<a href="login.php" class="px-2"><i class="bi bi-person-fill px-2" style="font-size: 40px;"></i></a>';
                }
            ?>
            <a data-bs-toggle="offcanvas" href="#menue" class="mt-1 px-2"><i class="bi bi-list" style="font-size:36px"></i></a>
                <!-- two line above are the icones must design it beutfull -->
        </article>
    </nav>
</div>
<!-- menue -->
<div class="offcanvas offcanvas-end bg-light" id="menue" style="direction:rtl;">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title text-primary"><strong>مینو</strong></h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="list-group text-black">
        <li class="list-group-item list-group-item-action">
            <a href="index.php">صفحه اصلی</a>
        </li>
        <?php
            if(isset($_SESSION["username"])){
                if($_SESSION["privilege"]=="officer"){
                    echo '
                    <li class="list-group-item list-group-item-action">
                        <a href="setting.php">تنظیمات</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="signup.php" class="px-2">ایجاد حساب</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="post.php">پوست کردن</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="users.php">کاربرها</a>
                    </li>';
                }
                elseif($_SESSION["privilege"]=="manager"){
                    echo '
                        <li class="list-group-item list-group-item-action">
                            <a href="setting.php">تنظیمات</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="score.php">ایجاد فورمها</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="transcript.php">ارسال نمرات به وزارت</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                            <a href="checkRequests.php">درخواستی ها</a>
                        </li>
                        <li class="list-group-item list-group-item-action">
                        <a href="student.php">لست شاگردان</a>
                        </li>
                        ';
                }elseif($_SESSION["privilege"]=="teacher"){
                    echo'
                    <li class="list-group-item list-group-item-action">
                        <a href="setting.php">تنظیمات</a>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <a href="score.php">درج نمرات</a>
                    </li>
                    ';
                }
            }else{
                echo'
                <li class="list-group-item list-group-item-action" id="showsubul">
                    <span>درخواست ها</span>
                </li>
                ';
            }
        ?>
        <ul class="list-group text-black" id="subul">
            <li class="list-group-item list-group-item-action">
                <a href="newstudent.php">شاگرد جدید</a>
            </li>
            <li class="list-group-item list-group-item-action">
                <a href="conversionRequest.php">تبدیلی</a>
            </li>
        </ul>
    </ul>
  </div>
</div>
