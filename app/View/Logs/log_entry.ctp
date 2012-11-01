<a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $projectId, "logs"));?>">Show all log entries</a>

<div class="log_entry">
	<?php 
	//print_r($log); 
	?>
	
	
	<div class="author"><?=$log['User']['firstname'];?> <?=$log['User']['lastname'];?> wrote:</div>
	<div class="message"><?=$log['Log']['message'];?></div>
	<div class="date"><?=$log['Log']['created'];?></div>
</div>