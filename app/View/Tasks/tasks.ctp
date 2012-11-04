<h3>Tasks</h3>

<h4 class="hide-toggle" data-target=".statistics"><span>Show</span> statistics</h4>
<div class="statistics hide">
	<span class="progressbar" data-progress="<?=$percentageCompletedTasks;?>"></span> <span><?=$numActiveTasks . '/' . $numTotalTasks;?> Completed</span><br><br>
</div>


<div class="actions">
	<a class="btn gray" href="<?= $this->Html->url(array("controller"=>"tasks", "action"=>"add", $project['Project']['projectId']));?>">Add Task</a>
</div>

<?php foreach ($tasks as $task) : ?>
	<div class="task">
		<div>
			
			
		</div>
	</div>
	
	<div class="task">
		<input type="checkbox" />
		<a href="<?=$this->Html->url("/projects/view/" . $project['Project']['projectId'] . "/tasks/" . $task['Task']['taskId']);?>">
			<?=$task['Task']['description'];?>
			<span class="priority <?=strtolower($task['Task']['priority']);?>">
				<?=$task['Task']['priority'];?>
			</span>
		</a>
	</div>
	
<?php endforeach; ?>
