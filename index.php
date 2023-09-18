<?php
    @include 'php/config.php';
    session_start();
    if(isset($_POST['submit'])){
        // $name=mysqli_real_escape_string($conn,$_POST['name']);
        // $email=mysqli_real_escape_string($conn,$_POST['email']);
        // $pass=$_POST['password'];
        // $cpass=$_POST['cpassword'];
        // $user_type=$_POST['user_type'];
        // $select="SELECT * FROM user_form where email='$email' && password='$pass'";
        // $result=mysqli_query($conn,$select);
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $user_type=$_POST['user_type'];
        $_SESSION['email']=$email;
        $_SESSION['password']=$pass;
        $_SESSION['user_type']=$user_type;
        if(mysqli_num_rows($result)>0){ 
            $row=mysqli_fetch_array($result);
            if($row['user_type']=='admin'){
                $_SESSION['admin_name']=$row['name'];
                echo  "<script> alert('Đăng nhập thành công!')</script>";
                header('location:adminpage.php');
           }

           else if($row['user_type']=='user'){
            $_SESSION['user_name']=$row['name'];
            echo  "<script> alert('Đăng nhập thành công!')</script>";
            header('location:userpage.php');

       }
       else{
        echo  "<script> alert('Sai tên đăng nhập hoặc mật khẩu!')</script>";

        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style/style.css">
  <title>Đăng nhập</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="">
                    <h2>Đăng nhập</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required >
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required >
                        <label for="">Mật khẩu</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Lưu thông tin <a href="edit.php" style="color: rgb(97, 247, 167);">Quên mật khẩu</a></label>
                      
                    </div>
                    <button>Đăng nhập</button>
                    <div class="register">
                       <a href="register.php" style="color: rgb(97, 247, 167);">Đăng ký ngay</a>
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
