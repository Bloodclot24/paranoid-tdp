<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/paranoid/favicon.jpg"/>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>

</head>
<body>
<div id="signIn">

<div id="bienvenido">Bienvenido a Paranoid</div>
<div id="slogan">protegiendo tus comunicaciones</div>

<br />
<div id="signInContainer">
<div id="logoContainer"><?php echo image_tag("paranoid_logo.png", array("alt"=>"Paranoid", "title" => "Paranoid", "id" => "logo")) ?></div>
<form action="<?php echo url_for('@signin') ?>" method="post">
    <div>
        <?php echo $form->renderGlobalErrors() ?>
    </div>
    <table>
        <tbody>
        <tr>
            <td colspan="2">
                <?php echo $form['username']->renderError() ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form['username']->renderLabel() ?></td>
            <td><?php echo $form['username']->render() ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo $form['password']->renderError() ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form['password']->renderLabel() ?></td>
            <td><?php echo $form['password']->render() ?></td>
        </tr>
        <tr>
            <td><?php echo $form['remember']->renderLabel() ?></td>
            <td><?php echo $form['remember']->render() ?></td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2">
                <br />
                <input type="submit" id="submitLogin" value="<?php echo __('main:login') ?>"/>
                <?php $routes = $sf_context->getRouting()->getRoutes() ?>
                <?php if (isset($routes['sf_guard_forgot_password'])): ?>
                <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
                <?php endif; ?>

                <?php if (isset($routes['sf_guard_register'])): ?>
                &nbsp; <a
                        href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
                <?php endif; ?>
            </td>
        </tr>
        </tfoot>
    </table>

    <?php echo $form['_csrf_token']->render() ?>
    
</form>
</div>

</div>

</body>
</html>

