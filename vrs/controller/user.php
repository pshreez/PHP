<?php

Class User {

  function index() {
    F3::set('template', 'home');
    echo Template::serve("template/layout.html");
  }

  function new_registration() {//new vehicle registration
    if (!F3::get('SESSION.onlineUser')) {
      F3::reroute("/");
    }
    $register = new Axon("vehicle");
    $user = new Axon("vehicle");
    $register = new Axon("vehicle");
    $id = new Form_elements;
    $fuel = $id->fuel();
    $manufacturer = $id->manufacture_company();
    $use_purpose = $id->use_purpose();
    $vehicle_type = $id->vehicle_type();
    $custom_office = $id->custom_office();
    $vehicle_color = $id->vehicle_color();
    $zone_code = $id->zone_code();
    $type_symbol = $id->type_symbol();
    $owner_type = $id->owner_type();
    $zone_code = $id->zone_code();
    $district_code = $id->district_code();
    $date = DATE('Y-m-d');
    F3::set('date', $date);
    F3::set('title', 'नयाँ सवारी दर्ता ');
    F3::set('navUser', 'userNav');
    F3::set('template', 'new_registration');
    echo Template::serve("template/layout.html");
  }

  function addVehicleData() {

//Vehicle information
    if (!F3::get('SESSION.onlineUser')) {
      F3::reroute("/");
    }
    $dateNep = new Form_elements();
    $id = date('siGjnty') . rand(1, 100);
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
    $registration_date = F3::get("POST.registration_date"); //registration date
    // $registration_date=$dateNep->dateConvertEn($registration_dates);//
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
    $status = F3::get("POST.status");
    //  $vehicleid = $this->vehicleid($wheeler, $zone_id, $lot_number, $vehicle_symbol_type, $number);
    $vehicleid = $zone_id . $id;
    //other requirements
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

    //owner information
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
    $indian_identificationno= F3::get("POST.indian_identificationno");
    $other_identificationno= F3::get("POST.other_identificationno");
    $captcha = F3::get("POST.code");


    if ($captcha == F3::get("SESSION.captcha")) {

      $this->pictureFolder($id);
      $sqls[] = "INSERT INTO vehicle( id,wheeler,vehicleid,ip_address, model,manufacture_id,manufacture_date,
        fuel_type_id, engine_num, chessis_num,cylinder_num, horse_power,horse_power_type,electronic_device,registration_date,
        certificate_num, purpose_id, hood, type,remarks, weight,weight_type, weight_capacity,weight_capacity_type, seat_num, color_id,
        glass_color_id,zone_id,lot_number,vehicle_symbol_type, number,tax,technical_inspector, inspection_date, custom_office_id,
        pragyapan_patra_no,custom_Date,custom_receive_type ,custom_office_type,custom_office_name ,lilami_date ,jafat_decision_date ,jafat_decision_maker,jafat_chalani_number,jafat_chalani_date , receipt_num,custom_remarks,police_office, registration_num, entry_date,form_type,other_company,other_use,other_fuel,other_vehicle)
            VALUES('$id','$wheeler', '$vehicleid','$ip_address','$model','$manufacture_id','$manufacture_date',
        '$fuel_type_id',' $engine_num',' $chessis_num','$cylinder_num', '$horse_power','$horse_power_type','$electronic_device','$registration_date',
        '$certificate_num', '$purpose_id', '$hood', '$type','$remarks', '$weight','$weight_type', '$weight_capacity','$weight_capacity_type', '$seat_num', '$color_id',
        '$glass_color_id','$zone_id','$lot_number','$vehicle_symbol_type', '$number','$tax','$technical_inspector', '$inspection_date',' $custom_office_id',
        '$pragyapan_patra_no','$custom_Date', '$custom_receive_type ','$custom_office_type','$custom_office_name' ,'$lilami_date ',' $jafat_decision_date' ,'$jafat_decision_maker', '$jafat_chalani_number','$jafat_chalani_date ', '$receipt_num','$custom_remarks','$police_office', '$registration_num', '$entry_date','registration','$other_company','$other_use','$other_fuel','$other_vehicle' )";
      $sqls[] = "INSERT INTO owner (vehicleid,owner_type,first_name,last_name, father_name,grandfather_name,dob,reg_num,email,mobileno,p_zone_id,p_district_id, p_metropolitan,p_ward_no,
        p_address, p_house_no, p_phone, temp_zone_id,temp_district_id, temp_metropolitan, temp_ward_no, temp_address,temp_house_no, temp_phone, nabalik_guardian_name,nabalik_relation,
        nabalik_identity_no, nabalik_district, nabalik_year, nabalik_address, bank_name, creditor_name, creditor_district, creditor_year, creditor_address,per_nagarikta,per_identificationno,per_district,per_year,indian_identificationno,other_identificationno) VALUES( '$vehicle_id','$owner_type', '$first_name', '$last_name','$father_name', '$grandfather_name',
       '$dob','$reg_num','$email','$mobile',' $p_zone_id',' $p_district_id', '$p_metropolitan', '$p_ward_no','$p_address', '$p_house_no', '$p_phone', '$temp_zone_id',
       ' $temp_district_id', '$temp_metropolitan',' $temp_ward_no', '$temp_address',' $temp_house_no',' $temp_phone', '$nabalik_guardian_name',' $nabalik_relation',
        '$nabalik_identity_no', '$nabalik_district', '$nabalik_year', '$nabalik_address',
        '$bank_name', '$creditor_name',' $creditor_district', '$creditor_year',' $creditor_address','$per_nagarikta',
        '$per_identificationno','$per_district','$per_year','$indian_identificationno' ,'$other_identificationno')";

      DB::sql($sqls);
      F3::reroute("/feedback/$id");
    } else {
      F3::set('error', 'The captcha  you have entered is wrong');
      $this->new_registration();
    }
  }

  /*   * ******** vehicleid generation************ */

  public static function vehicleid($wheeler, $zone_id, $lot_number, $vehicle_symbol_type, $number) {

    $vehicleid = "";
    $zero = "0";
    $vehicleid .= $wheeler;
    if (strlen($zone_id) == 1) {
      $zone_id = $zero . $zone_id;
    }$vehicleid .= $zone_id;
    if ($lot_number == "") {
      $lot_number = '00';
    }
    if (strlen($lot_number) == 1) {
      $lot_number = $zero . $lot_number;
    }
    $vehicleid .=$lot_number;
    if (strlen($vehicle_symbol_type) == 1) {
      $vehicle_symbol_type = $zero .= $vehicle_symbol_type;
    }
    $vehicleid .= $vehicle_symbol_type;
    $var = 0;
    if ($number == "") {
      $number = '0000';
    }
    while (strlen($number) != 5) {
      $j = "0";
      $number = $j . $number;
      $var++;
    }
    $vehicleid .=$number;
    return $vehicleid;
  }

  function transfer_ownership() {
    if (!F3::get('SESSION.onlineUser')) {
      F3::reroute("/");
    }

    $id = new Form_elements;
    $owner_type = $id->owner_type();
    $zone_code = $id->zone_code();
    $district_code = $id->district_code();
    $date = DATE('Y-m-d');
    F3::set('date', $date);
    //   F3::set('heading', 'नया  सवारी धनी विवरण ');
    $zone_code = $id->zone_code();
    $type_symbol = $id->type_symbol();
    F3::set('date', $date);
    F3::set('title', 'सवारी नामसारी  ');
    F3::set('navUser', 'userNav');
    F3::set('template', 'transfer');
    echo Template::serve("template/layout.html");
  }

  function transfer() {
    if (!F3::get('SESSION.onlineUser')) {
      F3::reroute("/");
    }
    $dateNep = new Form_elements();
    //transfer information of the vehicle
    $id = date('siGjnty') . rand(1, 100);
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $wheeler = F3::get("POST.wheeler");
    $zone_id = F3::get("POST.zone_id");
    $lot_number = F3::get("POST.lot_number");
    $vehicle_symbol_type = $wheeler == 21 ? F3::get("POST.vehicle_symbol_type_two") : F3::get("POST.vehicle_symbol_type_four");
    $number = F3::get("POST.number");
    $vehicleid = $this->vehicleid($wheeler, $zone_id, $lot_number, $vehicle_symbol_type, $number);
    $reason = F3::get("POST.reason");
    $dates = F3::get("POST.date");
    $date = $dateNep->dateConvertEn($dates);
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
    if ($captcha == F3::get("SESSION.captcha")) {
      $this->pictureFolder($id);
      $sqls[] = "INSERT INTO vehicle (id,wheeler,vehicleid,zone_id,lot_number,vehicle_symbol_type,number,ip_address,form_type) VALUES('$id','$wheeler','$vehicleid','$zone_id',' $lot_number','$vehicle_symbol_type ','$number','$ip_address','namsari')";
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
      DB::sql($sqls);
      F3::reroute("/feedbackt/$id");
    } else {
      F3::set('error', 'The captcha you have entered is wrong');
      $this->transfer_ownership();
    }
  }

  function captcha() {
    Graphics::captcha(125, 50, 4, 'monaco', 'captcha');
  }

  function pictureFolder($id) {
    $path = "photo/";
    if (move_uploaded_file(F3::get('FILES.uploadfile.tmp_name'), $path . $id . ".jpg")) {
      $picture = new Axon("owner_photo");
      $picture->vehicle_id = $id;
      $picture->picture = $id . ".jpg";
      $picture->save();
    } else {
      $id = 0;
    }
  }

}

?>