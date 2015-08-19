<?php 
require_once '../template/Input.php';
require_once '../template/Auth.php';

if (Input::has('email') && Input::has('password')){
    $email = trim(Input::get('email'));
    $password = trim(Input::get('password'));
        
    if (isset($_POST['email'])){
        Auth::attempt($email, $password);
    }
}
if(Auth::checkUser()){
    header("Location: /");
    exit();
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
                        <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
                            <div class="form-group">
                                 <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                 <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                            </div>
                            <div class="form-group">
                                 <label class="sr-only" for="exampleInputPassword2">Password</label>
                                 <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                 <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                            </div>
                            <div class="form-group">
                                <? if(!empty($errors) && Input::has('login_attempt')): ?>
                                <p class="text-danger"><?= $errors[0] ?></p>
                                <? endif; ?>
                                 <input hidden name="login_attempt" value="true">
                                 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </section>
    </body>
    <?php include'../views/partials/footer.php' ?>
</html>