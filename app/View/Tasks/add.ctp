<h3>Add Task</h3>

<?= $this->Form->create("Task"); ?>
	<?= $this->Form->hidden("redirectUrl", array("value" => $this->Html->url(null, true))); ?>
	<?= $this->Form->hidden("projectId", array("value" => $project['Project']['projectId'])); ?>
	<?= $this->Form->hidden("status", array("value" => 1)); ?>
	<?= $this->Form->input("description"); ?>
	<?= $this->Form->input("priority", array('type' => 'select', 'options' => array(1 => 'Low', 2 => 'Medium', 3 => 'High'))); ?>
<?= $this->Form->end("Add"); ?>