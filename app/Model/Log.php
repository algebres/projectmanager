<?php
	class Log extends AppModel {
		public $name = "Log";
		public $primaryKey = "logId";
		
		public $belongsTo  = array(
			'User' => array(
				'className' => 'User',
				'foreignKey' => 'createdBy'
				),
			'Project' => array(
				'className' => 'Project',
				'foreignKey' => 'projectId'
				)
			);
	}
?>