<?php

class Zone extends F3instance {

	function getDistricts() {
		$zone_id = $this->get('PARAMS.zone_id');
		$district = new Axon('district');
		$districts = $district->find(array('zone_id=:zid', array(':zid' => $zone_id)));
		$return_districts = array();
		foreach ($districts as $d) {
			$return_districts[] = $d->name;
		}
		echo json_encode($return_districts);
	}

   function getVdc(){
		//die(var_dump($this->get('PARAMS')));
				$district_name = $this->get('PARAMS.district_id');
				$content = $this->get('PARAMS.term');
				$district =  new Axon('district');
				$district->load(array('name=:n', array(':n'=> $district_name)));
				$district_id = $district->id;
				$vdc = new Axon('vdc_list');
				$vdc_list = $vdc->find(array("district_id=:did and name regexp '$content'", array(':did'=> $district_id)));
				$return_vdcs = array();
				foreach ($vdc_list as $vl){
					$return_vdcs[] = $vl->name;
				}
				echo json_encode($return_vdcs);
	}

}

?>