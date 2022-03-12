<div class="center-main-list">
    <div class="list-main zone">
        <a href="<?php echo $config['app_url'] ?>">
            <div class="list-main-item">
            <?php 
                if(isset($notifications) &&  $notifications >= 1) { ?>
                <div class="notifications">
                    <span class="notifications-num"><?php echo $notifications ?></span>
                </div>
                <?php } ?>

                <i class="fas fa-eye"></i> <br>
                السوق
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
                <i class="fas fa-address-card"></i> <br>
                الحساب
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
                <i class="fas fa-cogs"></i></i> <br>
                الاعدادات
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