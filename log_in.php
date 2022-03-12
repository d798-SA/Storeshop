<?php
$title = 'تواصل';
include 'template/header.php';  
require __DIR__ .'/classes/Validation.php';

$errors = [];
$usernameError = $emailError = $passwordError = $password_confirmationError = $usernotExit = $trylaster = $passwordErrorL =  '';


?>


<?php 


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = mysqli_real_escape_string($conn , $_POST['email']);
    $password = mysqli_real_escape_string($conn , $_POST['password']);

   
    if(empty($email)){
         array_push($errors , 'get error in email');
         $emailError = 'عبي الحقل ذا';
     };

        if(empty($password)){

         array_push($errors , 'get error in password');
         $passwordError = 'عبي الحقل ذا';
        };
  



  
    

if(!count($errors)){
   
 

    $userExists = $conn->query("SELECT * FROM users WHERE email='$email' limit 1");

 
    
        if(!$userExists->num_rows){
    
            array_push($errors , 'get error in user not exit');
    
            $usernotExit = 'المستخدم غير موجود مسبقاً ';
    
            
        }else{
            $userfound = $userExists->fetch_assoc();

            $hashed_password = $userfound['password'];
          
           if(password_verify($password, $hashed_password , )){
               $_SESSION['user']['loged_in'] = true;
               $_SESSION['user']['user_id'] = $userfound['id'];
               $_SESSION['user']['user_name'] = $userfound['username'];
               $_SESSION['user']['success_message'] =   $_SESSION['user']['user_name'] .' أهلاً بعودتك ';

              echo '<script> window.location.href = "index.php" ; </script>';

                 die();

           }else{
            echo "wrong";
           }
        }

      

                
             ?>
 
           <?php





};

    
}

?>

<form method="post" action="">

<div class="alert-error"><?php  echo $usernotExit ?></div>
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
<input type="submit" class="form-control  btn-outline" value="سجل دخولك">
<?php ?>

</div>

</form>

<p><a href="register.php">أنشى حساب جديد</a></p>
<p><a href="password_reset.php">نسيت كلمة المرور؟</a></p>


<script>

</script>
<?php
require_once 'template/footer.php';
