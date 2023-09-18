<?php
    @include 'php/config.php';
    if(isset($_POST['submit'])){
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $pass=$_POST['password'];
        $cpass=$_POST['cpassword'];
        $user_type=$_POST['user_type'];
        $select="SELECT * FROM user_form where email='$email' && password='$pass'";
        $result=mysqli_query($conn,$select);
        $select2="SELECT email FROM  user_form where email='$email'";
        $key=mysqli_query($conn,$select2);
        if(mysqli_num_rows($key)>0){
            echo  "<script> alert('Người dùng đã tồn tại!')</script>";
        }
        else{
            if($pass != $cpass){
                echo  "<script> alert('Vui lòng nhập xác nhận mật khẩu trùng với mật khẩu đã tạo!')</script>";
            }
            else{
                
                $insert="INSERT into user_form(email, name, password, user_type) values('$email','$name','$pass','$user_type')";
                mysqli_query($conn,$insert);
                header('location:index.php');
                echo"<script>alert('Tạo tài khoản thành công')</script>";   
            }
            
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style/style.css">
  <title>Đăng ký</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="post">
                    <h2>Đăng ký</h2>
                    <div class="inputbox">

                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email"required >
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="text" name="name" required >
                        <label for="">Họ tên</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password"required >
                        <label for="">Mật khẩu</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="cpassword"required >
                        <label for="">Xác nhận mật khẩu</label>
                    </div>
                    <select name="user_type" id="" class="sl1">
                        <option value="user">Người dùng</option>
                        <option value="admin">Quản lý</option>
                    </select>

                    <button name="submit">Đăng ký</button>
                    <div class="register">
                       <a href="index.php" style="color: rgb(97, 247, 167);">Đăng nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- su dung icon cua trang ionic.io -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
