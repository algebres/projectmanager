<?php
	class MilestonesController extends AppController {
		public function add() {
			if (!empty($this->data)) {
				$this->Milestone->save($this->data);
			}
			
			$params = $this->params['pass'];
			$projectId = $params[0];
			
			$project = $this->Milestone->Project->find('first', array(
				'recursive' => -1,
				'conditions' => array('Project.projectId' => $projectId)
				)
			);
			
			$this->set("project", $project);
			
			$this->set("title_for_layout", $project['Project']['name'] . " - Milestones - add");
			$this->layout = 'project';
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
				'recursive' => -1,
				'conditions' => array('projectId' => $projectId)
				)
			); 
			$milestones = $this->Milestone->find('all', array(
				'conditions' => array('Project.projectId' => $projectId, 'Project.isDeleted' => 0),
				'order' => array('milestoneId' => 'DESC')
				)
			);
			
			$this->set("milestones", $milestones);
			$this->set("project", $project);
			
			$this->set("title_for_layout", $project['Project']['name'] . " - Milestones");
			$this->layout = 'project';
		}
		public function milestone($projectId, $milestoneId) {
			$milestone = $this->Milestone->findByMilestoneid($milestoneId);
			$project = $this->Milestone->Project->find('first', array(
				'recursive' => -1,
				'conditions' => array('projectId' => $projectId)
				)
			); 
			$this->set("milestone", $milestone);
			$this->set("project", $project);
			
			$this->set("title_for_layout", $project['Project']['name'] . " - Milestone");
			$this->layout = 'project';
		}
	}
?>