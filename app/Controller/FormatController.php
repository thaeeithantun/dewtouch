<?php
	class FormatController extends AppController{
		
		public function q1(){
			
			// post
			if ($this->request->is('post')) {
				$selected_type = $this->request->data['Type']['type'];
				// var_dump($selected_type); die;
				if($selected_type) {
					return $this->redirect(array('action' => 'show', $selected_type));
				} else {
					$this->setFlash('Question: Please Choose Type!');
				}
				
			} else {
				$this->setFlash('Question: Please change Pop Up to mouse over (soft click)');
			}

			// $this->setFlash('Question: Please change Pop Up to mouse over (soft click)');
				
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}
		
		public function q1_detail(){

			$this->setFlash('Question: Please change Pop Up to mouse over (soft click)');
				
			
			
// 			$this->set('title',__('Question: Please change Pop Up to mouse over (soft click)'));
		}

		public function show($selected_type) {
			$this->set(compact('selected_type'));
			$this->setFlash('Selected: You selected this value');
		}
		
	}