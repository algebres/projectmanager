<a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $project['Project']['projectId'], "logs"));?>">Show all log entries</a>

<div class="log_entry">
	<?php 
	//print_r($log); 
	?>
	
	
	<div class="author"><?=$log['CreatedBy']['name'];?> wrote:</div>
	<div class="message"><?=$log['Log']['message'];?></div>
	<div class="date"><?=$log['Log']['created'];?></div>
</div>