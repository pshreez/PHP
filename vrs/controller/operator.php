<?php

class Operator {

  function index() {

  }

  function userList() {//the user who login to the system
    $operator = new Axon("admin");
    $operators = $operator->find();
    foreach ($operators as $users) {
      if ($users->type == 1) {
        $user[] = array($users->fullname, $users->username, $users->password, "all");
      } else {
        $user[] = array($users->fullname, $users->username, $users->password, $users->type == '21' ? '2' : '4');
      }
    }
    return $user;
  }

  function deleteUser() {
    if (!F3::get('SESSION.asid')) {
      F3::reroute("/admin");
    }
    $username = F3::get('PARAMS.id');

    $user = new Axon('admin');
    $user->load(array("username=:user", array(":user" => $username)));
    $user->erase();
    F3::reroute('/admin/home');
  }

  function editUser() {
    if (!F3::get('SESSION.asid')) {
      F3::reroute("/admin");
    }
    $username = F3::get('PARAMS["id"]');
    $user = new Axon('admin');
    if ($user->found(array('username =:id', array(':id' => $username)))) {
      $user->load(array('username=:id', array(':id' => $username)));
      $user->copyTo('POST');
      F3::set('nav', 'navigation');
      F3::set('title', 'Admin - edit User');
      F3::set('templateAdmin', 'editUser');
      echo Template::serve("template/layout.html");
    }
  }

  function edit() {

    $username = F3::get('PARAMS.id');

    $user = new Axon('admin');
    if ($user->found(array('username =:id', array(':id' => $username)))) {
      $user->load(array('username =:id', array(':id' => $username)));

      $user->username = F3::get("POST.username");
      $user->fullname = F3::get("POST.fullname");
      $user->type = F3::get("POST.type");
      if (F3::get("POST.password") != "")
        $user->password = md5(F3::get("POST.password"));

      //die();
      $user->save();
      F3::reroute("/admin/viewUsers");
    }
  }

  function viewRegistration() {
    if (!F3::get('SESSION.asid')) {
      F3::reroute("/admin");
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

    $vehicle = F3::get("PARAMS.id");
    $data = new Axon("vehicle");
    $owner = new Axon("owner");
    $owner_photo = new Axon("owner_photo");
 
    if ($data->found(array('id=:id', array(':id' => $vehicle))) && $owner->found(array('vehicleid =:id', array(':id' => $vehicle))) && $owner_photo->found(array('vehicle_id=:pic', array(':pic' => $vehicle)))) {
      $data->load(array('id=:id', array(':id' => $vehicle)));
      $owner->load(array('vehicleid =:id', array(':id' => $vehicle)));
      $owner_photo->load(array('vehicle_id=:pic', array(':pic' => $vehicle)));
      $owner->copyTo("POST");
      $data->copyTo("POST");

      $data->copyTo("POST");
      $owner->copyTo("POST");
      $owner_photo->copyTo("POST");
      F3::set('date', $date);
      F3::set('nav', 'navigation');
      F3::set('title', 'Admin - approve Registrations');
      F3::set('templateAdmin', 'viewRegistration');
      echo Template::serve("template/layout.html");
    } else {
      F3:reroute("/");
    }
  }

  function approveRegistration() {

    if (!F3::get('SESSION.asid')) {
      F3::reroute("/admin");
    }
    $dateNep = new Form_elements();
    $vehicle = F3::get("PARAMS.id");
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
    $registration_dates = F3::get("POST.registration_date"); //registration date
    $registration_date = $dateNep->dateConvertEn($registration_dates);
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
    $vid = new User;
    $vehicleid = $vid->vehicleid($wheeler, $zone_id, $lot_number, $vehicle_symbol_type, $number);

    //custom information

    $custom_receive_type = F3::get("POST.custom_receive_type");
    $custom_office_type = F3::get("POST.custom_office_type");
    $custom_office_name = F3::get("POST.custom_office_name");
    $lilami_date = F3::get("POST.lilami_date");
    $jafat_decision_date = F3::get("POST.jafat_decision_date");
    $jafat_decision_maker = F3::get("POST.jafat_decision_maker");
    $jafat_chalani_number = F3::get("POST.jafat_chalani_number");
    $jafat_chalani_date = F3::get("POST.jafat_chalani_date");

    //owner table
    //  $vehicle_id = $id;
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


    //update internal db
    //update vehicle data
    $onlineSql [] = "update vehicle set wheeler='$wheeler',vehicleid='$vehicleid', model='$model',
        manufacture_id='$manufacture_id',manufacture_date='$manufacture_date',fuel_type_id='$fuel_type_id', engine_num='$engine_num',
        chessis_num='$chessis_num',cylinder_num='$cylinder_num', horse_power='$horse_power',horse_power_type='$horse_power_type',
        electronic_device='$electronic_device',registration_date='$registration_date',certificate_num='$certificate_num',
        purpose_id='$purpose_id', hood='$hood', type='$type',remarks='$remarks', weight='$weight',weight_type='$weight_type',
        weight_capacity='$weight_capacity',weight_capacity_type='$weight_capacity_type',
        seat_num='$seat_num', color_id='$color_id', glass_color_id='$glass_color_id',zone_id='$zone_id',lot_number='$lot_number',
        vehicle_symbol_type='$vehicle_symbol_type', number='$number',tax='$tax',technical_inspector='$technical_inspector',
        inspection_date='$inspection_date', custom_office_id='$custom_office_id', pragyapan_patra_no='$pragyapan_patra_no',
        custom_Date='$custom_Date',custom_receive_type= '$custom_receive_type ',custom_office_type='$custom_office_type',
        custom_office_name='$custom_office_name' ,lilami_date='$lilami_date ' ,jafat_decision_date= ' $jafat_decision_date',
        jafat_decision_maker='$jafat_decision_maker',jafat_chalani_number='$jafat_chalani_number',jafat_chalani_date='$jafat_chalani_date ' ,
    receipt_num='$receipt_num',custom_remarks='$custom_remarks',police_office='$police_office',
        registration_num='$registration_num', status='approved'  where id='" . $vehicle . "'";
    //echo 123;
    //update owner data
    $onlineSql[] = "update owner set owner_type='$owner_type',first_name='$first_name',last_name='$last_name', father_name='$father_name',
        grandfather_name='$grandfather_name',dob='$dob',reg_num='$reg_num',email='$email',mobileno='$mobile',p_zone_id='$p_zone_id',p_district_id='$p_district_id',
        p_metropolitan='$p_metropolitan',p_ward_no='$p_ward_no',p_address='$p_address', p_house_no='$p_house_no', p_phone='$p_phone',
        temp_zone_id='$temp_zone_id',temp_district_id='$temp_district_id', temp_metropolitan='$temp_metropolitan', temp_ward_no='$temp_ward_no', temp_address='$temp_address',temp_house_no='$temp_house_no',
        temp_phone='$temp_phone', nabalik_guardian_name='$nabalik_guardian_name',nabalik_relation='$nabalik_relation',
        nabalik_identity_no='$nabalik_identity_no', nabalik_district='$nabalik_district', nabalik_year='$nabalik_year', nabalik_address='$nabalik_address',
        bank_name='$bank_name', creditor_name='$creditor_name',
        creditor_district='$creditor_district', creditor_year='$creditor_year', creditor_address='$creditor_address',per_nagarikta='$per_nagarikta',
        per_identificationno='$per_identificationno',per_district='$per_district',per_year='$per_year',indian_identificationno='$indian_identificationno' ,other_identificationno='$other_identificationno' where vehicleid='" . $vehicle . "'";
 //  DB::SQL($onlineSql);echo 123;die;
    $zone = Admin::getZone($zone_id);
    $symbol = Admin::getSymbolType($vehicle_symbol_type);
    $vehicleNo = $zone . $lot_number . $symbol . $number;
    // var_dump(DB::SQL($onlineSql));die;
    //live vrs ko data
    $sqls[] = "INSERT INTO owner
        (name,caste,dob,email,owner_type_id,father_name,g_father_name,mobileno,p_district,p_zone_id,
        p_nagarpalika,p_wardno, p_tole,p_gharno,p_phone,t_district,t_zone_id,t_nagarpalika,t_wardno,t_tole,
        t_gharno,t_phone,nab_guardian_name,nab_relation,nab_identificationno,nab_district,nab_year,nab_address,per_nagarikta, per_identificationno,
        per_district,per_year,bank_name,bank_identificationno,bank_district, bank_year,bank_address) VALUES
        ('$first_name', '$last_name','$dob','$email','$owner_type','$father_name','$grandfather_name', '$mobile',' $p_district_id',' $p_zone_id',
        '$p_metropolitan', '$p_ward_no','$p_address', '$p_house_no', '$p_phone', ' $temp_district_id','$temp_zone_id', '$temp_metropolitan',' $temp_ward_no','$temp_address',
        ' $temp_house_no',' $temp_phone', '$nabalik_guardian_name',' $nabalik_relation', '$nabalik_identity_no', '$nabalik_district', '$nabalik_year', '$nabalik_address','$per_nagarikta','$per_identificationno',
        '$per_district', '$per_year', '$bank_name', '$creditor_name',' $creditor_district', '$creditor_year','$creditor_address')";

    $sqls[] = "  insert into vehicle
        (id, owner_id, model,manufacturer_id, manufacturer_year, fueltype_id, engineno, chassisno, cylinderno, hpcc,
        hpcc_type, electronic_use,register_date, bluebook, usepurpose_id, hood, vehicle_type_id, comments, weight, weight_type,
        capacity, capacity_type, seatno, color_id, glass_color, zone_id, lotno, vehicle_type_symbol,licenceno, tax,
        custom_id, custom_pragyapanno, custom_date, custom_receiptno, custom_comments, entry_office_name, entryno,entry_date,
        inspector_name, inspector_date, status)
         values        
        ('$vehicleid',(select last_insert_id()),'$model','$manufacture_id','$manufacture_date','$fuel_type_id',' $engine_num',' $chessis_num','$cylinder_num', '$horse_power',
        '$horse_power_type','$electronic_device','$registration_date', '$certificate_num', '$purpose_id', '$hood', '$type','$remarks', '$weight','$weight_type',
        '$weight_capacity','$weight_capacity_type', '$seat_num', '$color_id','$glass_color_id','$zone_id','$lot_number','$vehicle_symbol_type','$number','$tax',
        ' $custom_office_id',  '$pragyapan_patra_no','$custom_Date', '$receipt_num','$custom_remarks', '$police_office', '$registration_num',now() ,'$technical_inspector', '$inspection_date','initial' )";

    //set db to remote
    F3::set('DB', new DB(F3::get("db_param.live_host"), F3::get("db_param.live_user"), F3::get("db_param.live_password")));
   DB::sql($sqls);

    //local
    F3::set('DB', new DB(F3::get("local_param.local_host"), F3::get("local_param.local_user"), F3::get("local_param.local_password")));
    DB::SQL($onlineSql);

    //admin log
    AdminLog::add($vehicleNo, "registration", "approved");

    //success message
    F3::set('nav', 'navigation');
    F3::set('message', 'The data has been approved');
    F3::set('templateAdmin', 'approve');
    echo Template::serve("template/layout.html");
  }

  function dismissRegistration() {
    //  echo "registration has been dismissed ";
    if (!F3::get('SESSION.asid')) {
      F3::reroute("/admin");
    }
    $id = F3::get("PARAMS.id");
    $vrs = new Axon("vehicle");
    $vrs->load(array("id=:id", array(":id" => $id)));
    $zone = Admin::getZone($vrs->zone_id);
    $symbol = Admin::getSymbolType($vrs->vehicle_symbol_type);
    $vehicleNo = $zone . $vrs->lot_number . $symbol . $vrs->number;
    AdminLog::add($vehicleNo, $vrs->form_type, "dismissed");
    $vrs->erase();
    F3::reroute("/admin/newRegistration/s");
  }

  function viewNamsari() {
    if (!F3::get('SESSION.asid')) {
      F3::reroute("/admin");
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
    $vehicle = F3::get("PARAMS.id");
    $data = new Axon("vehicle");
    $owner = new Axon("owner");
    $owner_photo = new Axon("owner_photo");
    $namsari = new Axon("namsari");

    if ($data->found(array('id=:id', array(':id' => $vehicle))) && $owner->found(array('vehicleid =:id', array(':id' => $vehicle))) && $namsari->found(array('vehicle_id=:id', array(':id' => $vehicle))) && $owner_photo->found(array('vehicle_id=:pic', array(':pic' => $vehicle)))) {
      $data->load(array('id=:id', array(':id' => $vehicle)));
      $owner->load(array('vehicleid =:id', array(':id' => $vehicle)));
      $namsari->load(array('vehicle_id =:id', array(':id' => $vehicle)));
      $owner_photo->load(array('vehicle_id=:pic', array(':pic' => $vehicle)));
      $data->copyTo("POST");
      $owner->copyTo("POST");
      $namsari->copyTo("POST");
      $owner_photo->copyTo("POST");
      F3::set('heading', 'नया सवारी धनी विवरण ');
      F3::set('date', $date);
      F3::set('nav', 'navigation');
      F3::set('title', 'Admin - approve Namsari');
      F3::set('templateAdmin', 'viewNamsari');
      echo Template::serve("template/layout.html");
    } else {
      F3::reroute("/admin/ownershipTransfer");
    }
  }

  function approveNamsari() {
    if (!F3::get('SESSION.asid')) {
      F3::reroute("/admin");
    }

    $vehicle = F3::get("PARAMS.id");
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

    //online edit by the operator
    $onlineSql [] = "update vehicle set wheeler='$wheeler',vehicleid='$vehicleid',zone_id='$zone_id',lot_number='$lot_number',
        vehicle_symbol_type='$vehicle_symbol_type', number='$number', status='approved'  where id='" . $vehicle . "'";

    $onlineSql[] = "update namsari set reason='$reason',date='$date',remarks='$remarks',witness_name='$witness_name',witness_address='$witness_address',citizenship_no='$citizenship_no'where id='" . $vehicle . "'";

    $onlineSql[] = "update owner set owner_type='$owner_type',first_name='$first_name',last_name='$last_name', father_name='$father_name',
        grandfather_name='$grandfather_name',dob='$dob',reg_num='$reg_num',email='$email',mobileno='$mobile',p_zone_id='$p_zone_id',p_district_id='$p_district_id',
        p_metropolitan='$p_metropolitan',p_ward_no='$p_ward_no',p_address='$p_address', p_house_no='$p_house_no', p_phone='$p_phone',
        temp_zone_id='$temp_zone_id',temp_district_id='$temp_district_id', temp_metropolitan='$temp_metropolitan', temp_ward_no='$temp_ward_no', temp_address='$temp_address',temp_house_no='$temp_house_no',
        temp_phone='$temp_phone', nabalik_guardian_name='$nabalik_guardian_name',nabalik_relation='$nabalik_relation',
        nabalik_identity_no='$nabalik_identity_no', nabalik_district='$nabalik_district', nabalik_year='$nabalik_year', nabalik_address='$nabalik_address',
        bank_name='$bank_name', creditor_name='$creditor_name',
        creditor_district='$creditor_district', creditor_year='$creditor_year', creditor_address='$creditor_address',per_nagarikta='$per_nagarikta',
        per_identificationno='$per_identificationno',per_district='$per_district',per_year='$per_year',indian_identificationno='$indian_identificationno' ,other_identificationno='$other_identificationno' where vehicleid='" . $vehicle . "'";
    //
    //
    $zone = Admin::getZone($zone_id);
    $symbol = Admin::getSymbolType($vehicle_symbol_type);
    $vehicleNo = $zone . $lot_number . $symbol . $number;
    F3::set('DB', new DB(F3::get("db_param.live_host"), F3::get("db_param.live_user"), F3::get("db_param.live_password")));
    $old_owner_id = DB::sql("select owner_id from vehicle where id='" . $vehicleid . "'");

    //check whether id is int
    if (count($old_owner_id) > 0) {

      $sqls[] = "INSERT INTO owner
        (name,caste,dob,email,owner_type_id,father_name,g_father_name,mobileno,p_district,p_zone_id,
        p_nagarpalika,p_wardno, p_tole,p_gharno,p_phone,t_district,t_zone_id,t_nagarpalika,t_wardno,t_tole,
        t_gharno,t_phone,nab_guardian_name,nab_relation,nab_identificationno,nab_district,nab_year,nab_address,per_nagarikta, per_identificationno,
        per_district,per_year,bank_name,bank_identificationno,bank_district, bank_year,bank_address) VALUES
        ('$first_name', '$last_name','$dob','$email','$owner_type','$father_name','$grandfather_name', '$mobile',' $p_district_id',' $p_zone_id',
        '$p_metropolitan', '$p_ward_no','$p_address', '$p_house_no', '$p_phone', ' $temp_district_id','$temp_zone_id', '$temp_metropolitan',' $temp_ward_no','$temp_address',
        ' $temp_house_no',' $temp_phone', '$nabalik_guardian_name',' $nabalik_relation', '$nabalik_identity_no', '$nabalik_district', '$nabalik_year', '$nabalik_address','$per_nagarikta','$per_identificationno',
        '$per_district', '$per_year', '$bank_name', '$creditor_name',' $creditor_district', '$creditor_year','$creditor_address')";

      $sqls[] = "insert into namsari_info
        (vehicle_id,reason,date,comments, sakshi_name,sakshi_address,sakshi_identification,new_ownerid, old_ownerid,status)
         values  ('$vehicleid','$reason','$date','$remarks','$witness_name','$witness_address','$citizenship_no',(select last_insert_id()),'" . $old_owner_id[0]['owner_id'] . "','initial')";

      //set db to remote
      DB::sql($sqls);
      $photo_name = DB::sql("select new_ownerid from namsari_info where vehicle_id='" . $vehicleid . "' order by new_ownerid desc");

      //update photo
      $onlineSql[] = "update owner_photo set picture='" . $photo_name[0]['new_ownerid'] . ".jpg' where vehicle_id='" . $vehicle . "'";

      //set db to old one
      F3::set('DB', new DB(F3::get("local_param.local_host"), F3::get("local_param.local_user"), F3::get("local_param.local_password")));

      DB::SQL($onlineSql);
      rename("photo/" . $vehicle . ".jpg", "photo/" . $photo_name[0]['new_ownerid'] . ".jpg");
      AdminLog::add($vehicleNo, "namsari", "approved");
      //success message
      F3::set('nav', 'navigation');
      F3::set('message', 'The data has been approved');
      F3::set('templateAdmin', 'approve');
      echo Template::serve("template/layout.html");
    } else {

      F3::set('message', 'The data doesnot exist');
      F3::set('nav', 'navigation');
      F3::set('templateAdmin', 'approve');
      echo Template::serve("template/layout.html");
    }
  }

  function dismissNamsari() {
    if (!F3::get('SESSION.asid')) {
      F3::reroute("/admin");
    }
    $id = F3::get("PARAMS.id");
    $vrs = new Axon("vehicle");
    $vrs->load(array("id=:id", array(":id" => $id)));
    $zone = Admin::getZone($vrs->zone_id);
    $symbol = Admin::getSymbolType($vrs->vehicle_symbol_type);
    $vehicleNo = $zone . $vrs->lot_number . $symbol . $vrs->number;
    AdminLog::add($vehicleNo, $vrs->form_type, "dismissed");
    $vrs->erase();
    F3::reroute("/admin/ownershipTransfer/s");
  }

}

?>
