<h1><?= $project['Project']['name']; ?></h1>
<p class="description"><?=$project['Project']['description'];?></p>

<a href="<?=$this->Html->url(array('controller'=>'projects', 'action'=>'index'));?>">Back to project overview</a><br>

<h2>Last 5 Log Entries</h2>
<?php foreach ($log_entries as $log_entry) : ?>
	<div class="short_log_entry">
		<div style="width: 16%; display: inline-block; margin-left: -4px;">
			<?=$log_entry['User']['firstname'] . " " . $log_entry['User']['lastname']; ?>
		</div>
		<div style="width: 64%; display: inline-block; margin-left: -4px;">
			<a href="<?=$this->Html->url("/projects/view/" . $project['Project']['projectId'] . "/logs/" . $log_entry['Log']['logId']);?>"><?=$log_entry['Log']['message'];?></a>
		</div>
		<div style="text-align: right; width: 20%; display: inline-block; margin-left: -4px;">
			<?=$log_entry['Log']['created'];?>
		</div>
	</div>
<?php endforeach; ?>
<div style="text-align: right;">
 <a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $project['Project']['projectId'], "logs"));?>">Show all log entries</a>
</div>











<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
	print_r($project);
	echo '<hr>';
	print_r($log_entries);
	echo '<hr>';
	print_r($milestones);
	echo '<hr>';
	print_r($issues);
	echo '<hr>';
	print_r($tasks);
	echo '<hr>';
	print_r($project);
?>