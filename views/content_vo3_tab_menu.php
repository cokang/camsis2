<tr class="ui-left_web">
<?= ($this->input->get('vff') == '0') ? '<td width="200px" class="ui-highlight" align="center" colspan="0" style="height:30px;">' : '<td width="200px" class="ui-content-menu-desk-color" align="center" colspan="0" style="height:30px;">' ?>
<?php echo anchor ('contentcontroller/vo3_Analysis?rpt_no='.$this->input->get('rpt_no').'&'.$this->session->userdata('usersess').'&vff=0', 'Authorization Status'); ?></td>


<?= ($this->input->get('vff') == '1') ? '<td width="200px" class="ui-highlight" align="center" colspan="0" style="">' : '<td width="200px" class="ui-content-menu-desk-color" align="center" colspan="0" style="">' ?>
<?php echo anchor ('contentcontroller/vo3_als?rpt_no='.$this->input->get('rpt_no').'&'.$this->session->userdata('usersess').'&vff=1', 'Asset Lock Status'); ?></td>
	<td>&nbsp;</td>
</tr>