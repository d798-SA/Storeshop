<?php
$title = 'تواصل';
include 'template/header.php';  
require __DIR__ .'/classes/Validation.php';

$errors = [];
$usernameError = $emailError = $passwordError = $password_confirmationError = $userExit = $trylaster = $passwordErrorL =  '';


?>


<?php 


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = mysqli_real_escape_string($conn , $_POST['username']);
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $password = mysqli_real_escape_string($conn , $_POST['password']);
    $password_confirmation = mysqli_real_escape_string($conn , $_POST['password_confirmation']);

    if(empty($username)){
        array_push($errors , 'get error in username');

        $usernameError = 'عبي الحقل ذا';
    };
    if(empty($email)){
         array_push($errors , 'get error in email');
         $emailError = 'عبي الحقل ذا';
        };
    if(empty($password)){

         array_push($errors , 'get error in password');
         $passwordError = 'عبي الحقل ذا';
        };
    if(empty($password_confirmation)){ 
        array_push($errors , 'get error in password confirmation');
        $password_confirmationError = 'عبي الحقل ذا';
    };

    if($password != $password_confirmation){
        array_push($errors , 'password is not match');
        $passwordError = $$password_confirmationError = 'كلمة السر لا تتطابقان';


    };

  
    

if(!count($errors)){
   

    $sinUp = $conn->query("SELECT id , email FROM users WHERE email='$email' limit 1");


    
        if($sinUp->num_rows){
    
            array_push($errors , 'get error in user exit');
    
            $userExit = 'الايميل موجود ';
    
            $sinUp->close();
        };

        if(!count($errors)){

            $password = password_hash($password , PASSWORD_DEFAULT);

            $queryS = "insert into users (username , email , password)
            values('$username' , '$email' , '$password')";

            if (mysqli_multi_query($conn, $queryS)) {
                
                ?>
                <div class="alert-success">تم إنشاء الحساب اذهب لصفحة تسجيل الدخول</div>
                <?php
              } else {
                array_push($errors , 'get error in '.  mysqli_error($conn));
               $trylaster = "خطأ في الارسال";
              };
              
              if(!count($errors)){
                mysqli_close($conn);
              }
              
            
    
        };
   




};

    
}

?>

<form method="post" action="">
<div class="alert-error"><?php  echo $userExit ?></div>
<div class="alert-error"><?php  echo $trylaster ?></div>
<div class="form-group">
<label for="username">اسم المستخدم</label>
<input type="text" name="username" id="username" class="form-control" value="" placeholder="اسم المستخدم">
<div class="alert-error"><?php  echo $usernameError ?></div>

</div>

<div class="form-group">
<label for="email">الايميل</label>
<input type="email" name="email" id="email" class="form-control" value="<?php if (isset($_SESSION['contact-form']['message'])) echo $_SESSION['contact-form']['email'] ?>" placeholder="الايميل">
<div class="alert-error"><?php echo $emailError ?></div>

</div>



<div class="form-group">
<label for="password">كلمة السر</label>
<input type="password" name="password" id="password" class="form-control" value="" placeholder="كلمة السر">
<div class="alert-error"><?php echo $passwordError ?></div>


<div class="form-group">
<label for="password_confirmation">تأكيد كلمة السر</label>
<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="" placeholder="تأكيد كلمة السر">
<div class="alert-error"><?php echo $password_confirmationError ?></div>



<div class="form-group">
<input type="submit" class="form-control  btn-outline" value="أنشى حساب جديد">
<?php ?>

</div>

</form>

<!-- <p><a href="register.php">أنشى حساب جديد</a></p>
<p><a href="">نسيت كلمة المرور؟</a></p> -->


<script>

</script>
<?php
require_once 'template/footer.php';
