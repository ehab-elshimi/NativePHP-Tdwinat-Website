<?php 
$title="index.php";
// connect file it includes connection with mysqli
require_once "db.php";
// header file it includes styles and other head tags
include "includes/header.php";
?>
<!-- body html of index page -->
<!-- start <body> -->
<nav class="navbar navbar-expand-sm bg-dark navbar-light">
    <div class="container">
        <a href="#" class="navbar-brand">تدويناتي</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div id="menu" class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="#" class="nav-link">عن المدونة</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">شروحات</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">منوعات</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">تواصل معنا</a>
        </li>
        <li class="nav-item">
            <a href="login.php" class="nav-link">Dashbaord Admin</a>
        </li>
    </ul>
</div>
</div>
</nav>


<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="post">
                    <div class="post-image">
                        <img src="images/inspect-element.jpg" alt="">
                    </div>
                    <div class="post-title">
                        <h4>
                        ذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
                        </h4>
                        </div>
                    <div class="post-details">
                        <p class="post-info">
                            <span><i class="fas fa-user">عبدالله محمد</i></span>
                            <span><i class="far fa-calendar-alt"></i>28/08/2019</span>
                            <span><i class="fas fa-tags"></i>بلوجر</span>
                        </p>
                        <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد
                        </p>
                        <button class="btn btn-custom">إقرأ المزيد</button>
                        </div>
            </div>
       
       
        </div>
        <div class="col-md-3">
            <!-- Categories -->
            <div class="categories">
                <h4 class="head">التصنيفات</h4>
                <ul>                        
                    <li>
                        <a href="" alt="">
                            <span><i class="fas fa-tags"></i></span>
                            <span class="title" >بلوجر</span>
                        </a>
                        
                    </li>
                    <li>
                        <a href="" alt="">
                            <span><i class="fas fa-tags"></i></span>
                            <span class="title">ويب</span>
                        </a>
                        
                    </li>
                    <li>
                        <a href="" alt="">
                            <span><i class="fas fa-tags"></i></span>
                            <span class="title" >دورات</span>
                        </a>
                        
                    </li>
                    </ul>
            </div>
        <!--End CATEGORY-->
            <div class="last-posts">
                <h4>أحدث المنشورات</h4>
                <ul>
                    <li>
                        <a href="" alt="">
                            <span>
                                <img src="images/images.jfif" alt="" style="width:80px;height:60px;">
                            </span>
                            <span>
                                <a href="">
                                    العديد من النصوص 
                            </a>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="" alt="">
                            <span>
                                <img src="images/images.jfif" alt="" style="width:80px;height:60px;">
                            </span>
                            <span>
                                <a href="">
                                    العديد من النصوص 
                            </a>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="" alt="">
                            <span>
                                <img src="images/images.jfif" alt="" style="width:80px;height:60px;">
                            </span>
                            <span>
                                <a href="">
                                    العديد من النصوص 
                            </a>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div> 
        </div>
        
        <?php
        $posts=array();
        $result= mysqli_query($con,"SELECT * FROM posts");
        while($row=mysqli_fetch_array($result)){
        array_push( $posts,$row);
        }
        foreach($posts as $key=>$post){
            // echo $post[4]."<br>";
            // echo $post[3]."<br>";
            // echo $post[2]."<br>";
            // echo $post[1]."<br>";
            
        ?>
        <div class="row">
            <div class="col-md-9">
                <div class="post">
                    <div class="post-image">
                        <img src="images/<?php echo $post[3]?>" alt="">
                    </div>
                    <div class="post-title">
                        <h4>
                            <?php echo $post[4]?>
                        </h4>
                        </div>
                    <div class="post-details">
                        <p class="post-info">
                            <span><i class="fas fa-user">عبدالله محمد</i></span>
                            <span><i class="far fa-calendar-alt"></i>24/02/2020</span>
                            <span><i class="fas fa-tags"></i>تكنزلوجي#</span>
                        </p>
                        <p>
                        <?php echo $post[2]?>
                        </p>
                        <button class="btn btn-custom">إقرأ المزيد</button>
                        </div>
            </div>              
        </div>
        <?php }
        ?>
        </div>
</div>
</div>

<footer>
    <p>جميع الحقوق محفوظة &copy; 2019</p>
</footer>

<!-- Footer File it includes scripts -->
<?php include "includes/footer.php"; ?>


<!-- end body of index page -->
<!-- </body> </html> -->
