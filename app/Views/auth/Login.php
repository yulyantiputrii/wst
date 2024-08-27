<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Horizon/Assets/style/login.css" />
    <title>Login</title>
  </head>
  <body>
    <nav>
      <a href="#"><img src="/Horizon/Assets/img/logo1.png" width="100px" alt="" /></a>
    </nav>
    <form action="<?= url_to('login') ?>" method="post">
    <?= csrf_field() ?>
      <center><h3><?=lang('Auth.loginTitle')?></h3></center><br>
      <div style="padding:2px; margin:auto; background-color:rgba(255, 0, 0, 0.644); list-style:none; margin-bottom: 10px;">
      <center>
        <?= view('Myth\Auth\Views\_message_block') ?>
      </center>
      
      </div>
    <?php if ($config->validFields === ['email']): ?>
      <div class="username inn">
        <input type="email" id="username" class="<?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.email')?>" /><div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
      </div>
    <?php else: ?>
      <div class="username inn">
        <input type="text" class="<?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.email')?>" />
          <div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
      </div>
    <?php endif; ?>


      <div class="pass">
        <input type="password" name="password" id="password" class="<?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" />
          <div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
      </div>
      <div class="login">
        <input type="submit" value="<?=lang('Auth.loginAction')?>" />
      </div>
      <center>
      <?php if ($config->allowRegistration) : ?>
      <a style="color: red;" href="<?= url_to('register') ?>"><?=lang('Auth.needAnAccount')?></a>
      <?php endif; ?>

      </center>
    </form>
    
    </div>
  </body>
</html>
