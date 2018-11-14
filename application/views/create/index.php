<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); //This function will return any error messages sent back by the validator. ?>

<?php 

$formClass = array('class' => 'visa-form');
echo form_open('create/index', $formClass); 

?>



