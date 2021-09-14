<h2>Orders</h2>

<p class="bg-success">
	
	<?php if($this->session->flashdata('project_created')): ?>
	<?php echo $this->session->flashdata('project_created'); ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('project_updated')): ?>
	<?php echo $this->session->flashdata('project_updated'); ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('project_deleted')): ?>
	<?php echo $this->session->flashdata('project_deleted'); ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('task_updated')): ?>
	<?php echo $this->session->flashdata('task_updated'); ?>
	<?php endif; ?>

</p>
<a class="btn btn-primary pull-right" href="<?php echo base_url(); ?>projects/create_project">New Orders</a>
<table class="table">
	<thead>
		<tr>
			<th>
				Order Number
			</th>
			<th>
				Order Body
			</th>
		</tr>
	</thead>	
	<tbody>

		<?php foreach($projects as $project): ?>
			<tr>
			<?php echo "<td><a href='".base_url()."projects/display/". $project->id ."'>" . $project->project_name . "</td>"; ?>
			<?php echo "<td>" . $project->project_body . "</td>"; ?>
			<td><a class="btn btn-danger pull-right" href="<?php echo base_url(); ?>projects/delete_project/<?php echo $project->id ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>

		<?php endforeach; ?>
	</tbody>

</table>