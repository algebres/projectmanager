<a class="btn gray" href="<?= $this->Html->url(array("controller"=>"milestones", "action"=>"add", $project['Project']['projectId']));?>">Add Milestone</a>
<h2>Milestones</h2>

<?php foreach ($milestones as $milestone) : ?>
	<div class="milestone">
		<div>
			<a href="<?=$this->Html->url("/projects/view/" . $project['Project']['projectId'] . "/milestones/" . $milestone['Milestone']['milestoneId']);?>"><?=$milestone['Milestone']['name'];?></a>
		</div>
	</div>
<?php endforeach; ?>