<style>
 img{ height:90%; margin:0 auto; display:block;}
 .text-blink{color:red; position:fixed; padding-left:36%;padding-top:20.5%; font-weight:bold; font-size:24px;}
</style>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">
	Content Under Construction
	</div>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule';">CANCEL</button>
</div>
<?php if(($this->input->get('en') == 'Report') or ($this->input->get('en') == 'Detail')){?>
<div class="text-blink">Refer to Security Attendance Record</div>
<?php }elseif(($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/complaintreport/') or ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) == 'contentcontroller/complaintlevel/')){ ?>
<div class="text-blink">Refer to Patrol Management Record</div>
<?php }else{ ?>
<img src="<?php echo base_url(); ?>images/underconstruction.gif" alt="">
<?php } ?>
</body>
</html>
