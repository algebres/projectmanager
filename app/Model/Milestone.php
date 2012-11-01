<?php
	class Milestone extends AppModel {
		public $name = "Milestone";
		public $primaryKey = "milestoneId";
		
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