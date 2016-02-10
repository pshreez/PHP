<?php

class Report extends F3instance {

    function lst() {


        $user = new Axon('tbl_user');
        $report = array();
        $user->def("hits", "SELECT COUNT(date) FROM tbl_vote, tbl_poll WHERE date between '" . F3::get("POST.from") . "' and '" . F3::get("POST.to") . "'" . (F3::get("POST.telco") ? " and telco='" . F3::get("POST.telco") . "'" : "") . " and tbl_poll.id=tbl_vote.poll_id and tbl_poll.user_id=tbl_user.id group by tbl_user.id");
        if ($user->found() > 0) {
            $report_list = $user->find();
            foreach ($report_list as $rl) {
                $report[] = array('<img src="' . $rl->image . '" width="20px" height="20px" /> ' . $rl->fullname, ($rl->hits ? $rl->hits : 0));
            }
        }
        $this->set('report', $report);
        echo Template::serve("template/admin/report_list.htm");
    }

    function getReport() {
        F3::set('title', 'Report');
        F3::set('template', "report");
        echo Template::serve("template/admin/layout.htm");
    }

}

?>