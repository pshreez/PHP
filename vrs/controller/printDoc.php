<?php

Class PrintDoc {

    function index() {
        $id = new Form_elements;
        $fuel = $id->fuel(); //
        $manufacturer = $id->manufacture_company(); //
        $use_purpose = $id->use_purpose(); //
        $vehicle_type = $id->vehicle_type(); //
        $custom_office = $id->custom_office(); //
        $vehicle_color = $id->vehicle_color(); //
        $type_symbol = $id->type_symbol(); //
        $owner_type = $id->owner_type(); //
        // $zone_code = $id->zone_code();//
        $district_code = $id->district_code(); //
        $date = DATE('Y-m-d');

        // echo 1234;
        $vehicle = F3::get("PARAMS.id");
        $data = new Axon("vehicle");
        $owner = new Axon("owner");
        if ($data->found(array('id=:id', array(':id' => $vehicle))) && $owner->found(array('vehicleid =:id', array(':id' => $vehicle)))) {
            $data->load(array('id=:id', array(':id' => $vehicle)));
            // echo 1234;
            $owner->load(array('vehicleid =:id', array(':id' => $vehicle)));
            $fuel_view = $id->fuel_view($data->fuel_type_id);
            $manufacturer = $id->manufacture_view($data->manufacture_id);
            $purpose_view = $id->purpose_view($data->purpose_id);
            $type_view = $id->type_view($data->type);
            $custom_view = $id->custom_view($data->custom_office_id);
            $color_view = $id->color_view($data->color_id);


            $zone_code = $id->zone_view($data->zone_id);
            F3::set('zcode', $zone_code);
            $symbol_view = $id->symbol_view($data->vehicle_symbol_type);
            $owner_view = $id->owner_view($owner->owner_type);
            $p_zone_id = $id->zone_view($owner->p_zone_id);
            F3::set('p_zone', $p_zone_id);
            $temp_zone_id = $id->zone_view($owner->temp_zone_id);
            F3::set('t_zone', $temp_zone_id);
            $p_district_id = $id->district_view($owner->p_district_id);
            $temp_district_id = $id->district_view($owner->temp_district_id);
            $nabalik_district = $id->district_view($owner->nabalik_district);
            $creditor_district = $id->district_view($owner->creditor_district);
            $per_district = $id->district_view($owner->per_district);
            //custom data
            $bhansar=$data->custom_receive_type;
            if($bhansar == 'new'){
               $bhansar='नयाँ ';
            }
             if($bhansar == 'lilami'){
                    $bhansar='लिलामी';
            }
             if($bhansar == 'jafat'){
              $bhansar='जफत';
            }
            //nationality nepali ,indian or others
            $per_identity= $owner->per_nagarikta;
            if($per_identity == '1' ){$per_identity = 'Nepali';}
            if($per_identity == '2' ){$per_identity = 'Indian';}
             if($per_identity == '3' ){$per_identity = 'Other';}
            
            $owner->copyTo("POST");
            $data->copyTo("POST");
            F3::set('customs',$bhansar);
            F3::set('nationality',$per_identity);
            F3::set('date', $date);
            echo Template::serve('template/admin/registration_print.htm');

            //  }
        }
    }

    function transfer_print() {

        $id = new Form_elements;
        $type_symbol = $id->type_symbol(); //
        $owner_type = $id->owner_type(); //
        // $zone_code = $id->zone_code(); //
        $district_code = $id->district_code(); //
        $date = DATE('Y-m-d');


        $vehicle = F3::get("PARAMS.id");
        $data = new Axon("vehicle");
        $owner = new Axon("owner");
        $namsari = new Axon("namsari");
        if ($data->found(array('id=:id', array(':id' => $vehicle))) && $owner->found(array('vehicleid =:id', array(':id' => $vehicle))) && $namsari->found(array('vehicle_id =:id', array(':id' => $vehicle)))) {
            // die;
            $data->load(array('id=:id', array(':id' => $vehicle)));
            $owner->load(array('vehicleid =:id', array(':id' => $vehicle)));
            $namsari->load(array('vehicle_id =:id', array(':id' => $vehicle)));

            $zone_code = $id->zone_view($data->zone_id);
            F3::set('zcode', $zone_code);
            $symbol_view = $id->symbol_view($data->vehicle_symbol_type);
            $owner_view = $id->owner_view($owner->owner_type);

            $p_zone_id = $id->zone_view($owner->p_zone_id);

            F3::set('p_zone', $p_zone_id);
            $temp_zone_id = $id->zone_view($owner->temp_zone_id);
            F3::set('t_zone', $temp_zone_id);
            $p_district_id = $id->district_view($owner->p_district_id);
            $temp_district_id = $id->district_view($owner->temp_district_id);
            $nabalik_district = $id->district_view($owner->nabalik_district);
            $creditor_district = $id->district_view($owner->creditor_district);
            $per_district = $id->district_view($owner->per_district);
            
           $per_identity= $owner->per_nagarikta;
            if($per_identity == '1' ){$per_identity = 'Nepali';}
            if($per_identity == '2' ){$per_identity = 'Indian';}
             if($per_identity == '3' ){$per_identity = 'Other';}
            F3::set('nationality',$per_identity);
            $owner->copyTo("POST");
            $data->copyTo("POST");
            $namsari->copyTo("POST");
           
           // F3::set('owner',$owner->owner_type);
            F3::set('date', $date);
            //  F3::set('nav', 'navigation');
            echo Template::serve('template/admin/transfer_print.htm');
        }
    }

    function register_print() {

        $id = F3::get("PARAMS.id");
        $vehicle = F3::get("PARAMS.id");
        $data = new Axon("vehicle");
        $owner = new Axon("owner");
        if ($data->found(array('id=:id', array(':id' => $id))) && $owner->found(array('vehicleid =:id', array(':id' => $id)))) {
           // echo 123;
            $data->load(array('id=:id', array(':id' => $vehicle)));
            $owner->load(array('vehicleid =:id', array(':id' => $vehicle)));
            //  $namsari->load(array('vehicle_id =:id', array(':id' => $vehicle)));

            $zone_code = $id->zone_view($data->zone_id);
            // F3::set('code', $zone_code);
            $symbol_view = $id->symbol_view($data->vehicle_symbol_type);
            $owner_view = $id->owner_view($owner->owner_type);
            $p_zone_id = $id->zone_view($owner->p_zone_id);
            $temp_zone_id = $id->zone_view($owner->temp_zone_id);
            //  F3::set('zone', $p_zone_id);
            //$p_district_id = $id->district_view($data->p_district_id);
            // $temp_district_id = $id->district_view($data->temp_district_id);
            $nabalik_district = $id->district_view($data->nabalik_district);
            $creditor_district = $id->district_view($data->creditor_district);
            $per_district = $id->district_view($data->per_district);
            $owner->copyTo("POST");
            $data->copyTo("POST");
            $namsari->copyTo("POST");

            F3::set('date', $date);
            //  F3::set('nav', 'navigation');
            echo Template::serve("template/admin/registration_print.htm");
        }
    }

    /*  function transfer_print() {
      $id = F3::get("PARAMS.id");
      $data = $this->vehicle($id);
      $owner=$this->owner($id);
      $namsari=$this->namsari($id);
      F3::set("data", $data);
      echo Template::serve("template/admin/transfer_print.htm");

      } */
}

?>
