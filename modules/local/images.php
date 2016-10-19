<?php 
$image = str_replace(array('/local/images/','/empty'),'',$_SERVER['REQUEST_URI']);
$path = "/data/db/f_all_items/";
if (is_file($_SERVER['DOCUMENT_ROOT'].$path.$image)){
	
?>
<style>
	/* these styles are for the demo, but are not required for the plugin */
	.zoom {
		display:inline-block;
		position: relative;
		position: relative\9;
	}
	
	/* magnifying glass icon */
	.zoom:after {
		content:'';
		display:block; 
		width:33px; 
		height:33px; 
		position:absolute; 
		top:0;
		right:0;
		background:url(/templates/def/JS/zoom-master/icon.png);
	}

	.zoom img {
		display: block;
	}

/*	.zoom img::selection { background-color: transparent; }*/

</style>
<div style="width: 600px; min-height: 400px;">
<a class="zoom"  href="<?=$path.$image?>" id="img_full">
	<img src="/reimg<?=$path."600/".$image; ?>" border="0">
</a>
</div>
<script>
	$('#img_full').zoom({
		url: '<?=$path.$image?>'
	});
</script>
<? } ?>