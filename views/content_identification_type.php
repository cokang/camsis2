<?php
  $opt = $_GET['opt'];
 
  switch($opt)
  {
    case 0:
    default:
      echo '
            <option>Select an Option...</option>
           ';
        break;
    case 1:
      echo '
            <table style="width:100%;border:0px solid #999999;border-collapse:collapse;" border="0" align="center">
    <tr align="center" class="ui-menu-color-header" style="font-weight:bold;">
      <td style="width:20px;">No</td>
      <td style="width:150px;">Agency</td>
      <td style="width:60px;">License Category</td>
    </tr>
  </table>
</div>
<div style="height:;overflow:auto;border:0px solid #999999;">
  <table style="width:100%;border:0px solid #999999;border-collapse:collapse;" align="center">
    
    <tr align="center">
      <td style="width:20px;"><?=$row->id?></a></td>
      <td style="width:150px;">dsdcsdc</td>
      <td style="width:60px;">csdcsdc</td>
    </tr>
    
  </table>
           ';
        break;
    case 2:
      echo '
           <table border="1">
			<tr>
				<td>bangla</td>
			</tr>
		   </table>
           ';
        break;
  }
?>