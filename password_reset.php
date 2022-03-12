<?php

$title = 'ضبط كلمة المرور';
include 'template/header.php';
require __DIR__ . '/classes/Validation.php';

$errors = [];


?>


<?php

$emailError = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);


    if (empty($email)) {
        array_push($errors, 'get error in email');
        $emailError = 'عبي الحقل ذا';
    };








    if (!count($errors)) {



        $userExists = $conn->query("SELECT id , email FROM users WHERE email='$email' limit 1");



        if ($userExists->num_rows) {

            $userId =  $userExists->fetch_assoc()['id'];

            $tokenExists = $conn->query("DELETE FROM `password_reset` WHERE user_id='$userId'");


            $token = bin2hex(random_bytes(18));

            $expires_at = date('Y-m-d H:i:s', strtotime('+1 day'));


            $conn->query("INSERT INTO `password_reset` (`user_id`, `token`, `expires_at`) 
      VALUES ('$userId', '$token', '$expires_at');");

            $_SESSION['user']['success_message'] = 'شيك على إميلك :: تم إرسال رابط إعادة كلمة المرور';
        }

        echo '<script> window.location.href = "password_reset.php" ; </script>';
        die();
    };
};
?>


<form method="post" action="">


    <div>صفحة إستعادة كلمة المرور</div>
    <div class="form-group">



        <label for="email">الايميل</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php if (isset($_SESSION['contact-form']['message'])) echo $_SESSION['contact-form']['email'] ?>" placeholder="الايميل">
        <div class="alert-error"><?php echo $emailError ?></div>

    </div>




    <div class="form-group">
        <input type="submit" class="form-control  btn-outline" value="إعادة تعيين">
        <?php ?>

    </div>

</form>

<p><a href="register.php">أنشى حساب جديد</a></p>
<p><a href="log_in.php">سجل دخولك</a></p>


<script>

</script>
<?php
require_once 'template/footer.php';
