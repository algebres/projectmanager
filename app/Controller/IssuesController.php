<?php
	class IssuesController extends AppController {
		public $uses = array('Issue', 'Milestone', 'Project');
		
		public function add() {
			if (!empty($this->data)) {
				print_r($this->data);
				$this->Issue->save($this->data);
			}
			
			$params = $this->params['pass'];
			$projectId = $params[0];
			
			$raw_milestones = $this->Milestone->find('all', array('recursive' => -1, 'conditions' => array('Milestone.isDeleted' => false)));
			
			$milestones = array();
			foreach ($raw_milestones as $milestone) {
				$milestones[$milestone['Milestone']['milestoneId']] = $milestone['Milestone']['name'];
			}
			
			$project = $this->Project->find('first', array('recursive' => -1, 'conditions' => array('Project.projectId' => $projectId)));
			
			$this->set("project", $project);
			$this->set("milestones", $milestones);
			
			$this->set("title_for_layout", $project['Project']['name'] . " - Issue - Add");
			$this->layout = 'project';
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
			$this->Issue->set("isClosed", false);
			$this->Issue->save();
			
			$this->redirect($this->referer());
		}
		public function close() {
			$this->autoRender = false;
			
			$this->Issue->read(null, $issueId);
			$this->Issue->set("isClosed", true);
			$this->Issue->save();
			
			$this->redirect($this->referer());
		}
		public function issues($projectId) {
			$isDeleted = 0;
			$isClosed = 0;
			if (isset($this->params['url']['isDeleted'])) $isDeleted = $this->params['url']['isDeleted'];
			if (isset($this->params['url']['isClosed'])) $isClosed = $this->params['url']['isClosed'];
			
			$project = $this->Issue->Project->find('first', array(
				'recursive' => 0,
				'conditions' => array('projectId' => $projectId)
				)
			); 
			$issues = $this->Issue->find('all', array(
				'conditions' => array('Project.projectId' => $projectId, 'Issue.isDeleted' => $isDeleted, 'Issue.isClosed' => $isClosed),
				'order' => array('issueId' => 'DESC')
				)
			);
			
			$this->set("issues", $issues);
			$this->set("project", $project);
			
			$this->set("title_for_layout", $project['Project']['name'] . " - Issues");
			$this->layout = 'project';
		}
		public function issue($projectId, $issueId) {
			$issue = $this->Issue->findByIssueid($issueId);
			
			$project = $this->Project->find('first', array('recursive' => -1, 'conditions' => array('Project.projectId' => $projectId)));
			
			$this->set("issue", $issue);
			$this->set("project", $project);
			
			$this->set("title_for_layout", $project['Project']['name'] . " - Issue");
			$this->layout = 'project';
		}
	}
?>