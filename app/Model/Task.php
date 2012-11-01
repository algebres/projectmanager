<?php
	class Task extends AppModel {
		public $name = "Task";
		public $primaryKey = "taskId";
		
		public $belongsTo  = array(
			'CreatedBy' => array(
				'className' => 'User',
				'foreignKey' => 'createdBy'
				),
			'ChangedBy' => array(
				'className' => 'User',
				'foreignKey' => 'changedBy'
				),
			'Project' => array(
				'className' => 'Project',
				'foreignKey' => 'projectId'
				)
			);
	}
?>