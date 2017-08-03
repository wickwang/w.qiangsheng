<?php
/**
 * We need to make sure this plugin is backward compatible. 
 * The in the original, this template was invoked by "include_partial",
 * which means that now it won't work. Therefore, we set a variable in the 
 * component code, and if it is not present - we call the component
 */
if (!isset($called_from_component)):
    include_component('sfAdminDash', 'header');
else:
    ?>


    <?php
    use_helper('I18N');
    /** @var Array of menu items */ $items = $sf_data->getRaw('items');
    /** @var Array of categories, each containing an array of menu items and settings */ $categories = $sf_data->getRaw('categories');
    /** @var string|null Link to the module (for breadcrumbs) */ $module_link = $sf_data->getRaw('module_link');
    /** @var string|null Link to the action (for breadcrumbs) */ $action_link = $sf_data->getRaw('action_link');
    list($my_category, $my_item) = sfAdminDash::getCurrentCategoryAndItemByLink();

    // hard code links
    $level_3_modules = array('Import', 'Export', 'Order Bulk Manage');


    if (isset($my_item['name']) && in_array($my_item['name'], $level_3_modules)) {
        $module_link = $my_item['url'];
    }
    ?> 

    <?php if ($sf_user->isAuthenticated()): ?>
        <div id="header_dropmenu">
            <div id='sf_admin_menu'>    
                <?php include_partial('sfAdminDash/menu', array('items' => $items, 'categories' => $categories)); ?>
                <div class="clear"></div>
            </div>
        </div>

        <div id="header_breadnav">
            <?php if (sfAdminDash::getProperty('include_path')): ?>
                <?php if ($sf_context->getModuleName() != 'sfAdminDash' && $sf_context->getActionName() != 'dashboard'): ?>
                    <div class='admin_path'>
                        <a href='/admin.php'>管理面板</a>       
                        <img src="/images/apps/admin/breadcrumb_break.png" class="breadcrumb_break">
                        <a href='/admin.php'><?php echo $my_category; ?></a>
                        <img src="/images/apps/admin/breadcrumb_break.png" class="breadcrumb_break">
                        <?php echo null !== $module_link ? link_to($my_item['name'], $module_link) : $my_item['name']; ?>
                        <?php if (null != $action_link): ?>
                            <img src="/images/apps/admin/breadcrumb_break.png" class="breadcrumb_break">
                            <span class="current"><?php echo $action_link_name; ?></span>
                        <?php endif ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>


<?php
endif; // BC check if ?>