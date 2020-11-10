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
							$payment_type = array('All'=> 'All',
	                        'COD' => 'CIA',
							'TERM' => 'TERM');
							$status = array('All'=> 'All',
	                        '0' => 'Pending',
							'C' => 'Submitted');
							$approved = array('0'=> 'No',
							'1'=> 'Yes');
	echo form_dropdown('vendor', $vendor_list,set_value('vender', $this->input->get('vendor')), 'class="form-control-button2 "');
 ?>
 <br>
 <label for="to">Approve Date only</label>
 <?php echo form_dropdown('filter_approve', $approved,set_value('filter_approve', $this->input->get('filter_approve')), 'class="form-control-button2 "'); ?>

 <label for="to">Request Type</label>
 <?php echo form_dropdown('request_type', $request_type,set_value('request_type', $this->input->get('request_type')), 'class="form-control-button2 "'); ?>
 <?php if($this->input->get('tab')==0 || $this->input->get('tab')== ''){?>
 <label for="to">Payment Status</label>
 <?php echo form_dropdown('payment_status', $payment_status ,set_value('payment_status', $this->input->get('payment_status')), 'class="form-control-button2 "'); ?>
<?php }?>
<?php if($this->input->get('tab')==1 ){?>
 <label for="to">Payment Type</label>
 <?php echo form_dropdown('payment_type', $payment_type ,set_value('payment_type', $this->input->get('payment_type')), 'class="form-control-button2 "'); ?>
 <label for="to">Status</label>
 <?php echo form_dropdown('status', $status ,set_value('status', $this->input->get('status')), 'class="form-control-button2 "'); ?>

<?php }?>

 <?php echo form_hidden('tab',$this->input->get('tab')!=null?$this->input->get('tab'):0) ?>
<input class="btn-button btn-secondary-button" type="submit" value="Apply" onchange="javascript: submit()"/>
</form></center>