<?php
	App::uses('AuthComponent', 'Controller/Component');
	class User extends AppModel {
		public $name = "User";
		public $primaryKey = "userId";
		
		public $validate = array(
			'username' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'A username is required.'
				)
			),
			'password' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'A password is required'
				)
			),
			'email' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'An email is required'
				)
			)
		);
		
		public $hasAndBelongsToMany = array(
			'UserGroup' => array(
				'className' => 'UserGroup',
				'joinTable' => 'usersInUserGroups',
				'foreignKey' => 'userId',
				'associationForeignKey' => 'userGroupId'
			)
	    );
		
		public function beforeSave($options = array()) {
		    if (isset($this->data[$this->alias]['password'])) {
		        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		    }
		    return true;
		}
	}
?>