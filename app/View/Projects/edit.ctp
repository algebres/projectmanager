<a href="<?=$this->Html->url(array("controller"=>"projects", "action"=>"view", $this->data['Project']['projectId']));?>">Back to project overview</a>

<?= $this->Form->create("Project"); ?>
	<?= $this->Form->hidden("redirectUrl", array("value" => $this->Html->url(null, true))); ?>
	<?= $this->Form->hidden("projectId"); ?>
	<?= $this->Form->input("name"); ?>
	<?= $this->Form->input("description"); ?>
<?= $this->Form->end("Edit"); ?>