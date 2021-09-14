
<div class="col-xs-9">

	<p class="bg-success">
	
	<?php if($this->session->flashdata('task_deleted')): ?>
	<?php echo $this->session->flashdata('task_deleted'); ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('task_updated')): ?>
	<?php echo $this->session->flashdata('task_updated'); ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('mark_done')): ?>
	<?php echo $this->session->flashdata('mark_done'); ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('unmark_done')): ?>
	<?php echo $this->session->flashdata('unmark_done'); ?>
	<?php endif; ?>

</p>

	<h1>Order Name: <?php echo $project_data->project_name; ?></h1>
	<h4>Date Created: <?php echo $project_data->date_created; ?></h4>
	<h2>Description</h2>
	<p><?php echo $project_data->project_body; ?></p>

	<h3>Active Tasks</h3>

	<ul>
	<?php if($active_task): ?>
		<?php  foreach($active_task as $task):?>
			<li>
			<a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->task_id ?>">
			<?php echo $task->task_name ?>
			</a>
			</li>
		<?php endforeach; ?>
	<?php else: ?>
		<p>You have no tasks</p>
	<?php endif; ?>
	</ul>

	<h3>Completed Tasks</h3>

	<ul>
	<?php if($completed_task): ?>
		<?php  foreach($completed_task as $task):?>
			<li>
			<a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->task_id ?>">
			<?php echo $task->task_name ?>
			</a>
			</li>
		<?php endforeach; ?>
	<?php else: ?>
		<p>You have no tasks</p>
	<?php endif; ?>
	</ul>
</div>


<div class="col-xs-3 pull-right">
<ul class="list-group">
	
	<h4> Actions</h4>

	<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/create_task/<?php echo $project_data->id; ?>">Create Task</a></li>
	<li class="list-group-item"><a href="<?php echo base_url(); ?>projects/edit_project/<?php echo $project_data->id; ?>">Edit Order</a></li>
	<li class="list-group-item"><a href="<?php echo base_url(); ?>projects/delete_project/<?php echo $project_data->id; ?>">Delete Order</a></li>

</ul>
</div>
