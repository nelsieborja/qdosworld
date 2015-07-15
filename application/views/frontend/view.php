<div class="subcontent-wrap container">
	<?php if (isset($current) && $current) { ?>
		<h2 class="font-capitalize font-red"><?php echo $current; ?><span class="glyphicon btn-lg glyphicon-menu-right"></span></h2>
		<hr>
	<?php } ?>
	
	<product-view ng-init='product = <?php echo json_encode($product); ?>'></product-view>
</div>