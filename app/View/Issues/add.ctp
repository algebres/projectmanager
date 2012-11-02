<?= $this->Form->create("Issue"); ?>
	<?= $this->Form->hidden("redirectUrl", array("value" => $this->Html->url(null, true))); ?>
	<?= $this->Form->hidden("projectId", array("value" => $projectId)); ?>
	<?= $this->Form->hidden("status", array("value" => 1)); ?>
	
	<?= $this->Form->input("name"); ?>
	<?= $this->Form->input("description"); ?>
<?= $this->Form->end("Add"); ?>