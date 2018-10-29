<?php require('partials/header.php'); ?>

<div class="col-md-12">
    <?php require('partials/search.php'); ?>
</div>

<ul>
    <?php foreach($users as $user) :?>
        <li><?= $user->name . ' - ' . $user->email ?></li>
    <?php endforeach; ?>
</ul>

<?php require('partials/footer.php'); ?>
