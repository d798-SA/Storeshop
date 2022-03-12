<?php
$title = 'تواصل';
include 'template/header.php';  
require __DIR__ .'/classes/Validation.php';

$errors = [];




$name = $email = $message = '';
$nameError = $emailError = $messageError = $imageError = '';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_SESSION['contact-form']['name'] = $_POST['name'];
    $_SESSION['contact-form']['email'] = $_POST['email'];
    $_SESSION['contact-form']['message'] = $_POST['message'];
    
    $Filter = new Filter;

    $filterstring = $Filter->filterstring($_SESSION['contact-form']['name']);

    $filtermessage = $Filter->filterstring($_SESSION['contact-form']['message']);


    $filteremail = $Filter->filteremail($_SESSION['contact-form']['email']);

    if(!$filteremail){
        $emailError = 'يوجد مشكلة في هذا الحقل';
        array_push($errors , 'email Error');
    };

    if(!$filterstring){
        $nameError = 'عبي الحقل ذا';
        array_push($errors , 'Name Error');
    };

    if(!$filtermessage){
        $messageError = 'إييه عاوزنا نحضر ارواح علشان نعرف ايش ملاحظتك!';
        array_push($errors , 'message Error');
    };

    if(strlen($_SESSION['contact-form']['message']) >= 255){
        $messageError = 'عدد الرساله يجب أن يكون اقل من 255';
        array_push($errors , 'message Error characters ');
    }

  
   if(!$filteremail && !$filtermessage && !$filterstring ){
    array_push($errors , 'there Error or more on filed');
    }else{
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            $dateY = date('Y');
            $dateM = date('m');
            $dateYM = $dateY . '/' . $dateM;
            $upload = new Upload('uploads/report/'.$dateYM);
            $upload->file = $_FILES['image'];
            $errors = $upload->upload();
            $_SESSION['contact-form']['imageError'] = $errors;
    
        
    
        };
    };

  if(!count($errors)){ 
     $insert = $conn->prepare('insert into contact_message (contact_name , contact_email , contact_message , contact_document) values(? , ? , ? , ?)');
     $insert->bind_param("ssss" , $filterstring , $filteremail ,  $filtermessage , $upload->filePath );
     $insert->execute();
     $insert->close();
      ?>

    
  <div class="alert-success">
      <p>
          تم الارسال ي 
     <?php echo $_SESSION['contact-form']['name'] ?>
    </p>
  </div>

  <?php
      unset($_SESSION['contact-form']);

  };
}
?>

<form method="post" action="" enctype="multipart/form-data" class="container-form">
<div class="form-group">
<label for="name">الاسم</label>
<input type="text" name="name" id="name" class="form-control" value="<?php if (isset($_SESSION['contact-form']['name'])) echo $_SESSION['contact-form']['name'] ?>" placeholder="الاسم">
<div class="alert-error"><?php echo $nameError ?></div>
</div>

<div class="form-group">
<label for="email">الايميل</label>
<input type="email" name="email" id="email" class="form-control" value="<?php if (isset($_SESSION['contact-form']['message'])) echo $_SESSION['contact-form']['email'] ?>" placeholder="الايميل">
<div class="alert-error"><?php echo $emailError ?></div>

</div>

<div class="form-group">
<label for="image">ملف</label>
<input type="file"  class="form-control  btn-outline" name="image" id="image">
<div class="alert-error"><?php if (isset($_SESSION['contact-form']['imageError'])) foreach($_SESSION['contact-form']['imageError'] as $imageError):?> 

    <p><?php echo $imageError ?></p>

    <?php endforeach; ?>
</div>

</div>

<div class="form-group">
<label for="message">الرساله</label>
<textarea name="message" id="message" class="form-control message-e" id="" cols="30" rows="10"><?php if(isset($_SESSION['contact-form']['message'])) echo $_SESSION['contact-form']['message'] ?></textarea>
<div class="alert-error"><?php echo $messageError ?></div>

</div>


<div class="form-group">
<input type="submit" class="form-control  btn-outline" value="إرسال">
<?php ?>

</div>

</form>


<script>

</script>
<?php
require_once 'template/footer.php';

