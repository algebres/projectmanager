<h3>Add Log Entry</h3>

<?= $this->Form->create("Log"); ?>
	<?= $this->Form->hidden("redirectUrl", array("value" => $this->Html->url(null, true))); ?>
	<?= $this->Form->hidden("projectId", array("value" => $project['Project']['projectId'])); ?>
	<?= $this->Form->input("message"); ?>
<?= $this->Form->end("Add"); ?>