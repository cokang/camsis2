<?php

if ($this->input->get('parent') == 'asset' or 'contentcontroller/assetsearch/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2) or 'contentcontroller/assets/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<form action=".$url = site_url('contentcontroller/assetsearch')." method='post' name='myform'>";
	echo "<input type='text' class='phone-search' style='' placeholder='Search' id='searchquestion' name='searchquestion' autofocus/>";
    echo "<span class='icon-search'  onclick='myform.submit()' aria-hidden='true'></span>
</form>";
}
elseif ($this->input->get('parent') == 'desk' or $this->input->get('desk') or 'contentcontroller/desksearch/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2) or 'contentcontroller/desk/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<form action=".$url = site_url('contentcontroller/desksearch')." method='post' name='myform'>";
	echo "<input type='text' class='phone-search' style='' placeholder='Search' id='searchquestion' name='searchquestion' autofocus/>";
    echo "<span class='icon-search' onclick='myform.submit()' aria-hidden='true'></span>
</form>";
}
elseif ($this->input->get('parent') == 'wrkodr' or $this->input->get('work-a') or 'contentcontroller/workorder/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2) or 'contentcontroller/worksearch/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<form action=".$url = site_url('contentcontroller/worksearch')." method='post' name='myform'>";
	echo "<input type='text' class='phone-search' style='' placeholder='Search' id='searchquestion' name='searchquestion' autofocus/>";
    echo "<span class='icon-search' onclick='myform.submit()' aria-hidden='true'></span>
</form>";
}
elseif ($this->input->get('ppm') or 'contentcontroller/catalogppm/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)  or 'contentcontroller/ppmsearch/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<form action=".$url = site_url('contentcontroller/ppmsearch')." method='post' name='myform'>";
	echo "<input type='text' class='phone-search' style='' placeholder='Search' id='searchquestion' name='searchquestion' autofocus/>";
    echo "<span class='icon-search' onclick='myform.submit()' aria-hidden='true'></span>
</form>";
}
?>