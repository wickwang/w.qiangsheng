<?php 

if (mb_strlen($ImageBox->getTitle(), 'UTF-8') > 36) {
    $suffix = '…';
} else {
    $suffix = '';
}
echo Utils::substr_utf8($ImageBox->getTitle(), 0, 36) . $suffix;

?>
