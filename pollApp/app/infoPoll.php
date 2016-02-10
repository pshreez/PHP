<?php

class InfoPoll extends F3instance {

    function topPolls() {
        $top_poll = new Axon('tbl_poll');
           $polls=array();
        $top_poll->def('fullname', 'SELECT fullname FROM tbl_user WHERE tbl_poll.user_id=tbl_user.id');
        $top_poll->def('image', 'SELECT image FROM tbl_user WHERE tbl_poll.user_id=tbl_user.id');
        $top_poll->def('hits', 'SELECT COUNT(date) FROM tbl_vote WHERE tbl_poll.id=tbl_vote.poll_id');
        $poll = $top_poll->find('published_date IS NOT NULL AND is_archive="n" AND expiry_date>now() AND private="n"', 'hits DESC');
        foreach ($poll as $pl) {
            $polls[$pl->id] = array(strtoupper($pl->keyword), $pl->question, '<img src="' . $pl->image . '" width="20px" height="20px" /> ' . $pl->fullname);
        }

        $this->set('title', 'Top Polls');
        $this->set('pollList', $polls);
        F3::set('heading', 'Top Polls');
        F3::set('template', 'polls');
        echo Template::serve("template/layout.htm");
    }

    function latestPolls() {
        $latest_poll = new Axon('tbl_poll');
           $polls=array();
        $latest_poll->def('fullname', 'SELECT fullname FROM tbl_user WHERE tbl_poll.user_id=tbl_user.id');
        $latest_poll->def('image', 'SELECT image FROM tbl_user WHERE tbl_poll.user_id=tbl_user.id');
        $latest_poll->def('hits', 'SELECT COUNT(date) FROM tbl_vote WHERE tbl_poll.id=tbl_vote.poll_id');
        $poll = $latest_poll->find('published_date IS NOT NULL AND is_archive="n" AND expiry_date>now() AND private="n"', 'created_date DESC');
        foreach ($poll as $pl) {
            $polls[$pl->id] = array(strtoupper($pl->keyword), $pl->question, '<img src="' . $pl->image . '" width="20px" height="20px" /> ' . $pl->fullname);
        }

        $this->set('pollList', $polls);
        $this->set('title', 'Latest Polls');
        F3::set('heading', 'Latest Polls');
        F3::set('template', 'polls');
        echo Template::serve("template/layout.htm");
    }

    function recentActivity() {
        $poll = new Axon('tbl_poll');
           $polls=array();
        $poll->def('fullname', 'SELECT fullname FROM tbl_user WHERE tbl_poll.user_id=tbl_user.id');
        $poll->def('image', 'SELECT image FROM tbl_user WHERE tbl_poll.user_id=tbl_user.id');
        $poll->def('hits', 'SELECT COUNT(date) FROM tbl_vote WHERE tbl_poll.id=tbl_vote.poll_id');
        $poll->def('date', 'SELECT date FROM tbl_vote WHERE tbl_poll.id=tbl_vote.poll_id ORDER BY date DESC LIMIT 1');
        $q = $poll->find('published_date IS NOT NULL AND is_archive="n" AND expiry_date>now() AND private="n"', 'date DESC');
        foreach ($q as $pl) {
            $polls[$pl->id] = array(strtoupper($pl->keyword), $pl->question, '<img src="' . $pl->image . '" width="20px" height="20px" /> ' . $pl->fullname);
        }
        $this->set('pollList', $polls);
        $this->set('title', 'Recent Activity');
        F3::set('heading', 'Recent Activity');
        F3::set('template', 'polls');
        echo Template::serve("template/layout.htm");
    }

    function all() {
        $poll = new Axon('tbl_poll');
      //  echo 123;die;
        // $this->set('title', 'Quizzes');
        $poll->def('fullname', 'SELECT fullname FROM tbl_user WHERE tbl_poll.user_id=tbl_user.id');
        $poll->def('image', 'SELECT image FROM tbl_user WHERE tbl_poll.user_id=tbl_user.id');
        $poll->def('hits', 'SELECT COUNT(date) FROM tbl_vote WHERE tbl_poll.id=tbl_vote.poll_id');
        $q = $poll->find('published_date IS NOT NULL AND is_archive="n" AND expiry_date>now() AND private="n"');
         $polls=array();
        foreach ($q as $qu) {
            $polls[$qu->id] = array(strtoupper($qu->keyword), $qu->question, '<img src="' . $qu->image . '" width="20px" height="20px" /> ' . $qu->fullname);
        }
         $this->set('title', 'All polls');
        $this->set('pollList', $polls);
        $this->set('template', 'all');
        echo Template::serve("template/layout.htm");
    }

}



?>
