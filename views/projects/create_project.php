

<h2>New order</h2>

<?php $attributes = array('id'=>'create_form', 'class'=> 'form_horizontal'); ?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>

<?php echo form_open('projects/create_project', $attributes);?>

<div class="form-group">
	
	<?php echo form_label('Order Name'); ?>

	<?php

		$data = array(

			'class' => 'form-control',
			'name' => 'project_name',
			'placeholder' => 'Order Name'
			);
	?>
	<?php echo form_input($data); ?>
</div>

<div class="form-group">
	
	<?php echo form_label('Description'); ?>

	<?php

		$data = array(

			'class' => 'form-control',
			'name' => 'project_body',
			'placeholder' => 'Enter text'
			);
	?>
	<?php echo form_textarea($data); ?>
</div>

<div class="form-group">
	
	<!-- <?php //echo form_label('Password'); ?> -->
	<?php 
		$data = array(

			'class' => 'btn btn-primary',
			'name' => 'submit',
			'value' => 'Create'
		);
	?>
	<?php echo form_submit($data); ?>

</div>

<?php echo form_close(); ?>

