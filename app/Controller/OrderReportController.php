<?php
	class OrderReportController extends AppController{

		public function index(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>5));
			$order_reports = array();
			foreach($orders as $order){
				$order_name = $order['Order']['name'];
				$ingredents_and_values = [];
				foreach($order['OrderDetail'] as $order_detail) { 
					$order_item_qty = $order_detail['quantity'];
					foreach($order_detail['Item']['Portion']['PortionDetail'] as $portion_detail) {
						if(array_key_exists($portion_detail['Part']['name'], $ingredents_and_values)) {
							$ingredents_and_values[$portion_detail['Part']['name']] += ($portion_detail['value']*$order_item_qty);
						} else {
							$ingredents_and_values[$portion_detail['Part']['name']] = ($portion_detail['value']*$order_item_qty);
						}	
					}
				} 
				ksort($ingredents_and_values);
				$order_reports[$order_name] = $ingredents_and_values;
			} 
			$this->set('order_reports',$order_reports);
			$this->set('title',__('Orders Report'));
		}

		public function Question(){

			$this->setFlash('Multidimensional Array.');

			$this->loadModel('Order');
			$orders = $this->Order->find('all',array('conditions'=>array('Order.valid'=>1),'recursive'=>2));

			// debug($orders);exit;

			$this->set('orders',$orders);

			$this->loadModel('Portion');
			$portions = $this->Portion->find('all',array('conditions'=>array('Portion.valid'=>1),'recursive'=>2));
				
			// debug($portions);exit;

			$this->set('portions',$portions);

			$this->set('title',__('Question - Orders Report'));
		}

	}