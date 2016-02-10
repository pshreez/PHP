<?php

Class Form_elements {

  function fuel() {
    $id = new Axon('fuel_type');
    $fuel_type = $id->find();
    foreach ($fuel_type as $fuel) {
      $list[] = array($fuel->id, $fuel->name);
    }
    F3::set('fuel_type', $list);
  }

  function fuel_view($id) {
    $fuel = new Axon('fuel_type');
    $fuel->load(array('id=:id', array(':id' => $id)));

    F3::set('fuel', $fuel->name);
  }

  function manufacture_company() {
    $id = new Axon('manufacturer');
    $company = $id->find();
    foreach ($company as $manufacturer) {
      $list[] = array($manufacturer->id, $manufacturer->name);
    }
    F3::set('company', $list);
  }

  function manufacture_view($id) {
    $manufacturer = new Axon('manufacturer');
    $manufacturer->load(array('id=:id', array(':id' => $id)));

    F3::set('manufacturer', $manufacturer->name);
  }

  function use_purpose() {
    $id = new Axon('use_purpose');
    $use = $id->find();
    foreach ($use as $uses) {
      $list[] = array($uses->id, $uses->name);
    }
    F3::set('use_purpose', $list);
  }

  function purpose_view($id) {
    $purpose = new Axon('use_purpose');
    $purpose->load(array('id=:id', array(':id' => $id)));

    F3::set('purpose', $purpose->name);
  }

  function vehicle_type() {
    $id = new Axon('vehicle_type');
    $types = $id->find();
    foreach ($types as $type) {
      $list[] = array($type->id, $type->name);
    }
    F3::set('vehicle_type', $list);
  }

  function type_view($id) {
    $type = new Axon('vehicle_type');
    $type->load(array('id=:id', array(':id' => $id)));

    F3::set('type', $type->name);
  }

  function custom_office() {
    $id = new Axon('custom');
    $customs = $id->find();
    foreach ($customs as $custom) {
      $list[] = array($custom->id, $custom->name);
    }
    F3::set('custom_office', $list);
  }

  function custom_view($id) {
    $custom = new Axon('custom');
    $custom->load(array('id=:id', array(':id' => $id)));

    F3::set('custom', $custom->name);
  }

  function vehicle_color() {
    $id = new Axon('color');
    $colors = $id->find();
    foreach ($colors as $color) {
      $list[] = array($color->id, $color->name);
    }
    F3::set('vehicle_color', $list);
  }

  function color_view($id) {
    $color = new Axon('color');
    $color->load(array('id=:id', array(':id' => $id)));

    F3::set('color', $color->name);
  }

  function zone_code() {
    $id = new Axon('zone');
    $zones = $id->find();
    foreach ($zones as $zone) {
      $list[] = array($zone->id, $zone->code, $zone->name);
    }
    F3::set('zone_code', $list);
  }

  function zone_view($id) {
    $zone = new Axon('zone');
    $zone->load(array('id=:id', array(':id' => $id)));
    // var_dump($zone->id);die;
    //  F3::set('zone',$zone->name);
    // F3::set('zcode',$zone->code);

    return $zone;
  }

  function zones_view($id) {
    $zone = new Axon('zone');
    $zone->load(array('id=:id', array(':id' => $id)));
    //  var_dump($zone);die;
    //  F3::set('zone',$zone->name);
    F3::set('zones', $zone->name);
  }

  function owner_type() {
    $id = new Axon('owner_type');
    $owners = $id->find("name is not NULL",'id DESC');
    foreach ($owners as $owner) {
      $list[] = array($owner->id, $owner->name);
    }
    F3::set('owner_type', $list);
  }

  function owner_view($id) {
    $owner = new Axon('owner_type');
    $owner->load(array('id=:id', array(':id' => $id)));

    F3::set('owner', $owner->name);
  }

  function district_code() {
    $id = new Axon('district');
    $districts = $id->find();
    foreach ($districts as $district) {
      $list[] = array($district->id, $district->name);
    }
    // var_dump($list);die;
    F3::set('district_code', $list);
  }

  function district_view($id) {
    $district = new Axon('district');
    $district->load(array('id=:id', array(':id' => $id)));

    F3::set('district', $district->name);


    // F3::set('zonecode',$color->code);
  }

  function type_symbol() {
    $id = new Axon('type_symbol');
    $two = $id->afind("wheeler=21");
    $four = $id->afind("wheeler=22");

    F3::set('type_symbol', $two);
    F3::set('type_symbols', $four);
  }

  function symbol_view($id) {
    $symbol = new Axon('type_symbol');
    $symbol->load(array('id=:id', array(':id' => $id)));

    F3::set('symbol', $symbol->name);
    // F3::set('zonecode',$color->code);
  }

  function dateConvertEn($date) { 
    $sql = DB::sql("select nepali_year,month_code, datediff('".$date."', eng_start_date) +1 dt from calendar where '".$date."' between eng_start_date and eng_end_date");
    $dt= $sql[0]["nepali_year"].'-'.$sql[0]["month_code"].'-'.$sql[0]['dt'];
     return $dt;
  }

}

?>
