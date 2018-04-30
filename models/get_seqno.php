<?php
class get_seqno extends CI_Model{
function __construct() {
parent::__construct();
}


//______________________________________________________________________________________________
//===NI KETUO KERANI DALAM BILIK NI, DIO YANG BEBAGI KOJO KEK ORANG LAIN DALAM BILIK NI======
function funcNewRequestNoAPBESYS($sType, $sPPMPunyaNo, $nYear) {
//echo "sType".$sType."sPPMPunyaNo".$sPPMPunyaNo."nYear".$nYear;
	//====TAHUN MANO NAK PAKAI NI? KALO SOBOLUM TAHUN 2008, TAK DAPEK DEN NOLONG======
	//if nYear < 2008 then 'yang asal bg memenuhi request
	if (false) {
		return "Error: The system is not able to handle request prior to 2008. Please contact your system administration for assistance.";
		//exit function
	} elseif ($nYear > date("Y") + 1) {
		return "Error: No sequence number rules has been set for request beyond December 31, " & date("Y") + 1 & ". Please contact your system administration for assistance.";
		//exit function
	}
	
	
	//===BUEK KOJO IKUT JONIH PENGHULU REQUEST -- REQUEST TYPE===
	$sType = strtoupper($sType);
	
	
	switch ($sType) {
	
		/*===KALO PPM, ADO DUA JONIH KOJO======
				SATU: NAK AMIK NOMBOR 
				DUO: NAK SIMPAN NOMBOR */
		case "P" | "PP" | "PPB" :
		
			//===YANG NI PPM MINTAK NOMBOR======
			if ($sPPMPunyaNo == "") {

				/*'DISABLED-----THIS WILL RETURN ***FORMATTED*** NUMBER FOR USE BY PPM GENERATOR---			
				'sFormat = funcGetAPBESYSSeqNoFormat("P")
				'if instr(sFormat, "Error") > 0 then 
				'	funcNewRequestNoAPBESYS = sFormat
				'	exit function
				'end if
				'
				'sSeqNo = funcGetAPBESYSNextSeqNo("P")
				'if instr(sSeqNo , "Error") > 0 then 
				'	funcNewRequestNoAPBESYS = sSeqNo 
				'	exit function
				'end if
				'
				'funcNewRequestNoAPBESYS = funcFormatAPBESYSSeqNo(sFormat, "P", sSeqNo)
				'*/

				//ENABLED---THIS WILL RETURN ***UNFORMATTED*** SEQUENCE NUMBER FOR USE BY PPM GENERATOR
				return  $this->funcGetAPBESYSNextSeqNo("P", $nYear);
				}
			//===YANG NI PLAK PPM NAK SIMPAN NOMBOR======
			else {	//<---THIS WILL SAVE INTO DB THE NEXT AVAILABLE SEQUENCE NUMBER PASSED BY PPM GENERATOR
				return $this->funcSaveAPBESYSNextSeqNo("P", $sPPMPunyaNo, $nYear);
			}
			
		//===NI UNTUK RCM/COMPLAINT======
		//===DIORANG NI PLAK, LOPEH AMIK NOMBOR, COPEK2 SIMPAN NOMBOR BARU BAGI CAN KEK ORANG LAIN PLAK======
		default	://<--- THIS WILL RETURN NEXT AVAILABLE SEQUENCE NUMBER IN FULL FORMAT FOR USED BY RCM AND COMPLAINT

			//===MULO2 TIPON MAK ANDAM - APO MEKAP YANG ELOK======
			$sFormat = $this->funcGetAPBESYSSeqNoFormat($sType);
			if (strpos($sFormat, "Error") > 0) { 
				return $sFormat;
				}

			//===LOPEH TU TANYO MAGNUM, APO NOMBOR BULEH PAKAI======
			$sSeqNo = $this->funcGetAPBESYSNextSeqNo($sType, $nYear);
			
			
			
			
			if (strpos($sSeqNo , "Error") > 0) { 
				return sSeqNo;
			}

			//===LOPEH TU, BAGITAU CEK MAT SUROH DIO UPDATE TABLE SUPAYO ORANG LAIN BLEH PAKAI PLAK======
			$sSaveNo = $this->funcSaveAPBESYSNextSeqNo($sType, $sSeqNo, $nYear);
			if (strpos($sSaveNo , "Error") > 0) { 
				return $sSaveNo; 
				
			}
			
			//echo "lepas 2 : " . $sType . " sformat " . $sFormat . " sSeqNo " . $sSeqNo . ' baru this : ' . $this->funcFormatAPBESYSSeqNo($sFormat, $sType, $sSeqNo, $nYear);
	    //exit();

			//===PENGABISAN SEKALI AMIK NOMBOR YANG DAH MEKAP LELAWA NI BAGI BALIK KEK SESAPO YANG MINTAK TADI======
			return $this->funcFormatAPBESYSSeqNo($sFormat, $sType, $sSeqNo, $nYear);

	}
	
}

//___KALO REKOD TAHUN NI TAK ADO LAIE, KITA SIMPAN REKOD BARU NI_____________________________________________
function funcInsertAPBESYSNextSeqNo($sTypeToInsert, $nLastSeqNo, $nYearToSave) {

	//===CAMANO NAK BUEK? KOJO SONANG YO TU======

	//===MULO2 KITO SODIOKAN RAMUANNYO DULU======
	$sError = "";
	//session("sError") = ""
	
	//===LOPEH TU KITO BACO AYAT JAMPI PEMBUKO KATO======
	
	$data = array(
               'seq_requesttype' => $sTypeToInsert ,
               'seq_nextsequenceno' => $nLastSeqNo,
               'seq_hospitalcode' => $this->session->userdata('hosp_code'),
							 'seq_year' => $nYearToSave,
							 'seq_actionflag' => 'I',
							 'seq_actiontimestamp' => date('Y-m-d H:i:s'),
							 'seq_actionuserid' => $this->session->userdata('v_UserName'),
							 'seq_Services' => $this->session->userdata('usersess')
            );
	
	$this->db->insert('ap_nextsequenceno', $data);
	//echo $this->db->last_query();
	/*sSQL = "INSERT apbesysex..ap_nextsequenceno (" & _
										"seq_requesttype, " &_
										"seq_nextsequenceno, " & _
										"seq_hospitalcode, " & _
										"seq_year, " & _
										"seq_actionflag, " & _
										"seq_actiontimestamp, " & _
										"seq_actionuserid" & _
									") VALUES (" & _
												"'" & sTypeToInsert & "', " & _
												nLastSeqNo & ", " & _
												"'" & session("sitecode") & "', " & _
												nYearToSave & ", " & _
												"'I', " & _
												"GETDATE(), " & _
												"'" & session("userid") & "'" & _
											")"

	'===LOPEH TU KITA SOMBOR KEK MUKO DIO======
	Set uConn= gsubDBCreateCon 'Ex
	Set uRes = gsubDBQuery(uConn, sSQL)
	/*
	'===ADO MASALAH TAK?======
	if len(session("sError")) > 0 then
		session("sError") = "Error: System attempt to insert record into <b>SEQUENCE NUMBER TABLE</b> for <b>" & sType & "</b> failed.<br>" & session("sError")
		session("sError") = replace(session("sError"), "'", "''")
		call subInsertLog(session("userid"), session("userIP"), "Error", "SQL", session("sError"))
		funcSaveAPBESYSNextSeqNo = session("sError")
		session("sError") = ""
	end if
	*/
			
	//===KALO TAK ADO MASALAH, DUK DENDIAM======

}

//___KALO REKOD TAHUN NI MMG DAH ADO, KITA SIMPAN NOMBOR BARU DLM REKOD TU_____________________________________
function funcSaveAPBESYSNextSeqNo($sType, $nNo, $nYearToUpdate) {

//echo "</br> sType ".$sType. "nNo ".$nNo."nYearToUpdate".$nYearToUpdate;

	//===INITIALIZE VAR======
	$sError = "";
	//session("sError") = ""
	
	//===APO NOMBOR NAK SIMPAN?======
	$nNextNo = $nNo + 1;  //<---JGN PAKAI CINT! CINT MAX RANGE IF -32,768 TO 32,768
	
	//===REQUEST TYPE YANG MANO SATU NI?======
	switch ($sType) {
  	case "C" :
			$sTypeToCheck = "C";
			break;
		case "A1" :
			$sTypeToCheck = "A1";
			break;
		case "A2" :
			$sTypeToCheck = "A2";
			break;
		case "A3" :
		case "A4" :
		case "A5" :
		case "A6" :
		case "A7" :
		case "A8" :
		case "R1" :
		case "R2" :
			$sTypeToCheck = "A4";
			break;
		case "A9" :
		case "A10" :
		case "A11" :
		case "A12" :
			$sTypeToCheck = "A9";
			break;
		case "P" :
		case "PP" :
		case "PPB" :
			$sTypeToCheck = "P";
			$nNextNo = $nNo; 	//<---LAST NUMBER PASSED BY PPM IS THE NEXT AVAILABLE NUMBER
	}
//echo "</br> sTypeToCheck ".$sTypeToCheck;
	//===APO NAK CAKAP KEK DATABASE? KO BACO LAH AYAT BAWAH NI KUEK2======
	
	$data = array(
               'seq_nextsequenceno' => $nNextNo,
               'seq_actionflag' => 'U',
               'seq_actiontimestamp' => date('Y-m-d H:i:s'),
							 'seq_actionuserid' => $this->session->userdata('v_UserName')
            );
	
	$this->db->where('seq_RequestType', $sTypeToCheck);
	$this->db->where('seq_HospitalCode', $this->session->userdata('hosp_code'));
	$this->db->where('seq_Year', $nYearToUpdate);
	$this->db->where('seq_Services', $this->session->userdata('usersess'));
  $this->db->update('ap_nextsequenceno', $data); 
	
	
/*	sSQL = "UPDATE apbesysex..ap_nextsequenceno " & _
				"SET seq_nextsequenceno=" & nNextNo & ", " & _
					"seq_actionflag='U', " & _
					"seq_actiontimestamp=GETDATE(), " & _
					"seq_actionuserid='" & session("userid") & "' " & _
						"WHERE seq_requesttype='" & sTypeToCheck & "' " & _
							"AND seq_hospitalcode='" & session("sitecode") & "' " & _
							"AND seq_year=" & nYearToUpdate

	'===BIAR DATABASE BUEK KOJO======
	Set uConn= gsubDBCreateCon 'Ex
	Set uRes = gsubDBQuery(uConn, sSQL)
	
'	'===ADO MASALAH TAK? KALO ADO KITO REPORT POLIS========
	if len(session("sError")) > 0 then
		session("sError") = "Error: System attempt to update <b>SEQUENCE NUMBER TABLE</b> for <b>" & sType & "</b> failed.<br>" & session("sError")
		session("sError") = replace(session("sError"), "'", "''")
		call subInsertLog(session("userid"), session("userIP"), "Error", "SQL", session("sError"))
		funcSaveAPBESYSNextSeqNo = session("sError")
		session("sError") = ""
	else
	'-----------------------------------------------------------
	'---20081101 - LOG UPDATE A4 SEQ SINCE KPL DUPLIGATE CASE---
	'if sTypeToCheck = "A4" then call subInsertLog(session("userid"), session("userIP"), "Info", "SQL", replace(sSQL, "'", "''"))
	'---20081101---
		
	end if
			
	'===KALO TAK ADO MASALAH, KITO KELUAR. LAPAR LA PULAK======
*/
	
}

//___SET FORMATTING RULES HERE___________________________________________________________________________
//====SINI KITO TANYO MAK ANDAM, CAMANO NAK SOLEK NOMBOR TU======
function funcGetAPBESYSSeqNoFormat($sType) {
	$sType = strtoupper($sType);

	//===KATOKANLAH, DIBUEKNYO ESOK SI SANUSI MINTAK LAIE TUKAR FORMAT LAIN, EKAU IKUT LA PERATURAN JPJ NI======
	//USE THESE KEYWORD WHEN FORMATTING A NEW SEQUENCE NUMBER
	//DDD 	= 	DOCUMENT TYPE			= PENGULU KAMPONG REQUEST
	//AAA	=	REQUEST TYPE			= ANAK BUAH REQUEST
	//BBB 	= 	HSS SERVICE TYPE		= HSS
	//NNNNN 	= 	5 DIGIT NUMBER			= KALAU ONDAK LIMO NOMBOR
	//NNNNNN	= 	6 DIGIT NUMBER			= KALAU ONDAK ENAM NOMBOR (KALAU ONDAK OMPEK NOMBOR, POIE BOLI KEK MAGNUM)
	//YY 	= 	2 DIGIT YEAR			= TAHUN LOTAK DUO NOMBOR AJO
  //YYYY 	= 	4 DIGIT YEAR			= TAHUN NI LOTAK PONOH
	//SSS 	= 	3 CHARACTER SITECODE	= NI KOD SEPITA MANO

	//===BAWAH NI SUMO FORMAT BARU YANG APIBASIS NI PAKAI=======
		
		//===AMIKLAH MEKAP YANG BERKENAAN======
		switch ($sType) {
		
			//===NI MEKAP UNTUK KOMPLEN======
			case "C" :
				$sFormat = "DDD/BBBNNNNN/YY";   	//<---FOR COMPLAINT
			break;
												//			WHERE:
												//				DDD=ALWAY "C"
												//				BBB="B" FIXED FOR [B]EMS
												//				00000=5 DIGITS RUNNING NUMBER, UNIQUE PER HOSPITAL PER YEAR
												//				YY=2 DIGITS CURRENT YEAR
											
			//===YANG NI PLAK MEKAP UNTUK SEGALO JONIH PERMINTAAN (REQUEST)======
			case "A1" :
			case "A2" :
			case "A3" :
			case "A4" :
			case "A5" :
			case "A6" :
			case "A7" :
			case "A8" :
			case "A9" :
			case "A10" :
			case "A11" :
			case "A12" :
			case "R1" :
			case "R2" :
				$sFormat = "DDD/AAA/BBBNNNNN/YY";	//<---FOR RCM
			break;
												//			WHERE:
												//				DDD="RI" FOR A2
												//				DDD="RQ" FOR A1, A3, A4, A5, A6, A7, A8 (EXCEPT A2)
												//				DDD="AV" FOR A9, A10, A11, A12, R1, R2
												//				AAA=REQUEST TYPE "A1" TO "R2"
												//				BBB="B" FIXED FOR [B]EMS
												//				00000=5 DIGITS RUNNING NUMBER, UNIQUE PER HOSPITAL PER YEAR
												//				YYYY=4 DIGITS CURRENT YEAR
												
			//===YANG NI MEKAP UNTUK PIPI======
			case "P" :
			case "PP" :
			case "PPB" :
				$sFormat = "DDDBBB/SSS/NNNNN/YYYY";	//<---FOR PPM
			break;
												//			WHERE:
												//				DDD="PP" FIXED FOR BEMS
												//				BBB="B" FIXED FOR [B]EMS
											  //				SSS=I.E. "MKA" 3 CHAR SITE CODE, UNIQUE PER HOSPITAL PER YEAR
												//				00000=5 DIGITS RUNNING NUMBER
												//				YYYY=3 DIGITS CURRENT YEAR
												
			//===YANG NI PLAK, DEN TAK PAHAM APO KO BONDO YANG EKAU MINTAK=======
			default :
				return "Error: Unknown request type to generate sequence number.";
				exit;
		}	
		
		//===DAH JUMPO MEKAP YG SOSUAI, BAGITAU CC (KETUO KERANI)======
		return  $sFormat;
		

}

function funcGetAPBESYSNextSeqNo($sType, $nYearToFind)
{

 //===JAMPI SERAPAH. KITO SUMPAH NYUMPAH DULU, MANO LA TAU KOK DAPEK FIRST PRIZE======
	$sError = "";
	//session("sError") = "";
	$bMode = 1;
	$nJump = 1;
	$nSeqNo = 0;
	$nLastSeqNoLastYear = 0;
	$bFound = False;
	$bFoundLastYear = False;
	
	//===APO KEPALO REQUEST TADI? ---REQUEST TYPE======
//echo '<br>sType :'.$sType.':';	
	 switch ($sType) {
		case "C" :
			$sTypeToCheck = "C";
			break;
		case "A1" :
			$sTypeToCheck = "A1";
			break;
		case "A2" :
			$sTypeToCheck = "A2";
			break;
		case "A3" :
		case "A4" :
		case "A5" :
		case "A6" :
		case "A7" :
		case "A8" :
		case "R1" :
		case "R2" :
			$sTypeToCheck = "A4";
			break;
		case "A9" :
		case "A10" :
		case "A11" :
		case "A12" :
			$sTypeToCheck = "A9";
			break;
		case "P" :
		case "PP" :
		case "PPB" :
			$sTypeToCheck = "P";
	}
//echo '<br>sTypeToCheck2 '.$sTypeToCheck;
$hosp = array($this->session->userdata('hosp_code'), "XXX");	
	
//$this->db->select('trim(country_name) as country_name');
$this->db->from('ap_nextsequenceno');
$this->db->where('seq_requesttype', $sTypeToCheck);
//$this->db->where('seq_year', date("Y"));
$this->db->where('seq_year', $nYearToFind);
//$this->db->where('seq_hospitalcode', $this->session->userdata('hosp_code'));
$this->db->where_in('seq_hospitalcode', $hosp);
$this->db->where_in('seq_Services', $this->session->userdata('usersess'));
$result = $this->db->get();
//echo $this->db->last_query();
$row = array();
if($result->num_rows() > 0) {
foreach($result->result_array() as $row) {

//echo "lalalala".$row['seq_hospitalcode'];
		//====JUMPO DEFAULT RULE RECORD - NI WASIAT TOK UNDANG======
		if ($row['seq_HospitalCode'] == "XXX") {
			$bMode = $row['seq_year'];
			$nJump = intval($row['seq_nextsequenceno']);
			//response.write "[" & nJump & "]<br>"
    	//echo "[" . nJump . "]<br>";
		//} elseif ($row['seq_Year'] == date("Y")) {
			} elseif ($row['seq_Year'] == $nYearToFind) {
		  $nSeqNo = $row['seq_NextSequenceNo'];
			$bFound = True;
    //echo "Have a good day!";
		//} elseif ($row['seq_Year'] == date("Y")-1) {
		} elseif ($row['seq_Year'] == $nYearToFind-1) {
		  $nLastSeqNoLastYear = $row['seq_NextSequenceNo'];
			$bFoundLastYear = True;
    //echo "Have a good night!";
		}
		


}
//exit();

}

 		//===KALO JUMPO REKOD TAHUN NI, KITO PAKAI NOMBOR TAHUN NI======
	if ($bFound) {		
		$nSeqNo = $nSeqNo;
			//echo "found<br>";
	}	
	//===KALO TAK JUMPO REKOD TAHUN NI, KITO TENGOK APO KATO TOK UNDANG======
	else						{

		if ($bFoundLastYear) {

			//===TOK UNDANG KATO: RESTART DARI NOMBOR DEN BAGI NI===
			if (bMode == "1") { $nSeqNo = $nJump; } 
				
			//===TOK UNDANG KATO: SAMBUNG NOMBOR TAHUN LOPEH, TAPI LOMPEK IKUT BANYAK NOMBOR DEN BAGI NI======
			if (bMode == "0") { $nSeqNo = $nLastSeqNoLastYear + $nJump; }

			//echo "bMode=" . $bMode . " nSeqNo=" . $nSeqNo . " Old=" . $nLastSeqNoLastYear  . " nJump=" . $nJump . " Total=" . ($nLastSeqNoLastYear + $nJump) . "<br>";

			//===HAAA, TAU DAH APO NOMBOR NAK PAKAI, SIMPAN DLM DB DULU. DAH SONANG ORANG LAIN. DAPEK PAHALO======			
			$this->funcInsertAPBESYSNextSeqNo($sTypeToCheck, $nSeqNo, $nYearToFind);
		}
		//===TAPI ADO PULAK KEMUNGKINAN REKOD TAHUN NI TAK JUMPO, REKOD TAHUN LOPEH PUN TAK ADA, TAK JALAN JUGAK======
		else
		{
			//===DEN KATO: PINJOM CODING DARI TOK UNDANG BG GENERATE SEQ BARU BETOL 010710===
			//===TOK UNDANG KATO: RESTART DARI NOMBOR DEN BAGI NI===
			if ($bMode == "1") { $nSeqNo = $nJump; }
			
			//===TOK UNDANG KATO: SAMBUNG NOMBOR TAHUN LOPEH, TAPI LOMPEK IKUT BANYAK NOMBOR DEN BAGI NI======
			//if bMode = "0" then nSeqNo = nLastSeqNoLastYear + nJump

			//echo "bMode=" . $bMode . " nSeqNo=" . $nSeqNo . " Old=" . $nLastSeqNoLastYear  . " nJump=" . $nJump . " Total=" . ($nLastSeqNoLastYear + $nJump) . "<br>";

			//===HAAA, TAU DAH APO NOMBOR NAK PAKAI, SIMPAN DLM DB DULU. DAH SONANG ORANG LAIN. DAPEK PAHALO======			
			$this->funcInsertAPBESYSNextSeqNo($sTypeToCheck, $nSeqNo, $nYearToFind);
			//===DEN KATO: DEN KOMENKAN CODE BWH 010710===
			//nSeqNo = "Error: System has no base to generate the item you request for the year " & nYearToFind & "."
		}
		
}

        return $nSeqNo;

}

function test()
{
return '12';
}

function funcFormatAPBESYSSeqNo($sFormat, $sType, $nNo, $nYearToUse)
{
//echo "nilai yang dimasukkan " . $sFormat . "," . $sType . "," . $nNo . "," . $nYearToUse . "</br>";
//===BERAPO KOSONG NAK LOTAK KEK DOPAN? LIMO KOSONG? ONAM KOSONG? SERI SATU SAMO======
	$sFormat = str_replace("NNNNNN", $this->right("000000" . $nNo, 6), $sFormat);	//<---IF REQUIRE 6 DIGIT RUNNING NUMBER
	$sFormat = str_replace("NNNNN", $this->right("00000" . $nNo,5), $sFormat);  	//<---IF REQUIRE 5 DIGIT RUNNING NUMBER 
	
	//===DOPAN NOMBOR TU KITO LOTAK LA PENGHULU REQUEST NI: KOMPLEN KO, TAK KOMPLEN KO, MALEH NAK KOMPLEN KO======
	//===SET VALUE FOR DDD<---DOCUMENT TYPE (C=COMPLAINT, RQ/QV/RI=REQUEST, PP=PPM)======
	switch ($sType) {
	
		case "C" :
			$sFormat = str_replace("DDD", "C", $sFormat);
			break;

		//case "A2" :
		//	$sFormat = str_replace("DDD", "RI", $sFormat);
		//	break;

		case "A1" :
		case "A2" :
		case "A3" :
		case "A4" :
		case "A5" :
		case "A6" :
		case "A7" :
		case "A8" :
		case "R1" :
		case "R2" :
			$sFormat = str_replace("DDD", "RQ", $sFormat);
			break;

		case "A9" :
		case "A10" :
		case "A11" :
		case "A12" :
			$sFormat = str_replace("DDD", "AV", $sFormat);
			break;

		case "P" :
		case "PP" :
		case "PPB" :
			$sFormat = str_replace("DDD", "PP", $sFormat);

	}

	//===KOTEH APO KITO NAK PAKAI? NAK PAKAI KOTEH A4 KO, KOTEH A3 KO, SAMPUL SURAT PUN BULEH======
	//===SET VALUE FOR AAA <---REQUEST TYPE (C=COMPLAINT, A1/A2/A3/A4/A5/A6/A7/A8/A9/A10/A11/A12/R1/R2=REQUEST, PP=PPM)======
	switch ($sType) {

		case "C" :	
			$sFormat = str_replace("AAA", "C", $sFormat);
			break;
			
		case "A1" :
		case "A2" :
		case "A3" :
		case "A4" :
		case "A5" :
		case "A6" :
		case "A7" :
		case "A8" :
		case "A9" :
		case "A10" :
		case "A11" :
		case "A12" :
		case "R1" :
		case "R2" :
		case "PPB" :
			$sFormat = str_replace("AAA", $sType, $sFormat);
			break;
			
		case "P" :
		case "PP" :
		case "PPB" :
			$sFormat = str_replace("AAA", "PP", $sFormat);

	}

	//===INI UNTUK HSS PLAK, LOTAK LA FENGKOK/BENGKOK/WENGKOK/LENGKOK/CENGKOK======
	//===SET VALUE FOR BBB <----HSS SERVICE TYPE (F=FEMS, B=BEMS, W=CWMS, L=LINEN, C=CLEANSING)======
	//$sFormat = str_replace("BBB", "B", $sFormat);
	$sFormat = str_replace("BBB", substr($this->session->userdata('usersess'),-3, 1), $sFormat);

	//===NI PLAK KITO LOTAK TANDO SEPITA MANO. 'KUL' TU KULAI, BUKAN KELUMPO========
 	//===SET VALUE FOR SSS <---HOSPITAL CODE======
 	$sFormat = str_replace("SSS", $this->session->userdata('hosp_code'), $sFormat);

	//===EKOR TU PULAK KITO LOTAK'AN TAHUN. NAK CAMANO? NAK DUO NOMBOR KO, NAK OMPEK NOMBOR EKOR KO?======
	//===SET VALUE FOR YYYY <---YEAR======
 	$sFormat = str_replace("YYYY", $nYearToUse, $sFormat);
 	$sFormat = str_replace("YY", $this->right($nYearToUse,2), $sFormat);
 	
 	//===DAH SUDAH GAULKAN SUMO BAHAN NI TADI, MASUKKAN DALAM KUALI PANEH. LOTAK MINYAK ITAM SIKIT======
 	//===PASS BACK TO FORMATTED SEQUENCE NUMBER======
 	//funcFormatAPBESYSSeqNo = sFormat

return $sFormat;
}

function right($value, $count){

    $value = substr($value, (strlen($value) - $count), strlen($value));

    return $value;

}

function left($string, $count){

    return substr($string, 0, $count);

}

function getppmrmk($asstag, $freq){
$this->db->select('b.remark AS rmk');
$this->db->from('pmis2_egm_assetregistration a');
$this->db->join('auto_rmk_ppm b', 'a.V_Tag_no = b.asset_tag ');
$this->db->where('b.asset_tag', $asstag);
$this->db->where('b.freq', $freq);
//$this->db->where('seq_hospitalcode', $this->session->userdata('hosp_code'));
//$this->db->where_in('seq_hospitalcode', $hosp);
//$this->db->where_in('seq_Services', $this->session->userdata('usersess'));
$result = $this->db->get();
//echo $this->db->last_query();
//exit();
$nilainyer = '';
$row = array();
if($result->num_rows() > 0) {
foreach($result->result_array() as $row) {
																$nilainyer = $row['rmk'];
																}
															}
return $nilainyer;


}

}
?>
 	