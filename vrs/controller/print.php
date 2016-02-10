<?php

Class PrintD {

    

    function vehicle($id) {
        $vehicle = new Axon("vehicle");
        if ($vehicle->found(array("id=:id", array(":id" => $id)))) {
            $vehicle->load(array("id=:id", array(":id" => $id)));
            $registration = array();
            $registration["wheeler"] = $vehicle->wheeler; //1
            $registration["model"] = $vehicle->model; //2
            $registration["manufacture_id"] = $vehicle->manufacture_id; //3
            $registration["manufacture_date"] = $vehicle->manufacture_date; //4
            $registration["fuel_type_id"] = $vehicle->fuel_type_id; //5
            $registration["engine_num"] = $vehicle->engine_num;
            $registration["chessis_num"] = $vehicle->chessis_num;
            $registration["cylinder_num"] = $vehicle->cylinder_num;
            $registration["horse_power"] = $vehicle->horse_power;
            $registration["horse_power"] = $vehicle->horse_power;
            $registration["electronic_device"] = $vehicle->electronic_device;
            $registration["registration_date"] = $vehicle->registration_date;
            $registration["certificate_num"] = $vehicle->certificate_num;
            $registration["purpose_id"] = $vehicle->purpose_id;
            $registration["hood"] = $vehicle->hood;
            $registration["type"] = $vehicle->type;
            $registration["remarks"] = $vehicle->remarks;
            //technical inspection
            $registration["technical_inspector"] = $vehicle->technical_inspector;
            $registration["inspection_date"] = $vehicle->inspection_date;
            //custom office
            $registration["custom_office_id"] = $vehicle->custom_office_id;
            $registration["pragyapan_patra_no"] = $vehicle->pragyapan_patra_no;
            $registration["custom_Date"] = $vehicle->custom_Date;
            $registration["receipt_num"] = $vehicle->receipt_num;
            $registration["custom_remarks"] = $vehicle->custom_remarks;
            //prabesh darta
            $registration["police_office"] = $vehicle->police_office;
            $registration["registration_num"] = $vehicle->registration_num;
            $registration["entry_date"] = $vehicle->entry_date;
            //weight
            $registration["weight"] = $vehicle->weight;
            $registration["weight_type"] = $vehicle->weight_type;
            $registration["weight_capacity"] = $vehicle->weight_capacity;
            $registration["weight_capacity_type"] = $vehicle->weight_capacity_type;
            $registration["seat_num"] = $vehicle->seat_num;
            //vehcile description
            $registration["color_id"] = $vehicle->color_id;
            $registration["glass_color_id"] = $vehicle->glass_color_id;

            //vehicle number
            $registration["zone_id"] = $vehicle->zone_id;
            $registration["lot_number"] = $vehicle->lot_number;
            $registration["vehicle_symbol_type"] = $vehicle->vehicle_symbol_type;
            $registration["number"] = $vehicle->number;
            $registration["tax"] = $vehicle->tax;
            //vehicle number
            $zone = Admin::getZone($vehicle->zone_id);
            $symbol = Admin::getSymbolType($vehicle->vehicle_symbol_type);
            $vehicleNo = $zone . $vehicle->lot_number . $symbol . $vehicle->number;
            $registration["vehicleNo"] = $vehicleNo;
           // var_dump($registration);
            return $registration;
        }
    }

    function owner($id) {
        $owner = new Axon("owner");
        if ($owner->found(array("vehicleid=:id", array(":id" => $id)))) {
            $owner->load(array("vehicleid=:id", array(":id" => $id)));
            $ownerInfo = array();
            $ownerInfo["owner_type"]=$owner->owner_type;
            $ownerInfo["first_name"]=$owner->first_name;
            $ownerInfo["last_name"]=$owner->last_name;
              $ownerInfo["father_name"]=$owner->father_name;
            $ownerInfo["grandfather_name"]=$owner->grandfather_name;
            $ownerInfo["dob"]=$owner->dob;
              $ownerInfo["email"]=$owner->email;
            $ownerInfo["mobileno"]=$owner->mobileno;
            //permanent address
            $ownerInfo["p_zone_id"]=$owner->p_zone_id;
              $ownerInfo["p_district_id"]=$owner->p_district_id;
            $ownerInfo["p_metropolitan"]=$owner->p_metropolitan;
            $ownerInfo["p_ward_no"]=$owner->p_ward_no;
              $ownerInfo["p_address"]=$owner->p_address;
            $ownerInfo["p_house_no"]=$owner->p_house_no;
            $ownerInfo["p_phone"]=$owner->p_phone;
            //temporary address
              $ownerInfo["temp_zone_id"]=$owner->temp_zone_id;
            $ownerInfo["temp_district_id"]=$owner->temp_district_id;
            $ownerInfo["temp_metropolitan"]=$owner->temp_metropolitan;
              $ownerInfo["temp_ward_no"]=$owner->temp_ward_no;
            $ownerInfo["temp_address"]=$owner->temp_address;
              $ownerInfo["temp_house_no"]=$owner->temp_house_no;
            $ownerInfo["temp_phone"]=$owner->temp_phone;
            //nabalik
            $ownerInfo["nabalik_guardian_name"]=$owner->nabalik_guardian_name;
              $ownerInfo["nabalik_relation"]=$owner->nabalik_relation;
            $ownerInfo["nabalik_identity_no"]=$owner->nabalik_identity_no;
            $ownerInfo["nabalik_district"]=$owner->nabalik_district;
              $ownerInfo["nabalik_year"]=$owner->nabalik_year;
            $ownerInfo["nabalik_address"]=$owner->nabalik_address;
            //bana k tath bitiya sannstha
            $ownerInfo["bank_name"]=$owner->bank_name;
              $ownerInfo["creditor_name"]=$owner->creditor_name;
            $ownerInfo["creditor_district"]=$owner->creditor_district;
            $ownerInfo["creditor_year"]=$owner->creditor_year;
              $ownerInfo["creditor_address"]=$owner->creditor_address;
              //personal
            $ownerInfo["per_nagarikta"]=$owner->per_nagarikta;
            $ownerInfo["per_identificationno"]=$owner->per_identificationno;
              $ownerInfo["per_district"]=$owner->per_district;
            $ownerInfo["per_year"]=$owner->per_year;
              return $ownerInfo;
        }
    }

    function namsari($id){
        $namsari = new Axon("namsari");
        if ($namsari->found(array("vehicle_id=:id", array(":id" => $id)))) {

            $namsari->load(array("vehicle_id=:id", array(":id" => $id)));
             echo 123;die;

    }
    }

}

?>
