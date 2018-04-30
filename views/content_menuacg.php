<?php if ( 'contentcontroller/acg_modulesf/' == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)){?>
<?php $autocolor = array('bg-purple', 'bg-red', 'bg-yellow', 'bg-aqua', 'bg-light-blue'); shuffle($autocolor); ?>
	<span style='display:block; padding:5px;'>
	<?php echo anchor ('contentcontroller/acg'  , '<button class="btn-button btn-primary-button '.$autocolor[1].'" style="width:100%; height:33px;">Parameter Setup </button>'); ?>
	</span>
	<span style='display:block; padding:5px;'>
	<?php echo anchor ('contentcontroller/acg_modulesf?tabIndex=1'  , '<button class="btn-button btn-primary-button '.$autocolor[2].'" style="width:100%; height:33px;">Request</button>'); ?>
	</span>
	<span style='display:block; padding:5px;'>
	<?php echo anchor ('contentcontroller/acg_report?tabIndex=1'  , '<button class="btn-button btn-primary-button '.$autocolor[3].'" style="width:100%; height:33px;">Report </button>'); ?>
	</span>
	<span style='display:block; padding:5px;'>
	<?php echo anchor ('contentcontroller/acg_modulesf?tabIndex=1'  , '<button class="btn-button btn-primary-button '.$autocolor[4].'" style="width:100%; height:33px;">PPM</button>'); ?>
	</span>
	<span style='display:block; padding:5px;'>
	<?php echo anchor ('contentcontroller/acg_modulesf?tabIndex=1'  , '<button class="btn-button btn-primary-button '.$autocolor[0].'" style="width:100%; height:33px;">Complaint </button>'); ?>
	</span>
<?php } ?>