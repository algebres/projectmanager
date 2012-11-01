<?php
	class UserGroup extends AppModel {
		public $name = "UserGroup";
		public $primaryKey = "userGroupId";
		public $useTable = "userGroups";
		
		public $hasAndBelongsToMany = array(
			'User' => array(
				'className' => 'User',
				'joinTable' => 'usersInUserGroups',
				'foreignKey' => 'userGroupId',
				'associationForeignKey' => 'userId'
			),
			'Project' => array(
				'className' => 'Project',
				'joinTable' => 'userGroupsInProjects',
				'foreignKey' => 'userGroupId',
				'associationForeignKey' => 'projectId'
			)
		);
	}
?>