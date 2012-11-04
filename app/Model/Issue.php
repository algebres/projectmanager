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
				),
			'Milestone' => array(
				'className' => 'Milestone',
				'foreignKey' => 'milestoneId'
				)
			);
			
		public function afterFind($results, $primary = false) {
			foreach ( $results as $key => $val ) {
				if (isset($val['Issue']['isClosed']))
					$results[$key]['Issue']['isClosed'] = $this->isClosedAfterFind($val['Issue']['isClosed']);
			}
			return $results;
		}
		
		public function isClosedAfterFind($isClosed) {
			$string = "";
			switch ($isClosed) {
				case 0:
					$string = "Open";
					break;
				case 1:
					$string = "Closed";
					break;
				default:
					$string = "N/A";
			}
			return $string;
		}
	}
?>