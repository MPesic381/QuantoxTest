<?php if(isset($_SESSION['message'])) : ?>
    <div class="form-group">
        <div class="alert alert-danger">
            <?= getError(); ?>
        </div>
    </div>
<?php endif; ?>