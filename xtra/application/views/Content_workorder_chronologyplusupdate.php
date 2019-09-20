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
           
            <?php echo form_dropdown('parent_rc', $rc_parent, set_value('parent_rc',isset($record[0]->v_ReschAuthBy) == TRUE ? $record[0]->v_ReschAuthBy : 'N/A') , 'class="dropdown n_wi-date" id="parentText"'); ?>

           
        </td>
      </tr>
                      
      <tr>
      <td class="td-assest" valign="top">Root Cause : </td>
        <td >
 <div class="form-group" >
                <select name="n_Type_of_Work" class="dropdown n_wi-date" >
                  <option value="">Please Select</option>
                </select>
            </div>
         
                      </td>
                      </tr>
     
      <tr>
        <td class="td-assest" valign="top">Details Of Work Progress : </td>
        <td><textarea class="input n_com" name="n_Action_Taken"><?php echo set_value('n_Action_Taken', isset($record[0]->v_ActionTaken) == TRUE ? $record[0]->v_ActionTaken : 'N/A')?></textarea></td>
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
                        if (selectedText=='Please Select'){
              $('select[name="n_Type_of_Work"]').append('<option value="">Please Select</option>');
            }
                        $.each(data, function(key, value) {
                            $('select[name="n_Type_of_Work"]').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                    }
                });
            }
            else{
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
      <!-- <?php include 'rootcause.php';?> -->
</div>
<?php echo form_close(); ?>
