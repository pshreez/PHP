<?php

class App extends F3instance {

    function getHome() {

        $poll = new Axon('tbl_poll');
     
        $latest_polls = $poll->find('published_date is not null and is_archive="n" and expiry_date > now() and private="n" ', 'created_date desc limit 5');
        $latest = $recent = $top = array();
        foreach ($latest_polls as $latestPolls) {
            $latest[$latestPolls->id] = $latestPolls->question;
        }
        // var_dump($latest_polls );die;
        $this->set('polls', $latest);

        //recent activity
        $poll->def('date', 'select date from tbl_vote where tbl_poll.id=tbl_vote.poll_id order by date desc limit 1');

        $recent_activity = $poll->find('published_date is not null and is_archive="n" and expiry_date>now() and private="n"', 'date desc limit 3');
        foreach ($recent_activity as $recentActivity) {
            $recent[$recentActivity->id] = $recentActivity->question;
        }
        $this->set('recent', $recent);
        $poll->def('hits', 'SELECT COUNT(date) FROM tbl_vote WHERE tbl_poll.id=tbl_vote.poll_id');
        $top_polls = $poll->find('published_date is not null and is_archive="n" and expiry_date >now() and private="n"', 'hits desc limit 2');

        foreach ($top_polls as $topPolls) {
            $top[$topPolls->id] = $topPolls->question;
        }

        $this->set('top', $top);
        $this->set('title', 'home');
        $this->set('template', 'home');
        echo Template::serve("template/layout.htm");
    }

    function create() {
        if (!F3::get('SESSION.sid')) {

         F3::reroute('/home');
        }
        // F3::set('keyword','Poll::add()');
        $this->set('title', 'Create poll');
        f3::set('heading', 'Create your polls');
        echo Template::serve("template/create.htm");
        // }
    }

    function mypolls() {
       if (!F3::get('SESSION.sid')) {

         F3::reroute('/home');
        }
        $tablePoll = new Axon('tbl_poll');
        $mypolls = $tablePoll->find(array('is_archive="n" AND expiry_date >now() AND user_id=:uid', array(':uid' => F3::get('SESSION.user')->id)));
        $polls = array();
        foreach ($mypolls as $poll) {
            if (!strpos($poll->question, '?')) {
                $poll->question .= "?";
            }

            $polls[] = array(strtoupper($poll->keyword), $poll->question, $poll->id, $poll->published_date, $poll->expiry_date);
        }
        // var_dump($polls);die;
        $date = DATE('Y-m-d');
        F3::set("nowDate", $date);
        F3::set('title', 'My Polls');
        F3::set('myList', $polls);
      
        F3::set('template', 'mypolls');
        echo Template::serve("template/layout.htm");
          
        
    }

    function test() {
        echo $_SERVER['SERVER_PORT'];
        $user = new Axon('tbl_user');
        $user->load(array("id=:id", array(":id" => 1537994726)));
        $this->set('SESSION.user', $user);
        $this->set('SESSION.sid', Snippets::_getRN());
    }

    function view() {
        $vote = new Poll();
        $total = $vote->totalVote();
        F3::set("total", $total);
        $this->viewData();
        echo Template::serve("template/poll_detail.htm");
    }

    function pollView() {

        $vote = new Poll();
        $total = $vote->totalVote();
        $this->viewData();
        // var_dump($percent);die;
        F3::set("total", $total);
        F3::set('template', 'poll_detail');
        echo Template::serve("template/layout.htm");
    }

    function viewData() {
        if (!F3::get('SESSION.sid')) {

         F3::reroute('/home');
        }

        $id = F3::get('PARAMS.pid');
        $poll = DB::sql(" SELECT  tbl_poll.user_id,tbl_option.name,tbl_poll.expiry_date,tbl_poll.created_date,tbl_poll.published_date,tbl_poll.keyword,tbl_poll.id,tbl_poll.user_id,tbl_user.fullname,tbl_user.image,tbl_poll.question,tbl_option.value FROM tbl_user LEFT join tbl_poll  ON tbl_user.id=tbl_poll.user_id left join tbl_option on tbl_poll.id=tbl_option.poll_id where tbl_poll.id=$id ");
        $i = 0;
        $data = DB::SQL("select tbl_poll.*, options.* from tbl_poll,(select name, value, COALESCE(votes, 0) as votes from tbl_option left outer join (SELECT option_name, count(option_name) as votes, poll_id from tbl_vote  where poll_id=$id group by option_name) as vote on tbl_option.name = vote.option_name where tbl_option.poll_id =$id) as options where tbl_poll.id=$id");
        $vote = DB::SQL("select count(option_name) as vote from tbl_vote  where poll_id=$id");
       //  var_dump($data);die;
        $dt = array();
        $totalValue = $vote[0]["vote"];
        if ($totalValue != 0) {
            // loop over poll options
            foreach ($data as $datas) {
                $cent = $datas["votes"] / $totalValue * 100;
                array_push($dt, array($datas["name"],stripslashes($datas["value"]) , $datas["votes"], $cent));
            }
        } else {

            foreach ($data as $datas) {
                array_push($dt, array($datas["name"],stripslashes($datas["value"]), $datas["votes"]));
            }
        }
     // var_dump($dt);
        $question = $data[0]["question"];
        if (!strpos($poll[0]["question"], '?')) {
            $poll[0]["question"] .= "?";
        }
        $date = DATE('Y-m-d');
        F3::set('date', $date);
        F3::set('user_id', $poll[0]["user_id"]);
        F3::set('id', $poll[0]["id"]);
        F3::set('published_date', $poll[0]["published_date"]);
        F3::set('expiry_date', $poll[0]["expiry_date"]);
        F3::set('created_date', $poll[0]["created_date"]);
        F3::set('keyword', $poll[0]["keyword"]);
        $question = ucfirst($poll[0]["question"]);
        F3::set('user_id', $poll[0]["user_id"]);
        F3::set('fullname', $poll[0]["fullname"]);
        F3::set('image', $poll[0]["image"]);
        F3::set('question', $question);
        F3::set('options', $dt);
        F3::set('title', 'Poll Detail');
    }

    function getTOU() {
        $this->set('title', 'Terms of Use');
        F3::set('template','tou');
        echo Template::serve("template/layout.htm");
    }

    /*  function percent() {
      $id = F3::get('PARAMS.pid');
      $poll = DB::sql(" SELECT  tbl_poll.user_id,tbl_option.name,tbl_poll.expiry_date,tbl_poll.created_date,tbl_poll.published_date,tbl_poll.keyword,tbl_poll.id,tbl_poll.user_id,tbl_user.fullname,tbl_user.image,tbl_poll.question,tbl_option.value FROM tbl_user LEFT join tbl_poll  ON tbl_user.id=tbl_poll.user_id left join tbl_option on tbl_poll.id=tbl_option.poll_id where tbl_poll.id=$id ");
      $i = 0;
      $data = DB::SQL("select tbl_poll.*, options.* from tbl_poll,(select name, value, COALESCE(votes, 0) as votes from tbl_option left outer join (SELECT option_name, count(option_name) as votes, poll_id from tbl_vote  where poll_id=$id group by option_name) as vote on tbl_option.name = vote.option_name where tbl_option.poll_id =$id) as options where tbl_poll.id=$id");
      //var_dump($data);
      foreach ($data as $datas) {

      $d = $datas["votes"];
      $ds[] = (int) $d;
      //  var_dump($ds);die;
      $sum = $ds[$i];
      $total = $sum + $ds[$i];
      }
      $length = sizeof($ds);
      for ($i = 0; $i < $length; $i++) {
      $numerator = $ds[$i] * 100;
      $percentage = ( $numerator) / $total;
      $percent[] = $percentage;
      }
      $j = 0;
      foreach ($data as $datas) {
      $per = $percent[$j];
      $cent = $per;
      $dt[] = array($datas["name"], $datas["value"], $datas["votes"], $cent);
      $j++;
      }
      print_r($dt);
      var_dump($dt);


      // var_dump($data);
      die;
      } */
}

/* foreach ($data as $datas) {

  $d = $datas["votes"];
  $ds[] = (int) $d;
  $sum = $ds[$i];
  $total = $sum + $ds[$i];
  }
  $length = sizeof($ds);
  for ($i = 0; $i < $length; $i++) {
  $numerator = $ds[$i] * 100;
  $percentage = ( $numerator) / $total;
  $percent[] = $percentage;
  }
  $j = 0;
  foreach ($data as $datas) {
  $per = $percent[$j];
  $cent = $per;
  $dt[] = array($datas["name"], $datas["value"], $datas["votes"], $cent);
  $j++;
  }
 */
//http://localhost/pollApp/pollView/25551613311340
?>

