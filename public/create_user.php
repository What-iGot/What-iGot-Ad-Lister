<?php
    require_once '../template/Input.php';
    require_once '../template/user.php';
    if(Input::has('create_user')) {
        if(Input::get('password') !== Input::get('confirm_password'))
        {
            $passwordError = "Password confirmation doesn't match password.";
        }
        $new_user = new User();
        if ( !$new_user->checkEmail(Input::get('email')) ) {
            $hashed_password = password_hash(trim(Input::get('password')), PASSWORD_DEFAULT);
            $new_user->first_name = Input::get('first_name');
            $new_user->last_name  = Input::get('last_name');
            $new_user->email      = Input::get('email');
            $new_user->password   = $hashed_password;
            // $new_user->avatar_img = Input::get('avatar_img');
            if ( $new_user->insert() ) {
                    header("Location: /");
                    exit();
            } else {
            $emailError = "Cannot create new account with this email.";
            }
        }
    }
?>
<html>
    <?php include '../views/partials/header.php' ;?>

            <main>
                <div class="jumbotron">
                    <div class="container">
                        <h1>What iGot <small>Ecommerce for the Modern World</small></h1>
                        <div>
                            <img src="img/logo-idea-copy.jpg" class="img-rounded" alt="Confusion">
                        </div>
                    </div>
                </div>
                <form id="register-form" action="" method="post" role="form">
                    <div class="form-group">
                        <input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="First Name" value="<?= Input::get('first_name') ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" id="last_name" tabindex="1" class="form-control" placeholder="Last Name" value="<?= Input::get('last_name') ?>">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?= Input::get('email') ?>">
                        <?php if (isset($emailError)) { ?>
                            <p class="text-danger"><?= $emailError ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" id="confirm_password" tabindex="2" class="form-control" placeholder="Confirm Password">
                        <?php if (isset($passwordError)) { ?>
                            <p class="text-danger"><?= $passwordError ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input hidden name="create_user" value="true">
                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                            </div>
                        </div>
                    </div>
                </form>
            </main>
        </section>
    </body>
    <?php include'../views/partials/footer.php' ?>
</html>