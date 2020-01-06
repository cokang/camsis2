<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class resetmirn extends CI_Controller {

    public function index()
    {
        $this->load->helper('form');
        $this->load->view('content_resetmirn');
    }
    public function send_mirn() {
        $mirn = $this->input->post('mirn');
        //echo "lalalalal : " . $to_email;
        //exit();
        if ($mirn != "") {
          //echo "dier masuk";
          //exit();
        $this->load->model('update_model');
             $query = $this->update_model->resetmirn($mirn,'6');
        if($query > 0) {
        $this->session->set_flashdata("reset_sent","MIRN Resetted");
                echo $mirn . " Resetted";
        $this->load->view('content_resetmirn');}
        else {
        $this->session->set_flashdata("reset_sent","MIRN reset Failed");
                echo $mirn . " reset failed";
        $this->load->view('content_resetmirn'); } } else {
          $this->session->set_flashdata("reset_sent","Please key in MIRN");
                  echo $mirn . " reset failed no MIRN";
          $this->load->view('content_resetmirn');
        }
     }

}

/* End of file Controllername.php */

?>