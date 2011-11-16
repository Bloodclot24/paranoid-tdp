<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="header">
        <span id="almostLogo">*</span><span id="headerTitle"><?php echo link_to('Paranoid', '@homepage')?></span>
        <?php if ($sf_user->isAuthenticated()): ?>
            <?php include_partial("global/buttons"); ?>
            <div id="login"> <?php echo "[".__('main:user').": ".$sf_user->getUsername()."]" ?>  <?php echo link_to(image_tag('lock_open.png', "alt=".__('main:logout')." title=".__('main:logout')), '@signout') ?></div>
        <?php else: ?>
            <div id="login"><?php echo link_to(image_tag('lock.png', "alt=".__('main:login')." title=".__('main:login')), '@signin') ?></div>
        <?php endif ?>
    </div>
    <?php echo $sf_content ?>
  </body>
</html>