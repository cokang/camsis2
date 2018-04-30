<?php

if ($this->input->get('parent') == 'asset' or 'contentcontroller/assetsearch/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2) or 'contentcontroller/assets/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<div class='main-head-m4 bg-aqua' id='show2'><span class='icon-search' onclick='showDiv()'></span></div>";
}
elseif ($this->input->get('parent') == 'desk' or $this->input->get('desk') or 'contentcontroller/desksearch/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2) or 'contentcontroller/desk/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<div class='main-head-m4 bg-aqua' id='show2'><span class='icon-search' onclick='showDiv()'></span></div>";
}
elseif ($this->input->get('parent') == 'wrkodr' or $this->input->get('work-a') or 'contentcontroller/workorder/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2) or 'contentcontroller/worksearch/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<div class='main-head-m4 bg-aqua' id='show2'><span class='icon-search' onclick='showDiv()'></span></div>";
}
elseif ($this->input->get('ppm') or 'contentcontroller/catalogppm/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)  or 'contentcontroller/ppmsearch/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<div class='main-head-m4 bg-aqua' id='show2'><span class='icon-search' onclick='showDiv()'></span></div>";
}
?>