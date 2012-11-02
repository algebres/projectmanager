<?php
	class MilestonesController extends AppController {
		public function add() {
			if (!empty($this->data)) {
				$this->Milestone->save($this->data);
			}
			
			$params = $this->params['pass'];
			
			$this->set("projectId", $params[0]);
		}
		public function delete($milestoneId) {
			$this->autoRender = false;
			
			$this->Milestone->read(null, $milestoneId);
			$this->Milestone->set('isDeleted', true);
			$this->Milestone->save();
			
			$this->redirect($this->referer());
		}
		public function restore($milestoneId) {
			$this->autoRender = false;
			
			$this->Milestone->read(null, $milestoneId);
			$this->Milestone->set('isDeleted', false);
			$this->Milestone->save();
			
			$this->redirect($this->referer());
		}
		public function open($milestoneId) {
			$this->autoRender = false;
			
			$this->Milestone->read(null, $milestoneId);
			$this->Milestone->set('status', true);
			$this->Milestone->save();
			
			$this->redirect($this->referer());
		}
		public function close($milestoneId) {
			$this->autoRender = false;
			
			$this->Milestone->read(null, $milestoneId);
			$this->Milestone->set('status', false);
			$this->Milestone->save();
			
			$this->redirect($this->referer());
		}
		public function milestones($projectId) {
			$project = $this->Milestone->Project->find('first', array(
				'recursive' => 0,
				'conditions' => array('projectId' => $projectId)
				)
			); 
			$milestones = $this->Milestone->find('all', array(
				'conditions' => array('Project.projectId' => $projectId, 'isDeleted' => 0),
				'order' => array('milestoneId' => 'DESC')
				)
			);
			
			$this->set("milestones", $milestones);
			$this->set("project", $project);
		}
		public function milestone($projectId, $milestoneId) {
			$milestone = $this->Milestone->findByMilestoneid($milestoneId);
			$this->set("milestone", $milestone);
			$this->set("projectId", $projectId);
		}
	}
?>