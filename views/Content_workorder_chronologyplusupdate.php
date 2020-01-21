<?php echo form_open('wo_chronology_update_ctrl');?>
<?php $numberdate = 0; ?>
<div class="ui-middle-screen">
  <div class="content-workorder" align="center">
            <div class="div-p"></div>
    <table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="92%" border="0">
      <tr class="ui-color-contents-style-1" height="40px">
        <td class="ui-header-new" colspan="2"><b><?php if ($this->input->get('visit') != ''){echo 'Update';}else{echo 'Add';}?> Chronology Plus</b></td>
                        <span style="color:red;"><?php echo validation_errors(); ?>
      </tr>

      <tr>
        
        <td class="td-assest" valign="top">Summary Root Cause : </td>
        <td >
        <!-- <div class="form-group">
                <select name="summaryrc" class="form-control" style="width:350px">
                <option value="">--- Select Cause ---</option>
                    <?php
                        foreach ($rc as $key => $value) {
                            echo "<option value='".$value->id."'>".$value->nama."</option>";
                        }
                    ?>
                </select>
            </div> -->
           
            <?php echo form_dropdown('parent_rc', $rc_parent, set_value('parent_rc',isset($records[0]->v_ReschAuthBy) == TRUE ? $records[0]->nama : 'N/A') , 'class="dropdown n_wi-date" id="parentText"'); ?>

           
        </td>
      </tr>
                      
      <tr>
      <td class="td-assest" valign="top">Root Cause : </td>
        <td >
 <div class="form-group" >
                <select name="n_Type_of_Work" class="dropdown n_wi-date" >
                <?php if(isset($records[0]->v_ReschAuthBy) == TRUE){ 
                  foreach($dbroot as $root){
                    if($records[0]->v_ReschAuthBy==$root->id){
                      echo "<option selected value='".$root->id."'>".$root->nama."</option>";
                    }else{
                      echo "<option value='".$root->id."'>".$root->nama."</option>";
                    }
                  ?>
                <?php }}?>
                </select>
            </div>
         
                      </td>
                      </tr>
                      <tr>
                      <td class="td-assest" valign="top">Assign To : </td> 
                      <td> <div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
                                    <input type="text" id="n_personnel_code3" name="assignapsb" value="<?php echo set_value('assignapsb',isset($records[0]->standby1) == TRUE ? $records[0]->standby1 : 'N/A')?>" size="10" class="form-control-button2" readonly>
                                    <span class="icon-windows" onclick="fCalldetailname(this)" value="woresponse&v=r&r=4"></span>
                                    <span style="font-size:14px;"><input type="text" id="n_personnel_name3" name="assignname" value="<?php echo set_value('assignname',isset($records[0]->standby2) == TRUE ? $records[0]->standby2 : '')?>" size="10" class="input-none" readonly></span></div></td></tr>
                      <tr>
      <td class="td-assest" valign="top">Asset movement Internal : </td> 
        <td >
        <?php echo form_dropdown('movement', $movement,set_value('movement',isset($records[0]->V_AssetMovement)?$records[0]->V_AssetMovement:'', ( !empty($movement) && $movement == isset($records[0]->V_AssetMovement)?$records[0]->V_AssetMovement:'' ? TRUE : FALSE ))  , 'class="dropdown n_wi-date" id="assetmovement"'); ?>
                      </td>
                      </tr>
    
      <tr>
        <td class="td-assest" valign="top">Details Of Work Progress : </td>
        <td><textarea class="input n_com" name="n_Action_Taken"><?php echo set_value('n_Action_Taken', isset($records[0]->v_ActionTaken) == TRUE ? $records[0]->v_ActionTaken : 'N/A')?></textarea></td>
      </tr>
			   <tr>
			    <td colspan="3" class="closedwo"></td>
			   </tr>
      <tr class="ui-header-new" style="height:40px;">
        <td align="center" colspan="2">
          <input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Confirm">
        </td>
      </tr>
    </table>
    <?php  echo form_hidden('wrk_ord',$this->input->get_post('wrk_ord')); ?>
    <?php  echo form_hidden('visit',$this->input->get_post('visit')); ?>
<script>
$(document).ready(function() {
  //alert(id);
    $('#closed').change(function() {
        if ($(this).prop('checked')) {
      $(".closedwo").show();
            $(".closedwo").load('<?php  if ($this->uri->slash_segment(1) == "contentcontroller/") {
                                      echo "visitclosed";

                                      }elseif (($this->uri->slash_segment(1) != "contentcontroller/") && ($this->uri->slash_segment(2) != "/")){
                                      echo "../contentcontroller/visitclosed";
                                      }
                                      else {
                                        echo "contentcontroller/visitclosed";

                                      }
                                      ?>?wrk_ord=<?=$this->input->get("wrk_ord")?>'); //checked
        }
        else {
            $(".closedwo").hide(); //not checked
        }
    });
});
</script>
<script>



$(document).ready(function() {
        $('select[name="parent_rc"]').on('change', function() {
            //var sumrcID = $(this).val();
            var skillsSelect = document.getElementById("parentText");
            var selectedText = skillsSelect.options[skillsSelect.selectedIndex].text;
            //  alert(selectedText); //exit();
            if(selectedText) {
                $.ajax({
                    url: 'rootChild/'+selectedText,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="n_Type_of_Work"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="n_Type_of_Work"]').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="n_Type_of_Work"]').empty();
                
            }
        });
    });

  if ($ ('#closed:checked').val() !== undefined ){
         $(".closedwo").load('<?php  if ($this->uri->slash_segment(1) == "contentcontroller/") {
                                      echo "visitclosed";

                                      }elseif (($this->uri->slash_segment(1) != "contentcontroller/") && ($this->uri->slash_segment(2) != "/")){
                                      echo "../contentcontroller/visitclosed";
                                      }
                                      else {
                                        echo "contentcontroller/visitclosed";

                                      }
                                      ?>?wrk_ord=<?=$this->input->get("wrk_ord")?>');
        }
        else {
            $(".closedwo").hide(); //not checked
        }
</script>
  </div>
      <?php include 'ajaxtime.php';?>
      <?php include 'content_jv_popup.php';?>
</div>
<?php echo form_close(); ?>
