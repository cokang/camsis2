<?php 

// load the form helper so you can use set_value, form_open etc
$this->load->helper('form');

echo form_open('contentcontroller/confirmReg');

echo "Username : ". form_input('username', set_value('username'));
echo "Password : ". form_password('password', set_value('password'));
echo form_submit('submit', 'Login');

echo form_close();

?> 