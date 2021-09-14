<p class="bg-success">

	<?php if($this->session->flashdata('login_success')): ?>
	<?php echo $this->session->flashdata('login_success');?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_registration')): ?>
	<?php echo $this->session->flashdata('user_registration');?>
	<?php endif; ?>

</p>

<p class="bg-danger">

	<?php if($this->session->flashdata('login_failed')): ?>
	<?php echo $this->session->flashdata('login_failed');?>
	<?php endif; ?>

	<?php if($this->session->flashdata('no_access')): ?>
	<?php echo $this->session->flashdata('no_access');?>
	<?php endif; ?>

</p>

<div class="jumbotron" >
	<h1 class="text-center">WareHouse management System
	</h1>
</div>
<?php if(isset($projects)): ?>

<div class="panel panel-primary">
	<div class="panel-heading"><h3 class="text-center">Orders</h3></div>
	<div class="panel-body"></div>
	<ul class="list-group">
		<?php foreach($projects as $project): ?>
			<li class="list-group-item">
				<a href="<?php echo base_url(); ?>projects/display/<?php echo $project->id ?>"><?php echo $project->project_name; ?></a>
			</li>
		<?php endforeach; ?>
	
	<?php endif; ?>
	</ul>
</div>

<?php if(isset($tasks)): ?>

<div class="panel panel-primary">
	<div class="panel-heading"><h3 class="text-center">Tasks</h3></div>
	<div class="panel-body"></div>
	<ul class="list-group">
		<?php foreach($tasks as $task): ?>
			<li class="list-group-item">
				<a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->id ?>"><?php echo $task->task_name; ?></a>
			</li>
		<?php endforeach; ?>
	
	<?php endif; ?>
	</ul>
</div>



