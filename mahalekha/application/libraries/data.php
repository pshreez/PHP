<?php

class Data  {

   

    function getOrg() {
        $query = " SELECT * FROM C_ORGANIZATION";
        $run = $this->db->query($query);
        $datas = $run->result();
        foreach ($datas as $value) {
            $data[$value->ORG_CD] = $value->ORG_NNAME;
        }
        return $data;
    }

    function getDonor() {
        $query = " SELECT * FROM C_DONOR";
        $run = $this->db->query($query);
        $datas = $run->result();
        foreach ($datas as $value) {
            $data[$value->DONOR_CODE] = $value->DONOR_NDESC;
        }
        return $data;
    }

    function getSource() {
        $query = " SELECT * FROM C_SOURCE_TYPE";
        $run = $this->db->query($query);
        $datas = $run->result();
        foreach ($datas as $value) {
            $data[$value->SOURCE_CODE] = $value->SOURCE_TYPE_NDESC;
        }

        return $data;
    }

   

    /* function getOrganization() {
      $org = $this->db->query("SELECT * FROM tabs"); //var_dump($org); die('test');
      //if ($org->num_rows() > 0)
      return $org->result();
      }
     * 
     * 
     * 
     * 
     * 
     * 
     */
}