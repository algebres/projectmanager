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
			$this->Task->set('isClosed', true);
			$this->Task->set('completed', date("Y-m-d H:i:s"));
			$this->Task->save();
			
			$this->redirect($this->referer());
		}
		public function open($taskId) {
			$this->autoRender = false;
			
			$this->Task->read(null, $taskId);
			$this->Task->set('isClosed', false);
			$this->Task->set('completed', null);
			$this->Task->save();
			
			$this->redirect($this->referer());
		}
		public function tasks($projectId) {
			$isDeleted = 0;
			$isClosed = 0;
				
			$params = $this->params['url'];
			
			if (isset($params['includeDeleted'])) $isDeleted = $params['includeDeleted'];
			if (isset($params['isClosed'])) $isClosed = $params['isClosed'];			
			
			$project = $this->Task->Project->find('first', array(
				'recursive' => 0,
				'conditions' => array('projectId' => $projectId)
				)
			);
			
			$taskArgs = array(
				'conditions' => array('Project.projectId' => $projectId, 'Task.isDeleted' => $isDeleted, 'Task.isClosed' => $isClosed),
				'order' => array('priority' => 'DESC', 'Task.created' => 'DESC')
			);
			
			$tasks = $this->Task->find('all', $taskArgs);
			
			$totalTasks = $this->Task->find('count', array('conditions' => array('Project.projectId' => $projectId, 'Task.isDeleted' => false)));
			$activeTasks = $this->Task->find('count', array('conditions' => array('Project.projectId' => $projectId, 'Task.isDeleted' => false, 'Task.isClosed' => false)));
			
			$this->set("tasks", $tasks);
			$this->set("project", $project);
			
			$this->set("percentageCompletedTasks", floor($activeTasks/$totalTasks * 100));
			
			$this->set("numTotalTasks", $totalTasks);
			$this->set("numActiveTasks", $activeTasks);
			
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
		
		private function numActiveTasks($projectId) {
			
		}
	}
?>