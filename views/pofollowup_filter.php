<center><form method="get" action="" style='background-color:#ff7f00;margin-bottom: -5%;margin-top:6%; margin-left:5%; margin-right:5%;'>
<label for="from">From</label>
<input type="date" name="from" id="from" value="<?php  echo $from; ?>" class="form-control-button2 ">
<label for="to">To</label>
<input type="date" name="to" id="to" value="<?php echo $to ?>" class="form-control-button2 ">
<label for="to">Vendor</label>
<?php 
	
	$request_type = array('All'=> 'All',
	                        '0' => 'RCM',
							'1' => 'PPM', 
							'2' => 'TPS',
							'3' => 'RIW',
							'4' => 'FMI',
                            '5' => 'JIT');
                            
                            $payment_status = array('All'=> 'All',
	                        '0' => 'UNPAID',
							'1' => 'PAID');
	echo form_dropdown('vendor', $vendor_list,set_value('vender', $this->input->get('vendor')), 'class="form-control-button2 "');
 ?>
 <br>
 <label for="to">Request Type</label>
 <?php echo form_dropdown('request_type', $request_type,set_value('request_type', $this->input->get('request_type')), 'class="form-control-button2 "'); ?>
 
 <label for="to">Payment Status</label>
 <?php echo form_dropdown('payment_status', $payment_status ,set_value('payment_status', $this->input->get('payment_status')), 'class="form-control-button2 "'); ?>
 <?php echo form_hidden('tab',$this->input->get('tab')!=null?$this->input->get('tab'):0) ?>
<input class="btn-button btn-secondary-button" type="submit" value="Apply" onchange="javascript: submit()"/>
</form></center>