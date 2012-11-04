<?php
	class Task extends AppModel {
		public $name = "Task";
		public $primaryKey = "taskId";
		
		public $order = array('Task.priority' => 'DESC', 'Task.created' => 'DESC');
		
		public $belongsTo  = array(
			'CreatedBy' => array(
				'className' => 'User',
				'foreignKey' => 'createdBy'
				),
			'ChangedBy' => array(
				'className' => 'User',
				'foreignKey' => 'changedBy'
				),
			'CompletedBy' => array(
				'className' => 'User',
				'foreignKey' => 'completedBy'
				),
			'Project' => array(
				'className' => 'Project',
				'foreignKey' => 'projectId'
				)
			);
		
		function beforeSave($options) {
			if (empty($this->data['Task']['changed'])) {
				$this->data['Task']['changed'] = date("Y-m-d H:i:s");
			}
			return true;
		}
		
		public function afterFind($results, $primary = false) {
			foreach ( $results as $key => $val ) {
				if (isset($val['Task']['priority'])) 
					$results[$key]['Task']['priority'] = $this->priorityAfterFind($val['Task']['priority']); 
				if (isset($val['Task']['isClosed']))
					$results[$key]['Task']['isClosed'] = $this->isClosedAfterFind($val['Task']['isClosed']);
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
		
		public function priorityAfterFind($priority) {
			$string = "";
			switch ($priority) {
				case 1:
					$string = "Low";
					break;
				case 2:
					$string = "Medium";
					break;
				case 3:
					$string = "High";
					break;
				default:
					$string = "N/A";
			}
			
			return $string;
		}
	}
?>