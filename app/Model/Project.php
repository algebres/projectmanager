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
		public $hasAndBelongsToMany = array(
			'UserGroup' => array(
				'className' => 'UserGroup',
				'joinTable' => 'userGroupsInProjects',
				'foreignKey' => 'projectId',
				'associationForeignKey' => 'userGroupId'
			)
	    ); 
	}
?>