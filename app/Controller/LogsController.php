<?php
	class LogsController extends AppController {
		public function add() {
			if (!empty($this->data)) {
				$this->Log->save($this->data);
				$this->redirect($this->data['Log']['redirectUrl']);
			}
			
			$params = $this->params['pass'];
			
			$this->set("projectId", $params[0]);
		}
		
		public function delete($logId) {
			$this->autoRender = false;
			
			$this->Log->read(null, $logId);
			$this->Log->set('isDeleted', 1);
			$this->Log->save();
			
			
    		$this->redirect($this->referer());
		}
		
		public function restore($logId) {
			$this->autoRender = false;
			
			$this->Log->read(null, $logId);
			$this->Log->set('isDeleted', 0);
			$this->Log->save();
			
    		$this->redirect($this->referer());
		}
		
		public function logs($projectId) {
			$project = $this->Log->Project->find('first', array(
				'recursive' => 0,
				'conditions' => array('projectId' => $projectId)
				)
			); 
			$logs = $this->Log->find('all', array(
				'conditions' => array('Project.projectId' => $projectId, 'isDeleted' => 0),
				'order' => array('logId' => 'DESC')
				)
			);
			
			$this->set("log_entries", $logs);
			$this->set("project", $project);
		}
		
		public function log_entry($projectId, $logId) {
			$log = $this->Log->findByLogid($logId);
			$this->set("log", $log);
			$this->set("projectId", $projectId);
		}
		
		public function addToMilestone($logId, $milestoneId) {
			
		}
		
		public function removeFromMilestone($logId) {
			
		}
	}
?>