<?php require('partials/header.php'); ?>

<div class="col-md-6">
    <form method="post" action="/register">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="passwordConfirmed" placeholder="Password" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>

        </div>

        <?php require('partials/error.php'); ?>

    </form>
</div>
<?php require('partials/footer.php'); ?>
