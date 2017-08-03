<?php
if (!isset($_SESSION['slideshow_id']) || !SlideshowPeer::getSlideshows($_SESSION['slideshow_id'])) {
    if (SlideshowPeer::getCurrentSlideshows()) {
        $Slideshows = SlideshowPeer::getCurrentSlideshows();
        foreach ($Slideshows as $Slideshow) {
            if ($Slideshow->getId()) {
                $_SESSION['slideshow_id'] = $Slideshow->getId();
                break;
            }
        }
    }
}
$SlideshowItems = SlideshowItemPeer::getSlideShow($_SESSION['slideshow_id']);
?>
<div class="sf_admin_menu" style="padding-bottom: 10px;">
    <?php
    if (SlideshowPeer::getCurrentSlideshows()) {
        $Slideshows = SlideshowPeer::getCurrentSlideshows();
        ?>

        <select name="slideshow_id" class="slideshow">
            <?php foreach ($Slideshows as $Slideshow) { ?>
                <option value="<?php echo $Slideshow->getId(); ?>" <?php
        if ($_SESSION['slideshow_id'] && $_SESSION['slideshow_id'] == $Slideshow->getId()) {
            echo 'selected';
        }
                ?>><?php echo $Slideshow->getName(); ?></option>
        <?php } ?>
        </select>

    <?php } ?>
</div>
<div class="sf_admin_list">
    <?php if (!$pager->getNbResults()): ?>
        <p><?php echo __('没有结果', array(), 'sf_admin') ?></p>
<?php else: ?>
        <table cellspacing="0">
            <thead>
                <tr>
                    <th id="sf_admin_list_batch_actions">
                        <input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" />
                    </th>
    <?php include_partial('slideshow_item/list_th_tabular', array('sort' => $sort)) ?>
                    <th id="sf_admin_list_th_actions"><?php echo __('操作', array(), 'sf_admin') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($SlideshowItems as $i => $SlideshowItem) {
                    $odd = fmod(++$i, 2) ? 'odd' : 'even';
                    ?>
                    <tr class="sf_admin_row <?php echo $odd ?>">
                        <?php include_partial('slideshow_item/list_td_batch_actions', array('SlideshowItem' => $SlideshowItem, 'helper' => $helper)) ?>
                    <?php include_partial('slideshow_item/list_td_tabular', array('SlideshowItem' => $SlideshowItem)) ?>
                    <?php include_partial('slideshow_item/list_td_actions', array('SlideshowItem' => $SlideshowItem, 'helper' => $helper)) ?>
                    </tr>
        <?php } ?>
            </tbody>
        </table>
<?php endif; ?>
</div>
<script>
    $('.slideshow').change(function(){
        var slideshow_id = $(this).val();
        $.ajax({
            type:'post',
            url:'/admin.php/slideshow_item/ajaxindex',
            data: ({slideshow:slideshow_id}),
            success:function(res){
                location.href='/admin.php/slideshow_item';
            }
        })
    })
</script>
<script type="text/javascript">
    /* <![CDATA[ */
    function checkAll()
    {
        var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
    }
    /* ]]> */
</script>
