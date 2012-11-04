<?php
	class LogsController extends AppController {
		public function add() {
			if (!empty($this->data)) {
				$this->Log->save($this->data);
				$this->redirect($this->data['Log']['redirectUrl']);
			}
			
			$params = $this->params['pass'];
			$projectId = $params[0];
			
			$project = $this->Log->Project->find('first', array('recursive' => -1, 'conditions' => array('Project.projectId' => $projectId)));
			
			$this->set("project", $project);
			
			$this->set("title_for_layout", $project['Project']['name'] . " - Logs - add");
			$this->layout = 'project';
		}
		
		public function edit() {}
		
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
				'conditions' => array('Project.projectId' => $projectId, 'Project.isDeleted' => 0),
				'order' => array('logId' => 'DESC')
				)
			);
			
			$this->set("log_entries", $logs);
			$this->set("project", $project);
			
			$this->set("title_for_layout", $project['Project']['name'] . " - Logs");
			$this->layout = 'project';
		}
		
		public function log_entry($projectId, $logId) {
			$log = $this->Log->findByLogid($logId);
			
			$project = $this->Log->Project->find('first', array(
				'recursive' => -1,
				'conditions' => array('Project.projectId' => $projectId)
				)
			);
			
			$this->set("log", $log);
			$this->set("project", $project);
			
			$this->set("title_for_layout", $project['Project']['name'] . " - Log entry");
			$this->layout = 'project';
		}
		
		public function addToMilestone($logId, $milestoneId) {
			
		}
		
		public function removeFromMilestone($logId) {
			
		}
	}
?>