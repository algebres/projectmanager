<a href="<?= $this->Html->url(array("controller" => "projects", "action"=>"view", $project['Project']['projectId']));?>">Back to project overview</a><br>
<a href="<?= $this->Html->url(array("controller"=>"tasks", "action"=>"add", $project['Project']['projectId']));?>">Add new task</a>
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
