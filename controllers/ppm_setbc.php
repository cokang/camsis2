<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ppm_set extends CI_Controller {

	public function index() 
	{ 
		//if (isset($_REQUEST['y'])) {
		//	 $theyear =  $_REQUEST["y"];
		//}	
		$data['asset_no'] = $this->input->get('assetno');
		$this->load->model('get_model');
		$data['records'] = $this->get_model->assetjobtyperegy($this->input->get('assetno'),$this->input->get('y'));
		if ($data['records']){
		$data['weeksch'] = explode(',',$data['records'][0]->v_weeksch);
		$data['ppmwo'] = $this->get_model->ppmwo($data['asset_no'],$data['weeksch']);
		}
		else{
		$data['weeksch'] = NULL;
		$data['ppmwo'] = NULL;
		}

		$data['year'] = $this ->get_year();
		$data['kalender'] = $this ->gen_cal($data['weeksch'],$data['ppmwo']);

		//$data['year'] = $this->input->get('jobyear');
	//echo "teruihhhh llaaa : " . 
		//$this ->get_year();
    $this->load->view("head");
		$this->load->view("left");
		$this->load->view("content_asset_PPMplanner_update", $data );
	}
	
	function get_year()
	{
	 	if (isset($_REQUEST['y'])) {
			 $theyear =  $_REQUEST["y"];
		} else {
			 $theyear = date("Y");
		}
			$fyear = $theyear + 1;
			$byear = $theyear - 1;
			
	  $year_data = array( 
		
		'theyear'=>$theyear,
		'fyear'=>$theyear + 1,
		'byear'=>$theyear - 1
		);
	return $year_data;
	}
	
	function gen_cal($week,$ppmlist)
	{
	$nakantarcal = array();
	if (isset($_REQUEST['y'])) {
			 $theyear =  $_REQUEST["y"];
		} else {
			 $theyear = date("Y");
		}
	
	$nWeekNo = 1;	
	//$nYear = $year['theyear'];
	$nYear = $theyear;
			$sPPMGenWk = array();
			unset($sPPMGenWk);
			
					$sWeekDayx = jddayofweek(gregoriantojd(1,1,$nYear),0);
					
					if (($sWeekDayx <> "6") && ($sWeekDayx <> "7") && ($sWeekDayx <> "1")) {
					//call subDisplayFirstWeek
					
					if ($sPPMGenWk[$nWeekNo-1] = "") {
						 $sCellClass = "ppmgenTR";}
					else {
						 $sCellClass = "ppmgenTR1"; }
					//echo "sCellClass" . $sCellClass;
					}		
					//$year = $_REQUEST['y'];
					if (isset($_REQUEST['y']) && $_REQUEST['y'] == "") {
						 $sWeekDayJan1 = jddayofweek(gregoriantojd(1,1,date("Y")),0); }//<---WEEK START WITH MONTH 
					else	{
					   if (isset($_REQUEST['y'])) {
						 //$theyear = "20" . $_REQUEST["y"];
						 $theyear =  $_REQUEST["y"];
						 } else {
						 $theyear = date("Y");
						 }
						 $sWeekDayJan1 = jddayofweek(gregoriantojd(1,1,$theyear),0); }//<---WEEK START WITH MONTH 
						 //echo "sWeekDayJan1:" . $sWeekDayJan1 . "theyear:" . $theyear;
						 //exit();
					switch ($sWeekDayJan1) { //<----DAH MALAS NAK PIKIR
					case 0 :
							 $nDay = 31;
							 break;
					case 1 :
							 $nDay = 25;
							 break;
					case 2 :
							 $nDay = 31;
							 break;
					case 3 :
							 $nDay = 30;
							 break;
				  case 4 :
							 $nDay = 29;
							 break;
					case 5 :
				 	 	 	 $nDay = 28;
							 break;
					case 6 :
				 	 	 	 $nDay = 27;
							 break;
					case 7 :
				 	 	 	 $nDay = 26;
							 break;
					}
						//response.write "nday : " & nday
				
				
				if ($nDay <> "25") { //to cater last week of december to be inserted in the following year
	//echo '			<tr id="trweek' . $nWeekNo . '" class="' . $sCellClass . '">				<td class="ppmgenTDWk"><b>' . $nWeekNo . '</b></td>';
				($week) && in_array($nWeekNo,$week) ? $style = 'style="background-color:#00FFFF;"' : $style = 'style="color:black;"';
				($week) && in_array($nWeekNo,$week) ? $chkstat = 'checked' : $chkstat = '';

				$kump = '<tr id="trweek1" class="ppmgenTR" align="center"'.$style.'>';
				$kump = $kump . ' ' .  '<td ><input type="checkbox" name="weeks[]" value="'.$nWeekNo.'"'.$chkstat.'><b>'.$nWeekNo.'</b></td>';	

				$nCount = 1;		
				do {
    			 if ($nDay == 1) {
					 //echo '				<td class="ppmgenTD"><b>' . $nDay . ' JAN</b></td>' . PHP_EOL;
					 $kump = $kump . ' ' .  '<td><b>'.$nDay. ' JAN</b></td>';
					 }
					 else {
					 //echo '				<td class="ppmgenTD">' . $nDay . '</td>' . PHP_EOL; 
					 $kump = $kump . ' ' .  '<td>'.$nDay. '</td>';
					 }
						
					 if ($nDay == 31) {
					 		$nDay = 1;}
						else {
							$nDay = $nDay + 1;}
					 
					 $nCount = $nCount + 1;
				} while ($nCount <= 7);
				
				if ($nDay == 1) {
					 $nMonth = 1; }
				else {
					 $nMonth = 12; }
					
					if ($ppmlist){
					foreach ($ppmlist as $list){
						if ($list->n_StartWk == $nWeekNo){
							$workOrd = anchor ('contentcontroller/wo?&wrk_ord='.$list->v_WrkOrdNo.'&vppm=0',''.$list->v_WrkOrdNo.'' );;
							$woStatus = $list->v_Wrkordstatus;
						}
						else{
							$workOrd = '';
							$woStatus = '';
						}
					}	
					} 
					else{
							$workOrd = '';
							$woStatus = '';
					} 
					 
				$sGenIcon2 = '<img src="images/icoPPMCheck.gif">';
				$sGenIcon1 = '<a href="javascript:void(0);" onclick="javascript:fWeekToGeneratePPM('.$nWeekNo.',' . $nYear . ',1,1);"><img src="images/btn1Generate.gif" style="width:66px;height:19px;"></a>';
				$sCheckIcon = '<a href="javascript:void(0);" onclick="javascript:fWeekToCheckPPM('.$nWeekNo.',' . $nYear . ',1,1);"><img src="images/btn1Check.gif" style="width:66px;height:19px;"></a>';
				
					if ((isset($sPPMGenWk)) && ($sPPMGenWk[0] == "")) {
					 //echo '				<td class="ppmgenTD">' . $sGenIcon1 . '</td>' . PHP_EOL .				'<td class="ppmgenTD" id="two1">' . $sCheckIcon . '</td>' . PHP_EOL;
					 //$kump = $kump . ' ' .  '<td id="three1"><a href="javascript:void(0);" onclick="javascript:fWeekToGeneratePPM('.$nWeekNo.',' . $nYear . ',1,1);"  class="btn-button btn-primary-button">GENERATED</a></td>';
					 //$kump = $kump . ' ' .  '<td id="two1"><a href="javascript:void(0);" onclick="javascript:fWeekToCheckPPM('.$nWeekNo.',' . $nYear . ',1,1);" class="btn-button btn-primary-button">CHECK</a></td>';
				 	$kump = $kump . ' ' .  '<td id="three1">'.$workOrd.'</td>';
				 	$kump = $kump . ' ' .  '<td id="two1">'.$woStatus.'</td>';

				  	}
					else {
				   //echo '				<td class="ppmgenTD">' . $sGenIcon2 . '</td>' . PHP_EOL . '<td class="ppmgenTD" id="two1">' . $sCheckIcon . '</td>' . PHP_EOL;
					 $kump = $kump . ' ' .  '<td id="three1"><a href="javascript:void(0);" onclick="javascript:fWeekToGeneratePPM('.$nWeekNo.',' . $nYear . ',1,1);"  class="btn-button btn-primary-button">GENERATED</a></td>';
					 $kump = $kump . ' ' .  '<td id="two1"><a href="javascript:void(0);" onclick="javascript:fWeekToCheckPPM('.$nWeekNo.',' . $nYear . ',1,1);" class="btn-button btn-primary-button">CHECK</a></td>';
					}
	
				$kump = $kump . ' ' .  "			</tr>" . PHP_EOL;
	
				$nWeekNo = $nWeekNo + 1;
				$nakantarcal[] = $kump; 		 
			}
	$nMonthx = 0;
	$whatlastdayx = 0;
	//$nWeekNo = 2;
	for ($nMonth = 1; $nMonth <= 12; $nMonth++) {
	unset($sDay);
  $sDay = array();
	unset($sDayx);
  $sDayx = array();
	//echo "nMonth $nMonth<br>";
	//===KALO TAK START NGAN MONDAY, SKIP UNTIL 1ST MONDAY======
	//$nMonth = 1;
	//$nYear = 2014;
	$sMagicNo = "2176543";
	//$sWeekday1st = weekday("1 " & monthname(nMonth) & " " & nYear)
	$sWeekday1st = jddayofweek(gregoriantojd($nMonth,1,$nYear),0);
	$sFirstDay = substr($sMagicNo,$sWeekday1st,1);
	//echo 'bfdibsdlifs : ' . $sFirstDay;
	
	//===1 HARIBULAN HARI APA?======
	if ($sWeekday1st > 5) { 
	 $sWeekDay = 0; }
	else {
	 $sWeekDay = $sWeekday1st;
	}
	
	//===WHAT IS THE LAST DAY OF THE MONTH?======
	$nLastDay = cal_days_in_month(CAL_GREGORIAN, $nMonth, $nYear);
	$sLastDayofMonth = $nLastDay . "/" . $nMonth . "/" . $nYear;
	//echo  "tgkfirstday" . $nLastDay . ":" . $sFirstDay . "::" . ($nLastDay - $sFirstDay) . "<br>";
	
	
	for ($x = 0; $x <= $nLastDay - $sFirstDay; $x++) {
	  $sDay[$x] = $sFirstDay + $x;
		
		if (($sDay[$x] == "1") || ($sDay[$x] == "0")) { 
		$sDay[$x] = "<b>1 " . date('M', mktime(0, 0, 0, $nMonth, 10)) . "</b>";
		}
		
		if (($nMonth == date("M")) && ($sDay[$x] == date("D")) && ($nYear == date("Y"))) { 
			$sDay[$x] = $sDay[$x] . "<img src='images/icoToday.gif'>";
		}
		//for dayx
		$sDayx[$x] = $sFirstDay + $x;
		
		if (($sDayx[$x] == "1") || ($sDayx[$x] == "0")) { 
		$sDayx[$x] = "<b>1 " . date('M', mktime(0, 0, 0, $nMonth, 10)) . "</b>";
		}
		
		if (($nMonth == date("M")) && ($sDayx[$x] == date("D")) && ($nYear == date("Y"))) { 
			$sDayx[$x] = $sDayx[$x] . "<img src='images/icoToday.gif'>";
		}
		
    //echo "The number is: $x <br>";
  } 
	
	//===ISI CELL HUJUNG BULAN NGAN TARIKH BULAN DEPANYNYA======
	$nLastCell = 0;
	if (($x > 20) && ($x < 28)) {
		$nLastCell = 27;}	
	elseif (($x > 28) && ($x < 35)) {
		$nLastCell = 34;}
	elseif ($x > 34) {
		$nLastCell = 41;}
	
	if ($nMonth == 12) {
		$sNextMonth = " JAN " ;}
	else {
		$sNextMonth = " " . strtoupper(date('M', mktime(0, 0, 0, $nMonth + 1, 10)));		
	}
	//echo "nMonth $nMonth<br>";
	if ($nMonth == 1) { //echo "nMonth dpt masuk<br>";
	$sWeekDayx = jddayofweek(gregoriantojd($nMonth,1,$nYear),0); 
	//echo "sWeekDayx $sWeekDayx<br>";
	
	if (($sWeekDayx <> "6") || ($sWeekDayx <> "7") || (sWeekDayx <> "1")) {//echo "masuka<br>";
	if ($nLastCell > 0) {
		$nCount = 1;
		for ($nLoopCell = $x;  $nLoopCell <= $nLastCell; $nLoopCell++) {
			if ($nCount == 1) { 
				$sDay[$nLoopCell] = "<b>" . $nCount . $sNextMonth . "</b>";
				$sDayx[$nLoopCell] = $nCount; }
			else {
				$sDay[$nLoopCell] = $nCount;
				$sDayx[$nLoopCell] = $nCount;
			}
			$nCount = $nCount + 1;
		}
	}
	}
	}
	else { 
	if ($nLastCell > 0) {
		$nCount = 1;
		
		for ($nLoopCell = $x;  $nLoopCell <= $nLastCell; $nLoopCell++) {
			if ($nCount == 1) { 
				$sDay[$nLoopCell] = "<b>" . $nCount . $sNextMonth . "</b>";
				$sDayx[$nLoopCell] = $nCount; }
			else {
				$sDay[$nLoopCell] = $nCount;
				$sDayx[$nLoopCell] = $nCount;
			}
			$nCount = $nCount + 1;
	}
	}
	}
	//echo "nLastCell $nLastCell sNextMonth $sNextMonth <br>";
	//exit();
	$nDayCount = 0;
	//call subDisplayWeek
	for ($x = 1; $x <= 6; $x++) {
	//echo "masukdispalyweek". $x . "whatlastday" . $whatlastday . ",nDayCount" . $nDayCount . "count " . count($sDayx) . "<br>";
	//'exit for
		//'to get the last day of every week (if possible) for iso checking
		//print_r(array_values($sDayx));
		if (($nDayCount + 6) < count($sDayx)) {
		$whatlastday = $sDayx[$nDayCount + 6];}
		//$nilainom = $nDayCount + 6;
		//$whatlastday = $sDayx[$nilainom];
	//' here start the process if the week need to be show or not
	if ($nMonth > $nMonthx) { $nMonthx = $nMonth;}
	$nYearx = $nYear;
//'response.write "yoyo" & ininom & " : " & whatlastday&","&left(whatlastday,len(inStr(whatlastday,"T")))
if (is_numeric($whatlastday)) {
$ininom = "Y";

// True
// Do something
}
else {
$ininom = "N";
//'whatlastday=cint(left(whatlastday,2))
$whatlastday= substr($whatlastday,0,strlen(strpos($whatlastday,"T")));
//'// False
//'// Do something else
}
//'response.write "yuyu" & ininom & " : " & whatlastday
//echo "yuyu" . $ininom . " : " . $whatlastday;

	if ($whatlastday > 20) {
	$whatlastdayx = $whatlastday;
	}

	if (($whatlastdayx > 20) && ($whatlastday < 10)) {
	$nMonthx = $nMonthx + 1;
	}

		if ($nMonthx == 13) {
		$nMonthx = 1;
		$nYearx = $nYearx + 1;
		}
		
	//$nWeek = df_ISOWeek(whatlastday & "/" & nMonthx & "/" & nYearx)
	  if (checkdate ( $nMonthx , $whatlastday , $nYearx )) {
        //$nWeek = DatePart("ww", dDate, vbMonday, vbFirstFourDays); 
				$ddate = date('Y-m-d', strtotime($whatlastday."/".$nMonthx."/".$nYearx));
				//$ddate = "2014-02-17";
        $date = new DateTime($ddate);
        $nWeek = $date->format("W");
				}
    else {
        $nWeek = -1;
    }
			
	$whatlastdayx = 0;
	
	 if (($nWeekNo > 52) && ($nWeek = 1)) { 
	}
	else {
		//call subDisplayWeek
//portion displayweek		
if ($nDayCount < count($sDay)) {
		if ($sDay[$nDayCount] <> "") {
		//echo "masuk sday array";
		$sDay[$nDayCount + 0] = str_replace("<img src='images/icoToday.gif'>", "", $sDay[$nDayCount + 0]);
	 
	
	if (is_numeric($sDay[$nDayCount + 0])) {
			$sDay1 = $sDay[$nDayCount + 0];
			}
	else {
			$sDay1 = "1"; 
			}
			
	
//to disabled generate button on the said row
		$sCheckIcon = '<a href="javascript:void(0);" onclick="javascript:fWeekToCheckPPM(' . $nWeekNo . ',' . $nYear . ',' . $sDay1 . ',' . $nMonth . ');"><img src="images/btn1Check.gif" style="width:66px;height:19px;"></a>';
		$sGenIcon = "";
		$sPPMGenWk = array();
		$sPPMGenWk = array(
		0 => "",
		1 => "",
		2 => "",
		3 => "",
		4 => "",
		5 => "",
		6 => "",
		7 => "",
		8 => "",
		9 => "",
		10 => "",
		11 => "",
		12 => "",
		13 => "",
		14 => "",
		15 => "",
		16 => "",
		17 => "",
		18 => "",
		19 => "",
		20 => "",
		21 => "",
		22 => "",
		23 => "",
		24 => "",
		25 => "",
		26 => "",
		27 => "",
		28 => "",
		29 => "",
		30 => "",
		31 => "",
		32 => "",
		33 => "",
		34 => "",
		35 => "",
		36 => "",
		37 => "",
		38 => "",
		39 => "",
		40 => "",
		41 => "",
		42 => "",
		43 => "",
		44 => "",
		45 => "",
		46 => "",
		47 => "",
		48 => "",
		49 => "",
		50 => "",
		51 => "",
		52 => "",
		53 => "",
		54 => "",);
		
			 if ($sPPMGenWk[$nWeekNo-1] == "") {
			 		$sCellClass = "ppmgenTR";
			//'added cint(request("y")) > year(now) to cater next year reframe
			//'if sMonthStopis OR cint(request("y")) > year(now) then
			//'response.write "vb : " & sMonthStopis
			//disable temporary
			/*
			if ($sMonthStopis) || (cint(request("y")) = year(now)+1 AND month(now) = 12 AND nWeekNo > 5  ) or cint(request("y")) > year(now)+1 then
			$sGenIcon = "<img src=""images/btn1Generate.gif"" style=""width:66px;height:19px;"">"
			else
			$sGenIcon = "<a href=""javascript:void(0);"" onclick=""javascript:fWeekToGeneratePPM(" . $nWeekNo . "," . $nYear . "," . $sDay1 . "," . $nMonth . ");""><img src=""images/btn1Generate.gif"" style=""width:66px;height:19px;""></a>"
			end if
			*/
					}
			else {
					$sCellClass = "ppmgenTR1";
					$sGenIcon = '<img src="images/icoPPMCheck.gif">';
			}
		
				($week) && in_array($nWeekNo,$week) ? $style = 'style="background-color:#00FFFF;"' : $style = 'style="color:black;"';
				($week) && in_array($nWeekNo,$week) ? $chkstat = 'checked' : $chkstat = '';
				
				if ($ppmlist){
				foreach ($ppmlist as $list){
					if ($list->n_StartWk == $nWeekNo){
						$workOrd = anchor ('contentcontroller/wo?&wrk_ord='.$list->v_WrkOrdNo.'&vppm=0',''.$list->v_WrkOrdNo.'' );
						$woStatus = $list->v_Wrkordstatus;
					}
					else{
						$workOrd = '';
						$woStatus = '';
					}
				}
				}
				else {
						$workOrd = '';
						$woStatus = '';
				}

				$kump = '<tr id="trweek'.$nWeekNo.'" class="ppmgenTR" align="center"'.$style.'>';
				$kump = $kump . ' ' . '<td ><input type="checkbox" name="weeks[]" value="'.$nWeekNo.'"'.$chkstat.'><b>'.$nWeekNo.'</b></td>';				
				$kump = $kump . ' ' . '<td>'.$sDay[$nDayCount + 0]. '</td>';
				$kump = $kump . ' ' . '<td>'.$sDay[$nDayCount + 1]. '</td>';
				$kump = $kump . ' ' . '<td>'.$sDay[$nDayCount + 2]. '</td>';
				$kump = $kump . ' ' . '<td>'.$sDay[$nDayCount + 3]. '</td>';
				$kump = $kump . ' ' . '<td>'.$sDay[$nDayCount + 4]. '</td>';
				$kump = $kump . ' ' . '<td>'.$sDay[$nDayCount + 5]. '</td>';
				$kump = $kump . ' ' . '<td>'.$sDay[$nDayCount + 6]. '</td>';
		 		$kump = $kump . ' ' .  '<td id="three1">'.$workOrd.'</td>';
		 		$kump = $kump . ' ' .  '<td id="two1">'.$woStatus.'</td>';
				//$kump = $kump . ' ' . '<td id="three'.$nWeekNo.'"><a href="javascript:void(0);" onclick="javascript:fWeekToGeneratePPM(' . $nWeekNo . ',' . $nYear . ',' . $sDay1 . ',' . $nMonth . ');"  class="btn-button btn-primary-button">GENERATED</a></td>';
				//$kump = $kump . ' ' . '<td id="two'.$nWeekNo.'"><a href="javascript:void(0);" onclick="javascript:fWeekToCheckPPM(' . $nWeekNo . ',' . $nYear . ',' . $sDay1 . ',' . $nMonth . ');" class="btn-button btn-primary-button">CHECK</a></td>';
			$kump = $kump . ' ' . '</tr>';
			$nakantarcal[] = $kump; 
			
//''to disabled generate button on the said row
//portion displayweek		
		//echo "masuk " . $nWeekNo . $nDayCount . "nilaix $x <br>";
		$nWeekNo = $nWeekNo + 1; 
		$nDayCount = $nDayCount + 7;  
	
		}
		}//end sday array if
	
	//echo "masuk smp tahap cni x KKKKKKKKKKKKKKKKKKKvvvvvvvv : $nWeek :";		
	}
} //chk array count	

	
   


	//'sPrevURL = dateadd("d",-7,cdate(request("d") & "/" & nMonth & "/" & request("y")))

		//'if nWeekNo = 53 then exit for		'<---ELAKKKAN DARI DISPLAT WEEK 53
	 }
	return $nakantarcal;
	}
	
}