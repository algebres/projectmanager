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
		public function delete() {}
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