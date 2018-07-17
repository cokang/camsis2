<body>

	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> Stock Activity </div>

		<button onclick="javascript:myFunction('stockact?print=1&id=<?php echo $this->input->get('id');?>');" class="btn-button btn-primary-button">PRINT</button>

		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
	<style>
	table.tftabkew {
    font-size: 12px;
	font-weight: 400;
	 font-family: Arial, Helvetica, sans-serif;
    color: #333333;
    width: 90%;
    border-color: black;
    border-collapse: collapse;
   margin: auto;
   margin-top:10px;
   margin-bottom:10px;
	
}
	</style>
	<table class="tftabkew">
	<tr>

	<td align="center"><b style="text-transform: uppercase;">Stock Details </b></td>
	</tr>
	<tr><td><b style="text-transform: uppercase;">Stock Activity</b></td>
	</tr>
	

	</table>
<table  class="tftabkew" border="1" width="100%" height="25px">
									<tr class="ui-menu-color-header" style="font-weight:bold;">
										<th colspan="8">Entire Transaction</th>
									</tr> 
									<tr class="" style="font-weight:bold;">
										<th>No</th>
										<th>Transaction Date</th>
										<th>Documentation</th>
										<th>User</th>
										<th>In</th>
										<th>Out</th>
										<th>Balance</th>
										<th>Remark </th>
									</tr>
									<?php 
									$row = 0;
									$sno = $row + 1;
									if(isset($_GET['p'])){
           $sno = (($_GET['p']*$limit)+1) - $limit;
		
            if($sno <=0) $sno = 1;
        }
									?>
									<?php foreach ($assetrec as $key): ?>
								
									<?php foreach ($key as $rows) : ?>

									<?php if ($rows->ItemCode == $this->input->get('id')) { ?>
									<?php
									is_numeric($rows->Qty_Before) ? $Qty_Before = $rows->Qty_Before : $Qty_Before = 0;
									is_numeric($rows->Qty_Taken) ? $Qty_Taken = $rows->Qty_Taken : $Qty_Taken = 0;
									is_numeric($rows->Qty_Add) ? $Qty_Add = $rows->Qty_Add : $Qty_Add = 0;
									$Qty_Bal = $Qty_Before + $Qty_Add - $Qty_Taken;
									?>
									
									<tr class="" style="color:black; font-size:12px; text-align:center;">
						
										<td><?= $sno ?></td>
										<td><?= date_format(new DateTime($rows->Time_Stamp), 'd-m-Y H:i:s') ?></td>
										<td><?= $rows->Related_WO ?></td>
										<td><?= $rows->Last_User_Update ?></td>
										<td><?= $Qty_Add ?></td>
										<td><?= $Qty_Taken ?></td>
										<td><?= $Qty_Bal ?></td>
										<td><?= $rows->Remark ?></td>
									</tr>
									<?php } ?>
									
									<?php $sno++ ?>
									<?php endforeach; ?>
									<?php endforeach; ?>
								</table>


	</body>
</html>

