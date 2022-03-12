<?php 

if(isset($_SESSION['user']['success_message'])) { ?>

<div class="alert-success">
    <?php echo $_SESSION['user']['success_message'] ?>
</div>

<?php 
unset($_SESSION['user']['success_message']);
} ?>

