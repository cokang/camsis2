<?php
class Vo3_ratesfee_update_ctrl extends CI_Controller{
    
    public function index(){
        
    // load libraries for URL and form processing
    $this->load->helper(array('form', 'url'));
    
    $Tloops = $this->input->post('loop');

    for ($loop = 1; $loop <= $Tloops; $loop++){

        $vvfID = $this->input->post($loop.'vvfID');
        $oldRDW = $this->input->post($loop.'oldRDW');
        $oldRPW = $this->input->post($loop.'oldRPW');
        $RDW = $this->input->post($loop.'RDW');
        $RPW = $this->input->post($loop.'RPW');
        $FDW = $this->input->post($loop.'FDW');
        $FPW = $this->input->post($loop.'FPW');

        if ($oldRDW <> $RDW OR $oldRPW <> $RPW){
            $updateProceed = 'true';
            //echo $loop;
            //echo $updateProceed;
        }
        else{
            $updateProceed = 'false';
            //echo $loop;
            //echo $updateProceed;
        }

        if ($updateProceed == 'true'){
        
        /*for ($x=$loop;$x<=$Tloops;$x++){
            echo $x;
        }*/
        $insert_data = array(
                        'vvfID' => $vvfID,
                        'vvfRateDW' => $RDW,
                        'vvfRatePW' => $RPW,
                        'vvfFeeDW' => $FDW,
                        'vvfFeePW' => $FPW,
                        'vvfActionflag' => 'U',
                        'vvfTimestamp' => date('Y-m-d H:i:s')
        
        );
        $this->load->model('update_model');
        $this->update_model->vo3_ratefee_update($vvfID,$insert_data);
        
        }
    }
    $rpt_no = $this->input->post('rpt_no');
    redirect('contentcontroller/vo3_Rates?rpt_no='.$rpt_no.'&vo=3');
    }

}
?>