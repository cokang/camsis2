
<?php $b = $this->session->userdata('accessr'); ?>
<div class="main-box ui-left_web">            
<?php 
	$mn = array("Work Modules" => "contentcontroller/content/", "Central Functions" => "contentcontroller/Central/",  "Business Intelligent Reports" => "contentcontroller/Business/", "System Administration" => "contentcontroller/sys_admin/","Procurement Modules" => "contentcontroller/Procurement/" );
	$color = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue');
	$nom = 0; 
	shuffle($color);
	foreach ($mn as $value => $apa) {
    if (!in_array($apa, $chkers)) 
	    {
	    	
	    	foreach($color as $d => $e ){
				if ($d == 1 and $value == 'Work Modules'){
					if ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) != 'contentcontroller/content/'){
					echo '<div class="box8">';
					echo '<div class="small-box '.$e.' ">';
					echo '<div class="inner" >';
					echo '<span class="wodryRX">WO|Response|PPM</span>';
					echo '<p>' .$value. '</p>';
					echo '</div>';
					echo '<div class="icon"><i class="icon-stats-bars"></i></div>';
					echo anchor ($apa.$this->session->userdata('usersess'). '?&tab='.$nom ,'More Info <i class="icon-arrow-right"></i>','class="small-box-footer"');
					echo '</div>';
					echo '</div>';
					}
	    		}
			    elseif ($d == 2 and $value == 'Central Functions'){
					if ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) != 'contentcontroller/Central/'){
					echo '<div class="box8">';
			    	echo '<div class="small-box '.$e.' ">';
			    	echo '<div class="inner">';
					echo '<span class="wodryRX1">VO|T&C|WARRANTY</span>';
			    	echo '<p>' .$value. '</p>';
			    	echo '</div>';
			    	echo '<div class="icon"><i class="icon-radio-unchecked"></i></div>';
					echo anchor ($apa.$this->session->userdata('usersess'). '?&tab='.$nom ,'More Info <i class="icon-arrow-right"></i>','class="small-box-footer"');
					echo '</div>';
					echo '</div>';
					}
	    		}
	    		elseif ($d == 0 and $value == 'Procurement Modules' ){
					if ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) != 'contentcontroller/Procurement/'){
					echo '<div class="box8">';
			    	echo '<div class="small-box '.$e.' ">';
			    	echo '<div class="inner">';
					echo '<span class="wodryRX2">MRIN| PO|MRIN</span>';
			    	echo '<p>' .$value. '</p>';
			    	echo '</div>';
			    	echo '<div class="icon"><i class="icon-cart"></i></div>';
					echo anchor ($apa.$this->session->userdata('usersess'). '?&tab='.$nom ,'More Info <i class="icon-arrow-right"></i>','class="small-box-footer"');
					echo '</div>';
					echo '</div>';
					}
	    		}
	    		elseif ($d == 4 and $value == 'Business Intelligent Reports'){
					if ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) != 'contentcontroller/Business/'){
					echo '<div class="box8">';
			    	echo '<div class="small-box '.$e.' ">';
			    	echo '<div class="inner">';
			    	echo '<span class="">&nbsp</span>';
			    	echo '<p>' .$value. '</p>';
			    	echo '</div>';
			    	echo '<div class="icon"><i class="icon-paste"></i></div>';
					echo anchor ($apa.$this->session->userdata('usersess'). '?&tab='.$nom ,'More Info <i class="icon-arrow-right"></i>','class="small-box-footer"');
					echo '</div>';
					echo '</div>';
					}
	    		}
				elseif ($d == 3 and $value == 'System Administration' and 'nezam' == $this->session->userdata('v_UserName')){
					if ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) != 'contentcontroller/sys_admin/'){
					echo '<div class="box8">';
			    	echo '<div class="small-box '.$e.' ">';
			    	echo '<div class="inner">';
			    	echo '<span class="h5">&nbsp</span>';
			    	echo '<p>' .$value. '</p>';
			    	echo '</div>';
			    	echo '<div class="icon"><i class="icon-paste"></i></div>';
					echo anchor ($apa.$this->session->userdata('usersess'). '?&tab='.$nom ,'More Info <i class="icon-arrow-right"></i>','class="small-box-footer"');
					echo '</div>';
					echo '</div>';
					}
	    		}
	    	}
			$nom++;

	    }
	}
?>
 </div>

<script>
    var counter = 0;
    
    $('.wodryRX').wodry({
        animation: 'rotateX',
        delay: 1000,
        animationDuration: 800
    });
		
		$('.wodryRX1').wodry({
        animation: 'rotateX',
        delay: 2000,
        animationDuration: 800
    });
		
		$('.wodryRX2').wodry({
        animation: 'rotateX',
        delay: 3000,
        animationDuration: 800
    });
    
    </script>
