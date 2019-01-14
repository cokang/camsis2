<body style="margin:0px;">
<table class="tftable" border="0" style="text-align:center;">
	<tr>
		<th colspan="6"><a href="?hosp=<?=$this->session->userdata('hosp_code')?>&wwo=1<?php if ($this->input->get('p') == 'Norequest') {echo '&p=Norequest';}?>">Requests</a>&nbsp;|&nbsp;<a href="?hosp=<?=$this->session->userdata('hosp_code')?>&wwo=2<?php if ($this->input->get('p') == 'Norequest') {echo '&p=Norequest';}?>">PPM</a>
		&nbsp;|&nbsp;<a href="?hosp=<?=$this->session->userdata('hosp_code')?>&wwo=3<?php if ($this->input->get('p') == 'Norequest') {echo '&p=Norequest';}?>">MRIN</a></th>
	</tr>
</table>
<table class="tftable2" border="0" style="text-align:center;">
	<tr>
		<th width="3%" height="40px" valign="top">
			<a href="?y=<?= $year-1?>&m=<?= $month?>&hosp=<?= $this->session->userdata('hosp_code')?>&wwo=<?= $wwo ?><?php if ($this->input->get('p') == 'Norequest') {echo '&p=Norequest';}?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
		</th>
		<th width="3%" valign="top">
			<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>&hosp=<?= $this->session->userdata('hosp_code')?>&wwo=<?= $wwo ?><?php if ($this->input->get('p') == 'Norequest') {echo '&p=Norequest';}?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
		</th>
		<th width="88%" align="center">
			<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
		</th>
		<th width="3%" valign="top">
			<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>&hosp=<?= $this->session->userdata('hosp_code')?>&wwo=<?= $wwo ?><?php if ($this->input->get('p') == 'Norequest') {echo '&p=Norequest';}?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
		</th>
		<th width="3%" valign="top">
			<a href="?y=<?= $year+1?>&m=<?= $month?>&hosp=<?= $this->session->userdata('hosp_code')?>&wwo=<?= $wwo ?><?php if ($this->input->get('p') == 'Norequest') {echo '&p=Norequest';}?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
		</th>
	</tr>
</table>
<table class="tftable" border="0" style="text-align:center;">
	<tr align="center">
		<th>No</th>
		<th><a href="?s=0&y=<?=$year?>&m=<?=$month?>&wwo=<?=$wwo?>">Request Number</a></th>
		<th><a href="?s=1&y=<?=$year?>&m=<?=$month?>&wwo=<?=$wwo?>">Status</a></th>
		<th><a href="?s=2&y=<?=$year?>&m=<?=$month?>&wwo=<?=$wwo?>">Date</a></th>
		<th><a href="?s=3&y=<?=$year?>&m=<?=$month?>&wwo=<?=$wwo?>">User Department</a></a></th>
	</tr><?php $numrow=1; foreach ($record as $row): ?>
		<?php if($wwo == 1){
			$RequestNo = isset($row->V_Request_no) ? $row->V_Request_no : '';
			$Date = isset($row->D_date) ? date('d-m-Y',strtotime($row->D_date)) : '';
			$Status = isset($row->V_request_status) ? $row->V_request_status : '';
			$UserDept = isset($row->V_User_dept_code) ? $row->V_User_dept_code : '';
			$AssetNo = isset($row->V_Asset_no) ? $row->V_Asset_no : '';
			$Location = isset($row->V_Location_code) ? $row->V_Location_code : '';
			$Summary = isset($row->V_summary) ? $row->V_summary : '';
			$Priority = isset($row->V_priority_code) ? $row->V_priority_code : '';
			$ClosedDate = isset($row->v_closeddate) ? $row->v_closeddate : '';
			$ClosedTime = isset($row->v_closedtime) ? $row->v_closedtime : '';
			$Requestor = isset($row->V_requestor) ? $row->V_requestor : '';
			$TagNo = isset($row->V_Tag_no) ? $row->V_Tag_no : '';
			$SerialNo = isset($row->V_Serial_no) ? $row->V_Serial_no : '';
			$Phone = isset($row->V_phone_no) ? $row->V_phone_no : '';
			$Time = isset($row->D_time) ? $row->D_time : '';
			$Designation = isset($row->V_MohDesg) ? $row->V_MohDesg : '';
			$Description = isset($row->V_Asset_name) ? $row->V_Asset_name : '';
			$RBM = isset($row->V_Brandname) || isset($row->V_Manufacturer) ? $row->V_Brandname.' / '.$row->V_Manufacturer : '';
			$Model = isset($row->V_Model_no) ? $row->V_Model_no : '';
			$PCost = isset($row->N_Cost) ? $row->N_Cost : '';
			$PDate = isset($row->V_PO_date) ? $row->V_PO_date : '';
		}elseif($wwo == 2){
			$RequestNo = isset($row->v_WrkOrdNo) ? $row->v_WrkOrdNo : '';
			$Date = isset($row->d_DueDt) ? date('d-m-Y',strtotime($row->d_DueDt)) : '';
			$Status = isset($row->v_Wrkordstatus) ? $row->v_Wrkordstatus : '';
			$UserDept = isset($row->V_User_Dept_code) ? $row->V_User_Dept_code : '';
			$AssetNo = isset($row->v_Asset_no) ? $row->v_Asset_no : '';
			$Location = 'N/A';//isset($row->V_Location_code) ? $row->V_Location_code : '';
			$Summary = 'N/A';//isset($row->V_summary) ? $row->V_summary : '';
			$Priority = 'N/A';//isset($row->V_priority_code) ? $row->V_priority_code : '';
			$ClosedDate = 'N/A';//isset($row->v_closeddate) ? $row->v_closeddate : '';
			$ClosedTime = 'N/A';//isset($row->v_closedtime) ? $row->v_closedtime : '';
			$Requestor = 'N/A';//isset($row->V_requestor) ? $row->V_requestor : '';
			$TagNo = isset($row->V_Tag_no) ? $row->V_Tag_no : '';
			$SerialNo = isset($row->V_Serial_no) ? $row->V_Serial_no : '';
			$Phone = 'N/A';//isset($row->V_phone_no) ? $row->V_phone_no : '';
			$Time = 'N/A';//isset($row->D_time) ? $row->D_time : '';
			$Designation = 'N/A';//isset($row->V_MohDesg) ? $row->V_MohDesg : '';
			$Description = isset($row->V_Asset_name) ? $row->V_Asset_name : '';
			$RBM = isset($row->V_Brandname) || isset($row->V_Manufacturer) ? $row->V_Brandname.' / '.$row->V_Manufacturer : '';
			$Model = 'N/A';//isset($row->V_Model_no) ? $row->V_Model_no : '';
			$PCost = 'N/A';//isset($row->N_Cost) ? $row->N_Cost : '';
			$PDate = 'N/A';//isset($row->V_PO_date) ? $row->V_PO_date : '';
			
			
		}else{

			$RequestNo =  isset($row->MIRNcode) ? $row->MIRNcode : '';
			$Date = isset($row->DateCreated) ? date('d-m-Y',strtotime($row->DateCreated)) : '';
			$Status = isset($row->stocstatus) ? $row->stocstatus :'N/A';
			$UserDept = isset($row->V_User_dept_code) ? $row->V_User_dept_code : 'N/A';
			$AssetNo = 'N/A';
			$Location = 'N/A';
			$Summary = 'N/A';
			$Priority = 'N/A';
			$ClosedDate = 'N/A';
			$ClosedTime = 'N/A';
			$Requestor = 'N/A';
			$TagNo = 'N/A';
			$SerialNo = 'N/A';
			$Phone = 'N/A';
			$Time = 'N/A';
			$Designation = 'N/A';
			$Description = 'N/A';
			$RBM = 'N/A';
			$Model = 'N/A';
			$PCost = 'N/A';
			$PDate = 'N/A';
			
		}
		?>
	<tr align="center">
		
		<td ><?= $numrow ?></td>
		<?php if($this->input->get('p') == 'Norequest'){?>
		<td><a href="javascript:Setasset('<?=$RequestNo?>','<?=$Date?>','<?=$Summary?>','<?=$RBM?>','<?=$Description?>','<?=$Model?>','<?=$TagNo?>','<?=$AssetNo?>','<?=$SerialNo?>','<?=$PCost?>','<?=$PDate?>','<?=$PDate?>')" ><?= $RequestNo ?></a></td>
		<?php }else{ ?>
		<td><a href="javascript:Setasset('<?=$RequestNo?>','<?=$Date?>','<?=$Status?>','<?=$UserDept?>','<?=$AssetNo?>','<?=$Location?>','<?=$Summary?>','<?=$Priority?>','<?=$ClosedDate?>','<?=$ClosedTime?>','<?=$Requestor?>','<?=$TagNo?>','<?=$SerialNo?>','<?=$Phone?>','<?=$Time?>','<?=$Designation?>','<?=$Description?>','<?=$RBM?>','<?=$Model?>','<?=$PCost?>','<?=$PDate?>')" ><?= $RequestNo ?></a></td>
		<?php } ?>
		<td><?= $Status ?></td>
		<td><?= $Date ?></td>
		<td><?= $UserDept ?></td>
		<?php $numrow++ ?>
		<?php endforeach; ?>
	</tr>
</table>
<?php if($this->input->get('p') == 'Norequest'){?>
<script type="text/javascript">
    function Setasset(a,b,c,d,e,f,g,h,i,j,k,l) {
        if (window.opener != null && !window.opener.closed) {
            var aa = window.opener.document.getElementById("n_request");
            aa.value = a;
			var bb = window.opener.document.getElementById("n_requested");
            bb.value = b;
			var cc = window.opener.document.getElementById("n_summary");
            cc.value = c;
			var dd = window.opener.document.getElementById("n_brand");
            dd.value = d;
			var ee = window.opener.document.getElementById("n_description");
            ee.value = e;
			var ff = window.opener.document.getElementById("n_model");
            ff.value = f;
			var gg = window.opener.document.getElementById("n_assettag");
            gg.value = g;
			var hh = window.opener.document.getElementById("n_assetnumber");
            hh.value = h;
			var ii = window.opener.document.getElementById("n_assetserial");
            ii.value = i;
			var jj = window.opener.document.getElementById("n_purchasecost");
            jj.value = j;
			var kk = window.opener.document.getElementById("n_purchasedate");
            kk.value = k;
			var ll = window.opener.document.getElementById("n_age");
            ll.value = l;
        }
        window.close();
    }
</script>
<?php }else{?>		   		
<script type="text/javascript">
    function Setasset(a_request) {
        if (window.opener != null && !window.opener.closed) {
            var a_r_s = window.opener.document.getElementById("n_doc_det");
            a_r_s.value = a_request;
        }
        window.close();
    }
</script>
<?php } ?>
</body>