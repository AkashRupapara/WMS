<p class="bg-success">
	
	<?php if($this->session->flashdata('task_updated')): ?>
	<?php echo $this->session->flashdata('task_updated'); ?>
	<?php endif; ?>

</p>

<div class="col-xs-9 ">

<h1><?php echo $task->task_name; ?></h1>
<p>Project Name:<?php echo $project_name; ?> </p>
<p>Created: <?php echo $task->date_created; ?> </p>
<p>Due: <?php echo $task->due_date; ?> </p>
<h4>Description</h4>
<p class="task-description"><?php echo $task->task_body; ?></p>

<!-- <h1><?php// echo $project_name; ?></h1>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>
				Task Name
			</th>
			<th>
				Task Body
			</th>
			<th>
				Date
			</th>
			
		</tr>
	</thead>	
	<tbody>

		<?php //foreach($projects as $project): ?>
			<tr>
			
			<td>
				
					<?php //echo $task->task_name; ?>
				
			</td>
			<td><?php// echo $task->task_body; ?></td>
			<td><?php// echo $task->date_created; ?></td>
		
			</tr>

		<?php //endforeach; ?>
	</tbody>

</table> -->
</div>

<div class="col-xs-3 pull-right">
<ul class="list-group">
	
	<h4> Actions</h4>

	<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/edit_task/<?php echo $task->id; ?>">Edit</a></li>
	<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/delete_task/<?php echo $task->project_id; ?>/<?php echo $task->id; ?>">Delete</a></li>
	<li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/mark_complete/<?php echo $task->id; ?>">Mark</a></li>
	<li  class="list-group-item"><a href="<?php echo base_url(); ?>tasks/mark_incomplete/<?php echo $task->id; ?>">Unmark</a></li>

</ul>
</div>

