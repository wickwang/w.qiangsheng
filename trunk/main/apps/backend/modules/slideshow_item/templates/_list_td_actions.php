<td>
    <ul class="sf_admin_td_actions">
        <li class="sf_admin_action_up">
            <?php echo '<a href="slideshow_item/' . $SlideshowItem->getId() . '/Up">' . __('上移', array(), 'messages') . '</a>' ?>
        </li>
        <li class="sf_admin_action_down">
            <?php echo '<a href="slideshow_item/' . $SlideshowItem->getId() . '/Down">' . __('下移', array(), 'messages') . '</a>' ?>
        </li>
        <?php echo $helper->linkToEdit($SlideshowItem, array('params' => array(), 'class_suffix' => 'edit', 'label' => '编辑',)) ?>
        <?php echo $helper->linkToDelete($SlideshowItem, array('params' => array(), 'confirm' => '确定删除?', 'class_suffix' => 'delete', 'label' => '删除',)) ?>
    </ul>
</td>
