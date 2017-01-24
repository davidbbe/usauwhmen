<script type="text/javascript">

(function($){

"use strict";

var SS = window.SS || {};

SS.trigger = function(){
	$('#ss-open').on('click', function(){
		$('#ss-panel').fadeIn(200, function(){
			//$('#style-selector select').customSelect();
		});

		return false;
	});

	$('#ss-close').on('click', function(){
		$('#ss-panel').fadeOut();

		return false;
	});
}
	

SS.update = function(){
	$('#style-selector select').on('change', function(){

		$('body').attr('data-layout', $(this).val());
	});
}

SS.check = function(){
	$('#style-selector').show();
}

SS.init = function(){
	SS.check();
	SS.trigger();
	SS.update();
}

$(window).load(function(){
	SS.init();
})


})(jQuery);

</script>



<style type="text/css">
	/*-----------------------------------------------------------------------------------*/
	/*  Style Selector
	/*-----------------------------------------------------------------------------------*/
	#style-selector{
		font-family: sans-serif;
		position: fixed;
		top: 50%;
		left: 0;
		z-index: 99999;
		display: none;
		-webkit-transform: translateY(-50%);
		   -moz-transform: translateY(-50%);
		    -ms-transform: translateY(-50%);
		     -o-transform: translateY(-50%);
		        transform: translateY(-50%);
	}

	.show-menu #style-selector{
		z-index: 1;
	}

	#ss-open,
	#ss-close{
		position: absolute;
		padding: 8px;
		font-size: 28px;
		color: #fff;
		line-height: 1em;
		background: #2c3e50;
	}

	#ss-open{
		bottom: 0;
		left: 0;
		margin-bottom: 50px;
	}

	#ss-close{
		top: 0;
		right: 0;
	}

	#ss-panel{
		position: absolute;
		bottom: 0;
		left: 0;
		background: #fff;
		padding: 20px;
		width: 320px;
		border:1px solid #ddd;
		display: none;
	}

	#ss-panel h3{
		font-size: 12px;
		line-height: 20px;
		font-weight: 900;
		margin: 0 0 10px 0;
		font-family: sans-serif;
	}

	#ss-panel .section{
		padding: 0 0 20px 0;
		margin: 0 0 20px 0;
		border-bottom: 1px solid #eee; 
	}

	#ss-panel .section:last-child,
	#ss-panel .section p:last-child{
		margin-bottom: 0;
		padding-bottom: 0;
		border-bottom: none;
	}

	#ss-panel select{
		width: 100%;
		font-size: 12px;
	}

	#ss-panel .customSelect{ 
		background: rgba(0, 0, 0, 0.05);
		padding: 0 15px;
		font-weight: normal;
		border:1px solid #ddd;
		width: 100%;
		font-size: 12px;
	}
	#ss-panel .customSelectInner{
		width: 100% !important;
		display: block;
	}


	@media screen and (max-width: 900px) {
		#style-selector{
			display: none !important;
		}
	}

</style>

<div id="style-selector">
	<a href="#" id="ss-open"><i class="entypo-cog"></i></a>

	<div id="ss-panel">
		<a href="#" id="ss-close"><i class="entypo-cancel-circled"></i></a>
		<div class="section" id="ss-layout">
			<h3>LAYOUT</h3>
			<p>
				<select>
					<option value="full-width">FULL WIDTH</option>
					<option value="boxed">BOXED</option>
				</select>
			</p>
		</div>
	</div>
</div>