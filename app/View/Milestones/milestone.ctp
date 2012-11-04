<a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $project['Project']['projectId'], "milestones"));?>">Show all milestones</a>

<div class="milestone">
	<?php 
	//print_r($log); 
	?>
	
	<h2><?=$milestone['Milestone']['name'];?></h2>
	<div class="description"><?=$milestone['Milestone']['description'];?></div>
	
	<div class="issues">
		<?php foreach ($milestone['Issues'] as $issue) : ?>
			<div class="issue">
				#<?=$issue['issueId'];?> <?=$issue['name'];?>
			</div>
		<?php endforeach; ?>
	</div>
</div>