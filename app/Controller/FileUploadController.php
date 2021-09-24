<?php

class FileUploadController extends AppController {
	public function index() {

		if ($this->request->is('post')) {
			
			$type = pathinfo($this->request->data['FileUpload']['file']['name'], PATHINFO_EXTENSION);
			if($type == 'csv') {
				$handle = fopen($this->request->data['FileUpload']['file']['tmp_name'], "r");
				$line = 0;
				while ($data = fgetcsv($handle)){
					
					if ($line == 0) { //remove header
						$line++;
						continue;
					}
							
					$this->FileUpload->create();
					$this->FileUpload->save([
						'name' => $data[0],
						'email' => $data[1]
					]);
				}
				fclose($handle);
				$this->setFlash('Successfully Uploaded!');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->setFlash('Please Upload CSV file!');
			}	
        }

		$this->set('title', __('File Upload Answer'));
		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads'));
	}
}