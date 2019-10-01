<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="ui-main-report">
			<div class="ui-main-report-header">
				<table align="center" height="40px" border="0" class="report_selection">
					<tr>
						<td>Selection</td>
					</tr>
				</table>
			</div>
			<form action="" method="POST" name="myform">
			<div  class="middle-report-3">Select Range By... <br />
				<input type="radio" id="radio-1-1" name="n_range" class="regular-radio" value = "E"<?=$range == 'E' ? 'checked' : ''?>/>   
				<label for="radio-1-1"></label> Equipment Code  <br />
				<input type="radio" id="radio-1-2" name="n_range" class="regular-radio" value = "D"<?=$range == 'D' ? 'checked' : ''?>/>   
				<label for="radio-1-2"></label> User Department  <br />
				<input type="hidden" name="data_file" value="Y">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="mysubmit" value="GO">
				<input type="submit" class="btn btn-primary btn-block buttoncss" name="myclear" value="CLEAR">
			</div>
			</form>
			<?php if ($datafile == 'Y' and $range <> ''){ ?>
			<div class="middle-report-4">
				<div class="middle-report-5">
					<?php echo form_open('contentcontroller/report_ppmyearlyplanner');?>
					<button type="submit" >Generate</button>
					<input type="hidden" name="data_file" value="G">
					<input type="hidden" name="n_range" value="<?=$range?>">
				</div>
				<table class="tftabledetail" border="0" style="text-align:center;">
					<tr>	
						<th>No</th>
						<th><?=$title?></th>

					</tr>
					<?php $num = 1; foreach($record as $row): ?>
					<tr>
						<td align="center"><b><?=$num++?></b><input type="checkbox" name="chk_bxppm[]" value="<?=isset($row->n_code) ? $row->n_code : '' ?>" class="cb-element"></td>
						<td><?=isset($row->n_code) ? '<b>'.$row->n_code.'</b> - '.$row->n_desc : '' ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<?php } ?>
		</div>
		<?php if ($datafile == 'G' and $range <> ''){ ?>
		<table class="ui-content-middle-menu-workorder" width="100%" align="center">
				<tr class="ui-color-contents-style-1">
				<td colspan="55" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr style="background:#B3130A;">
							<td width="3%" height="30px">
							<a href="?y=<?= $year-1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center"><?=$year?></td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-menu-color-header" style="color:white;">
				<td style="padding-left:5px;">Tag Number <br />Asset Number<br />Asset Name</td>
				<td width="">Job No</td>
				<td width="" colspan="<?=count($kalender[1])?>">JAN</td>
				<td width="" colspan="<?=count($kalender[2])?>">FEB</td>
				<td width="" colspan="<?=count($kalender[3])?>">MAR</td>
				<td width="" colspan="<?=count($kalender[4])?>">APR</td>
				<td width="" colspan="<?=count($kalender[5])?>">MAY</td>
				<td width="" colspan="<?=count($kalender[6])?>">JUN</td>
				<td width="" colspan="<?=count($kalender[7])?>">JUL</td>
				<td width="" colspan="<?=count($kalender[8])?>">AUG</td>
				<td width="" colspan="<?=count($kalender[9])?>">SEP</td>
				<td width="" colspan="<?=count($kalender[10])?>">OCT</td>
				<td width="" colspan="<?=count($kalender[11])?>">NOV</td>
				<td width="" colspan="<?=count($kalender[12])?>">DEC</td>
			</tr>
			<?php  $equipc = ''; ?>
			<?php foreach ($record as $row): ?>
			<?php if ($range == 'E'){ ?>
			<?php if ($row->n_code <> $equipc){ ?>
			<tr class="ui-color-contents-style-1">
				<td colspan="55"  style="font-weight:bold;padding:5px; color:black;"><?=$titletab?> : <?=isset($row->n_code) ? $row->n_code : ''?></td>
			</tr>
			<?php } ?>
			<?php } else { ?>
			<?php if ($row->n_code <> $equipc){ ?>
			<tr class="ui-color-contents-style-1">
				<td colspan="55"  style="font-weight:bold;padding:5px; color:black;"><?=$titletab?> : <?=isset($row->n_desc) ? $row->n_desc : ''?></td>
			</tr>
			<?php } ?>
			<?php } ?>
<tr class="ui-color-contents-style-1" style="font-size:10px; color:black;">
		<?php if ($range == 'E'){ ?>
		<td style="width:80px;"><a href="assetupdate"><?=isset($row->n_assett) ? $row->n_assett : ''?><br><?=isset($row->n_assetn) ? $row->n_assetn : ''?><br><?=isset($row->n_desc) ? $row->n_desc : ''?><a/></td>
		<?php } else { ?>
		<td style="width:80px;"><a href="assetupdate"><?=isset($row->n_assett) ? $row->n_assett : ''?><br><?=isset($row->n_assetn) ? $row->n_assetn : ''?><br><?=isset($row->n_adesc) ? $row->n_adesc : ''?><a/></td>
		<?php } ?>
		<td style="width:40px; font-size:14px;"><?=isset($row->n_jtype) ? $row->n_jtype : ''?></td>
		
		<?php $weeksch = explode(',',$row->n_week)?>
		<?php for ($i = 1; $i <= $count; $i++){ ?>
			<td <?= isset($weeksch) && in_array($i,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>><?=$i?></td>
		<?php } ?>
		<!--<td class="">01&nbsp;</td>
		<td class="">02&nbsp;</td>
		<td class="">03&nbsp;</td>
		<td class="">04&nbsp;</td>
		<td class="">05&nbsp;</td>
		<td class="">06&nbsp;</td>
		<td class="">07&nbsp;</td>
		<td class="">08&nbsp;</td>
		<td class="">09&nbsp;</td>
		<td class="">10&nbsp;</td>
		<td class="">11&nbsp;</td>
		<td class="">12&nbsp;</td>
		<td class="">13&nbsp;</td>
		<td class="">14&nbsp;</td>
		<td class="">15&nbsp;</td>
		<td class="">16&nbsp;</td>
		<td class="">17&nbsp;</td>
		<td class="">18&nbsp;</td>
		<td class="">19&nbsp;</td>
		<td  style="background-color:#3399FF;">20&nbsp;</td>
		<td class="">21&nbsp;</td>
		<td class="">22&nbsp;</td>
		<td class="">23&nbsp;</td>
		<td class="">24&nbsp;</td>
		<td class="">25&nbsp;</td>
		<td class="">26&nbsp;</td>
		<td class="">27&nbsp;</td>
		<td class="">28&nbsp;</td>
		<td class="">29&nbsp;</td>
		<td class="">30&nbsp;</td>
		<td class="">31&nbsp;</td>
		<td class="">32&nbsp;</td>
		<td class="">33&nbsp;</td>
		<td class="">34&nbsp;</td>
		<td class="">35&nbsp;</td>
		<td class="">36&nbsp;</td>
		<td class="">37&nbsp;</td>
		<td class="">38&nbsp;</td>
		<td class="">39&nbsp;</td>
		<td class="">40&nbsp;</td>
		<td class="">41&nbsp;</td>
		<td class="">42&nbsp;</td>
		<td class="">43&nbsp;</td>
		<td class="">44&nbsp;</td>
		<td class="">45&nbsp;</td>
		<td class="">46&nbsp;</td>
		<td class="">47&nbsp;</td>
		<td class="">48&nbsp;</td>
		<td class="">49&nbsp;</td>
		<td class="">50&nbsp;</td>
		<td class="">51&nbsp;</td>
		<td class="">52&nbsp;</td>
		<td class="">53&nbsp;</td>-->
</tr>
<?php $equipc = isset($row->n_code) ? $row->n_code : ''; ?>
<?php endforeach; ?>	
	</table>
	<?php } ?>
	</div>
</div>
<script>
	//$(document).ready(function(){
	//	$("#GO").click(function(){
	//		$("#loginTable").show();
	//		$("#loginTable2").hide();
	//	});
	//	$("#Clear").click(function(){
	//		$("#loginTable").hide();
	//		$("#loginTable2").hide();
	//	});
	//	$("#button").click(function(){
	//		$("#loginTable2").show();
	//		$("#loginTable").hide();
	//	});
	//});
   //$(document).ready(function(){
    //$('.check:button').toggle(function(){
    //    $('input:checkbox').attr('checked','checked');
    //    $(this).val('Deselect all')
    //},function(){
    //    $('input:checkbox').removeAttr('checked');
    //    $(this).val('Select All');        
    //})
//})
   </script>
</body>
</html>
