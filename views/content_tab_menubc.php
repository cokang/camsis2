
<div class="ph-dot-nav nav" style="font-size:20px;">		
		
		
		<?= ($this->input->get('tab') == '0') ? '<div class="menu-a">' : '' ?>
		<?php echo anchor ('contentcontroller/content/'.$this->session->userdata('usersess'). '?&tab=0', 'Work<br>Modules'); ?>
		<?= ($this->input->get('tab') == '0') ? '</div>' : '' ?>



		<?= ($this->input->get('tab') == '1') ? '<div class="menu-a">' : '' ?>
		<?php echo anchor ('contentcontroller/Central/'.$this->session->userdata('usersess'). '?&tab=1', 'Central<br /> Functions'); ?>
		<?= ($this->input->get('tab') == '1') ? '</div>' : '' ?>



		<?= ($this->input->get('tab') == '2') ? '<div class="menu-a">' : '' ?>
		<?php echo anchor ('contentcontroller/Procurement/'.$this->session->userdata('usersess'). '?&tab=2', 'Procurement<br /> Modules'); ?>
		<?= ($this->input->get('tab') == '2') ? '</div>' : '' ?>



		<?= ($this->input->get('tab') == '3') ? '<div class="menu-a">' : '' ?>
		<?php echo anchor ('contentcontroller/Business/'.$this->session->userdata('usersess'). '?&tab=3', 'Business Inteligent Reports'); ?>
		<?= ($this->input->get('tab') == '3') ? '</div>' : '' ?>
		<div class="effect"></div>

</div>
