<?= $this->Form->create("Log"); ?>
	<?= $this->Form->hidden("redirectUrl", array("value" => $this->Html->url(null, true))); ?>
	<?= $this->Form->hidden("projectId", array("value" => $projectId)); ?>
	<?= $this->Form->input("message"); ?>
<?= $this->Form->end("Add"); ?>