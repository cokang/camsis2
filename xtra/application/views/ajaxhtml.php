<html>
<body>
<table class="ui-content-form-reg" style="">
  <tr style="color:white;" height="30px">
    <td colspan="2" class="ui-header-new"><b>Type</b></td>
  </tr>

  <tr >
    <td class="ui-desk-style-table">
      <table class="ui-content-form" width="100%" border="0">

        <tr>
          <td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Type:</td>
          <td style="padding-left:10px; padding-top:5px;" valign="top">

            <input type="radio" id="radioh-1" name="n_type" class="regular-radio" value="BER" <?php echo set_radio('n_request_type', 'BER',true); ?>/>
            <label for="radioh-1"></label> BER<br>
            <input type="radio" id="radioh-2" name="n_type" class="regular-radio" value="CA" <?php echo set_radio('n_request_type', 'CA'); ?>/>
            <label for="radioh-2"></label> CA<br>
            <input type="radio" id="radioh-3" name="n_type" class="regular-radio" value="LCA" <?php echo set_radio('n_request_type', 'LCA'); ?>/>
            <label for="radioh-3"></label> LCA<br>
            <input type="radio" id="radioh-4" name="n_type" class="regular-radio" value="RW" <?php echo set_radio('n_request_type', 'RW'); ?>/>
            <label for="radioh-4"></label> RW<br>
            <input type="radio" id="radioh-5" name="n_type" class="regular-radio" value="SNP" <?php echo set_radio('n_request_type', 'SNP'); ?>/>
            <label for="radioh-5"></label> Safety & Procedure<br>

          </td>
        </tr>

      </table>
    </td>
  </tr>

</table>

</body>
</html>
