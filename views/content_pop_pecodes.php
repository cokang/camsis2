
<body style="margin:0px;">
<table id="alertData" class="tftable" border="1" style="text-align:center;">
	<tr>
		<th colspan="7" class="headerpop">SEARCH BY NAME / CODE / VENDOR PART </th>
	</tr>
	<tr align="center">
	<td id="scby" colspan="7" >
	<?php $attributes = array('id' => 'myform');
	
	if ($this->input->get('mrin')){
	echo form_open('contentcontroller/pecodes?mrin='.$this->input->get('mrin').'&hosp='.$this->input->get('hosp').'&id='.$this->input->get('id'),$attributes);
	}else {
	echo form_open('contentcontroller/pecodes',$attributes);	
	}
	?>
	<input type="text" id="sctext" name="scby" value="<?=$scby?>" class="form-control">
	<?php echo form_close(); ?>
	</td>
	</tr>
	<tr>
		<th colspan="7" class="headerpop">EQUIPMENT CODES</th>
	</tr>
	<tr align="center">
		<th >No</th>
		<th >Code</th>
		<th >Name</th>
		<th >Vendor Part No.</th>
		<th >Category</th>
		<th >Brand</th>
		<th >Model</th>
	</tr>
	<?php $numrow=1; foreach($record as $row): ?>
	<tr align="center">
		<td><?=$numrow?></td>
		<td><a href="javascript:Setasset('<?=$row->ItemCode?>','<?=$row->ItemName?>','<?=$this->input->get('hosp')?>')" ><?=$row->ItemCode?></a></td>
		<td><a href="javascript:Setasset('<?=$row->ItemCode?>','<?=$row->ItemName?>','<?=$this->input->get('hosp')?>')" ><?=$row->ItemName?></a></td>
		<td><a href="javascript:Setasset('<?=$row->ItemCode?>','<?=$row->ItemName?>','<?=$this->input->get('hosp')?>')" ><?=$row->PartNumber?></a></td>
		<td><a href="javascript:Setasset('<?=$row->ItemCode?>','<?=$row->ItemName?>','<?=$this->input->get('hosp')?>')" ><?=$row->EquipCat?></a></td>
		<td><a href="javascript:Setasset('<?=$row->ItemCode?>','<?=$row->ItemName?>','<?=$this->input->get('hosp')?>')" ><?=$row->Brand?></a></td>
		<td><a href="javascript:Setasset('<?=$row->ItemCode?>','<?=$row->ItemName?>','<?=$this->input->get('hosp')?>')" ><?=$row->Model?></a></td>
	</tr>
	<?php $numrow++ ?>
	<?php endforeach; ?>
</table>

<script type="text/javascript">
<?php if($this->input->get('mrin')) {?>
    function Setasset(a_agent,a_agent2,hosp) {
        if (window.opener != null && !window.opener.closed) {

      var namexx = window.opener.document.getElementById('itemname<?=$this->input->get('id');?>');
            namexx.innerHTML =  a_agent2;
         var codexx = window.opener.document.getElementById('itemcode<?=$this->input->get('id');?>');
            codexx.innerHTML = a_agent;
         
            var codexxx = window.opener.document.getElementById('itemcodei<?=$this->input->get('id');?>');
            codexxx.value = a_agent;
            var codexxx = window.opener.document.getElementById('itemc<?=$this->input->get('id');?>');
            codexxx.value = a_agent;
        }
        window.close();
    }
<?php } else { ?>
    function Setasset(a_agent,a_agent2,hosp) {

        if (window.opener != null && !window.opener.closed) {
            var a_ag = window.opener.document.getElementById("n_agent");
            a_ag.value = a_agent;
            var a_ag2 = window.opener.document.getElementById("n_agent2");
            a_ag2.value = a_agent2;
            var a_ag3 = window.opener.document.getElementById("hosp");
            a_ag3.value = hosp;
            //opener.document.f1.n1.value = document.n_tag_number.value;
			//opener.document.f1.n2.value = document.frm.c_name2.value;
        }
        window.close();
    }
<?php } ?>

 $("#alertData").on("click", "td", function() {
    if ($(this).attr('id')=='scby' &&  $('#sctext').val() != ''){
	  $("#myform").submit()
	}
   });

</script>
