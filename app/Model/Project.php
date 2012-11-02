<?php
	class Project extends AppModel {
		public $name = "Project";	
		public $primaryKey = "projectId";	
		
		public $hasMany = array(
	        'Log' => array(
	            'className'     => 'Log',
	            'foreignKey'    => 'projectId',
	            'dependent'		=> true
	        ),
	        'Milestone' => array(
				'className'		=> 'Milestone',
				'foreignKey'	=> 'projectId',
				'dependant' 	=> true
			),
			'Issue' => array(
				'className'		=> 'Issue',
				'foreignKey'	=> 'projectId',
				'dependant'		=> true
			),
			'Task' => array(
				'className'		=> 'Task',
				'foreignKey' 	=> 'projectId',
				'dependant'		=> TRUE
			)
		);
		public $belongsTo  = array(
			'CreatedBy' => array(
				'className' => 'User',
				'foreignKey' => 'createdBy'
				),
			'ChangedBy' => array(
				'className' => 'User',
				'foreignKey' => 'changedBy'
				)
			);
		public $hasAndBelongsToMany = array(
			'UserGroup' => array(
				'className' => 'UserGroup',
				'joinTable' => 'userGroupsInProjects',
				'foreignKey' => 'projectId',
				'associationForeignKey' => 'userGroupId'
			)
	    ); 
	    
		function beforeSave($options) {
			if (empty($this->data['Project']['changed'])) {
				$this->data['Project']['changed'] = date("Y-m-d H:i:s");
			}
			return true;
		}
	}
?>