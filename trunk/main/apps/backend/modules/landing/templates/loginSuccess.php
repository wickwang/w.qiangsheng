<div id="user_login">
    <div class="login_form">
        <h1>欢迎登录 Admin - Backend</h1>
        <form id="validate" method="post" action="/admin.php/landing/login">
            <div class="row-fluid">
                <div class="input-prepend">
                    <span class="add-on">
                        <i class="icon-user"></i>
                    </span>
                    <input class="validate[required] username" type="text" placeholder="Username" id="signin_username" name="signin[username]">
                    <?php echo $form['username']->renderError() ?>
                </div>
                <div class="input-prepend">
                    <span class="add-on">
                        <i class="icon-exclamation-sign" style="margin-top: 3px;"></i>
                    </span>
                    <input class="validate[required] password" type="password" placeholder="Password" id="signin_password" name="signin[password]">
                    <?php echo $form['password']->renderError() ?>
                </div>
                <div class="dr">
                    <span></span>
                </div>
            </div>
            <div class="row-fluid">
                <input class="button_1" type="submit" value=" 登  录 ">
            </div>
            <?php echo $form['_csrf_token']->render() ?>
        </form>
        <div class="footer">
            <span class="footer_text">© 2011-<?php echo date('Y', time()); ?> Admin - Backend </span>
        </div>
    </div>
</div>