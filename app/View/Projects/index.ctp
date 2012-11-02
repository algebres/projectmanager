<?php foreach ($projects as $project) :?>
	<div class="project" style="margin-bottom: 50px;">
		<h1><?=$project['Project']['name'];?></h1>
		<p class="description"><?=$project['Project']['description'];?></p>	
					
		<div class="more_info">
			Number of log entries: <?=count($project['Log']);?><br>
			Number of tasks: <?=count($project['Task']);?><br>
			Number of milstones: <?=count($project['Milestone']);?>
		</div>
		
		<a href="<?=$this->Html->url("/projects/view/" . $project['Project']['projectId']); ?>">VIEW</a> | <a href="">EDIT</a>
	</div>
<?php endforeach; ?>