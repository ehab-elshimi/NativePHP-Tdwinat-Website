<?php
$title="dashboard.php";
//include auth_session.php file on all user panel pages
include("auth_session.php");
require_once "db.php";
?>
<?php include "includes/header.php"; ?>
<?php
if(isset($_POST['add'])){
$postTitle=$_POST['title'];
$postCat=$_POST['category'];
$postContent=$_POST['content'];
$postAuthor="عبدالله محمد";

if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $result = explode( '.', $file_name );
    $file_ext = strtolower( end( $result) );
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"images/".$file_name);
    }else{
       print_r($errors);
    }
    $sql="INSERT INTO posts(postTitle,postCat,postImage,postContent,postAuthor) VALUES ('$postTitle','$postCat','$file_name','$postContent','$postAuthor')";
    $query=mysqli_query($con,$sql);
    if(!$query){
        die("error db");
    }
 }
}
// $sql = "SELECT categoryName FROM categories"; // SQL with parameters
// $stmt = $con->prepare($sql); 
// $stmt->execute();
// $result = $stmt->get_result(); // get the mysqli result
// $category = $result->fetch_assoc(); // fetch data   

?>

<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2" id="side-area">
                    <h4>لوحة التحكم</h4>
                    <ul>
                        <li>
                            <a href="categories.php">
                                <span><i class="fas fa-tags"></i></span>
                                <span>التصنيفات</span>
                            </a>
                        </li>
                        <li data-toggle="collapse" data-target="#menu">
                            <a href="#">
                                <span><i class="far fa-newspaper"></i></span>
                                <span>المقالات</span>
                            </a>
                        </li>
                        <ul  class="collapse" id="menu">
                            <li>
                                <a href="dashboard.php">
                                    <span><i class="far fa-edit"></i></span>
                                    <span>مقال جديد</span>  
                                </a>
                                </li>
                                <li>
                                    <a href="dashboard.php">
                                        <span><i class="fas fa-th-large" aria-hidden="true"></i></span>
                                        <span>كل المقالات</span>
                                    </a>
                                </li>
                        </ul>
                        <li>
                            <a href="#">
                                <span><i class="fas fa-window-restore"></i></span>
                                <span>عرض الموقع</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php">
                            <span><i class="fas fa-window-restore"></i></span>
                                <span>الصفحة الرئيسية</span>
                            </a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <span><i class="fas fa-sign-out-alt"></i></span>
                                <span>تسجيل الخروج</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-10" id="main-area">
                    <button class="btn-custom">مقال جديد</button>
                    <div class="add-category">
                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">عنوان المقال</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cate">التصنيف</label>
                                <select name="category" id="cate" class="form-control">
                                    <?php 
                                    $categories=array();
                                    $result= mysqli_query($con,"SELECT * FROM categories");
                                    while($row=mysqli_fetch_array($result)){
                                       array_push( $categories,$row['categoryName']);
                                    }
                                    foreach($categories as $key=>$value){
                                    ?>
                                    <option value=""><?php echo $value?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image" class="">صورة المقالة</label>
                                <input type="file" id="image"  name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="content" class="">نص المقالة</label>
                                <textarea name="content" id="content" class="form-control" cols="30" rows="10">

                                </textarea>
                            </div>
                            <button class="btn btn-custom" type= "submit" name="add" >نشر المقالة</button>
                        </form>
                    </div>
                </div>
                </div>
                </div>
                </div>
<?php include "includes/footer.php"; ?>