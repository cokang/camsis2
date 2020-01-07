<!DOCTYPE html>
<html lang = "en">

   <head>
      <meta charset = "utf-8">
      <title>Reset MIRN</title>
   </head>

   <body>
      <?php
         echo $this->session->flashdata('reset_sent');
         echo form_open('/resetmirn/send_mirn');
         if ($this->session->userdata('v_UserName') == "harun") {
           $ekses = "";
         } else {
           $ekses = "disabled";
           header('Location:  base_url();../contentcontroller/Procurement/BES?&tab=4');
         }
      ?>

      <input type = "text" name = "mirn" required <?=$ekses?>/>
      <input type = "submit" value = "RESET MIRN" <?=$ekses?>/>

      <button onclick="location.href = '<?php base_url();?>../contentcontroller/Procurement/BES?&tab=4';" id="myButton" class="float-left submit-button" >Back</button>

      <?php
         echo form_close();
      ?>
   </body>

</html>
