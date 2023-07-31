<style>
    .slider-wrap {
  width: 600px;
  margin: 0 auto;
  display: block;
  position: relative;
}
.slider-focus {
  img {
    width: 100%;
    height: 450px;
    display: block;
  }
}
.slider-nav {
  overflow: auto;
  img {
    width: 20%;
    height: 100px;
    display: inline-block;
    float: left;
    &:hover {
      opacity: 0.5;
      cursor: pointer;
    }
  }
}
.angle-navs {
  position: absolute;
  top: 200px;
  left: 0;
  right: 0;
  .angle-right {
    right: -10px;
  }
  .angle-left {
    left: -10px;
  }
  .angle-left, .angle-right {
    position: absolute;
    &:hover {
      cursor: pointer;
    }
  }
}
.active {
  opacity: 0.5;
}
</style>
<script>
    var next_image;
var slide_count = $('.slider-nav img').length - 1;

$('.slider-nav img').click(function() {
  var img_src = $(this).attr('src');
  $('.slider-focus img').attr('src', img_src);
  $(this).addClass('active').siblings().removeClass('active');
});

$('.angle-right').click(function() {
  var current_image = $('.active').index();
  if(current_image == slide_count) {
    next_image = 0;
  } else {
    next_image = current_image + 1;
  }
  moveSlides(next_image);
});

$('.angle-left').click(function() {
  var current_image = $('.active').index();
  if(current_image == 0) {
    next_image = slide_count;
  } else {
    next_image = current_image - 1;
  }
  moveSlides(next_image);
});

function moveSlides(next_image) {
   var focus_image = $('.slider-nav img').eq(next_image);
  $(focus_image).addClass('active').siblings().removeClass('active');
  focus_image = $(focus_image).attr('src');
  $('.slider-focus img').attr('src', focus_image);
}
</script>
<section class="slider_section ">
    <div class="slider-wrap">
        <div class="slider-focus">
          <img src="http://img06.deviantart.net/25de/i/2012/134/3/1/037_by_koko_stock-d4zq28i.jpg" alt="" />
        </div>
        <div class="slider-nav">
          <img src="http://img06.deviantart.net/25de/i/2012/134/3/1/037_by_koko_stock-d4zq28i.jpg" alt="" class="active"/>
          <img src="http://pad2.whstatic.com/images/thumb/b/ba/Sell-Stock-Photography-Step-1.jpg/670px-Sell-Stock-Photography-Step-1.jpg" alt="" />
          <img src="http://netdna.webdesignerdepot.com/uploads/2008/12/stock-microstock.jpg" alt="" />
          <img src="http://img15.deviantart.net/fb99/i/2012/185/6/b/underwater_by_koko_stock-d55xwcd.jpg" alt="" />
          <img src="http://orig15.deviantart.net/740c/f/2007/129/7/4/stock_032__by_enchanted_stock.jpg" alt="" />
        </div>
        <div class="angle-navs">
          <i class="fa fa-angle-right fa-3x angle-right"></i>
          <i class="fa fa-angle-left fa-3x angle-left"></i>
        </div>
      </div>
</section>

