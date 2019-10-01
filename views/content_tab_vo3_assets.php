<tr >
	<td colspan="14">
		<table class="table-ui-vo3_Assets" border="0">
			<?php if (isset($period[2])) { ?>
			<?php if(substr($period[2],1,1) == 1) { ?>
			<tr>
				<?= ($this->input->get('m') == NULL) ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=&rpt_no='.$rpt_no.'&vo=2', 'All '.$period[2]); ?></td>
				<?= ($this->input->get('m') == '1') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=1&rpt_no='.$rpt_no.'&vo=2', 'Jan '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '2') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=2&rpt_no='.$rpt_no.'&vo=2', 'Feb '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '3') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=3&rpt_no='.$rpt_no.'&vo=2', 'Mar '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '4') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=4&rpt_no='.$rpt_no.'&vo=2', 'Apr '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '5') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=5&rpt_no='.$rpt_no.'&vo=2', 'May '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '6') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=6&rpt_no='.$rpt_no.'&vo=2', 'Jun '.substr($period[2],2)); ?></td>
			</tr>
			<?php } ?>
			<?php if(substr($period[2],1,1) == 2) { ?>
			<tr>
				<?= ($this->input->get('m') == NULL) ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=&rpt_no='.$rpt_no.'&vo=2', 'All '.$period[2]); ?></td>
				<?= ($this->input->get('m') == '7') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=7&rpt_no='.$rpt_no.'&vo=2', 'Jul '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '8') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=8&rpt_no='.$rpt_no.'&vo=2', 'Aug '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '9') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=9&rpt_no='.$rpt_no.'&vo=2', 'Sep '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '10') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=10&rpt_no='.$rpt_no.'&vo=2', 'Oct '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '11') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=11&rpt_no='.$rpt_no.'&vo=2', 'Nov '.substr($period[2],2)); ?></td>
				<?= ($this->input->get('m') == '12') ? '<td class="ui-vo3_Assets"> ' : '<td class="ui-vo3_Assets1">'?>
				<?php echo anchor ('contentcontroller/vo3_Assets?&m=12&rpt_no='.$rpt_no.'&vo=2', 'Dec '.substr($period[2],2)); ?></td>
			</tr>
			<?php } ?>
			<?php } ?>
		</table>
	</td>
</tr>