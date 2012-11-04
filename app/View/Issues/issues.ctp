<a class="btn gray" href="<?= $this->Html->url(array("controller"=>"issues", "action"=>"add", $project['Project']['projectId']));?>">Add Issue</a>
<h2>Issues</h2>

<?php foreach($issues as $issue) : ?>
	<div class="issue">
		<div>
			<a href="<?=$this->Html->url("/projects/view/" . $project['Project']['projectId'] . "/issue/" . $issue['Issue']['issueId']);?>"><?=$issue['Issue']['name'];?></a>
		</div>
	</div>
<?php endforeach; ?>
