<div class="center-main-list">
    <div class="list-main zone">
        <a href="<?php echo $config['app_url'] ?>admin">
            <div class="list-main-item">
            <?php 
                if(isset($notifications) &&  $notifications >= 1) { ?>
                <div class="notifications">
                    <span class="notifications-num"><?php echo $notifications ?></span>
                </div>
                <?php } ?>

                <i class="fas fa-users-cog"></i> <br>
                ادمن
            </div>
        </a>

        <!--  ?>
            <i class="fas fa-address-card"></i> <br>
                الحساب

        -->

        <?php if(isset( $_SESSION['user']['loged_in']) &&  $_SESSION['user']['loged_in']){ ?>

            <a href="account.php">
            <div class="list-main-item">
            <i class="fas fa-address-card"></i> <br>
                الحساب
            </div>
          </a> 
          <?php }else { ?>
            <a href="log_in.php">
            <div class="list-main-item">
                <i class="fas fa-user-plus"></i><br>
                    تسجيل دخول
            </div>
          </a>
          <?php } ?>

        
        <a href="">
            <div class="list-main-item">
            <?php 
                if(isset($notifications) &&  $notifications >= 1) { ?>
                <div class="notifications">
                    <span class="notifications-num"><?php echo $notifications ?></span>
                </div>
                <?php } ?>
                <i class="far fa-calendar-star"></i> <br>
                المفضله
            </div>
        </a>

        <a href="">
            <div class="list-main-item">
                <?php 
                if(isset($notifications) &&  $notifications >= 1) { ?>
                <div class="notifications">
                    <span class="notifications-num"><?php echo $notifications ?></span>
                </div>
                <?php } ?>
                <i class="fad fa-cart-arrow-down"></i> <br>
                السلة
            </div>
        </a>


    </div>
    
</div>