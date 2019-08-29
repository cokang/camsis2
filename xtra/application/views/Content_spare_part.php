<div class="ui-middle-screen">
	<div  class="menu_sr">
	<table width="98%" class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new"><span style="float: left; font-weight: bold;">Stock Register</td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
				 <table class="ui-float-asset-reg">
				  <tr>
				    <th>Level</th>
					<th>Option</th>
				  </tr>
				  <tr>
				    <td>Hospital</td>
					<td>IIUM Medical Centre</td>
					</tr>
				 </table>
				</td>
			</tr>
		</table>
	</div>
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table width="98%" class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new"><span style="float: left; font-weight: bold;">Spare Part Summary</td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
				 <table class="ui-float-asset-reg">
				  <tr>
				    <th>No.</th>
				    <th>Spart Part</th>
					<th>Unit</th>
					<th>Quantity</th>
				  </tr>
					<?php $nom = 1; foreach($record as $row): ?>	
				  <tr>
						<td><?= $nom++; ?></td>
				    <td><?= isset($row->ItemName) ? $row->ItemName : '' ?></td>
					<td>Unit</td>
					<td><?= isset($row->Qty) ? $row->Qty : '' ?></td>
				  </tr>
					<?php endforeach; ?>
				 </table>
				</td>
			</tr>
		</table>
	</div>
	</div>
	<style>
	.ui-float-asset-reg{
	border:1px solid #79B6D8;
	color:black;
	border-collapse:collapse;
	width:98%;
	margin:10px auto;
	}
	.ui-float-asset-reg tr th{
	border:1px solid #79B6D8;
	background:#ccc;
	}
	.ui-float-asset-reg tr td{
	border:1px solid #79B6D8;
	padding-left:15px;
	}
	.ui-float-asset-reg tr:nth-child(2n+1){
	background:#eee;
	}
	.ui-float-asset-reg tr td a{
	color:#79B6D8;
	}
	.menu_sr{
		display:block;
		width:50%;
		margin-left:auto;
		margin-right:auto;
	}
	</style>