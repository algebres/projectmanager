<?php
	class Issue extends AppModel {
		public $name = 'Issue';
		public $primaryKey = 'issueId';
		
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