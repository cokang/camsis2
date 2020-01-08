<?php echo form_open('contentcontroller/chronologyupdate?wrk_ord='.$this->input->get('wrk_ord'));?>
<script>
function fToggle(elementId,te) {
  $.get("<?php echo base_url ('index.php/ajaxchr') ?>?wrk_ord="+te ,"",function(data){


    //var today = format.Date("2009-12-18", "Test: dd/MM/yyyy");
    //console.log(today);
    var json = JSON.parse(data);
    var html = "" ;
    var trHTML = '<table class="ui-content-form" width="100%" border="0"> ';
    var i = 1;
    for (post in json) {
      for (test in json[post]) {
        if (elementId == json[post][test].n_Visit){
console.log(json);
      trHTML +="<tr>";
      trHTML +='<td class="td-assest">Date : </td>';
      trHTML +='<td>'+json['visitD'][elementId]+'</td>';
      trHTML +='<td rowspan="6" align="center"><a href="chronologyupdate?wrk_ord='+te+'&visit='+elementId+'" class="btn-button btn-primary-button" style="width:200px;">Update</a></td>';
      trHTML +='</tr>';
      trHTML +="<tr>";
      trHTML +='<td class="td-assest">Root Cause :</td>';
      trHTML +='<td>'+json[post][test].type_of_work+'</td>';
      trHTML +='</tr>';
      trHTML +="<tr>";
      trHTML +='<td valign="top" class="td-assest">Details Of Work Progress :</td>';
      trHTML +='<td>'+json[post][test].v_ActionTaken+'</td>';
      trHTML +='</tr>';
      trHTML +='<td valign="top" class="td-assest">Asset Movement :</td>';
      trHTML +='<td>'+json[post][test].V_AssetMovement+'</td>';
      trHTML +='</tr>';
      trHTML +='</table>';
      trHTML +='</td>';
      trHTML +='</tr>';

      trHTML +='<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;"></td></tr>';
      i++;
       }
      }
    }
    trHTML +="</table>";
    $('.visit'+elementId).html(trHTML);
  });
 var e = document.getElementById(elementId);
  //alert(e);
  var id = (elementId);
  //console.log(id);
  if (false == $(e).is(':visible')) {
    $(e).slideToggle('slow');
    $('span.icon[id="test2'+id+'"]').toggleClass("icon-plus icon-minus");
  }
  else {
    $(e).slideToggle('slow');
    $('span.icon[id="test2'+id+'"]').toggleClass("icon-plus icon-minus");
  }

};
</script>
<div class="ui-middle-screen">
  <div class="content-workorder" align="center">
      <table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
      <?php include 'content_wrk_ord.php';?>
      <tr class="ui-color-contents-style-1 ui-left_web">
        <td colspan="10" height="40px" style="padding-left:10px;">&nbsp;</td>
      </tr>

      <tr class="ui-color-contents-style-1">
        <td class="pd-bttm" width="40%" colspan="10" valign="top">
          <table width="98%" class="ui-content-middle-menu-workorder" style="">
            <tr class="ui-color-contents-style-1" height="30px">
              <td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Chronology +</span>&nbsp;<span style="float: right; padding-right:10px;"><button type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit"> Add <span class="icon-plus-circle" style="font-size:14px; margin-top:4px; margin-left:4px;"></span></button></span></td>

            </tr>
            <tr >
              <td class="ui-desk-style-table">
                <?php if ($records) { ?>
                <?php $rn = 0; foreach($records as $rows):?>
                <a href="javascript:void(0);" onclick="javascript:fToggle('<?=$rows->n_Visit?>', '<?=$this->input->get('wrk_ord')?>');" class='aajax'><span class='icon icon-plus' id="test2<?=$rows->n_Visit?>"></span> <?='Chronology '.$rows->n_Visit?>,  <?='Root Cause : '.$rows->type_of_work?></a><br />
                <div id="<?=$rows->n_Visit?>" class="visit<?=$rows->n_Visit?>" style="display: none; margin-left:20px;"></div>
                <?php endforeach;?>
                <?php } else { ?>
                <tr align="center" style="background:white; height:200px;">
                <td colspan="10"><span style="color:red;">NO CHRONOLOGY RECORDS FOUND FOR THIS WORK ORDER.</span></td>
                </tr>
                <?php } ?>
            </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>
</div>
<meta charset = "utf-8">
<style>
.aajax {
       cursor:pointer;
       margin: 10px 10px 5px 10px;
       display: inline-block;
}
.show{
  display: none;
}
div#content{
  margin: 10px;
}
span.icon {
    display : inline;
    margin-right:5px;
    font-size:12;
  padding-left:5px;
  color:black;
}
table.ajaxtbl{
  margin:5px 0px 15px 25px;
  color:black;
  border-collapse:collapse;
  width: 98%;
  text-align: center;
}
.class1
{
     color: orange;
}
</style>
<?php include 'content_jv_tbl.php';?>
