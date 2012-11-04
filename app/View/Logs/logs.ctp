<a class="btn gray" href="<?= $this->Html->url(array("controller"=>"logs", "action"=>"add", $project['Project']['projectId']));?>">Add Log Entry</a>
<h2>Log entries</h2>
<?php foreach($log_entries as $log_entry) : ?>
	<div class="short_log_entry">
		<div style="width: 16%; display: inline-block; margin-left: -4px;">
			<?=$log_entry['CreatedBy']['name']; ?>
		</div>
		<div style="width: 64%; display: inline-block; margin-left: -4px;">
			<a href="<?=$this->Html->url("/projects/view/" . $project['Project']['projectId'] . "/logs/" . $log_entry['Log']['logId']);?>"><?=$log_entry['Log']['message'];?></a>
		</div>
		<div style="text-align: right; width: 20%; display: inline-block; margin-left: -4px;">
			<?=$log_entry['Log']['created'];?>
		</div>
	</div>
<?php endforeach; ?>
