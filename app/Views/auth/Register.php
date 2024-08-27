<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Horizon/Assets/style/login.css" />
    <title>Register</title>
  </head>
  <body>
    <nav>
      <a href="#"><img src="/Horizon/Assets/img/logo1.png" width="100px" alt="" /></a>
    </nav>
    <form action="<?= url_to('register') ?>" method="post">
      <?= csrf_field() ?>

        <center><h3><?=lang('Auth.register')?></h3></center> <br>

        <div style="padding:2px; margin:auto; background-color:rgba(255, 0, 0, 0.644); list-style:none;">
          <?= view('Myth\Auth\Views\_message_block') ?>
        </div>
        

      <div class="username inn">
        <input type="text" class="
        <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"  name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>"/>
      </div>

      <div class="email">
        <input type="email" class="<?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" 
          name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
      </div>
     
      <div class="pass">
        <input type="password" name="password" class="<?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
      </div>
      <div class="pass">
        <input type="password" name="pass_confirm"  class="<?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
      </div>
      <div class="login">
        <input type="submit" value="<?=lang('Auth.register')?>" />
      </div>
      <center>
      <?=lang('Auth.alreadyRegistered')?> <a style="color: red;" href="<?= url_to('login') ?>"><?=lang('Auth.signIn')?></a>

      </center>
    </form>
    
    </div>
  </body>
</html>
