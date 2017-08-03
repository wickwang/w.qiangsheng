<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=8">      
            <?php include_http_metas() ?>
            <?php include_metas() ?>
            <?php include_title() ?>
            <?php include_stylesheets() ?>
            <?php include_javascripts() ?>
    </head>
    <body>

        <?php include_partial('global/header') ?>
        
        <?php
        $m = sfContext::getInstance()->getModuleName();
        $is_index = $m == 'sfAdminDash';
        ?>
        
        <!--wrapper-->
        <div id="wrapper" class="clear <?php echo $is_index ? 'admin_page_index' : ''; ?>">

            <div class="outer_wrapper">
                <div class="inner_wrapper">
                    <div class="main_wrapper">
                        <?php echo $sf_content ?>
                    </div>
                </div>
            </div>

        </div>
        <!--/wrapper-->  

        <?php include_partial('global/footer') ?>
        
    </body>
</html>
