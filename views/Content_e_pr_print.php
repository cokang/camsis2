<style type="text/css">
body.newtroman{
font-family: new times roman;
}
img.logoap{
	width:250px; height:100px;
}
table tr td.prno{color:blue; font-size:22px; font-weight:bold;}
table.tftablex {font-size:14px;width:90%;border-collapse: collapse;}
table.tftablex tr {background-color:white;}
table.tftablex td {font-size:16px;}
table.txpxx{border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;}
table.txpxx tr th{border: 1px solid black;}
table.txpxx tr td{padding-top:20px;padding-bottom:20px;}
div.xxdivxx{display:block; border-top:0.5px solid black; width:98%; margin-top:10px; margin-bottom:10px; margin-left:auto; margin-right:auto; font-size:12px; padding-top:5px;}
</style>
<style type="text/css" media="print">
span.textpr{font-size:14px;}
table tr td.prno{font-size:20px;}
table.tftablex td {font-size:12px;}
table.txpxx tr th{font-size:10px;}
table.txpxx tr td{padding-top:10px;padding-bottom:10px;}
div.xxdivxx{position: fixed ; bottom: 10;}
</style>
<body class="newtroman">
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> SERVICE REQUEST AND WORK ORDER </div>
		<button onclick="javascript:myFunctionprint();" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
	<div class="" align="center" style="margin-top:20px;" >
       <table border="0" width="70%" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
			<tr>
				<td width="" align="center" colspan="2">
					<img src="<?php echo base_url(); ?>images/logo.png" class="logoap"/><br />
					<span style="font-weight:bold; color:blue;" class="textpr">PURCHASE REQUEST</span>
				</td>
			</tr>
		</table>
	</div>
	<div style="display:block; border:0.5px solid black; width:99%; margin-top:10px; margin-bottom:10px; margin-left:auto; margin-right:auto;"></div>
	<div class="m-div">
		<table class="tftablex" border="0" style="text-align:left; width:90%;" align="center">
			<tr style="text-align:left;">
				<td width="25%">Date  :</td>
				<td><?=isset($record[0]->DateCreated) ? date("d-m-Y",strtotime($record[0]->DateCreated)) : ''?></th>
				<td rowspan="10" valign="top" class="prno" style="text-align:center;">P. R. No : <?=isset($record[0]->PR_No) ? $record[0]->PR_No : ''?></td>
			</tr>
			<tr style="text-align:left;">
				<td>ASSET NO :</td>
				<td><?=isset($record[0]->V_Asset_no) ? $record[0]->V_Asset_no : ''?></td>
			</tr>
			<tr style="text-align:left;">
				<td>EQUIPMENT NAME :</td>
				<td><?=isset($record[0]->V_Asset_name) ? $record[0]->V_Asset_name : ''?></td>
			</tr>
			<tr style="text-align:left;">
				<td>MODEL :</td>
				<td><?=isset($record[0]->V_Model_no) ? $record[0]->V_Model_no : ''?></td>
			</tr>
			<tr style="text-align:left;">
				<td>BRAND :</td>
				<td><?=isset($record[0]->V_Brandname) ? $record[0]->V_Brandname : ''?></td>
			</tr>
			<tr style="text-align:left;">
				<td>WORK ORDER NO. :</td>
				<td><?=isset($record[0]->WorkOfOrder) ? $record[0]->WorkOfOrder : ''?></td>
			</tr>
			<tr style="text-align:left;">
				<td>AGE :</td>
				<td><?=isset($record[0]->Age) ? $record[0]->Age : ''?></td>
			</tr>
			<tr style="text-align:left;">
				<td>Cumulative Part Cost :</td>
				<td>0</td>
			</tr>
			<tr style="text-align:left;">
				<td>Cumulative Labour Cost :</td>
				<td>0</td>
			</tr>
			<tr style="text-align:left;">
				<td>Purchase Cost :</td>
				<td><?=isset($record[0]->N_Cost) ? number_format($record[0]->N_Cost,2) : ''?></td>
			</tr>
		</table>
		<div style="display:block; border:0.5px solid black; width:90%; margin-top:10px; margin-bottom:10px; margin-left:auto; margin-right:auto;"></div>
		<table class="tftablex txpxx" border="0" style="text-align:center; width:90%; height:400px;" align="center">
		
		<tr style="text-align:center;font-weight:bold;">
				<th>No </th>
				<th>Re./MIRN No</th>
				<th>Description of goods / services</th>
				<th>Vendor</th>
				<th>Price Per Unit</th>
				<th>Qty Required</th>
				<th>Amount (RM)</th>
			</tr>
			<tr style="text-align:center;">
			  <td></td>
			  <td style="border-left:1px solid black"><?=isset($record[0]->DocReferenceNo) ? $record[0]->DocReferenceNo : ''?></td>
			  <td style="border-left:1px solid black"></td>
			  <td style="border-left:1px solid black"></td>
			  <td style="border-left:1px solid black"></td>
			  <td style="border-left:1px solid black"></td>
			  <td style="border-left:1px solid black"></td>				  			 
			</tr>
			<?php $numrow = 1; $total = 0; foreach($itemrec as $row): ?>
			<tr style="text-align:center;">
			  <td><?=$numrow++?></td>
			  <td style="border-left:1px solid black"></td>
			  <td style="border-left:1px solid black"><?=isset($row->ItemName) ? $row->ItemName : ''?></td>
			  <td style="border-left:1px solid black"><?=isset($row->VENDOR_NAME) ? $row->VENDOR_NAME : ''?></td>
			  <td style="border-left:1px solid black"><?=isset($row->Unit_Costx) ? $row->Unit_Costx : ''?></td>
			  <td style="border-left:1px solid black"><?=isset($row->QtyReqfx) ? $row->QtyReqfx : ''?></td>
			  <td style="border-left:1px solid black"><?=isset($row->Unit_Costx) ? number_format(($row->Unit_Costx * $row->Qty),2) : '0.00'?></td>				  
			  <?php
					$total += $row->Unit_Costx * $row->Qty;
			  ?>	 
			</tr>
			<?php endforeach;?>
			 <tr class="item-row" style="border:1px solid black;">
		      <td colspan="4" style="padding-left:10px;" valign="top"></td>
			  <td style="border-left:1px solid black"> <b>Total</b></td>
			  <td style="border-left:1px solid black"> </td>
			  <td align="right" style="border-left:1px solid black;"><?=number_format($total,2)?></td>
		  </tr>
		</table>
		<table class="tftablex" border="0" style="text-align:center; width:90%; margin-top:10px; margin-bottom:30px;" align="center">
		<tr style="text-align:center;font-weight:bold;">
				<th width="30%" style="text-align:left;" valign="top">Special Instruction : </th>
				<td style="border:1px solid black; height:120px;"></td>
			</tr>
		</table>
		<table class="tftablex" border="0" style="text-align:center; width:90%; margin-top:50px; margin-bottom:50px; " align="center">
			<tr style="text-align:center;font-weight:bold;">
				<td width="50%" style="text-align:left; font-size:14px;" valign="top">Prepared By : <?=ucfirst($this->session->userdata('v_UserName'))?> </td>
				<td style="text-align:left; font-size:14px;" valign="top">Approved By :</td>
			</tr>
		</table>
		<div style="" class="xxdivxx">
		ADVANCE PACT SDN BHD <br/>
		No. 11, Jalan Utarid U5/15, Seksyen U5, 40150 Shah Alam, Selangor Darul Ehsan<br/>
		Tel:+6(03) 7859 9826 Fax : +6(03) 7859 9587 Website :www.advancepact.com<br/>
		</div>
	</div>
</body>
