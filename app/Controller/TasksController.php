<?php
	class TasksController extends AppController {
		public function index() {}
		public function add() {
			if (!empty($this->data)) {
				print_r($this->data);
				$this->Task->save($this->data);
			}
			
			$params = $this->params['pass'];
			$projectId = $params[0];
			
			
			$project = $this->Task->Project->find('first', array(
				'recursive' => -1,
				'conditions' => array('Project.projectId' => $projectId)
				)
			);
			
			$this->set("project", $project);
			$this->set("title_for_layout", $project['Project']['name'] . " - Task");
			
			$this->layout = 'project';
		}
		public function delete($taskId) {
			$this->autoRender = false;
			
			$this->Task->read(null, $taskId);
			$this->Task->set('isDeleted', true);
			$this->Task->save();
			
			$this->redirect($this->referer());
		}
		public function restore($taskId) {
			$this->autoRender = false;
			
			$this->Task->read(null, $taskId);
			$this->Task->set('isDeleted', false);
			$this->Task->save();
			
			$this->redirect($this->referer());
		}
		public function close($taskId) {
			$this->autoRender = false;
			
			$this->Task->read(null, $taskId);
			$this->Task->set('status', false);
			$this->Task->save();
			
			$this->redirect($this->referer());
		}
		public function open($taskId) {
			$this->autoRender = false;
			
			$this->Task->read(null, $taskId);
			$this->Task->set('status', true);
			$this->Task->save();
			
			$this->redirect($this->referer());
		}
		public function tasks($projectId) {
			 $project = $this->Task->Project->find('first', array(
				'recursive' => 0,
				'conditions' => array('projectId' => $projectId)
				)
			);
			
			$logs = $this->Task->find('all', array(
				'conditions' => array('Project.projectId' => $projectId, 'Task.isDeleted' => 0),
				'order' => array('priority' => 'DESC', 'Task.created' => 'DESC')
				)
			);
			
			$this->set("tasks", $logs);
			$this->set("project", $project);
			
			$this->set("title_for_layout", $project['Project']['name'] . " - Tasks");
			$this->layout = 'project';
		}
		public function task($projectId, $taskId) {
			$task = $this->Task->findByTaskid($taskId);
			
			$project = $this->Task->Project->find('first', array(
				'recursive' => -1,
				'conditions' => array('projectId' => $projectId)
				)
			);
			
			$this->set("task", $task);
			$this->set("project", $project);
			
			$this->set("title_for_layout", $project['Project']['name'] . " - Task");
			$this->layout = 'project';
		}
	}
?>