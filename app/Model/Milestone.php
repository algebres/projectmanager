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
		public $hasMany = array(
			'Issues' => array(
				'className' => 'Issue',
				'foreignKey' => 'milestoneId'
				)
			);
			
		public function afterFind($results, $primary = false) {
			foreach ( $results as $key => $val ) {
				if (isset($val['Milestone']['status']))
					$results[$key]['Milestone']['status'] = $this->statusAfterFind($val['Milestone']['status']);
			}
			return $results;
		}
		
		public function statusAfterFind($status) {
			$string = "";
			switch ($status) {
				case 1:
					$string = "Open";
					break;
				case 2:
					$string = "Closed";
					break;
				default:
					$string = "N/A";
			}
			return $string;
		}
	}
?>