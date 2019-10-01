<tr class="ui-left_web">
	<td align="right" colspan="14">
		<table class="table-ui-vo3_Assets" border="0">
			<?php if (isset($period[2])) { ?>
			<?php if(substr($period[2],1,1) == 1) { ?>
			<tr class="ui-left_web">
				<?= ($this->input->get('m') == NULL) ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=&rpt_no='.$rpt_no.'&vo=3', 'All '.$period[2]); ?></td>
				<?= ($this->input->get('m') == '1') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=1&rpt_no='.$rpt_no.'&vo=3', 'Jan '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '2') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=2&rpt_no='.$rpt_no.'&vo=3', 'Feb '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '3') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=3&rpt_no='.$rpt_no.'&vo=3', 'Mar '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '4') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=4&rpt_no='.$rpt_no.'&vo=3', 'Apr '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '5') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=5&rpt_no='.$rpt_no.'&vo=3', 'May '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '6') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=6&rpt_no='.$rpt_no.'&vo=3', 'Jun '.substr($period[2],2)); ?></td>
			</tr>
			<?php } ?>
			<?php if(substr($period[2],1,1) == 2) { ?>
			<tr class="ui-left_web">
				<?= ($this->input->get('m') == NULL) ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=&rpt_no='.$rpt_no.'&vo=3', 'All '.$period[2]); ?></td>
				<?= ($this->input->get('m') == '7') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=7&rpt_no='.$rpt_no.'&vo=3', 'Jul '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '8') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=8&rpt_no='.$rpt_no.'&vo=3', 'Aug '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '9') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=9&rpt_no='.$rpt_no.'&vo=3', 'Sep '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '10') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=10&rpt_no='.$rpt_no.'&vo=3', 'Oct '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '11') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=11&rpt_no='.$rpt_no.'&vo=3', 'Nov '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '12') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Rates?&m=12&rpt_no='.$rpt_no.'&vo=3', 'Dec '.substr($period[2],2)); ?></td>
			</tr>
			<?php } ?>
			<?php } ?>
		</table>
	</td>
</tr>
<style>
.table-ui-vo3_Assets{
	border-collapse:collapse;
    vertical-align:middle;
}
.ui-vo3_Assets{
font-weight: bold;
text-align: center;
padding-left: 5px;
padding-right: 5px;
}
.ui-vo3_Assets1{
font-weight: normal;
text-align: center;
padding-left: 5px;
padding-right: 5px;
}
</style>