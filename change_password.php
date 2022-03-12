<?php

$title = 'ضبط كلمة المرور';
include 'template/header.php';
require __DIR__ . '/classes/Validation.php';

if (!isset($_GET['token']) || !$_GET['token']) {
    die('page not found 404');
};

$now = date('Y-m-d H:i:s');

$stmt = $conn->prepare("SELECT * FROM `password_reset` WHERE token=? expires_at > '$now'");

$stmt->bind_param('s', $token);

$token = $_GET['token'];

$stmt->execute();


$result = $stmt->get_result();

echo $result->num_rows;

$errors = [];


?>


<?php

$emailError = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


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



        <label for="password">كلمة المرور</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="كلمة المرور">


        <label for="$password_confirmation">تأكيد كلمة المرور</label>
        <input type="password" name="$password_confirmation" id="$password_confirmation" class="form-control" placeholder="تأكيد كلمة المرور">


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
