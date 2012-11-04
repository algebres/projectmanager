<h2>Last 5 Log Entries</h2>
<?php foreach ($log_entries as $log_entry) : ?>
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
<div style="text-align: right;">
 <a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $project['Project']['projectId'], "logs"));?>">Show all log entries</a>
</div>

<h2>Last 5 Tasks</h2>
<?php foreach ($tasks as $task) : ?>
	<div class="task">
		<div>
			<span style="display:inline-block; width: 80px;" class="priority <?=$task['Task']['priority'];?>">
				<?=$task['Task']['priority'];?>
			</span>
			<a href="<?=$this->Html->url("/projects/view/" . $project['Project']['projectId'] . "/tasks/" . $task['Task']['taskId']);?>"><?=$task['Task']['description'];?></a>
		</div>
	</div>
<?php endforeach; ?>
<div style="text-align: right;">
 <a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $project['Project']['projectId'], "tasks"));?>">Show all tasks</a>
</div>

<h2>Last 5 Milestones</h2>
<?php foreach ($milestones as $milestone) : ?>
	<div class="milestone">
		<div>
			<a href="<?=$this->Html->url("/projects/view/" . $project['Project']['projectId'] . "/milestones/" . $milestone['Milestone']['milestoneId']);?>"><?=$milestone['Milestone']['name'];?></a>
		</div>
	</div>
<?php endforeach; ?>
<div style="text-align: right;">
 <a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $project['Project']['projectId'], "milestones"));?>">Show all milestones</a>
</div>

<h2>Last 5 Issues</h2>
<?php foreach ($issues as $issue) : ?>
	<div class="issue">
		<div>
			<a href="<?=$this->Html->url("/projects/view/" . $project['Project']['projectId'] . "/issues/" . $issue['Issue']['issueId']);?>"><?=$issue['Issue']['name'];?></a>
		</div>
	</div>
<?php endforeach; ?>
<div style="text-align: right;">
 <a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $project['Project']['projectId'], "issues"));?>">Show all issues</a>
</div>
