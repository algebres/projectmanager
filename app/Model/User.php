<?php
	class User extends AppModel {
		public $name = "User";
		public $primaryKey = "userId";
		
		public $hasAndBelongsToMany = array(
			'UserGroup' => array(
				'className' => 'UserGroup',
				'joinTable' => 'usersInUserGroups',
				'foreignKey' => 'userId',
				'associationForeignKey' => 'userGroupId'
			)
	    );
	}
?>