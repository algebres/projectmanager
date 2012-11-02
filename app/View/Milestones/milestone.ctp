<a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $projectId, "milestones"));?>">Show all milestones</a>

<div class="milestone">
	<?php 
	//print_r($log); 
	?>
	
	<h2><?=$milestone['Milestone']['name'];?></h2>
	<div class="description"><?=$milestone['Milestone']['description'];?></div>
</div>