<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monthly_p_work extends CI_Controller {
	function __construct(){
	     	parent::__construct();
	//echo 'ade1';
			$this->load->model('loginModel','',TRUE);
	//echo 'ade2';
			$this->load->model('insert_model');
	                //$this->load->model('test_ler');
	//echo 'ade3';
			$this->load->library('session');
	//echo 'ade4';	
			$this->is_logged_in();
	//echo 'ade5';
		
		
	}
	
		function is_logged_in()
	{
		
		$is_logged_in = $this->session->userdata('v_UserName');
		
		if(!isset($is_logged_in) || $is_logged_in !=TRUE)
		redirect('LoginController/index');
	}
	public function index(){
   		$this->load->model("get_model");
		$data['dept'] = $this->get_model->get_poploclistb();
		$data['count'] = count($data['dept']);
		$data['year']= ($this->input->get('y') <> 0) ? $this->input->get('y') : date("Y");	
		$data['month']= ($this->input->get('m') <> 0) ? sprintf("%02d", $this->input->get('m')) : date("m");
		$data['records'] = $this->get_model->monthplan($data['year'],$data['month']);
		$data['privilege'] = $this->get_model->monthplanpriv($this->session->userdata('v_UserName'));
		
		if(isset($data['records'])){
			foreach ($data['records'] as $r){
				if ($r->Color_Code == 'icon-green'){
                   	$color = 'class="icon-green"';
                }
                else{
                	$color = "";
                }
				$data['date'][$r->Date.$r->Dept_Code] = $r->Work_Code;
				$data['color'][$r->Date.$r->Dept_Code] = $color;
			}
		}
		$this ->load->view("headprinter");
		$this ->load->view("content_monthly_p_work", $data);
	}
}
/*$data['PWMP'] = $this->get_model->PWMP_period();
		
    	foreach ($data['PWMP'] as $r){
    		$data['sn'] = explode('-',$r->Scheduler_Name);
    		$data['deptcode'][] = $data['sn'][0];
    		$data['schdata'][] = array('dept'=>$data['sn'][0],
    								   'Occurs'=>$r->Occurs,
    								   'Monthly_num'=>$r->Monthly_num,
    								   'Monthly_sel' => $r->Monthly_sel,
    								   'Monthly_days'=>$r->Monthly_days,
    								   'Monthly_months' => $r->Monthly_months,
    								   'Daily_freq_time_1'=>$r->Daily_freq_time_1,
    								   'Duration_start_date'=>$r->Duration_start_date,
    								   'Duration_end_date'=>$r->Duration_end_date,
    								   'Timestamp'=>$r->Timestamp);


    	}
		//print_r($data['schdata']);
		//exit();
    	if (isset($data['schdata'])){
		foreach ($data['schdata'] as $schdata){
				$beginday = date('Y-m-d',strtotime($schdata['Duration_start_date']));
				$limitday = date("Y-m-t", strtotime($beginday));
				$lastday  = isset($schdata['Duration_end_date']) ? date('Y-m-d',strtotime($schdata['Duration_end_date'])) : NULL;
				//daily sch
		    if ($schdata['Occurs']=='Daily'){
		    	$step = $schdata['Monthly_num'];
		    	$startstamp = date('Y-m-d H:i:s',strtotime($beginday.$schdata['Daily_freq_time_1']));

				if ($lastday >= date($data['year'].'-'.$data['month'].'-01') OR is_null($lastday)){

				if (date('m',strtotime($beginday)) != date('m',strtotime($lastday)) OR is_null($lastday)){
					if (date('m',strtotime($beginday)) < $data['month'] OR date('Y',strtotime($beginday)) < $data['year']){
					$lastdate = date("Y-m-t",strtotime("-1 months",strtotime($data['year'].'-'.$data['month'].'-01')));
	       			//echo $schdata['dept'].$lastdate.'<br>';
	       			$datediff = (strtotime($lastdate) - strtotime($beginday))/86400;
	       			//echo $schdata['dept'].$datediff.'<br>';
	       			$mod = $datediff % $step;
	       			//echo $schdata['dept'].$mod.'<br>';
	       			$nextday = $step - $mod;
	       			//echo $schdata['dept'].$nextday.'<br>';
	       			$nextmdate = date("Y-m-d",strtotime("+".$nextday." days", strtotime($lastdate)));
	       			$next = strtotime($nextmdate);
	       			$limitnmdate = date("Y-m-t", strtotime($nextmdate));
	       			$limitn = strtotime($limitnmdate);
	       			//echo $schdata['dept'].$nextmdate.'<br>';
	       			}
	       			else{
	       			$nextmdate = NULL;
	       			$limitnmdate = NULL;	
	       			}
				}
				if ($data['month'] == date('m',strtotime($beginday)) AND $data['year'] == date('Y',strtotime($beginday))){
					if (strtotime($schdata['Timestamp']) <= strtotime($startstamp)){
						$begin = strtotime($beginday);
					}
					else{
						$begin = strtotime(date('Y-m-d',strtotime("+".$step." days",strtotime($beginday))));
					}
					//echo date('Y-m-d',$begin).'<br>';
					$limit = strtotime($limitday);

					$lastday = is_null($lastday) ? date("Y-m-t", $begin) : $lastday;
					$end   = strtotime($lastday);
				}
				else{
					$begin = strtotime($nextmdate);
					$limit = strtotime($limitnmdate);

					$lastday = is_null($lastday) ? date("Y-m-t", $begin) : $lastday;
					$end   = strtotime($lastday);
				}
				if (date('Y',strtotime($beginday)) < $data['year']){
				    	if ($begin < $end) {
					       	$data['date'][$schdata['dept']][] = date("Y-m-d",$begin);
					       	while ($begin <= $end) {
				        	$begin = strtotime(date("Y-m-d",strtotime("+".$step." days", $begin)));
						        	if ($begin <= $end){
						        		if ($begin <= $limit){
						        	$data['date'][$schdata['dept']][] = date("Y-m-d",$begin);
						        		}
						        	}
				        	}
				    	}
		   		}
		   		elseif (date('Y',strtotime($beginday)) == $data['year']){
		   			if(date('m',strtotime($beginday)) <= $data['month']){
				    	if ($begin < $end) {
					       	$data['date'][$schdata['dept']][] = date("Y-m-d",$begin);
					       	while ($begin <= $end) {
				        	$begin = strtotime(date("Y-m-d",strtotime("+".$step." days", $begin)));
						        	if ($begin <= $end){
						        		if ($begin <= $limit){
						        	$data['date'][$schdata['dept']][] = date("Y-m-d",$begin);
						        		}
						        	}
				        	}
				    	}
		    		}
		    		else{
		    		$data['date'][$schdata['dept']][] = NULL;
		    		}
		   		}
		    	else{
		    		$data['date'][$schdata['dept']][] = NULL;
		    	}

		    	}
		    	else{
		    		$data['date'][$schdata['dept']][] = NULL;
		    	}
			}
			//weekly sch
			elseif ($schdata['Occurs']=='Weekly') {
				$step = $schdata['Monthly_num'];
				$startstamp = date('Y-m-d H:i:s',strtotime($beginday.$schdata['Daily_freq_time_1']));

				$custom_date = strtotime( date('d-m-Y', strtotime($beginday)) );
				$custom_datem1 = strtotime( date('d-m-Y', strtotime($beginday.'+1 day')) );
				$week_end = date('Y-m-d', strtotime('this week last sunday', $custom_date));
				$beginday1 = (date('Y-m-d', strtotime('this week last sunday', $custom_datem1)) == $beginday) ? $beginday : $week_end;

				$day   = 24 * 3600;
				$begin = strtotime($beginday1);
				$lastday = is_null($lastday) ? date("Y-m-t", strtotime($data['year'].'-'.$data['month'].'-01')) : $lastday;
				$end   = strtotime($lastday) + $day;
				
				$datediff = ($end - $begin);
				$weeks = floor($datediff / $day / 7);
				$days  = $datediff / $day - $weeks * 7;
				if ($weeks){
					$out = $days > 0 ? $weeks : $weeks-1;
				}

				$mod = $out % $step;
				
				$t = $step - $mod;

				if($t < 5) {
					if (strtotime($schdata['Timestamp']) <= strtotime($startstamp)){
						$begining = $begin;
					}
					else{
						$begining = strtotime(date('Y-m-d',strtotime("+".$step." weeks",$begin)));
					}
					
					while ($begining <= $end){
						$sundate = date("Y-m-d",$begining);
						$wdate = strtotime($sundate) + $day;
						$datediff = ($wdate - $begin);
						$weeks = floor($datediff / $day / 7);
						$days  = $datediff / $day - $weeks * 7;
						$sunout = $days > 0 ? $weeks : $weeks-1;
						$sunmod = $sunout % $step;

							if ($sunmod == 0 AND $wdate <= $end){
									$weekdate = $sundate;
									for ($d=0;$d<7;$d++){
										$datepick = date('Y-m-d',strtotime("+".$d." days",strtotime($weekdate)));
											$daypick[] = explode(',',$schdata['Monthly_days']);
											foreach ($daypick as $daypick){
												if (date('l',strtotime($datepick)) == $daypick){
													if (date('m',strtotime($datepick)) == $data['month'] AND date('Y',strtotime($datepick)) == $data['year']){
														if (strtotime($beginday) <= strtotime($datepick)){
														$data['date'][$schdata['dept']][] = $datepick;
														}
													}
												}
											}
									}
							}
							$begining = strtotime(date("Y-m-d",strtotime("+1 weeks", $begining)));
					}
					if (date('Y',strtotime($beginday)) < $data['year']){
						if (array_key_exists($schdata['dept'],$data['date'])){
						$data['date'] = $data['date'];
						}
						else{
								$data['date'][$schdata['dept']][] = NULL;
							}
					}
					elseif (date('Y',strtotime($beginday)) == $data['year']){
						if(date('m',strtotime($beginday)) <= $data['month']){
							if (array_key_exists($schdata['dept'],$data['date'])){
							$data['date'] = $data['date'];
							}
							else{
								$data['date'][$schdata['dept']][] = NULL;
							}
						}
						else{
							$data['date'][$schdata['dept']][] = NULL;
						}
					}
					else{
						$data['date'][$schdata['dept']][] = NULL;
					}
				}
				else{
					$data['date'][$schdata['dept']][] = NULL;
				}
			}
			//monthly sch
			else{
				$step = $schdata['Monthly_months'];
				$daychoose = date('Y',strtotime($beginday)).'-'.date('m',strtotime($beginday)).'-'.$schdata['Monthly_num'];
				$dayc = strtotime($daychoose);
				$begin = strtotime($beginday);
				$lastday = is_null($lastday) ? date("Y-m-t", strtotime($data['year'].'-'.$data['month'].'-01')) : $lastday;
				$end   = strtotime($lastday);
				$startstamp = date('Y-m-d H:i:s',strtotime($beginday.$schdata['Daily_freq_time_1']));

				if ($schdata['Monthly_sel'] == 1){
					if (strtotime($schdata['Timestamp']) <= strtotime($startstamp)){
						if ($dayc >= $begin){
						$begining = $begin;
						}
						else{
						$begin = strtotime(date('Y-m-d',strtotime("+1 months",$begin)));
						$begining = $begin;
						}
					}
					else{
						$begin = strtotime(date('Y-m-d',strtotime("+1 months",$begin)));
						$begining = $begin;
					}
					
					while ($begining <= $end){
						$year1 = date('Y', $begin);
						$year2 = date('Y', $begining);
						
						$month1 = date('m', $begin);
						$month2 = date('m', $begining);
						
						$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
						$t = $diff % $step;
						if ($t==0){
							//echo $schdata['dept'].'--'.date('Y-m-d',$begining).'-'.$t.'<br>';
							if (checkdate(date('m',$begining),$schdata['Monthly_num'],date('Y',$begining))){
								if(date('m',$begining) == $data['month'] AND date('Y',$begining) == $data['year']){
								$data['date'][$schdata['dept']][] = date('Y',$begining).'-'.date('m',$begining).'-'.sprintf("%02d", $schdata['Monthly_num']);
								}
							}
						}
						$begining = strtotime(date('Y-m-d',strtotime("+1 months",$begining)));
					}
				}	
				else{  //(Monthly_sel==2)
					if (strtotime($schdata['Timestamp']) <= strtotime($startstamp)){
						$begining = $begin;
					}
					else{
						$begin = strtotime(date('Y-m-d',strtotime("+1 months",$begin)));
						$begining = $begin;
					}
					//$kk=date('m-Y',$begining);
						//echo date('Y-m-d',strtotime("first weekends august 2015")).'<br>';
					while ($begining <= $end){
							$year1 = date('Y', $begin);
							$year2 = date('Y', $begining);
							
							$month1 = date('m', $begin);
							$month2 = date('m', $begining);
							
							$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
							$t = $diff % $step;
							if ($t==0){
							//echo $schdata['dept'].date('Y-m-d',$begining).'<br>';
								if ($begining < $end) {
									$msdate = strtotime(date('Y',$begining).'-'.date('m',$begining).'-01');
									$medate = strtotime(date('Y-m-t',$msdate));
									//echo $schdata['dept'].'--sdate: '.date('Y-m-d',$msdate).'<br>';
									//echo $schdata['dept'].'--edate: '.date('Y-m-d',$medate).'<br>';
									$wday_no = 0;
									for($day=1;$day<=(date('d',$medate));$day++){
										if(date("l", strtotime(date('Y',$msdate).'-'.date('m',$msdate).'-'.$day)) === $schdata['Monthly_days']) {
							               $wday_no++;
							           	}
							           	else{
							           		if ($schdata['Monthly_days'] == 'Weekday'){
							           			if (date("l", strtotime(date('Y',$msdate).'-'.date('m',$msdate).'-'.$day)) <> 'Saturday' AND date("l", strtotime(date('Y',$msdate).'-'.date('m',$msdate).'-'.$day)) <> 'Sunday'){
							           				$wday_no++;
							           			}
							           		}
							           		elseif($schdata['Monthly_days'] == 'Weekend'){
							           			if (date("l", strtotime(date('Y',$msdate).'-'.date('m',$msdate).'-'.$day)) == 'Saturday' OR date("l", strtotime(date('Y',$msdate).'-'.date('m',$msdate).'-'.$day)) == 'Sunday'){
							           				$wday_no++;
							           			}
							           		}
							           	}
									}

							        $no_days  = 0;
							        //$totaldays = 0;
							        $loop=1;
							        	while ($msdate <= $medate) {
								            $no_days++;
								            $what_day = date("l", $msdate);
								            	if(date('m',$msdate) == $data['month'] AND date('Y',$msdate) == $data['year']){
								            		if ($schdata['Monthly_days']!='Day' AND $schdata['Monthly_days']!='Weekday' AND $schdata['Monthly_days']!='Weekend'){
									            		if ($what_day==$schdata['Monthly_days']){
										            		if ($schdata['Monthly_num']==1 OR $schdata['Monthly_num']==2 OR $schdata['Monthly_num']==3 OR $schdata['Monthly_num']==4){
										            			if ($schdata['Monthly_num'] == $loop){
										            				if ($begin <= $msdate){
										            				$data['date'][$schdata['dept']][] = date('Y-m-d',$msdate);
										            				}
										            			}
										            		}
										            		else{
										            			if ($wday_no == 5){
										            				if ($loop==$schdata['Monthly_num']){
																		if ($begin <= $msdate){
										            					$data['date'][$schdata['dept']][] = date('Y-m-d',$msdate);
										            					}
										            				}
										            			}
										            			else{
										            				if ($loop==$wday_no){
										            					if ($begin <= $msdate){
										            					$data['date'][$schdata['dept']][] = date('Y-m-d',$msdate);
										            					}
										            				}
										            			} 	
										            		}
										            	$loop++;	
									            		}
									            	}
								            		else{

								            			if ($schdata['Monthly_days'] == 'Day'){
								            				if ($schdata['Monthly_num']==1 OR $schdata['Monthly_num']==2 OR $schdata['Monthly_num']==3 OR $schdata['Monthly_num']==4){
								            					if ($schdata['Monthly_num'] == $loop){
								            						if ($begin <= $msdate){
								            						$data['date'][$schdata['dept']][] = date('Y-m-d',$msdate);
								            						}
								            					}
								            				}
								            				else{
									            					if (date('d',$medate) == $loop){
									            						if ($begin <= $msdate){
									            						$data['date'][$schdata['dept']][] = date('Y-m-d',$medate);
									            						}
									            					}
								            					}
								            			$loop++;
								            			}
								            			elseif($schdata['Monthly_days'] == 'Weekday'){
								            				if ($what_day <> 'Saturday' AND $what_day <> 'Sunday'){
								            					if ($schdata['Monthly_num']==1 OR $schdata['Monthly_num']==2 OR $schdata['Monthly_num']==3 OR $schdata['Monthly_num']==4){
									            					if ($schdata['Monthly_num'] == $loop){
									            						if ($begin <= $msdate){
									            						$data['date'][$schdata['dept']][] = date('Y-m-d',$msdate);
									            						}
									            					}
								            					}
								            					else{
									            					if ($wday_no == $loop){
									            						if ($begin <= $msdate){
									            						$data['date'][$schdata['dept']][] = date('Y-m-d',$msdate);
									            						}
									            					}
								            					}
								            					$loop++;

								            				}
								            			}
								            			else{
								            				if ($what_day == 'Saturday' OR $what_day == 'Sunday'){
								            					if ($schdata['Monthly_num']==1 OR $schdata['Monthly_num']==2 OR $schdata['Monthly_num']==3 OR $schdata['Monthly_num']==4){
									            					if ($schdata['Monthly_num'] == $loop){
									            						if ($begin <= $msdate){
									            						$data['date'][$schdata['dept']][] = date('Y-m-d',$msdate);
									            						}
									            					}
								            					}
								            					else{
									            					if ($wday_no == $loop){
									            						if ($begin <= $msdate){
									            						$data['date'][$schdata['dept']][] = date('Y-m-d',$msdate);
									            						}
									            					}
								            					}
								            					$loop++;
								            				}

								            			}	
								            		}
								            	}
								            $msdate += 86400; // +1 day
								        }
					    		}
							}
							$begining = strtotime(date('Y-m-d',strtotime("+1 months",$begining)));
						}
				}
				//print_r($data['date']);
				//exit();
				if (date('Y',strtotime($beginday)) < $data['year']){
					if (array_key_exists($schdata['dept'],$data['date'])){
					$data['date'] = $data['date'];
					}
					else{
							$data['date'][$schdata['dept']][] = NULL;
						}
				}
				elseif (date('Y',strtotime($beginday)) == $data['year']){
					if(date('m',strtotime($beginday)) <= $data['month']){
						if (array_key_exists($schdata['dept'],$data['date'])){
						$data['date'] = $data['date'];
						}
						else{
							$data['date'][$schdata['dept']][] = NULL;
						}
					}
					else{
						$data['date'][$schdata['dept']][] = NULL;
					}
				}
				else{
					$data['date'][$schdata['dept']][] = NULL;
				}
			}
		}
		//print_r($data['date']);
		//exit();
		foreach ($data['schdata'] as $sd){
			foreach ($data['date'] as $key=>$val){
				if ($key == $sd['dept']){
			$data['datedept'][] = array('dept'=>$sd['dept'],
		    							'date'=>$val);
				}
			}
		}
	    foreach ($data['datedept'] as $dd){
	    	foreach ($dd['date'] as $d){
		    	for ($date=01;$date<=31;$date++){
		    		$date = sprintf("%02d", $date);
		    		if($data['year'].'-'.$data['month'].'-'.$date==$d)
		    		$data['d'.$date][$dd['dept']]=$d;

		    	}	
	    	}
	    }
		}*/

		/*$beginday = date($data['year'].'-'.$data['month'].'-01');
		$lastday  = date("Y-m-t", strtotime($beginday));
		
		$begin = strtotime($beginday);
    	$end   = strtotime($lastday);

		if ($begin < $end) {
	        $no_days  = 0;
	        $weekends = 0;
	        //$a=1;
		        while ($begin <= $end) {
		            $no_days++; // no of days in the given interval
		            //echo $no_days.'<br>';
		            $what_day = date("N", $begin);
		            //echo date('Y-m-d',strtotime("first weekday of",$begin)).'<br>';
		            //echo $what_day.'<br>';
		            		if ($what_day==3){
			            		//if ($a==5){
				            		echo date('Y-m-d',$begin).' - ';
				            		echo $what_day.'<br>';
			            		//}
			            		//echo $a;
			            		//$a++;
			            		
		            		}
		        if ($what_day == 3) { // 6 and 7 are weekend days
                $weekends++;
            	}
		            $begin += 86400; // +1 day
		        }
		        echo 'hari :'.$weekends.'<br>';
		        echo $no_days.'<br>';
		        $working_days = $no_days - $weekends;
		        echo $working_days;
    	}*/
    	//print_r($tdd);
    	//exit();