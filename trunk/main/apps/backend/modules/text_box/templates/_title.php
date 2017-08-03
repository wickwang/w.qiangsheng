<?php 

if (mb_strlen($TextBox->getTitle(), 'UTF-8') > 36) {
    $suffix = '…';
} else {
    $suffix = '';
}
echo Utils::substr_utf8($TextBox->getTitle(), 0, 36) . $suffix;

?>
