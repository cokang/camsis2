<?php

if ($this->input->get('parent') == 'asset' or 'contentcontroller/assetsearch/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2) or 'contentcontroller/assets/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<form action=".$url = site_url('contentcontroller/assetsearch')." method='post' id='myform'>";
	echo "<div class='search-form'>";
	echo "<div class='form-group'>";
	echo "<input type='text' class='form-control login-field' autofocus='autofocus' id='searchquestion' placeholder='Search Assets' name='searchquestion' size='22' style='height:50px;'/>"; 
	echo "<label class='login-field-icon' for='login-pass' style='margin-top:10px;'><span align='center' class='icon-search' style='color:; margin-left:-35px;' id='mylink'></span></label>";
	echo "</div>";
	echo "</div></form>";
}
elseif ($this->input->get('parent') == 'desk' or $this->input->get('desk') or 'contentcontroller/desksearch/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2) or 'contentcontroller/desk/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<form action=".$url = site_url('contentcontroller/desksearch')." method='post' id='myform'>";
	echo "<div class='search-form'>";
	echo "<div class='form-group'>";
	echo "<input type='text' class='form-control login-field' id='searchquestion' placeholder='Search Help Desk' name='searchquestion' size='22' style='height:50px;'/>"; 
	echo "<label class='login-field-icon' for='login-pass' style='margin-top:10px;'><span align='center' class='icon-search' style='color:; margin-left:-35px;' id='mylink'></span></label>";
	echo "</div>";
	echo "</div></form>";
}
elseif ($this->input->get('work-a') or 'contentcontroller/workorder/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2) or 'contentcontroller/worksearch/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<form action=".$url = site_url('contentcontroller/worksearch')." method='post' id='myform'>";
	echo "<div class='search-form'>";
	echo "<div class='form-group'>";
	echo "<input type='text' class='form-control login-field' id='searchquestion' placeholder='Search Work Order' name='searchquestion' size='22' style='height:50px;'/>"; 
	echo "<label class='login-field-icon' for='login-pass' style='margin-top:10px;'><span align='center' class='icon-search' style='color:; margin-left:-35px;' id='mylink'></span></label>";
	echo "</div>";
	echo "</div></form>";
}
elseif ($this->input->get('ppm') or 'contentcontroller/catalogppm/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)  or 'contentcontroller/ppmsearch/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<form action=".$url = site_url('contentcontroller/ppmsearch')." method='post' id='myform'>";
	echo "<div class='search-form'>";
	echo "<div class='form-group'>";
	echo "<input type='text' class='form-control login-field' id='searchquestion' placeholder='Search PPM ' name='searchquestion' size='22' style='height:50px;'/>"; 
	echo "<label class='login-field-icon' for='login-pass' style='margin-top:10px;'><span align='center' class='icon-search' style='color:; margin-left:-35px;' id='mylink'></span></label>";
	echo "</div>";
	echo "</div></form>";
}
elseif ('contentcontroller/Store/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){
	echo "<form action=".$url = site_url('contentcontroller/Store')." method='post' id='myform'>";
	echo "<div class='search-form'>";
	echo "<div class='form-group'>";
	echo "<input type='text' class='form-control login-field' autofocus='autofocus' id='searchquestion' placeholder='Search Item Catalog' name='searchquestion' size='22' style='height:50px;'/>"; 
	echo "<label class='login-field-icon' for='login-pass' style='margin-top:10px;'><span align='center' class='icon-search' style='color:; margin-left:-35px;' id='mylink'></span></label>";
	echo "</div>";
	echo "</div></form>";
}
?>
<?php $array = [['contentcontroller/assets/'],
				['contentcontroller/assetsearch/'],
				['contentcontroller/desksearch/'],
				['contentcontroller/workorder/'],
				['contentcontroller/worksearch/'],
				['contentcontroller/ppmsearch/'],
				['contentcontroller/catalogppm/'],
				['contentcontroller/Store/'],
]?>
<?php foreach ($array as $list) {?>
<?php if($list[0] == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){?>
<script>
window.onload = function() {
    document.getElementById('mylink').onclick = function() {
        document.getElementById('myform').submit();
        return false;
    };
};
</script>
<?php } }?>
