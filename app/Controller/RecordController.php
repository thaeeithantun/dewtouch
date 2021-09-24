<?php
	class RecordController extends AppController{
		
		public function index(){
			ini_set('memory_limit','256M');
			set_time_limit(20);
			
			$this->setFlash('Listing Record page too slow, try to optimize it.');
			
			$start_time = microtime(true);
			$records = $this->Record->find('all');
			// End clock time in seconds
			$end_time = microtime(true);
			
			// Calculate script execution time
			$execution_time = ($end_time - $start_time);
			// var_dump($execution_time); die;
			
			$this->set('records',$records);
			
			
			$this->set('title',__('List Record'));
		}
		
		
// 		public function update(){
// 			ini_set('memory_limit','256M');
			
// 			$records = array();
// 			for($i=1; $i<= 1000; $i++){
// 				$record = array(
// 					'Record'=>array(
// 						'name'=>"Record $i"
// 					)			
// 				);
				
// 				for($j=1;$j<=rand(4,8);$j++){
// 					@$record['RecordItem'][] = array(
// 						'name'=>"Record Item $j"		
// 					);
// 				}
				
// 				$this->Record->saveAssociated($record);
// 			}
			
			
			
// 		}
	}