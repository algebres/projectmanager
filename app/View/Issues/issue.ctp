<a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $projectId, "issues"));?>">Show all issues</a>

<div class="issue">
	<?php 
	//print_r($log); 
	?>
	
	<h2><?=$milestone['Issue']['name'];?></h2>
	<div class="description"><?=$milestone['Issue']['description'];?></div>
</div>