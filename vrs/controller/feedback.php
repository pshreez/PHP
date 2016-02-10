<?php

Class Feedback {

  function registration_feedback() {

    $id = F3::get("PARAMS.id");
    $vehicle = new Axon("vehicle");
    $vehicle->load(array('id=:id', array(':id' => $id)));
    $zone_id = $vehicle->zone_id;
    $wheeler = $vehicle->wheeler;
    $dates = $vehicle->date;

    $date = DB::sql("SELECT DATE_ADD( date, INTERVAL 15 DAY ) AS ds FROM vehicle WHERE id='$id' and date='$dates'");
    $dt = new Form_elements();
    $nepDate = $dt->dateConvertEn($date[0]["ds"]);
    $zone = Admin::getZone($vehicle->zone_id);
    $symbol = Admin::getSymbolType($vehicle->vehicle_symbol_type);
    $vehicleNo = $zone . $vehicle->lot_number . $symbol . $vehicle->number;
    $zone = new Axon("zonal_office");
    if ($zone->found(array('zone_id=:id and wheeler=:vid', array(':id' => $zone_id, ':vid' => $wheeler))) > 0) {
      $zone->load(array('zone_id=:id and wheeler=:vid', array(':id' => $zone_id, ':vid' => $wheeler)));
      $photos = new Axon("owner_photo");
      if ($photos->found(array('vehicle_id =:id', array(':id' => $id)))) {
        $photos->load(array('vehicle_id =:id', array(':id' => $id)));
        F3::set('pic', $photos);
      } else {
        F3::set('pic', 0);
      }
      F3::set('date', $nepDate);
      F3::set('refer', $id);
      F3::set('vehicle', $vehicleNo);
      F3::set('value', $zone->name);
      F3::set('navUser', 'userNav');
      F3::set('template', 'feedback');
      echo Template::serve("template/layout.html");
    } else {
      // echo 123;die;
      $photos = new Axon("owner_photo");
      if ($photos->found(array('vehicle_id =:id', array(':id' => $id)))) {
        $photos->load(array('vehicle_id =:id', array(':id' => $id)));
        F3::set('pic', $photos);
      } else {
        F3::set('pic', 0);
      }
      F3::set('date', $nepDate);
      F3::set('refer', $id);
      F3::set('navUser', 'userNav');
      F3::set('value', 'no office available');
      F3::set('template', 'feedback');
      echo Template::serve("template/layout.html");
    }
  }

  function transfer_feedback() {
    $id = F3::get("PARAMS.id");
    $vehicle = new Axon("vehicle");
    $vehicle->load(array('id=:id', array(':id' => $id)));
    $zone_id = $vehicle->zone_id;
    $wheeler = $vehicle->wheeler;
    $dates = $vehicle->date;
    $date = DB::sql("SELECT DATE_ADD( date, INTERVAL 15 DAY ) AS ds FROM vehicle WHERE id='$id' and date='$dates'");
    $dt = new Form_elements();
    $nepDate = $dt->dateConvertEn($date[0]["ds"]);

// var_dump($date[0]["ds"]);die;
    //echo $nepDate;die;
    $zone = Admin::getZone($vehicle->zone_id);
    $symbol = Admin::getSymbolType($vehicle->vehicle_symbol_type);
    $vehicleNo = $zone . $vehicle->lot_number . $symbol . $vehicle->number;
    $zone = new Axon("zonal_office");
    if ($zone->found(array('zone_id=:id and wheeler=:vid', array(':id' => $zone_id, ':vid' => $wheeler))) > 0) {
      $zone->load(array('zone_id=:id and wheeler=:vid', array(':id' => $zone_id, ':vid' => $wheeler)));
      $photos = new Axon("owner_photo");
      if ($photos->found(array('vehicle_id =:id', array(':id' => $id)))) {
        $photos->load(array('vehicle_id =:id', array(':id' => $id)));
        F3::set('pic', $photos);
      } else {
        F3::set('pic', 'no photo available');
      }
      F3::set('date', $nepDate);
      F3::set('refer', $id);
      F3::set('vehicle', $vehicleNo);
      F3::set('value', $zone->name);
      F3::set('navUser', 'userNav');
      F3::set('template', 'feedbacktransfer');
      echo Template::serve("template/layout.html");
    } else {
      $photos = new Axon("owner_photo");
      if ($photos->found(array('vehicle_id =:id', array(':id' => $id)))) {
        $photos->load(array('vehicle_id =:id', array(':id' => $id)));
        F3::set('pic', $photos);
      } else {
        F3::set('pic', 'no photo available');
      }
      F3::set('date', $nepDate);
      F3::set('refer', $id);
      F3::set('navUser', 'userNav');
      F3::set('value', 'no office available');
      F3::set('template', 'feedbacktransfer');
      echo Template::serve("template/layout.html");
    }
  }

  function help() {
    F3::set('navUser', 'userNav');
    F3::set('template', 'help');
    echo Template::serve("template/layout.html");
  }

  function helpTransfer() {
    F3::set('navUser', 'userNav');
    F3::set('template', 'helpTransfer');
    echo Template::serve("template/layout.html");
  }

}

?>
