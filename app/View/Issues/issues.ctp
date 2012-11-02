<a href="<?= $this->Html->url(array("controller" => "projects", "action"=>"view", $project['Project']['projectId']));?>">Back to project overview</a><br>
<a href="<?= $this->Html->url(array("controller"=>"issues", "action"=>"add", $project['Project']['projectId']));?>">Add new issue</a>
<h2>Log entries</h2>
<?php foreach($issues as $issue) : ?>
	<div class="issue">
		<div>
			<a href="<?=$this->Html->url("/projects/view/" . $project['Project']['projectId'] . "/issue/" . $issue['Issue']['issueId']);?>"><?=$issue['Issue']['name'];?></a>
		</div>
	</div>
<?php endforeach; ?>
