<?php
	require ("simpleRest.php");
	require ("../Classes/cls_partners.php");
	
	class Partners_RestHandler extends SimpleRest {
		function getAllPartners () {
			$partner_obj = new Partner();
			$rawData = $partner_obj->get_partner();
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'No Partners Found');
			}
			else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function getPartner($id) {
			$partner_obj = new Partner();
			$rawData = $partner_obj->get_partner($id, "all");

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Partner not found!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function getPartnerFor($type) {
			$partner_obj = new Partner();
			$rawData = $partner_obj->get_partner(0, $type);

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Partners not found!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function addPartner() {
			$partner_obj = new Partner();
			$rawData = $partner_obj->add_partner();

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Error adding Partner!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function updatePartner($id) {
			$partner_obj = new Partner();
			$rawData = $partner_obj->update_partner($id);

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Error updating Partner!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function searchPartner($q) {
			$partner_obj = new Partner();
			$rawData = $partner_obj->search_partner($q);

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Partner not found!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
	}
?>