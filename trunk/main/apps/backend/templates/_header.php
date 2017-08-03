<div id="header_top">
    <div class="header_top_inner">
        <div class="header_top_left">
            <a href="/admin.php">管理面板</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="/" target="_blank">主页</a>
        </div>
        <div class="header_top_right">欢迎 <?php echo Theuser::getCurrentAdminUser()->getUsername(); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/admin.php/landing/logout">退出</a></div>
    </div>
</div>
<?php include_component('sfAdminDash', 'header'); ?>