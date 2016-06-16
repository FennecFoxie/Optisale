<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'О проекте';
?>

<?php
print_r($userdata);
echo '<br><br>';
print_r($userdata['CountForm']['products']);
echo '<br><br>';
print_r($userdata['CountForm']['markets']);
echo '<br><br>';
print_r($userdata['CountForm']['criteria']);
?>
