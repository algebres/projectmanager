<?php
	class ProjectsController extends AppController {
		public $uses = array('Project', 'Log', 'Milestone', 'Issue', 'Task', 'UserGroup');
		
		public function index() {
			$this->set("projects", $this->Project->find('all'));
		}
		
		public function view($projectId) {
			$project = $this->Project->find('first', array('recursive' => 0, 'conditions' => array('projectId' => $projectId)));
			
			$logs = $this->Log->find('all', array(
				'conditions' => array('Project.projectId' => $projectId, 'isDeleted' => 0),
				'limit' => 5,
				'order' => array('logId' => 'DESC')
				)
			);
			
			$milestones = $this->Milestone->find('all', array(
				'conditions' => array('Project.projectId' => $projectId, 'isDeleted' => 0),
				'limit' => 5
				)
			);
	
			$issues = $this->Issue->find('all', array(
				'conditions' => array('Project.projectId' => $projectId),
				'limit' => 5
				)
			);
			
			$tasks = $this->Task->find('all', array(
				'conditions' => array('Project.projectId' => $projectId),
				'limit' => 5
				)
			);
			
			$this->set("project", $project);
			$this->set("log_entries", $logs);
			$this->set("milestones", $milestones);
			$this->set("issues", $issues);
			$this->set("tasks", $tasks);
		}
		
		
		public function tasks($id) {
			
		}
		
		public function milestones($id) {
			
		}
		
		public function issues($id) {
			
		}
	}
?>