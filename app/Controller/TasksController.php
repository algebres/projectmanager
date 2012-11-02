<?php
	class TasksController extends AppController {
		public function index() {}
		public function add() {
			if (!empty($this->data)) {
				print_r($this->data);
				$this->Task->save($this->data);
			}
			
			$params = $this->params['pass'];
			
			$this->set("projectId", $params[0]);
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
				'conditions' => array('Project.projectId' => $projectId, 'isDeleted' => 0),
				'order' => array('priority' => 'DESC', 'Task.created' => 'DESC')
				)
			);
			
			$this->set("tasks", $logs);
			$this->set("project", $project);
		}
		public function task($projectId, $taskId) {
			$task = $this->Task->findByTaskid($taskId);
			
			$this->set("task", $task);
			$this->set("projectId", $projectId);
		}
	}
?>