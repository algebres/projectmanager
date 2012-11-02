<?php
	class IssuesController extends AppController {
		public function add() {
			if (!empty($this->data)) {
				$this->Issue->save($this->data);
			}
			
			$params = $this->params['pass'];
			
			$this->set("projectId", $params[0]);
		}
		public function delete($issueId) {
			$this->autoRender = false;
			
			$this->Issue->read(null, $issueId);
			$this->Issue->set("isDeleted", true);
			$this->Issue->save();
			
			$this->redirect($this->referer());
		}
		public function restore() {
			$this->autoRender = false;
			
			$this->Issue->read(null, $issueId);
			$this->Issue->set("isDeleted", false);
			$this->Issue->save();
			
			$this->redirect($this->referer());
		}
		public function open() {
			$this->autoRender = false;
			
			$this->Issue->read(null, $issueId);
			$this->Issue->set("status", true);
			$this->Issue->save();
			
			$this->redirect($this->referer());
		}
		public function close() {
			$this->autoRender = false;
			
			$this->Issue->read(null, $issueId);
			$this->Issue->set("status", false);
			$this->Issue->save();
			
			$this->redirect($this->referer());
		}
		public function issues($projectId) {
			$project = $this->Issue->Project->find('first', array(
				'recursive' => 0,
				'conditions' => array('projectId' => $projectId)
				)
			); 
			$issues = $this->Issue->find('all', array(
				'conditions' => array('Project.projectId' => $projectId, 'isDeleted' => 0),
				'order' => array('issueId' => 'DESC')
				)
			);
			
			$this->set("issues", $issues);
			$this->set("project", $project);
		}
		public function issue($projectId, $issueId) {
			$issue = $this->Issue->findByIssueid($issueId);
			$this->set("issue", $issue);
			$this->set("projectId", $projectId);
		}
	}
?>