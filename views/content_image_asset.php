
<link rel="stylesheet" href="<?php echo base_url(); ?>css/idangerous.swiper.css">
  <style>
/* Demo Styles */
.swiper-container {
  height: 150px;
  width: 355px;
  color: #fff;
  text-align: center;
}
.swiper-slide img {
  height: 150px;
}
.pagination {
  position: absolute;
  z-index: 20;
  left: 10px;
  bottom: 10px;
}
.swiper-pagination-switch {
  display: inline-block;
  width: 8px;
  height: 8px;
  border-radius: 8px;
  background: #555;
  margin-right: 5px;
  opacity: 0.8;
  border: 1px solid #fff;
  cursor: pointer;
}
.swiper-active-switch {
  background: #fff;
}
  </style>
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <?php if (($asset_images)) { ?>
      <?php foreach ($asset_images as $row){ ?>
      <div class="swiper-slide">
        <img src="<?php echo base_url(); ?>uploadassetimages/<?= $row->file_name ?>" />
      </div>
      <?php } ?>
      <?php } else { ?>
      <div class="swiper-slide">
        <img src="<?php echo base_url(); ?>uploadassetimages/No_image_available.jpg"/>
      </div>
      <?php } ?>
    </div>
    <div class="pagination"></div>
  </div>
  <script src="js/jquery-1.10.1.min.js"></script>
  <script src="<?php echo base_url(); ?>js/idangerous.swiper.min.js"></script>
  <script>
  var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    paginationClickable: true
  })

  /* Dynamic Swiper Links*/
  function randomColor () {
    var colors = ('blue red green orange pink').split(' ');
    return colors[ Math.floor( Math.random()*colors.length ) ]
  }
  var count = 4;
  $('.sdl-remove1').click(function(e) {
    e.preventDefault();
    mySwiper.removeSlide()
  });
  </script>