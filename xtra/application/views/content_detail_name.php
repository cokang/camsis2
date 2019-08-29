
<body style="margin:0px;">
<table class="tftable" border="1" style="text-align:center;">
  <tr>
    <th colspan="6"><?php if($this->input->get('pr') == 'update'){?>Personnel<?php }else{?>EQUIPMENT CODES<?php }?></th>
  </tr>
  <tr align="center">
    <th>No</th>
    <th>Code</th>
    <th>Name</th>
    <th>Designation</th>
    <th>Hourly Rate</th>
  </tr>
  <?php if ($this->input->get('parent') == 'woresponse' OR $this->input->get('parent') == 'wovisit1'){ ?>         
  <?php $numrow = 1; foreach($records as $row):?>             
  <tr align="center" id="n_tag">
    <td style="width:20px;"><?=$numrow++;?></a></td>
    <td><a href="javascript:Setworkorder('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>','<?=number_format($row->v_hourlyrate,2)?>','<?=$this->input->get("hour")?>','<?=$this->input->get("minute")?>')" ><?=$row->v_PersonalCode?></a></td>
    <td><a href="javascript:Setworkorder('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>','<?=number_format($row->v_hourlyrate,2)?>','<?=$this->input->get("hour")?>','<?=$this->input->get("minute")?>')" ><?=$row->v_PersonalName?></a></td>
    <td><a href="javascript:Setworkorder('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>','<?=number_format($row->v_hourlyrate,2)?>','<?=$this->input->get("hour")?>','<?=$this->input->get("minute")?>')" ><?=$row->v_designation?></a></td>
    <td><a href="javascript:Setworkorder('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>','<?=number_format($row->v_hourlyrate,2)?>','<?=$this->input->get("hour")?>','<?=$this->input->get("minute")?>')" ><?=number_format($row->v_hourlyrate,2)?></a></td>
  </tr>          
  <?php endforeach;?>
  <?php } ?> 
  <?php if ($this->input->get('parent') == 'job'){ ?>         
  <?php $numrow = 1; foreach($records as $row):?>             
  <tr align="center" id="n_tag">
    <td style="width:20px;"><?=$numrow++;?></a></td>
    <td><a href="javascript:Setworkorder('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>')" ><?=$row->v_PersonalCode?></a></td>
    <td><a href="javascript:Setworkorder('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>')" ><?=$row->v_PersonalName?></a></td>
    <td><a href="javascript:Setworkorder('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>')" ><?=$row->v_designation?></a></td>
    <td><a href="javascript:Setworkorder('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>')" ><?=number_format($row->v_hourlyrate,2)?></a></td>
  </tr>          
  <?php endforeach;?>
  <?php } ?>
    <?php if ($this->input->get('pr') == 'update'){ ?>         
  <?php $numrow = 1; foreach($records as $row):?>             
  <tr align="center" id="n_tag">
    <td style="width:20px;"><?=$numrow++;?></a></td>
    <td><a href="javascript:ponumber('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>')" ><?=$row->v_PersonalCode?></a></td>
    <td><a href="javascript:ponumber('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>')" ><?=$row->v_PersonalName?></a></td>
    <td><a href="javascript:ponumber('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>')" ><?=$row->v_designation?></a></td>
    <td><a href="javascript:ponumber('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>')" ><?=number_format($row->v_hourlyrate,2)?></a></td>
  </tr>          
  <?php endforeach;?>
  <?php } ?> 
  <?php if ($this->input->get('parent') == ''){ ?>
  <?php $numrow = 1; foreach($records as $row):?>             
  <tr align="center" id="n_tag">
    <td style="width:20px;"><?=$numrow++;?></a></td>
    <td><a href="javascript:Setasset('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>','<?=$row->v_designation?>')" ><?=$row->v_PersonalCode?></a></td>
    <td><a href="javascript:Setasset('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>','<?=$row->v_designation?>')" ><?=$row->v_PersonalName?></a></td>
    <td><a href="javascript:Setasset('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>','<?=$row->v_designation?>')" ><?=$row->v_designation?></a></td>
    <td><a href="javascript:Setasset('<?=$row->v_PersonalCode?>','<?=$row->v_PersonalName?>','<?=$row->v_designation?>')" ><?=number_format($row->v_hourlyrate,2)?></a></td>
  </tr>          
  <?php endforeach;?>
</table>
<?php } ?> 

<?php 
if ($this->input->get('parent') == 'woresponse' OR $this->input->get('parent') == 'wovisit1'){ 
  if ($this->input->get('v') == 'r' && $this->input->get('r') == '1' ){
  echo  '<script type="text/javascript">
        function Setworkorder(a_number,t_number,s_number,h_no,m_no) {
          var trate = (h_no * s_number) + (m_no * s_number / 60);
          var r1 = trate.toFixed(2);
          if (window.opener != null && !window.opener.closed) {
          var anumber = window.opener.document.getElementById("n_personnel_code1");
          anumber.value =  a_number;
          var anumber = window.opener.document.getElementById("n_personnel_name1");
          anumber.value =  t_number;
          var anumber = window.opener.document.getElementById("n_personnel_rate1");
          anumber.value =  s_number;
          var t_rate = window.opener.document.getElementById("T_rate1");
          t_rate.value =  r1;
          }
          window.close();
        }
      </script>';
  }
	else if ($this->input->get('v') == 'q' && $this->input->get('r') == '1' ){
  echo  '<script type="text/javascript">
        function Setworkorder(a_number,t_number,s_number,h_no,m_no) {
          var trate = (h_no * s_number) + (m_no * s_number / 60);
          var r1 = trate.toFixed(2);
          if (window.opener != null && !window.opener.closed) {
          var anumber = window.opener.document.getElementById("n_receipient");
          anumber.value =  t_number;
          }
          window.close();
        }
      </script>';
  }
  else if ($this->input->get('v') == 'r' && $this->input->get('r') == '2' ){
  echo  '<script type="text/javascript">
        function Setworkorder(a_number,t_number,s_number,h_no,m_no) {
          var trate = (h_no * s_number) + (m_no * s_number / 60);
          var r1 = trate.toFixed(2);
          if (window.opener != null && !window.opener.closed) {
          var anumber = window.opener.document.getElementById("n_personnel_code2");
          anumber.value =  a_number;
          var anumber = window.opener.document.getElementById("n_personnel_name2");
          anumber.value =  t_number;
          var anumber = window.opener.document.getElementById("n_personnel_rate2");
          anumber.value =  s_number;
          var t_rate = window.opener.document.getElementById("T_rate2");
          t_rate.value =  r1;
          }
          window.close();
        }
      </script>';
  }
  else if ($this->input->get('v') == 'r' && $this->input->get('r') == '3' ){
  echo  '<script type="text/javascript">
        function Setworkorder(a_number,t_number,s_number,h_no,m_no) {
          var trate = (h_no * s_number) + (m_no * s_number / 60);
          var r1 = trate.toFixed(2);
          if (window.opener != null && !window.opener.closed) {
          var anumber = window.opener.document.getElementById("n_personnel_code3");
          anumber.value =  a_number;
          var anumber = window.opener.document.getElementById("n_personnel_name3");
          anumber.value =  t_number;
          var anumber = window.opener.document.getElementById("n_personnel_rate3");
          anumber.value =  s_number;
          var t_rate = window.opener.document.getElementById("T_rate3");
          t_rate.value =  r1;
          }
          window.close();
        }
      </script>';
  }
  else if ($this->input->get('v') == 'r' && $this->input->get('r') == 'jc' ){
  echo  '<script type="text/javascript">
        function Setworkorder(a_number,t_number,s_number) {
          if (window.opener != null && !window.opener.closed) {
            var anumber = window.opener.document.getElementById("n_personnel_code");
            anumber.value =  a_number;
            var tag_number = window.opener.document.getElementById("n_personnel_name");
            tag_number.value = t_number;
            var snumber = window.opener.document.getElementById("n_Desig");
            snumber.value =s_number;
          /*var anumber = window.opener.document.getElementById("n_personnel_code1");
          anumber.value =  a_number;
          var anumber = window.opener.document.getElementById("n_personnel_name1");
          anumber.value =  t_number;*/
          }
          window.close();
        }
      </script>';
  } else {
  echo  '<script type="text/javascript">
        function Setworkorder(a_number,t_number,s_number) {
          if (window.opener != null && !window.opener.closed) {
          var anumber = window.opener.document.getElementById("n_personnel_code3");
          anumber.value =  a_number;
          var anumber = window.opener.document.getElementById("n_personnel_name3");
          anumber.value =  t_number;
          var anumber = window.opener.document.getElementById("n_personnel_rate3");
          anumber.value =  s_number;
          }
          window.close();
        }
      </script>';
  }
}
elseif ($this->input->get('pr') == 'update') {
    echo  '<script type="text/javascript">
        function ponumber(a_number,t_number) {
          if (window.opener != null && !window.opener.closed) {
          var anumber = window.opener.document.getElementById("code");
          anumber.value =  a_number;
          var anumber = window.opener.document.getElementById("code2");
          anumber.value =  t_number;
          }
          window.close();
        }
      </script>';
  }
elseif ($this->input->get('parent') == 'job') {
    echo  '<script type="text/javascript">
        function Setworkorder(a_number,t_number) {
          if (window.opener != null && !window.opener.closed) {
          var anumber = window.opener.document.getElementById("n_personnel_codej1");
          anumber.value =  a_number;
          var anumber = window.opener.document.getElementById("n_personnel_namej1");
          anumber.value =  t_number;
          }
          window.close();
        }
      </script>';
  }
else {
  echo  '<script type="text/javascript">
        function Setasset(a_number,t_number,s_number) {
            if (window.opener != null && !window.opener.closed) {
            var anumber = window.opener.document.getElementById("n_personnel_code");
            anumber.value =  a_number;
            var tag_number = window.opener.document.getElementById("n_personnel_name");
            tag_number.value = t_number;
            var snumber = window.opener.document.getElementById("n_Desig");
            snumber.value =s_number;
          //opener.document.f1.n1.value = document.n_tag_number.value;
          //opener.document.f1.n2.value = document.frm.c_name2.value;
            }
            window.close();
        }
    </script>';
  }
?>
<?php echo form_hidden ('parent',$this->input->get('parent')); ?>
<?php echo form_hidden ('v',$this->input->get('v')); ?>
<?php echo form_hidden ('r',$this->input->get('r')); ?>
</body>