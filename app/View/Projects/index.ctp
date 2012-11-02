<?php foreach ($projects as $project) :?>
	<div class="project" style="margin-bottom: 50px;">
		<h1><?=$project['Project']['name'];?></h1>
		<p class="description"><?=$project['Project']['description'];?></p>	
					
		<div class="more_info">
			Number of log entries: <?=count($project['Log']);?><br>
			Number of tasks: <?=count($project['Task']);?><br>
			Number of milstones: <?=count($project['Milestone']);?><br>
			Number of issues: <?=count($project['Issue']);?>
		</div>
		
		<ul>
			<li><a href="<?=$this->Html->url("/projects/view/" . $project['Project']['projectId']); ?>">VIEW</a></li>
			<li><a href="<?=$this->Html->url("/projects/edit/" . $project['Project']['projectId']); ?>">EDIT</a></li>
			<li><a href="<?=$this->Html->url("/projects/delete/" . $project['Project']['projectId']); ?>">DELETE</a></li>
		</ul>
	</div>
<?php endforeach; ?>