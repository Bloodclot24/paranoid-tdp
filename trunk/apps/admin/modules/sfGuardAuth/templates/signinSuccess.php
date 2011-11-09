<br />
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
                <input type="submit" value="<?php echo __('main:login') ?>"/>
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
 
