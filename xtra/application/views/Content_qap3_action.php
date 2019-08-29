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
                <td colspan="3" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Action Taken</span>&nbsp;<span style="float: right; margin-top:3px; padding-right:10px;"><?php echo anchor ('contentcontroller/qap3_action_new?ssiq='.$this->input->get('ssiq').'&carid='.$this->input->get('carid'), '<button type="button" class="btn-button btn-primary-button" style="width:px;">ADD</button>'); ?></span></td>
            </tr>
            <tr class="ui-color-contents-style-1">
                <td colspan="3" class="pd-bttm">
                   <table class="ui-content-middle-menu-workorder3" width="98%">
                        <tr class="ui-menu-color-header">
                            <th></th>
                            <th>Action Taken</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Done Date</th>
                            <th> </th>
                        </tr>
                        <?php if (!empty($record)) { ?>
                        <?php $numrow = 1; foreach($record as $row):?>
                        <?php 
                        $End_Date = $row->end_date;
                        $Done_Date = $row->done_date;
                        !is_null($End_Date) ? $End_Date = date_format(new DateTime($End_Date), 'd-m-Y') : $End_Date = '';
                        if (is_null($Done_Date) AND !is_null($End_Date)){
                            if (strtotime($End_Date) < strtotime(date('Y-m-d'))){
                                $Done_Date = "<span style=color:red;>".'Not Done'."</span>";
                                $End_Date = "<span style=color:red;>".$End_Date."</span>";
                            }
                            else{
                                $Done_Date = "<span style=color:green;>".'OPEN'."</span>";
                            }
                        }
                        else{
                            $Done_Date = date_format(new DateTime($Done_Date), 'd-m-Y');
                        }
                        ?>   
                        <?php echo ($numrow%2==0) ? '<tr class="ui-color-contents-style-1" style="color:black; font-size:12px;" align="center">' : '<tr class="ui-color-color-color" style="color:black; font-size:12px;" align="center">'; ?>
                            <td class="td-desk"><?= isset($row->sl_no) ? $row->sl_no : '' ?></td>
                            <td class="td-desk"><?php echo anchor ('contentcontroller/qap3_action_edit?ssiq='.$this->input->get('ssiq').'&carid='.$this->input->get('carid').'&sl_no='.$row->sl_no.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&car=2',''.$row->action.'' ) ?></td>
                            <td class="td-desk"><?= !is_null($row->start_date) ? date_format(new DateTime($row->start_date), 'd-m-Y') : '' ?></td>
                            <td class="td-desk"><?= $End_Date ?></td>
                            <td class="td-desk"><?= $Done_Date ?></td>
                            <td class="td-desk"></td>
                        <?php $numrow++ ?>
                        <?php endforeach; ?>
                        <?php } ?>
                        </tr>  
                        <?php if (empty($record)) { ?> 
                        <tr align="center" style="height:200px;">
                            <td colspan="10"><span style="color:red; text-transform: uppercase; font-size:14px;">NO COMPLAINTS FOUND FOR</span></td>
                        </tr>
                        <?php } ?>
                    </table>
                   
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>