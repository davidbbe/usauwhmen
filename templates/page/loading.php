<?php
if(!$post) return;

global $theme_options;

if(is_home()):
	
	if(get_option('page_for_posts')){
		$page_id = get_option('page_for_posts');
	} else {}

else:

	$page_id = get_the_id();

endif;

$loading = $theme_options['loading-style'];
$show_loading = ($loading == 'false') ? false : true;

$post_custom = get_post_custom($page_id);

if(isset($post_custom['page-loading']) && $post_custom['page-loading'][0] == 'false'){
	$show_loading = false;
}
else if(isset($post_custom['page-loading']) && $post_custom['page-loading'][0] != 'default'){
	$loading = $post_custom['page-loading'][0];
	$show_loading = ($loading == 'false') ? false : true;
}

if($show_loading){
?>
<div id="loader-site" class="<?php echo $loading; ?>">

	<?php
	$loading = str_replace(' dark', '', $loading);
	$loading = str_replace(' light', '', $loading);
	switch($loading){

	case 'rotateplane':
	?>
    
    <style>
  	.dark .spinner{
  		background: #fff;
  	}

    .spinner {
      width: 60px;
      height: 60px;
      background-color: #333;
      position: absolute;
      top: 50%;
      left: 50%;
      margin-top: -30px;
      margin-left: -30px;
      -webkit-transform: translateX(-50%) translateY(-50%);
         -moz-transform: translateX(-50%) translateY(-50%);
          -ms-transform: translateX(-50%) translateY(-50%);
           -o-transform: translateX(-50%) translateY(-50%);
              transform: translateX(-50%) translateY(-50%);

      -webkit-animation: rotateplane 1.2s infinite ease-in-out;
      animation: rotateplane 1.2s infinite ease-in-out;
    }

    @-webkit-keyframes rotateplane {
      0% { -webkit-transform: perspective(120px) }
      50% { -webkit-transform: perspective(120px) rotateY(180deg) }
      100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }
    }

    @keyframes rotateplane {
      0% {
        transform: perspective(120px) rotateX(0deg) rotateY(0deg);
        -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg);
      } 50% {
        transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
        -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
      } 100% {
        transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
        -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
      }
    }
    </style>
    <div class="spinner"></div>

	<?php
	break;

	case 'doublebounce':
	?>

    <style>
    .dark .spinner .double-bounce1,
    .dark .spinner .double-bounce2{
    	background: #fff;
    }
    .spinner {
      width: 60px;
      height: 60px;

      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translateX(-50%) translateY(-50%);
         -moz-transform: translateX(-50%) translateY(-50%);
          -ms-transform: translateX(-50%) translateY(-50%);
           -o-transform: translateX(-50%) translateY(-50%);
              transform: translateX(-50%) translateY(-50%);
    }

    .double-bounce1, .double-bounce2 {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background-color: #333;
      opacity: 0.6;
      position: absolute;
      top: 0;
      left: 0;
      
      -webkit-animation: bounce 2.0s infinite ease-in-out;
      animation: bounce 2.0s infinite ease-in-out;
    }

    .double-bounce2 {
      -webkit-animation-delay: -1.0s;
      animation-delay: -1.0s;
    }

    @-webkit-keyframes bounce {
      0%, 100% { -webkit-transform: scale(0.0) }
      50% { -webkit-transform: scale(1.0) }
    }

    @keyframes bounce {
      0%, 100% {
        transform: scale(0.0);
        -webkit-transform: scale(0.0);
      } 50% {
        transform: scale(1.0);
        -webkit-transform: scale(1.0);
      }
    }
    </style>
    <div class="spinner">
      <div class="double-bounce1"></div>
      <div class="double-bounce2"></div>
    </div>
	<?php
	break;

	case 'wave':
	?>
    <style>
    .dark .spinner > div{
    	background: #fff;
    }

    .spinner {
      width: 50px;
      height: 30px;
      text-align: center;
      font-size: 10px;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translateX(-50%) translateY(-50%);
         -moz-transform: translateX(-50%) translateY(-50%);
          -ms-transform: translateX(-50%) translateY(-50%);
           -o-transform: translateX(-50%) translateY(-50%);
              transform: translateX(-50%) translateY(-50%);
    }

    .spinner > div {
      background-color: #333;
      height: 100%;
      width: 6px;
      display: inline-block;
      
      -webkit-animation: stretchdelay 1.2s infinite ease-in-out;
      animation: stretchdelay 1.2s infinite ease-in-out;
    }

    .spinner .rect2 {
      -webkit-animation-delay: -1.1s;
      animation-delay: -1.1s;
    }

    .spinner .rect3 {
      -webkit-animation-delay: -1.0s;
      animation-delay: -1.0s;
    }

    .spinner .rect4 {
      -webkit-animation-delay: -0.9s;
      animation-delay: -0.9s;
    }

    .spinner .rect5 {
      -webkit-animation-delay: -0.8s;
      animation-delay: -0.8s;
    }

    @-webkit-keyframes stretchdelay {
      0%, 40%, 100% { -webkit-transform: scaleY(0.4) }  
      20% { -webkit-transform: scaleY(1.0) }
    }

    @keyframes stretchdelay {
      0%, 40%, 100% { 
        transform: scaleY(0.4);
        -webkit-transform: scaleY(0.4);
      } 20% {
        transform: scaleY(1.0);
        -webkit-transform: scaleY(1.0);
      }
    }
    </style>
    <div class="spinner">
      <div class="rect1"></div>
      <div class="rect2"></div>
      <div class="rect3"></div>
      <div class="rect4"></div>
      <div class="rect5"></div>
    </div>
	<?php
	break;
	
	case 'wanderingcubes':
	?>
    <style>
    .dark .spinner .cube1,
    .dark .spinner .cube2{
    	background: #fff;
    }

    .spinner {
      width: 32px;
      height: 32px;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translateX(-50%) translateY(-50%);
         -moz-transform: translateX(-50%) translateY(-50%);
          -ms-transform: translateX(-50%) translateY(-50%);
           -o-transform: translateX(-50%) translateY(-50%);
              transform: translateX(-50%) translateY(-50%);
    }

    .cube1, .cube2 {
      background-color: #333;
      width: 10px;
      height: 10px;
      position: absolute;
      top: 0;
      left: 0;

      -webkit-animation: cubemove 1.8s infinite ease-in-out;
      animation: cubemove 1.8s infinite ease-in-out;
    }

    .cube2 {
      -webkit-animation-delay: -0.9s;
      animation-delay: -0.9s;
    }

    @-webkit-keyframes cubemove {
      25% { -webkit-transform: translateX(22px) rotate(-90deg) scale(0.5) }
      50% { -webkit-transform: translateX(22px) translateY(22px) rotate(-180deg) }
      75% { -webkit-transform: translateX(0px) translateY(22px) rotate(-270deg) scale(0.5) }
      100% { -webkit-transform: rotate(-360deg) }
    }

    @keyframes cubemove {
      25% { 
        transform: translateX(42px) rotate(-90deg) scale(0.5);
        -webkit-transform: translateX(42px) rotate(-90deg) scale(0.5);
      } 50% {
        /* Hack to make FF rotate in the right direction */
        transform: translateX(42px) translateY(42px) rotate(-179deg);
        -webkit-transform: translateX(42px) translateY(42px) rotate(-179deg);
      } 50.1% {
        transform: translateX(42px) translateY(42px) rotate(-180deg);
        -webkit-transform: translateX(42px) translateY(42px) rotate(-180deg);
      } 75% {
        transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
        -webkit-transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
      } 100% {
        transform: rotate(-360deg);
        -webkit-transform: rotate(-360deg);
      }
    }
    </style>
    <div class="spinner">
      <div class="cube1"></div>
      <div class="cube2"></div>
    </div>
	<?php
	break;

	case 'pulse':
	?>
    <style>
    .dark .spinner{
    	background: #fff;
    }

    .spinner {
      width: 60px;
      height: 60px;
      background-color: #333;
      position: absolute;
      top: 50%;
      left: 50%;
      margin-top: -30px;
      margin-left: -30px;
      -webkit-transform: translateX(-50%) translateY(-50%);
         -moz-transform: translateX(-50%) translateY(-50%);
          -ms-transform: translateX(-50%) translateY(-50%);
           -o-transform: translateX(-50%) translateY(-50%);
              transform: translateX(-50%) translateY(-50%);

      border-radius: 100%;
      -webkit-animation: scaleout 1.0s infinite ease-in-out;
      animation: scaleout 1.0s infinite ease-in-out;
    }

    @-webkit-keyframes scaleout {
      0% { -webkit-transform: scale(0.0) }
      100% {
        -webkit-transform: scale(1.0);
        opacity: 0;
      }
    }

    @keyframes scaleout {
      0% {
        transform: scale(0.0);
        -webkit-transform: scale(0.0);
      } 100% {
        transform: scale(1.0);
        -webkit-transform: scale(1.0);
        opacity: 0;
      }
    }
    </style>
    <div class="spinner"></div>
	<?php
	break;

	case 'chasingdots':
	?>
    <style>
    .dark .spinner .dot1,
    .dark .spinner .dot2{
    	background: #fff;
    }

    .spinner {
      width: 60px;
      height: 60px;
      position: absolute;
      top: 50%;
      left: 50%;
      margin-top: -30px;
      margin-left: -30px;
      text-align: center;
      
      -webkit-animation: rotate 2.0s infinite linear;
      animation: rotate 2.0s infinite linear;
    }

    .dot1, .dot2 {
      width: 60%;
      height: 60%;
      display: inline-block;
      position: absolute;
      top: 0;
      background-color: #333;
      border-radius: 100%;
      
      -webkit-animation: bounce 2.0s infinite ease-in-out;
      animation: bounce 2.0s infinite ease-in-out;
    }

    .dot2 {
      top: auto;
      bottom: 0px;
      -webkit-animation-delay: -1.0s;
      animation-delay: -1.0s;
    }

    @-webkit-keyframes rotate { 100% { -webkit-transform: rotate(360deg) }}
    @keyframes rotate { 
      100% {
        transform: rotate(360deg) translateX(-50%) translateY(-50%);
        -webkit-transform: rotate(360deg) translateX(-50%) translateY(-50%);
      }
    }

    @-webkit-keyframes bounce {
      0%, 100% { -webkit-transform: scale(0.0) }
      50% { -webkit-transform: scale(1.0) }
    }

    @keyframes bounce {
      0%, 100% {
        transform: scale(0.0);
        -webkit-transform: scale(0.0);
      } 50% {
        transform: scale(1.0);
        -webkit-transform: scale(1.0);
      }
    }
    </style>
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>

    <?php
	break;

	case 'threebounce':
	?>
    <style>
    .dark .spinner > div{
    	background: #fff;
    }

    .spinner {
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translateX(-50%) translateY(-50%);
         -moz-transform: translateX(-50%) translateY(-50%);
          -ms-transform: translateX(-50%) translateY(-50%);
           -o-transform: translateX(-50%) translateY(-50%);
              transform: translateX(-50%) translateY(-50%);
      width: 70px;
      text-align: center;
    }

    .spinner > div {
      width: 18px;
      height: 18px;
      background-color: #333;

      border-radius: 100%;
      display: inline-block;
      -webkit-animation: bouncedelay 1.4s infinite ease-in-out;
      animation: bouncedelay 1.4s infinite ease-in-out;
      /* Prevent first frame from flickering when animation starts */
      -webkit-animation-fill-mode: both;
      animation-fill-mode: both;
    }

    .spinner .bounce1 {
      -webkit-animation-delay: -0.32s;
      animation-delay: -0.32s;
    }

    .spinner .bounce2 {
      -webkit-animation-delay: -0.16s;
      animation-delay: -0.16s;
    }

    @-webkit-keyframes bouncedelay {
      0%, 80%, 100% { -webkit-transform: scale(0.0) }
      40% { -webkit-transform: scale(1.0) }
    }

    @keyframes bouncedelay {
      0%, 80%, 100% {
        transform: scale(0.0);
        -webkit-transform: scale(0.0);
      } 40% {
        transform: scale(1.0);
        -webkit-transform: scale(1.0);
      }
    }
    </style>
    <div class="spinner">
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>
    <?php
	break;

	case 'cube':
	?>
    <style>
	.dark .cubed{
		background: #fff;
	}

    .spinner {
      width:60px;
      height:60px;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translateX(-50%) translateY(-50%);
         -moz-transform: translateX(-50%) translateY(-50%);
          -ms-transform: translateX(-50%) translateY(-50%);
           -o-transform: translateX(-50%) translateY(-50%);
              transform: translateX(-50%) translateY(-50%);
    }

    .cubed {
      width:33%;
      height:33%;
      background:#333;
      float:left;
      -webkit-animation: scaleDelay 1.3s infinite ease-in-out;
      animation: scaleDelay 1.3s infinite ease-in-out;
    }

    /* 
     * Spinner positions
     * 1 2 3 
     * 4 5 6
     * 7 8 9
     */

    .spinner .cubed:nth-child(1) { -webkit-animation-delay: 0.2s; animation-delay: 0.2s  }
    .spinner .cubed:nth-child(2) { -webkit-animation-delay: 0.3s; animation-delay: 0.3s  }
    .spinner .cubed:nth-child(3) { -webkit-animation-delay: 0.4s; animation-delay: 0.4s  }
    .spinner .cubed:nth-child(4) { -webkit-animation-delay: 0.1s; animation-delay: 0.1s  }
    .spinner .cubed:nth-child(5) { -webkit-animation-delay: 0.2s; animation-delay: 0.2s  }
    .spinner .cubed:nth-child(6) { -webkit-animation-delay: 0.3s; animation-delay: 0.3s  }
    .spinner .cubed:nth-child(7) { -webkit-animation-delay: 0.0s; animation-delay: 0.0s  }
    .spinner .cubed:nth-child(8) { -webkit-animation-delay: 0.1s; animation-delay: 0.1s  }
    .spinner .cubed:nth-child(9) { -webkit-animation-delay: 0.2s; animation-delay: 0.2s  }
        
    @-webkit-keyframes scaleDelay {
      0%, 70%, 100% { -webkit-transform:scale3D(1.0, 1.0, 1.0) }
      35%           { -webkit-transform:scale3D(0.0, 0.0, 1.0) }
    }
        
    @keyframes scaleDelay {
      0%, 70%, 100% { -webkit-transform:scale3D(1.0, 1.0, 1.0); transform:scale3D(1.0, 1.0, 1.0) }
      35%           { -webkit-transform:scale3D(1.0, 1.0, 1.0); transform:scale3D(0.0, 0.0, 1.0) }
    }
    </style>
	<div class="spinner">
		<div class="cubed"></div>
		<div class="cubed"></div>
		<div class="cubed"></div>
		<div class="cubed"></div>
		<div class="cubed"></div>
		<div class="cubed"></div>
		<div class="cubed"></div>
		<div class="cubed"></div>
		<div class="cubed"></div>
	</div>
	<?php
	break;

	case 'fadingcircle':
	?>
    <style>
    .dark .spinner .circle:before{
    	background-color: #fff;
    }
    .spinner {
      width: 60px;
      height: 60px;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translateX(-50%) translateY(-50%);
         -moz-transform: translateX(-50%) translateY(-50%);
          -ms-transform: translateX(-50%) translateY(-50%);
           -o-transform: translateX(-50%) translateY(-50%);
              transform: translateX(-50%) translateY(-50%);
    }

    .circle {
      width: 100%;
      height: 100%;
      position: absolute;
      left: 0;
      top: 0;
    }

    .circle:before {
      content: '';
      display: block;
      margin: 0 auto;
      width: 18%;
      height: 18%;
      background-color: #333;
      
      border-radius: 100%;
      -webkit-animation: fadedelay 1.2s infinite ease-in-out;
      animation: fadedelay 1.2s infinite ease-in-out;
      /* Prevent first frame from flickering when animation starts */
      -webkit-animation-fill-mode: both;
      animation-fill-mode: both;
    }

    .circle2  { transform: rotate(30deg);  -webkit-transform: rotate(30deg)  }
    .circle3  { transform: rotate(60deg);  -webkit-transform: rotate(60deg)  }
    .circle4  { transform: rotate(90deg);  -webkit-transform: rotate(90deg)  }
    .circle5  { transform: rotate(120deg); -webkit-transform: rotate(120deg) }
    .circle6  { transform: rotate(150deg); -webkit-transform: rotate(150deg) }
    .circle7  { transform: rotate(180deg); -webkit-transform: rotate(180deg) }
    .circle8  { transform: rotate(210deg); -webkit-transform: rotate(210deg) }
    .circle9  { transform: rotate(240deg); -webkit-transform: rotate(240deg) }
    .circle10 { transform: rotate(270deg); -webkit-transform: rotate(270deg) }
    .circle11 { transform: rotate(300deg); -webkit-transform: rotate(300deg) }
    .circle12 { transform: rotate(330deg); -webkit-transform: rotate(330deg) }

    .circle2:before  { animation-delay: -1.1s; -webkit-animation-delay: -1.1s }
    .circle3:before  { animation-delay: -1.0s; -webkit-animation-delay: -1.0s }
    .circle4:before  { animation-delay: -0.9s; -webkit-animation-delay: -0.9s }
    .circle5:before  { animation-delay: -0.8s; -webkit-animation-delay: -0.8s }
    .circle6:before  { animation-delay: -0.7s; -webkit-animation-delay: -0.7s }
    .circle7:before  { animation-delay: -0.6s; -webkit-animation-delay: -0.6s }
    .circle8:before  { animation-delay: -0.5s; -webkit-animation-delay: -0.5s }
    .circle9:before  { animation-delay: -0.4s; -webkit-animation-delay: -0.4s }
    .circle10:before { animation-delay: -0.3s; -webkit-animation-delay: -0.3s }
    .circle11:before { animation-delay: -0.2s; -webkit-animation-delay: -0.2s }
    .circle12:before { animation-delay: -0.1s; -webkit-animation-delay: -0.1s }
    
    @-webkit-keyframes fadedelay {
      0%, 39%, 100% { opacity: 0 }
      40% { opacity: 1 }
    }

    @keyframes fadedelay {
      0%, 39%, 100% { opacity: 0 } 
      40% { opacity: 0 }
    }
    </style>
  <div class="spinner">
    <div class="circle1 circle"></div>
    <div class="circle2 circle"></div>
    <div class="circle3 circle"></div>
    <div class="circle4 circle"></div>
    <div class="circle5 circle"></div>
    <div class="circle6 circle"></div>
    <div class="circle7 circle"></div>
    <div class="circle8 circle"></div>
    <div class="circle9 circle"></div>
    <div class="circle10 circle"></div>
    <div class="circle11 circle"></div>
    <div class="circle12 circle"></div>
  </div>
	<?php
	break;
	?>
	<?php  } ?>

</div>
<?php } ?>