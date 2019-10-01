<?php if($this->input->get('btp') == 1){
$btp = $_SERVER['HTTP_REFERER'];
}else{
$btp = base_url().'index.php/contentcontroller/Schedule?m='.$this->input->get('m').'&y='.$this->input->get('y');
}
?>