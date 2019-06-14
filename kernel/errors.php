<?php if (count($errors)>0): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
            <p> <?php echo $error;?></p>
            <?php endforeach;?>
            <p><i class="fas fa-exclamation-triangle"></i> Quên mật khẩu vui lòng liên hệ: 097 567 4444</p>
        </div>
<?php endif; ?>