<?= $this->Form->create("Issue"); ?>
	<?= $this->Form->hidden("redirectUrl", array("value" => $this->Html->url(null, true))); ?>
	<?= $this->Form->hidden("projectId", array("value" => $project['Project']['projectId'])); ?>

	<?= $this->Form->input("name"); ?>
	<?= $this->Form->input("description"); ?>
	<?= $this->Form->select("milestoneId", $milestones); ?>
<?= $this->Form->end("Add"); ?>