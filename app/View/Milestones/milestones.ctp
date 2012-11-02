<a href="<?= $this->Html->url(array("controller" => "projects", "action"=>"view", $project['Project']['projectId']));?>">Back to project overview</a><br>
<a href="<?= $this->Html->url(array("controller"=>"milestones", "action"=>"add", $project['Project']['projectId']));?>">Add new </a>

<?php foreach ($milestones as $milestone) : ?>
	<div class="milestone">
		<div>
			<a href="<?=$this->Html->url("/projects/view/" . $project['Project']['projectId'] . "/milestones/" . $milestone['Milestone']['milestoneId']);?>"><?=$milestone['Milestone']['name'];?></a>
		</div>
	</div>
<?php endforeach; ?>