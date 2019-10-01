<div class="ui-middle-screen">
    <div class="div-p"></div>
	<div class="content-workorder">
		<table width="98%" class="ui-content-middle-htd">
					<?php /*switch ($desk) {
    case "1":
        $tulis = "SIQ";
        break;
    case "2":
        $tulis = "CAR";
        break;
    default:
        $tulis = "ACTION TAKEN";
} */?>
    <?php include 'qap3_tab_car.php';?>
            <tr class="ui-color-contents-style-1" height="40px">
                <td colspan="3" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Corrective Action Report</span>&nbsp;<span style="float: right; margin-top:3px; padding-right:10px;"><?php echo anchor ('contentcontroller/qap3_car_edit?ssiq='.$this->input->get('ssiq').'&carid='.$this->input->get('carid').'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&car='.$this->input->get('car'), '<button type="button" class="btn-button btn-primary-button" style="width:px;">Update</button>'); ?></span></td>
            </tr>
           <tr class="ui-color-contents-style-1">
                <td colspan="3">
                    <table class="ui-content-form" width="100%" border="0"> 
                        <tr>
                            <td class="td-assest2">CAR Number :</td>
                            <td><?= isset($record[0]->car_no) ? $record[0]->car_no : "<span style=color:red;>".'No CAR found for this SIQ.'."</span>" ?></td>
                        </tr>
                        <tr>
                            <td class="td-assest2">CAR Date :</td>
                            <td><?= strlen($record[0]->car_date) > 0 ? date_format(new DateTime($record[0]->car_date), 'd-m-Y') : 'N/A' ?></td>
                        </tr>
                        <tr>
                            <td class="td-assest2">Priority : </td>
                            <?php 
                            isset($record[0]->priority) ? $priority = $record[0]->priority : $priority = 'N/A';
                            if ($priority == 'N'){
                                $priority = "<span style=color:green;>".'Normal'."</span>";
                            }
                            elseif ($priority == 'E'){
                                $priority = "<span style=color:red;>".'EMERGENCY'."</span>";
                            }
                            else{
                                $priority = $priority;
                            }
                            ?>
                            <td><?= $priority ?></td>
                        </tr>
                        <tr>
                            <td class="td-assest2">CAR Status :</td>
                            <?php  
                            isset($record[0]->status) ? $status = $record[0]->status : $status = 'N/A';
                            if ($status == 1){
                                $status = "<span style=color:green;>".'CLOSED'."</span>";
                            }
                            elseif ($status == 0){
                                $status = "<span style=color:red;>".'OPEN'."</span>";
                            }
                            else{
                                $status = $status;
                            }
                            ?>
                            <td><?= $status ?></td>
                        </tr>
                        <tr>
                            <td class="td-assest2">From :</td>
                            <td><?= strlen($record[0]->car_from) > 0 ? date_format(new DateTime($record[0]->car_from), 'd-m-Y') : 'N/A' ?></td>
                        </tr>
                        <tr>
                            <td class="td-assest2">To :</td>
                            <td><?= strlen($record[0]->car_to) > 0 ? date_format(new DateTime($record[0]->car_to), 'd-m-Y') : 'N/A' ?></td>
                        </tr>
                        <tr>
                            <td class="td-assest2">Problem Statement :</td>
                            <td><?= isset($record[0]->car_desc) ? $record[0]->car_desc : 'N/A' ?></td>
                        </tr>
                        <tr>
                            <td class="td-assest2">Issuer :</td>
                            <td><?= isset($record->issuer) ? $record->issuer : 'N/A' ?></td>
                        </tr>
                        <tr>
                            <td class="td-assest2">Responsible Person :</td>
                            <td><?= isset($record[0]->resp_name) ? $record[0]->resp_name : 'N/A' ?></td>
                        </tr>
                        <tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Control Codes</td></tr>
                        <tr>
                            <td class="td-assest2">Indicator Code :</td>
                            <?php 
                            isset($record[0]->ind_code) ? $CARIndCode = $record[0]->ind_code : $CARIndCode = 'N/A';
                            isset($record[0]->ind_sdesc) ? $CARIndName = $record[0]->ind_sdesc : $CARIndName = 'N/A';
                            isset($record[0]->ind_ldesc) ? $CARIndDesc = $record[0]->ind_ldesc : $CARIndDesc = 'N/A';
                            ?>
                            <td><?= $CARIndCode.' - '.$CARIndName.'<br>'.$CARIndDesc ?></td>
                        </tr>
                        <tr>
                            <td class="td-assest2">Quality Code :</td>
                            <?php 
                            isset($record[0]->qc_code) ? $CARQCCode = $record[0]->qc_code : $CARQCCode = 'N/A';
                            isset($record[0]->qc_sdesc) ? $CARQCName = $record[0]->qc_sdesc : $CARQCName = 'N/A';
                            isset($record[0]->qc_ldesc) ? $CARQCDesc = $record[0]->qc_ldesc : $CARQCDesc = 'N/A';
                            ?>
                            <td><?= $CARQCCode.' - '.$CARQCName.'<br>'.$CARQCDesc ?></td>
                        </tr>
                        <tr>
                            <td class="td-assest2">Root Cause :</td>
                            <td><?= isset($record[0]->root_cause) ? $record[0]->root_cause : 'N/A' ?></td>
                        </tr>
                         <tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Verification</td></tr>
                         <tr>
                            <td class="td-assest2">Verified On :</td>
                            <td><?= strlen($record[0]->veri_date) > 0 ? date_format(new DateTime($record[0]->veri_date), 'd-m-Y') : 'N/A' ?></td>
                        </tr>
                        <tr>
                            <td class="td-assest2">Verified By :</td>
                            <td><?= isset($record->veri_name) ? $record->veri_name : 'N/A' ?></td>
                        </tr>
                        <tr>
                            <td class="td-assest2">Remarks :</td>
                            <td><?= isset($record[0]->remarks) ? $record[0]->remarks : 'N/A' ?></td>
                        </tr>
                         <tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Follow Up</td></tr>
                         <tr>
                            <td class="td-assest2">Follow up CAR No :</td>
                            <td><?= isset($record[0]->follow_car_no) ? $record[0]->follow_car_no : 'N/A' ?></td>
                        </tr>
                        <tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Last Update</td></tr>
                         <tr>
                            <td class="td-assest2">User ID :</td>
                            <td><?= isset($record[0]->misuserid) ? $record[0]->misuserid : 'N/A' ?></td>
                        </tr>
                         <tr>
                            <td class="td-assest2">Date :</td>
                            <td><?= strlen($record[0]->timestamp) > 0 ? date_format(new DateTime($record[0]->timestamp), 'd-m-Y') : 'N/A' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>