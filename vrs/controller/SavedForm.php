<?php

class SavedForm {

  function registration_save() {
    if (!F3::get('SESSION.onlineUser')) {
      F3::reroute("/");
    }
    $id = date('siGjnty') . rand(1, 100);
    $user = F3::get("SESSION.onlineUser");

    $ip_address = $_SERVER['REMOTE_ADDR'];
    $wheeler = F3::get("POST.wheeler");

    $model = F3::get("POST.model");

    $manufacture_id = F3::get("POST.manufacture_id");
    $manufacture_date = F3::get("POST.manufacture_date");
    $fuel_type_id = F3::get("POST.fuel_type_id");
    $engine_num = F3::get("POST.engine_num");
    $chessis_num = F3::get("POST.chessis_num");
    $cylinder_num = F3::get("POST.cylinder_num");
    $horse_power = F3::get("POST.horse_power");
    $horse_power_type = F3::get("POST.horse_power_type");
    $electronic_device = F3::get("POST.electronic_device");
    $registration_date = F3::get("POST.registration_date");
    $certificate_num = F3::get("POST.certificate_num");
    $purpose_id = F3::get("POST.purpose_id");
    $hood = F3::get("POST.hood");
    $type = F3::get("POST.type");
    $remarks = F3::get("POST.remarks");
    $weight = F3::get("POST.weight");
    $weight_type = F3::get("POST.weight_type");
    $weight_capacity = F3::get("POST.weight_capacity");
    $weight_capacity_type = F3::get("POST.weight_capacity_type");
    $seat_num = F3::get("POST.seat_num");
    $color_id = F3::get("POST.color_id");
    $glass_color_id = F3::get("POST.glass_color_id");
    $zone_id = F3::get("POST.zone_id");
    $lot_number = 0;
    $vehicle_symbol_type = 0;
    $number = 0;
    $tax = F3::get("POST.tax");
    $technical_inspector = F3::get("POST.technical_inspector");
    $inspection_date = F3::get("POST.inspection_date");
    $custom_office_id = F3::get("POST.custom_office_id");
    $pragyapan_patra_no = F3::get("POST.pragyapan_patra_no");
    $custom_Date = F3::get("POST.custom_Date");
    $receipt_num = F3::get("POST.receipt");
    $custom_remarks = F3::get("POST.custom_remarks");
    $police_office = F3::get("POST.police_office");
    $registration_num = F3::get("POST.registration_num");
    $entry_date = F3::get("POST.entry_date");
    $status = 'saved';
    $vehicleid = $zone_id . $id;

    //vehicle information
    $other_company = F3::get("POST.other_company");
    $other_use = F3::get("POST.other_use");
    $other_vehicle = F3::get("POST.other_vehicle");
    $other_fuel = F3::get("POST.other_fuel");

    //custom information

    $custom_receive_type = F3::get("POST.custom_receive_type");
    $custom_office_type = F3::get("POST.custom_office_type");
    $custom_office_name = F3::get("POST.custom_office_name");
    $lilami_date = F3::get("POST.lilami_date");
    $jafat_decision_date = F3::get("POST.jafat_decision_date");
    $jafat_decision_maker = F3::get("POST.jafat_decision_maker");
    $jafat_chalani_number = F3::get("POST.jafat_chalani_number");
    $jafat_chalani_date = F3::get("POST.jafat_chalani_date");

    $vehicle_id = $id;
    $owner_type = F3::get("POST.owner_type");
    $first_name = F3::get("POST.first_name");
    $last_name = F3::get("POST.last_name");
    $father_name = F3::get("POST.father_name");
    $grandfather_name = F3::get("POST.grandfather_name");
    $dob = F3::get("POST.dob");
    $reg_num = F3::get("POST.reg_num");
    $email = F3::get("POST.email");
    $mobile = F3::get("POST.mobileno");

    $p_zone_id = F3::get("POST.p_zone_id");
    $p_district_id = F3::get("POST.p_district_id");
    $p_metropolitan = F3::get("POST.p_metropolitan");
    $p_ward_no = F3::get("POST.p_ward_no");
    $p_address = F3::get("POST.p_address");
    $p_house_no = F3::get("POST.p_house_no");
    $p_phone = F3::get("POST.p_phone");
    $temp_zone_id = F3::get("POST.temp_zone_id");
    $temp_district_id = F3::get("POST.temp_district_id");
    $temp_metropolitan = F3::get("POST.temp_metropolitan");


    $temp_ward_no = F3::get("POST.temp_ward_no");
    $temp_address = F3::get("POST.temp_address");
    $temp_house_no = F3::get("POST.temp_house_no");
    $temp_phone = F3::get("POST.temp_phone");
    $nabalik_guardian_name = F3::get("POST.nabalik_guardian_name");
    $nabalik_relation = F3::get("POST.nabalik_relation");
    $nabalik_identity_no = F3::get("POST.nabalik_identity_no");
    $nabalik_district = F3::get("POST.nabalik_district");
    $nabalik_year = F3::get("POST.nabalik_year");
    $nabalik_address = F3::get("POST.nabalik_address");
    $bank_name = F3::get("POST.bank_name");
    $creditor_name = F3::get("POST.creditor_name");
    $creditor_district = F3::get("POST.creditor_district");
    $creditor_year = F3::get("POST.creditor_year");
    $creditor_address = F3::get("POST.creditor_address");
    $per_nagarikta = F3::get("POST.per_nagarikta");
    $per_identificationno = F3::get("POST.per_identificationno");
    $per_district = F3::get("POST.per_district");
    $per_year = F3::get("POST.per_year");
    $indian_identificationno = F3::get("POST.indian_identificationno");
    $other_identificationno = F3::get("POST.other_identificationno");
    $captcha = F3::get("POST.code");
    $photo = new User();
    $picture = $photo->pictureFolder($id);
    $sqls[] = "INSERT INTO vehicle( id,wheeler,vehicleid,ip_address, model,manufacture_id,manufacture_date,
        fuel_type_id, engine_num, chessis_num,cylinder_num, horse_power,horse_power_type,electronic_device,registration_date,
        certificate_num, purpose_id, hood, type,remarks, weight,weight_type, weight_capacity,weight_capacity_type, seat_num, color_id,
        glass_color_id,zone_id,lot_number,vehicle_symbol_type, number,tax,technical_inspector, inspection_date, custom_office_id,
        pragyapan_patra_no,custom_Date,custom_receive_type ,custom_office_type,custom_office_name ,lilami_date ,jafat_decision_date ,jafat_decision_maker,jafat_chalani_number,jafat_chalani_date , receipt_num,custom_remarks,police_office, registration_num, entry_date,form_type,status,other_company,other_use,other_fuel,other_vehicle)
            VALUES('$id','$wheeler', '$vehicleid','$ip_address','$model','$manufacture_id','$manufacture_date',
        '$fuel_type_id',' $engine_num',' $chessis_num','$cylinder_num', '$horse_power','$horse_power_type','$electronic_device','$registration_date',
        '$certificate_num', '$purpose_id', '$hood', '$type','$remarks', '$weight','$weight_type', '$weight_capacity','$weight_capacity_type', '$seat_num', '$color_id',
        '$glass_color_id','$zone_id','$lot_number','$vehicle_symbol_type', '$number','$tax','$technical_inspector', '$inspection_date',' $custom_office_id',
        '$pragyapan_patra_no','$custom_Date', '$custom_receive_type ','$custom_office_type','$custom_office_name' ,'$lilami_date ',' $jafat_decision_date' ,'$jafat_decision_maker', '$jafat_chalani_number','$jafat_chalani_date ', '$receipt_num','$custom_remarks','$police_office', '$registration_num', '$entry_date','registration','$status','$other_company','$other_use','$other_fuel','$other_vehicle' )";
    $sqls[] = "INSERT INTO owner (vehicleid,owner_type,first_name,last_name, father_name,grandfather_name,dob,reg_num,email,mobileno,p_zone_id,p_district_id, p_metropolitan,p_ward_no,
        p_address, p_house_no, p_phone, temp_zone_id,temp_district_id, temp_metropolitan, temp_ward_no, temp_address,temp_house_no, temp_phone, nabalik_guardian_name,nabalik_relation,
        nabalik_identity_no, nabalik_district, nabalik_year, nabalik_address, bank_name, creditor_name, creditor_district, creditor_year, creditor_address,per_nagarikta,per_identificationno,per_district,per_year,indian_identificationno,other_identificationno) VALUES( '$vehicle_id','$owner_type', '$first_name', '$last_name','$father_name', '$grandfather_name',
       '$dob','$reg_num','$email','$mobile',' $p_zone_id',' $p_district_id', '$p_metropolitan', '$p_ward_no','$p_address', '$p_house_no', '$p_phone', '$temp_zone_id',
       ' $temp_district_id', '$temp_metropolitan',' $temp_ward_no', '$temp_address',' $temp_house_no',' $temp_phone', '$nabalik_guardian_name',' $nabalik_relation',
        '$nabalik_identity_no', '$nabalik_district', '$nabalik_year', '$nabalik_address',
        '$bank_name', '$creditor_name',' $creditor_district', '$creditor_year',' $creditor_address','$per_nagarikta',
        '$per_identificationno','$per_district','$per_year','$indian_identificationno' ,'$other_identificationno')";

    $sqls[] = "INSERT INTO user_form(username,vehicle_id) VALUES('$user','$id')";
    // var_dump($sqls);die;
    DB::sql($sqls);

    $data = 'saved=';
    $data.=$id;

    F3::reroute("/user/home/$data");
  }

  function getSavedRegistration() {//new vehicle registration
    if (!F3::get('SESSION.onlineUser')) {
      F3::reroute("/");
    }
    $id = new Form_elements;
    $fuel = $id->fuel();
    $manufacturer = $id->manufacture_company();
    $use_purpose = $id->use_purpose();
    $vehicle_type = $id->vehicle_type();
    $custom_office = $id->custom_office();
    $vehicle_color = $id->vehicle_color();
    $type_symbol = $id->type_symbol();
    $owner_type = $id->owner_type();
    $zone_code = $id->zone_code();
    $district_code = $id->district_code();
    $date = DATE('Y-m-d');
    $vehicle = F3::get("PARAMS.reg");
    $data = new Axon("vehicle");
    $owner = new Axon("owner");


    if ($data->found(array('id=:id', array(':id' => $vehicle))) && $owner->found(array('vehicleid =:id', array(':id' => $vehicle)))) {

      $data->load(array('id=:id', array(':id' => $vehicle)));
      $owner->load(array('vehicleid =:id', array(':id' => $vehicle)));
      $owner_photo = new Axon("owner_photo");
      if ($owner_photo->found(array('vehicle_id=:pic', array(':pic' => $vehicle)))) {
        //echo 123;die;
        $owner_photo->load(array('vehicle_id=:pic', array(':pic' => $vehicle)));
        $owner_photo->copyTo("POST");
      }

      $owner->copyTo("POST");
      $data->copyTo("POST");

      F3::set('date', $date);
      F3::set('navUser', 'userNav');
      F3::set('template', 'new_registration');
      echo Template::serve("template/layout.html");
    } else {
      F3::reroute('/user/home');
    }
  }

  function submitRegister() {

    $vehicle = F3::get("PARAMS.reg");
    $wheeler = F3::get("POST.wheeler");
    $model = F3::get("POST.model");
    $manufacture_id = F3::get("POST.manufacture_id");
    $manufacture_date = F3::get("POST.manufacture_date");
    $fuel_type_id = F3::get("POST.fuel_type_id");
    $engine_num = F3::get("POST.engine_num");
    $chessis_num = F3::get("POST.chessis_num");
    $cylinder_num = F3::get("POST.cylinder_num");
    $horse_power = F3::get("POST.horse_power");
    $horse_power_type = F3::get("POST.horse_power_type");
    $electronic_device = F3::get("POST.electronic_device");
    $registration_date = F3::get("POST.registration_date");
    $certificate_num = F3::get("POST.certificate_num");
    $purpose_id = F3::get("POST.purpose_id");
    $hood = F3::get("POST.hood");
    $type = F3::get("POST.type");
    $remarks = F3::get("POST.remarks");
    $weight = F3::get("POST.weight");
    $weight_type = F3::get("POST.weight_type");
    $weight_capacity = F3::get("POST.weight_capacity");
    $weight_capacity_type = F3::get("POST.weight_capacity_type");
    $seat_num = F3::get("POST.seat_num");
    $color_id = F3::get("POST.color_id");
    $glass_color_id = F3::get("POST.glass_color_id");
    $zone_id = F3::get("POST.zone_id");
    $lot_number = F3::get("POST.lot_number");
    $vehicle_symbol_type = $wheeler == 21 ? F3::get("POST.vehicle_symbol_type_two") : F3::get("POST.vehicle_symbol_type_four");
    $number = F3::get("POST.number");
    $tax = F3::get("POST.tax");
    $technical_inspector = F3::get("POST.technical_inspector");
    $inspection_date = F3::get("POST.inspection_date");
    $custom_office_id = F3::get("POST.custom_office_id");
    $pragyapan_patra_no = F3::get("POST.pragyapan_patra_no");
    $custom_Date = F3::get("POST.custom_Date");
    $receipt_num = F3::get("POST.receipt");
    $custom_remarks = F3::get("POST.custom_remarks");
    $police_office = F3::get("POST.police_office");
    $registration_num = F3::get("POST.registration_num");
    $entry_date = F3::get("POST.entry_date");
    $status = F3::get("POST.status");
    $vehicleid = $zone_id . $vehicle;
    //owner data
    $owner_type = F3::get("POST.owner_type");
    $first_name = F3::get("POST.first_name");
    $last_name = F3::get("POST.last_name");
    $father_name = F3::get("POST.father_name");
    $grandfather_name = F3::get("POST.grandfather_name");
    $dob = F3::get("POST.dob");
    $email = F3::get("POST.email");
    $mobile = F3::get("POST.mobileno");
    $p_zone_id = F3::get("POST.p_zone_id");
    $p_district_id = F3::get("POST.p_district_id");
    $p_metropolitan = F3::get("POST.p_metropolitan");
    $p_ward_no = F3::get("POST.p_ward_no");
    $p_address = F3::get("POST.p_address");
    $p_house_no = F3::get("POST.p_house_no");
    $p_phone = F3::get("POST.p_phone");
    $temp_zone_id = F3::get("POST.temp_zone_id");
    $temp_district_id = F3::get("POST.temp_district_id");
    $temp_metropolitan = F3::get("POST.temp_metropolitan");
    $temp_ward_no = F3::get("POST.temp_ward_no");
    $temp_address = F3::get("POST.temp_address");
    $temp_house_no = F3::get("POST.temp_house_no");
    $temp_phone = F3::get("POST.temp_phone");
    $nabalik_guardian_name = F3::get("POST.nabalik_guardian_name");
    $nabalik_relation = F3::get("POST.nabalik_relation");
    $nabalik_identity_no = F3::get("POST.nabalik_identity_no");
    $nabalik_district = F3::get("POST.nabalik_district");
    $nabalik_year = F3::get("POST.nabalik_year");
    $nabalik_address = F3::get("POST.nabalik_address");
    $bank_name = F3::get("POST.bank_name");
    $creditor_name = F3::get("POST.creditor_name");
    $creditor_district = F3::get("POST.creditor_district");
    $creditor_year = F3::get("POST.creditor_year");
    $creditor_address = F3::get("POST.creditor_address");
    $per_nagarikta = F3::get("POST.per_nagarikta");
    $per_identificationno = F3::get("POST.per_identificationno");
    $per_district = F3::get("POST.per_district");
    $per_year = F3::get("POST.per_year");
    $captcha = F3::get("POST.code");

    //other requirements
    $other_company = F3::get("POST.other_company");
    $other_use = F3::get("POST.other_use");
    $other_vehicle = F3::get("POST.other_vehicle");
    $other_fuel = F3::get("POST.other_fuel");
    if ($captcha == F3::get("SESSION.captcha")) {

      $data = new User();
      $picture = $data->pictureFolder($vehicle);

      $onlineSql [] = "update vehicle set wheeler='$wheeler',vehicleid='$vehicleid', model='$model',
        manufacture_id='$manufacture_id',manufacture_date='$manufacture_date',fuel_type_id='$fuel_type_id', engine_num='$engine_num',
        chessis_num='$chessis_num',cylinder_num='$cylinder_num', horse_power='$horse_power',horse_power_type='$horse_power_type',
        electronic_device='$electronic_device',registration_date='$registration_date',certificate_num='$certificate_num',
        purpose_id='$purpose_id', hood='$hood', type='$type',remarks='$remarks', weight='$weight',weight_type='$weight_type',
        weight_capacity='$weight_capacity',weight_capacity_type='$weight_capacity_type',
        seat_num='$seat_num', color_id='$color_id', glass_color_id='$glass_color_id',zone_id='$zone_id',lot_number='$lot_number',
        vehicle_symbol_type='$vehicle_symbol_type', number='$number',tax='$tax',technical_inspector='$technical_inspector',
        inspection_date='$inspection_date', custom_office_id='$custom_office_id', pragyapan_patra_no='$pragyapan_patra_no',
        custom_Date='$custom_Date', receipt_num='$receipt_num',custom_remarks = '$custom_remarks',police_office = '$police_office',
        registration_num='$registration_num', status='pending',other_company = '$other_company',other_use = '$other_use',other_fuel = '$other_fuel',other_vehicle='$other_vehicle'  where id='" . $vehicle . "'";


      $onlineSql[] = "update owner set owner_type='$owner_type',first_name='$first_name',last_name='$last_name', father_name='$father_name',
        grandfather_name='$grandfather_name',dob='$dob',email='$email',mobileno='$mobile',p_zone_id='$p_zone_id',p_district_id='$p_district_id',
        p_metropolitan='$p_metropolitan',p_ward_no='$p_ward_no',p_address='$p_address', p_house_no='$p_house_no', p_phone='$p_phone',
        temp_zone_id='$temp_zone_id',temp_district_id='$temp_district_id', temp_metropolitan='$temp_metropolitan', temp_ward_no='$temp_ward_no', temp_address='$temp_address',temp_house_no='$temp_house_no',
        temp_phone='$temp_phone', nabalik_guardian_name='$nabalik_guardian_name',nabalik_relation='$nabalik_relation',
        nabalik_identity_no='$nabalik_identity_no', nabalik_district='$nabalik_district', nabalik_year='$nabalik_year', nabalik_address='$nabalik_address',
        bank_name='$bank_name', creditor_name='$creditor_name',
        creditor_district='$creditor_district', creditor_year='$creditor_year', creditor_address='$creditor_address',per_nagarikta='$per_nagarikta',
        per_identificationno='$per_identificationno',per_district='$per_district',per_year='$per_year' where vehicleid='" . $vehicle . "'";
      // var_dump($onlineSql);die;

      DB::SQL($onlineSql);
      F3::reroute("/feedback/$vehicle");
    } else {
      F3::set('error', 'The captcha  you have entered is wrong');
      $this->getSavedRegistration();
    }
  }

  function namsari_save() {
    if (!F3::get('SESSION.onlineUser')) {
      F3::reroute("/");
    }

    //transfer information of the vehicle
    $id = date('siGjnty') . rand(1, 100);
    $user = F3::get("SESSION.onlineUser");

    $ip_address = $_SERVER['REMOTE_ADDR'];
    $wheeler = F3::get("POST.wheeler");

    $zone_id = F3::get("POST.zone_id");
    $lot_number = F3::get("POST.lot_number");
    $vehicle_symbol_type = $wheeler == 21 ? F3::get("POST.vehicle_symbol_type_two") : F3::get("POST.vehicle_symbol_type_four");
    // var_dump($vehicle_symbol_type);die;
    $number = F3::get("POST.number");
    $vehicleid = User::vehicleid($wheeler, $zone_id, $lot_number, $vehicle_symbol_type, $number);
    $status = 'saved';

    //namsari reason
    $reason = F3::get("POST.reason");
    $date = F3::get("POST.date");
    $remarks = F3::get("POST.remarks");
    $witness_name = F3::get("POST.witness_name");
    $witness_address = F3::get("POST.witness_address");
    $citizenship_no = F3::get("POST.citizenship_no");


    //owner information

    $owner_type = F3::get("POST.owner_type");
    $first_name = F3::get("POST.first_name");
    $last_name = F3::get("POST.last_name");
    $father_name = F3::get("POST.father_name");
    $grandfather_name = F3::get("POST.grandfather_name");
    $dob = F3::get("POST.dob");
    $reg_num = F3::get("POST.reg_num");
    $email = F3::get("POST.email");
    $mobile = F3::get("POST.mobileno");

    $p_zone_id = F3::get("POST.p_zone_id");
    $p_district_id = F3::get("POST.p_district_id");
    $p_metropolitan = F3::get("POST.p_metropolitan");
    $p_ward_no = F3::get("POST.p_ward_no");
    $p_address = F3::get("POST.p_address");
    $p_house_no = F3::get("POST.p_house_no");
    $p_phone = F3::get("POST.p_phone");
    $temp_zone_id = F3::get("POST.temp_zone_id");
    $temp_district_id = F3::get("POST.temp_district_id");
    $temp_metropolitan = F3::get("POST.temp_metropolitan");
    $temp_ward_no = F3::get("POST.temp_ward_no");
    $temp_address = F3::get("POST.temp_address");
    $temp_house_no = F3::get("POST.temp_house_no");
    $temp_phone = F3::get("POST.temp_phone");
    $nabalik_guardian_name = F3::get("POST.nabalik_guardian_name");
    $nabalik_relation = F3::get("POST.nabalik_relation");
    $nabalik_identity_no = F3::get("POST.nabalik_identity_no");
    $nabalik_district = F3::get("POST.nabalik_district");
    $nabalik_year = F3::get("POST.nabalik_year");
    $nabalik_address = F3::get("POST.nabalik_address");
    $bank_name = F3::get("POST.bank_name");
    $creditor_name = F3::get("POST.creditor_name");
    $creditor_district = F3::get("POST.creditor_district");
    $creditor_year = F3::get("POST.creditor_year");
    $creditor_address = F3::get("POST.creditor_address");
    $per_nagarikta = F3::get("POST.per_nagarikta");
    $per_identificationno = F3::get("POST.per_identificationno");
    $per_district = F3::get("POST.per_district");
    $per_year = F3::get("POST.per_year");
     $indian_identificationno= F3::get("POST.indian_identificationno");
    $other_identificationno= F3::get("POST.other_identificationno");
    $captcha = F3::get("POST.code");
    $photo = new User();
    $picture = $photo->pictureFolder($id);

    $sqls[] = "INSERT INTO vehicle (id,wheeler,vehicleid,zone_id,lot_number,vehicle_symbol_type,number,ip_address,form_type,status) VALUES('$id','$wheeler','$vehicleid','$zone_id',' $lot_number','$vehicle_symbol_type ','$number','$ip_address','namsari','$status')";
     $sqls[] = "INSERT INTO owner (vehicleid,owner_type,first_name,last_name, father_name,grandfather_name,
        dob,reg_num,email,mobileno,p_zone_id,p_district_id, p_metropolitan,p_ward_no,
        p_address, p_house_no, p_phone, temp_zone_id,temp_district_id, temp_metropolitan,
        temp_ward_no, temp_address,temp_house_no, temp_phone, nabalik_guardian_name,nabalik_relation,
        nabalik_identity_no, nabalik_district, nabalik_year, nabalik_address, bank_name, creditor_name,
        creditor_district, creditor_year, creditor_address,per_nagarikta,per_identificationno,per_district,per_year,indian_identificationno,other_identificationno)
        VALUES( '$id','$owner_type','$first_name','$last_name','$father_name','$grandfather_name',
       '$dob','$reg_num','$email','$mobile','$p_zone_id','$p_district_id','$p_metropolitan','$p_ward_no','$p_address',
        '$p_house_no', '$p_phone','$temp_zone_id','$temp_district_id','$temp_metropolitan','$temp_ward_no',
        '$temp_address',' $temp_house_no',' $temp_phone', '$nabalik_guardian_name',' $nabalik_relation',
        '$nabalik_identity_no','$nabalik_district','$nabalik_year','$nabalik_address','$bank_name',
        '$creditor_name','$creditor_district','$creditor_year','$creditor_address','$per_nagarikta',
        '$per_identificationno','$per_district','$per_year','$indian_identificationno' ,'$other_identificationno')";

    $sqls[] = "INSERT INTO namsari (vehicle_id,reason,date,remarks,witness_name,witness_address,citizenship_no) VALUES('$id','$reason','$date','$remarks','$witness_name','$witness_address','$citizenship_no')";
    $sqls[] = "INSERT INTO user_form(username,vehicle_id) VALUES('$user','$id')";

    DB::sql($sqls);
    $data = 'saved=';
    $data.=$id;

    F3::reroute("/user/home/$data");
  }

  function getSavedNamsari() {

    if (!F3::get('SESSION.onlineUser')) {
      F3::reroute("/");
    }
    $id = new Form_elements;
    $date = DATE('Y-m-d');
    $id = new Form_elements;
    $owner_type = $id->owner_type();
    $zone_code = $id->zone_code();
    $district_code = $id->district_code();
    $date = DATE('Y-m-d');
    $zone_code = $id->zone_code();
    $type_symbol = $id->type_symbol();

    $vehicle = F3::get("PARAMS.trans");

    $data = new Axon("vehicle");
    $owner = new Axon("owner");
    $namsari = new Axon("namsari");
    if ($data->found(array('id=:id', array(':id' => $vehicle))) && $owner->found(array('vehicleid =:id', array(':id' => $vehicle))) && $namsari->found(array('vehicle_id=:id', array(':id' => $vehicle)))) {

      $data->load(array('id=:id', array(':id' => $vehicle)));
      $owner->load(array('vehicleid =:id', array(':id' => $vehicle)));
      $namsari->load(array('vehicle_id =:id', array(':id' => $vehicle)));
      $owner_photo = new Axon("owner_photo");
      if ($owner_photo->found(array('vehicle_id=:pic', array(':pic' => $vehicle)))) {
        $owner_photo->load(array('vehicle_id=:pic', array(':pic' => $vehicle)));
        $owner_photo->copyTo("POST");
      }
      //   var_dump($data->find("id='$vehicle'"));die;
      $data->copyTo("POST");
      $owner->copyTo("POST");
      $namsari->copyTo("POST");
      F3::set('heading', 'नया सवारी धनी विवरण ');
      F3::set('date', $date);
      F3::set('navUser', 'userNav');
      F3::set('title', 'Admin - approve Namsari');
      F3::set('template', 'transfer');
      echo Template::serve("template/layout.html");
    }
  }

  function submitNamsari() {
    if (!F3::get('SESSION.onlineUser')) {
      F3::reroute("/");
    }
    $vehicle = F3::get("PARAMS.trans");

    $sql = DB::SQL("select vehicleid from vehicle where id=111");
    $wheeler = F3::get("POST.wheeler");
    $zone_id = F3::get("POST.zone_id");
    $lot_number = F3::get("POST.lot_number");
    $vehicle_symbol_type = $wheeler == 21 ? F3::get("POST.vehicle_symbol_type_two") : F3::get("POST.vehicle_symbol_type_four");
    $number = F3::get("POST.number");
    $user = new User;
    $vehicleid = $user->vehicleid($wheeler, $zone_id, $lot_number, $vehicle_symbol_type, $number);

    //table namsari
    $reason = F3::get("POST.reason");
    $date = F3::get("POST.date");
    $remarks = F3::get("POST.remarks");
    $witness_name = F3::get("POST.witness_name");
    $witness_address = F3::get("POST.witness_address");
    $citizenship_no = F3::get("POST.citizenship_no");

    //owner table
    $owner_type = F3::get("POST.owner_type");
    $first_name = F3::get("POST.first_name");
    $last_name = F3::get("POST.last_name");
    $father_name = F3::get("POST.father_name");
    $grandfather_name = F3::get("POST.grandfather_name");
    $dob = F3::get("POST.dob");
    $email = F3::get("POST.email");
    $mobile = F3::get("POST.mobileno");
    $p_zone_id = F3::get("POST.p_zone_id");
    $p_district_id = F3::get("POST.p_district_id");
    $p_metropolitan = F3::get("POST.p_metropolitan");
    $p_ward_no = F3::get("POST.p_ward_no");
    $p_address = F3::get("POST.p_address");
    $p_house_no = F3::get("POST.p_house_no");
    $p_phone = F3::get("POST.p_phone");
    $temp_zone_id = F3::get("POST.temp_zone_id");
    $temp_district_id = F3::get("POST.temp_district_id");
    $temp_metropolitan = F3::get("POST.temp_metropolitan");
    $temp_ward_no = F3::get("POST.temp_ward_no");
    $temp_address = F3::get("POST.temp_address");
    $temp_house_no = F3::get("POST.temp_house_no");
    $temp_phone = F3::get("POST.temp_phone");
    $nabalik_guardian_name = F3::get("POST.nabalik_guardian_name");
    $nabalik_relation = F3::get("POST.nabalik_relation");
    $nabalik_identity_no = F3::get("POST.nabalik_identity_no");
    $nabalik_district = F3::get("POST.nabalik_district");
    $nabalik_year = F3::get("POST.nabalik_year");
    $nabalik_address = F3::get("POST.nabalik_address");
    $bank_name = F3::get("POST.bank_name");
    $creditor_name = F3::get("POST.creditor_name");
    $creditor_district = F3::get("POST.creditor_district");
    $creditor_year = F3::get("POST.creditor_year");
    $creditor_address = F3::get("POST.creditor_address");
    $per_nagarikta = F3::get("POST.per_nagarikta");
    $per_identificationno = F3::get("POST.per_identificationno");
    $per_district = F3::get("POST.per_district");
    $per_year = F3::get("POST.per_year");
    $captcha = F3::get("POST.code");

    if ($captcha == F3::get("SESSION.captcha")) {

      $data = new User();
      $picture = $data->pictureFolder($vehicle);

      $onlineSql [] = "update vehicle set wheeler='$wheeler',vehicleid='$vehicleid',zone_id='$zone_id',lot_number='$lot_number',
        vehicle_symbol_type='$vehicle_symbol_type', number='$number', status='pending'  where id='" . $vehicle . "'";
      $onlineSql[] = "update namsari set reason='$reason',date='$date',remarks='$remarks',witness_name='$witness_name',witness_address='$witness_address',citizenship_no='$citizenship_no'where id='" . $vehicle . "'";

      $onlineSql[] = "update owner set owner_type='$owner_type',first_name='$first_name',last_name='$last_name', father_name='$father_name',
        grandfather_name='$grandfather_name',dob='$dob',email='$email',mobileno='$mobile',p_zone_id='$p_zone_id',p_district_id='$p_district_id',
        p_metropolitan='$p_metropolitan',p_ward_no='$p_ward_no',p_address='$p_address', p_house_no='$p_house_no', p_phone='$p_phone',
        temp_zone_id='$temp_zone_id',temp_district_id='$temp_district_id', temp_metropolitan='$temp_metropolitan', temp_ward_no='$temp_ward_no', temp_address='$temp_address',temp_house_no='$temp_house_no',
        temp_phone='$temp_phone', nabalik_guardian_name='$nabalik_guardian_name',nabalik_relation='$nabalik_relation',
        nabalik_identity_no='$nabalik_identity_no', nabalik_district='$nabalik_district', nabalik_year='$nabalik_year', nabalik_address='$nabalik_address',
        bank_name='$bank_name', creditor_name='$creditor_name',
        creditor_district='$creditor_district', creditor_year='$creditor_year', creditor_address='$creditor_address',per_nagarikta='$per_nagarikta',
        per_identificationno='$per_identificationno',per_district='$per_district',per_year='$per_year' where vehicleid='" . $vehicle . "'";


      DB::SQL($onlineSql);
      F3::reroute("/feedbackt/$vehicle");
    } else {
      F3::set('error', 'The captcha  you have entered is wrong');
      $this->getSavedRegistration();
    }
  }


  function deleteForm(){
    if (!F3::get('SESSION.onlineUser')) {
      F3::reroute("/");
    }
    $id=F3::get("PARAMS.id");
    $vehicle = new Axon('vehicle');
    if ($vehicle->found(array('id =:id', array(':id' => $id)))) {
      $vehicle->load(array('id =:id', array(':id' => $id)));
      $vehicle->erase();
      F3::reroute('/');
    }
    else{
      F3::reroute('/');
    }
  }

}

?>
