<?php
$filename ="All Assets ppm planer yearly.xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
?>
	<style>
	table {font-family :arial; }
	table.dk-table tr th {font-size:0.9em;}
	</style>
	<table width="100%" style=" background:white; text-align:center; border:1px solid black; font-size:0.9em;" border="1" class="dk-table">
		<tr>
			<th colspan="4">&nbsp;</th>
			<th colspan="<?=$count?>" style="font-size:1.5em;"><?=$year?></th>
		</tr>
		<tr>
			<th colspan="4" style="font-size:1.5em;">PPM Job Yearly Planner IIUM MEDICAL CENTRE <?=$year?> (<?=$this->session->userdata('usersess')?>)</th>
			<th colspan="<?=count($kalender[1])?>" bgcolor="#00FFFF">Jan</th>
			<th colspan="<?=count($kalender[2])?>" bgcolor="#00FFFF">FEB</th>
			<th colspan="<?=count($kalender[3])?>" bgcolor="#00FFFF">MAR</th>
			<th colspan="<?=count($kalender[4])?>" bgcolor="#00FFFF">APR</th>
			<th colspan="<?=count($kalender[5])?>" bgcolor="#00FFFF">MEI</th>
			<th colspan="<?=count($kalender[6])?>" bgcolor="#00FFFF">JUN</th>
			<th colspan="<?=count($kalender[7])?>" bgcolor="#00FFFF">JUL</th>
			<th colspan="<?=count($kalender[8])?>" bgcolor="#00FFFF">AUG</th>
			<th colspan="<?=count($kalender[9])?>" bgcolor="#00FFFF">SEP</th>
			<th colspan="<?=count($kalender[10])?>" bgcolor="#00FFFF">OCT</th>
			<th colspan="<?=count($kalender[11])?>" bgcolor="#00FFFF">NOV</th>
			<th colspan="<?=count($kalender[12])?>" bgcolor="#00FFFF">DEC</th>

		</tr>
		<tr bgcolor=" #C0C0C0">
			<th style="min-width: 13.5em;" >Asset No</th>
			<th style="min-width: 40.5em;">Asset Name</th>
			<th style="min-width: 30.5em;">Department Name</th>
			<th>Freq</th>
			<?php for ($i = 1; $i <= $count; $i++){ ?>
				<th style="min-width: 1.5em;"><?=$i?></th>
			<?php } ?>
		</tr>
		<?php foreach ($records as $row) {?>
		<tr>
			<td><?=isset($row->V_Tag_no) ? $row->V_Tag_no : ''?></td>
			<td><?=isset($row->V_Asset_name) ? $row->V_Asset_name : ''?></td>
			<td><?=isset($row->v_UserDeptDesc) ? $row->v_UserDeptDesc : ''?></td>
			<td><?=isset($row->v_JobType) ? $row->v_JobType : ''?></td>
			<?php 
				$weeksch = explode(',',$row->v_Weeksch);
			?>
			<?php for ($i = 1; $i <= $count; $i++){ ?>
				<td <?= isset($weeksch) && in_array($i,$weeksch) ? 'bgcolor="##00FFFF"' : '' ?>><?= isset($weeksch) && in_array($i,$weeksch) ? '1' : '' ?></td>
			<?php } ?>
		</tr>
		<?php } ?>
	</table>
</head>
</html>