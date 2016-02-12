<?php
   
     class CustomLoader_Loadfile
	 {  
	 
	  
	    
	    public function getdata()
		         { 
				 //echo"shreejana";die;
				  set_time_limit(0);
                  include('simple_html_dom.php');
                   $target_url = 'Nepal Rastra Bank.htm';
				  $html = new simple_html_dom();
                  $html->load_file($target_url);
				  $table=$html->find('/html/body/table[2]/tbody/tr[2]/td[2]/table[2]/tbody');
				  $table=$table[0];
				  $i=0;//increment array
				   foreach($table->find('tr') as $row)
				   {
					$date=$row->find('td[1]');
					$date=$date[0]->plaintext;
					if(preg_match("/[0-9]+[-][0-9]+[-][0-9]+/",$date))
					{
						$j=1;//increment values
						foreach($table->find('tr[1]/td') as $head)
						{
							$currency=trim($head->plaintext);
							if($currency=="Swedish Kr." || $currency=="Danish Kr." || $currency=="HKG$")
							{
								$rates[$i]['date']=$date;
								$rates[$i]['curname']=$currency;
								$rate=$row->find('td['.$j.']');
								$rate=trim($rate[0]->plaintext);
								$rates[$i]['buyingrate']=$rate;
								$rates[$i]['sellingrate']=null;
								$j++;
								$i++;
							}
							elseif($currency == "Date")
							{
								$j++;
							}
							else
							{
								$rates[$i]['date']=$date;
								$rates[$i]['curname']=$currency;
								$rate=$row->find('td['.$j.']');
								$rate=trim($rate[0]->plaintext);
								$rates[$i]['buyingrate']=$rate;
								$j++;
								$rate=$row->find('td['.$j.']');
								$rate=trim($rate[0]->plaintext);
								$rates[$i]['sellingrate']=$rate;
								$j++;
								$i++;
							}
						}
					}
				}
	                var_dump($rates);
		
		}
	 }
?>