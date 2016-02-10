<?php

class AdminLog extends F3instance {

    public static function add($vehicle, $form_type, $status) {
        $log = new Axon('admin_log');
        $log->date = date("Y-m-d H:i:s");
        $log->admin_username = F3::get('SESSION.username'); //admin id
        $log->vehicle_no = $vehicle;
        $log->status = $status;
        $log->form_type = $form_type;
        $log->save();
    }

    function lst() {
        $from = $this->get('POST.from');
        $to = $this->get('POST.to');
        $admin = $this->get('POST.admin');
        $list = DB::sql("select status, count(status) as no from admin_log where admin_id='" . $admin_id . "'  and date between '" . $from . "' and '" . $to . "' + interval 1  group by status");
        $this->set("list", $list);
    }



}

?>