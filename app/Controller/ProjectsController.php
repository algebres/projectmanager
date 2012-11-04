<?php
	class ProjectsController extends AppController {
		public $uses = array('Project', 'Log', 'Milestone', 'Issue', 'Task', 'UserGroup');
		
		public function index() {
			$this->set("projects", $this->Project->find('all', array('conditions' => array('Project.isDeleted' => 0 ))));
		}
		
		public function add() {
			if (!empty($this->data)) {
				$this->Project->save($this->data);
				$this->redirect('/projects/');
			}
		}
		
		public function edit($projectId) {
			if (!empty($this->data)) {
				$this->Project->save($this->data);
				$this->redirect('/projects/view/'.$projectId);
			}
			
			$this->data = $this->Project->find('first', array('conditions' => array('projectId' => $projectId), 'recursive' => -1));
		}
		
		public function delete($projectId) {
			$this->autoRender = false;
			
			$this->Project->read(null, $projectId);
			$this->Project->set('isDeleted', true);
			$this->Project->save();
			
			$this->redirect("/projects/");
		}
		
		public function restore($projectId) {
			$this->autoRender = false;
			
			$this->Project->read(null, $projectId);
			$this->Project->set('isDeleted', false);
			$this->Project->save();
			
			$this->redirect("/projects/");
		}
		
		public function view($projectId) {
			$project = $this->Project->find('first', array('recursive' => 0, 'conditions' => array('projectId' => $projectId)));
			
			$logs = $this->Log->find('all', array(
				'conditions' => array('Project.projectId' => $projectId, 'Log.isDeleted' => 0),
				'limit' => 5,
				'order' => array('logId' => 'DESC')
				)
			);
			
			$milestones = $this->Milestone->find('all', array(
				'conditions' => array('Project.projectId' => $projectId, 'Milestone.isDeleted' => 0),
				'limit' => 5
				)
			);
	
			$issues = $this->Issue->find('all', array(
				'conditions' => array('Project.projectId' => $projectId, 'Issue.isDeleted' => 0),
				'limit' => 5
				)
			);
			
			$tasks = $this->Task->find('all', array(
				'conditions' => array('Project.projectId' => $projectId, 'Task.isDeleted' => 0),
				'limit' => 5
				)
			);
			
			$this->set("project", $project);
			$this->set("log_entries", $logs);
			$this->set("milestones", $milestones);
			$this->set("issues", $issues);
			$this->set("tasks", $tasks);
			
			$this->set("title_for_layout", $project['Project']['name'] . " - Overview");
			$this->layout = 'project';
		}
	}
?>