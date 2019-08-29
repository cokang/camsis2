<?php echo form_open('contentcontroller/visitplusupdate?wrk_ord='.$this->input->get('wrk_ord'));?>
<script>
function fToggle(elementId,te) {
  $.get("<?php echo base_url ('index.php/ajax')?>?wrk_ord="+te ,"",function(data){

    
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
      trHTML +='<td class="td-assest">Visit Date <?= (strstr($wrk_ord, '/A2/')) ? '/ Schedule Date' : ''?> : </td>';
      trHTML +='<td>'+json['visitD'][elementId]+'</td>';
      trHTML +='<td rowspan="6" align="center"><a href="visitplusupdate?wrk_ord='+te+'&visit='+elementId+'" class="btn-button btn-primary-button" style="width:200px;">Update</a></td>';
      trHTML +='</tr>';
      trHTML +="<tr>";
      trHTML +='<td class="td-assest">Start Time :</td>';
      trHTML +='<td>'+json[post][test].v_Time+'</td>';
      trHTML +='</tr>';
      trHTML +="<tr>";
      trHTML +='<td class="td-assest">End Time :</td>';
      trHTML +='<td>'+json[post][test].v_Etime+'</td>';
      trHTML +='</tr>';
      trHTML +="<tr>";
      trHTML +='<td class="td-assest">Type of Work :</td>';
      trHTML +='<td>'+json[post][test].type_of_work+'</td>';
      trHTML +='</tr>';
      trHTML +="<tr>";
      trHTML +='<td class="td-assest">Total Time Taken :</td>';
      trHTML +='<td>'+json['time_comp'][elementId]+'</td>';
      trHTML +='</tr>';
      trHTML +="<tr>";
      trHTML +='<td valign="top" class="td-assest">Action Taken :</td>';
      trHTML +='<td>'+json[post][test].v_ActionTaken+'</td>';
      trHTML +='</tr>';
      trHTML +='<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Reschedule</td></tr>';
      trHTML +='<td valign="top" class="td-assest">Reschedule Date :</td>';
      trHTML +='<td>'+json['d_Resc'][elementId]+'</td>';
      trHTML +='</tr>';
      trHTML +='<td valign="top" class="td-assest">Reschedule Reason :</td>';
      trHTML +='<td>'+json[post][test].v_ReschReason+'</td>';
      trHTML +='</tr>';
      trHTML +='<td valign="top" class="td-assest">Reschedule Authorised By :</td>';
      trHTML +='<td>'+json[post][test].v_ReschAuthBy+'</td>';
      trHTML +='</tr>';
      trHTML +='<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Personnel</td></tr>';
      trHTML +='<tr style="height:20px;" class="ui-left_web"><td style="width:20%;">&nbsp;</td>';
      trHTML +='<td colspan="2">';
      trHTML +='<table style="color:black;" width="100%">';
      trHTML +='<tr style="font-weight: bold;">';
      trHTML +='<td width="15%">Code</td><td width="35%">Name</td><td width="20%">Hours or RM </td><td width="15%">Rate</td><td width="15%">Total</td>';
      trHTML +='</tr>';
      trHTML +='</table>';
      trHTML +='</td>';
      trHTML +='</tr>';
      trHTML +='<tr style="height:20px;" class="ui-left_web"><td style="width:20%;">Technical In Charge 1 :</td>';
      trHTML +='<td colspan="2">';
      trHTML +='<table style="color:black;" width="100%">';
      trHTML +='<tr>';
      trHTML +='<td width="15%">'+json['P1personal'][elementId][0]+'</td><td width="35%">'+json['P1personal'][elementId][1]+'</td><td width="20%">'+json['P1time'][elementId][0]+' hr '+json['P1time'][elementId][1]+' min </td><td width="15%"> RM '+json['P1Rate'][elementId]+'</td><td width="15%"> RM '+json['P1Trate'][elementId]+'</td>';
      trHTML +='</tr>';
      trHTML +='</table>';
      trHTML +='</td>';
      trHTML +='</tr>';
      trHTML +='<tr style="height:20px;" class="ui-left_web"><td style="width:20%;">Technical In Charge 2 :</td>';
      trHTML +='<td colspan="2">';
      trHTML +='<table style="color:black;" width="100%">';
      trHTML +='<tr>';
      trHTML +='<td width="15%">'+json['P2personal'][elementId][0]+'</td><td width="35%">'+json['P2personal'][elementId][1]+'</td><td width="20%">'+json['P2time'][elementId][0]+' hr '+json['P2time'][elementId][1]+' min </td><td width="15%"> RM '+json['P2Rate'][elementId]+'</td><td width="15%"> RM '+json['P2Trate'][elementId]+'</td>';
      trHTML +='</tr>';
      trHTML +='</table>';
      trHTML +='</td>';
      trHTML +='</tr>';
      trHTML +='<tr style="height:20px;" class="ui-left_web"><td style="width:20%;">Technical In Charge 3 :</td>';
      trHTML +='<td colspan="2">';
      trHTML +='<table style="color:black;" width="100%">';
      trHTML +='<tr>';
      trHTML +='<td width="15%">'+json['P3personal'][elementId][0]+'</td><td width="35%">'+json['P3personal'][elementId][1]+'</td><td width="20%">'+json['P3time'][elementId][0]+' hr '+json['P3time'][elementId][1]+' min </td><td width="15%"> RM '+json['P3Rate'][elementId]+'</td><td width="15%"> RM '+json['P3Trate'][elementId]+'</td>';
      trHTML +='</tr>';
      trHTML +='</table>';
      trHTML +='</td>';
      trHTML +='</tr>';
      trHTML +='<tr style="height:20px;" class="ui-left_web"><td style="width:20%;">Part Replaced :</td>';
      trHTML +='<td colspan="2">';
      trHTML +='<table style="color:black;" width="100%">';
      trHTML +='<tr>';
      trHTML +='<td width="15%"></td><td width="35%">'+json[post][test].v_PartName+'</td><td width="20%"> RM '+json['PartRM'][elementId]+'</td><td width="15%">'+json[post][test].n_PartAmount+'</td><td width="15%"> RM '+json['PartTrate'][elementId]+'</td>';
      trHTML +='</tr>';
      trHTML +='</table>';
      trHTML +='</td>';
      trHTML +='</tr>';
      trHTML +='<tr style="height:20px;" class="ui-left_web"><td style="width:20%;">Vendor Parts (Total) :</td>';
      trHTML +='<td colspan="2">';
      trHTML +='<table style="color:black;" width="100%">';
      trHTML +='<tr>';
      trHTML +='<td width="15%">'+json['Vendor'][elementId][0]+'</td><td width="35%">'+json['Vendor'][elementId][1]+'</td><td width="20%"></td><td width="15%"></td><td width="15%"></td>';
      trHTML +='</tr>';
      trHTML +='</table>';
      trHTML +='</td>';
      trHTML +='</tr>';
	  if ( screen.width <= '1024' ) {
	  trHTML +='<tr class="">';
      trHTML +='<td class="td-assest bg-navy" colspan="3" style="text-align:center;">Technical In Charge 1</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Code :</td><td colspan="2" align="left">'+json['P1personal'][elementId][0]+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Name :</td><td colspan="2" align="left">'+json['P1personal'][elementId][1]+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Hours or RM :</td><td colspan="2" align="left">'+json['P1time'][elementId][0]+' hr '+json['P1time'][elementId][1]+'min</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Rate :</td><td colspan="2" align="left">RM '+json['P1Rate'][elementId]+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Total :</td><td colspan="2" align="left">RM '+json['P1Trate'][elementId]+'</td>';
      trHTML +='</tr>';
	  trHTML +='<tr class="">';
      trHTML +='<td class="td-assest bg-navy" colspan="3" style="text-align:center;">Technical In Charge 2</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Code :</td><td colspan="2" align="left">'+json['P2personal'][elementId][0]+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Name :</td><td colspan="2" align="left">'+json['P2personal'][elementId][1]+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Hours or RM :</td><td colspan="2" align="left">'+json['P2time'][elementId][0]+' hr '+json['P2time'][elementId][1]+'min</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Rate :</td><td colspan="2" align="left">RM '+json['P2Rate'][elementId]+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Total :</td><td colspan="2" align="left">RM '+json['P2Trate'][elementId]+'</td>';
      trHTML +='</tr>';
	  trHTML +='<tr class="">';
      trHTML +='<td class="td-assest bg-navy" colspan="3" style="text-align:center;">Technical In Charge 3</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Code :</td><td colspan="2" align="left">'+json['P3personal'][elementId][0]+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Name :</td><td colspan="2" align="left">'+json['P3personal'][elementId][1]+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Hours or RM :</td><td colspan="2" align="left">'+json['P3time'][elementId][0]+' hr '+json['P3time'][elementId][1]+'min</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Rate :</td><td colspan="2" align="left">RM '+json['P3Rate'][elementId]+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Total :</td><td colspan="2" align="left">RM '+json['P3Trate'][elementId]+'</td>';
      trHTML +='</tr>';
	  trHTML +='<tr class="">';
      trHTML +='<td class="td-assest bg-navy" colspan="3" style="text-align:center;">Part Replaced </td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Name :</td><td colspan="2" align="left">'+json[post][test].v_PartName+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Hours or RM :</td><td colspan="2" align="left">RM '+json['PartRM'][elementId]+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Rate :</td><td colspan="2" align="left">RM '+json[post][test].n_PartAmount+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Total :</td><td colspan="2" align="left">RM '+json['PartTrate'][elementId]+'</td>';
      trHTML +='</tr>';
	  trHTML +='<tr class="">';
      trHTML +='<td class="td-assest bg-navy" colspan="3" style="text-align:center;">Vendor Parts (Total) </td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Code :</td><td colspan="2" align="left">'+json['Vendor'][elementId][0]+'</td>';
      trHTML +='</tr>';
	  trHTML +="<tr>";
      trHTML +='<td class="td-assest" valign="top">Name :</td><td colspan="2">'+json['Vendor'][elementId][1]+'</td>';
      trHTML +='</tr>';
	  }
      trHTML +='<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;"></td></tr>';
      trHTML +='<tr><td width="15%"></td><td style="font-weight: bold; width:30%; text-align:right;">Updated By:</td><td width="20%">'+json['takenby'][elementId]+'</tr>';
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
	   <?php if (strstr($wrk_ord, '/A2/')) {	?>
	   <?php include 'content_wrk_ord.php';?>
	   <?php } else { ?>
	   <?php include 'content_tab_woppm.php';?>
	   <?php } ?>
      <tr class="ui-color-contents-style-1 ui-left_web">
        <td colspan="10" height="40px" style="padding-left:10px;">&nbsp;</td>
      </tr>
        
      <tr class="ui-color-contents-style-1">
        <td class="pd-bttm" width="40%" colspan="10" valign="top">
          <table width="98%" class="ui-content-middle-menu-workorder" style="">
            <tr class="ui-color-contents-style-1" height="30px">
              <?php if ($recordjob) { ?>
              <td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Visit +</span>&nbsp;<span style="float: right; padding-right:10px;"><button type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" disabled> Add <span class="icon-plus-circle" style="font-size:14px; margin-top:4px; margin-left:4px;"></span></button></span>&nbsp;<span style="color:red; float: right; font-size: 14px; margin-top:8px; margin-right:8px; display:inline-block;">Add is disabled when Job Close.</span></td>
              <?php } else { ?>
              <td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Visit +</span>&nbsp;<span style="float: right; padding-right:10px;"><button type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit"> Add <span class="icon-plus-circle" style="font-size:14px; margin-top:4px; margin-left:4px;"></span></button></span></td>
              <?php } ?>
            </tr>
            <tr >
              <td class="ui-desk-style-table">
                <?php if ($records) { ?>
                <?php $rn = 0; foreach($records as $rows):?>
                <a href="javascript:void(0);" onclick="javascript:fToggle('<?=$rows->n_Visit?>', '<?=$this->input->get('wrk_ord')?>');" class='aajax'><span class='icon icon-plus' id="test2<?=$rows->n_Visit?>"></span> <?='Visit '.$rows->n_Visit?>, <?='Start Time: '.$rows->v_Time?>, <?='End Time: '.$rows->v_Etime?>, <?='Type of Work: '.$rows->type_of_work?></a><br />
                <div id="<?=$rows->n_Visit?>" class="visit<?=$rows->n_Visit?>" style="display: none; margin-left:20px;"></div>
                <?php endforeach;?>
                <?php } else { ?>
                <tr align="center" style="background:white; height:200px;">
                <td colspan="10"><span style="color:red;">NO VISIT RECORDS FOUND FOR THIS WORK ORDER.</span></td>
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