<div class="subcontent-wrap container">
	<?php if (isset($current) && $current) { ?>
		<h2 class="font-capitalize font-red">
			<?php if (preg_match("/products/", $current)) { ?>
				Browse All 
			<?php } ?>
			<?php echo $current; ?>
			<span class="glyphicon btn-lg glyphicon-menu-right"></span>
		</h2>
		<hr>
	<?php } ?>
	
	<?php if (isset($products) && $products) { ?>
		<product-list ng-init='products = <?php echo json_encode($products); ?>'></product-list>
		<!--product-list ng-hide="isView" ng-init='products = <?php echo json_encode($products); ?>'></product-list>
		<product-view ng-show="isView"></product-view-->
	
	<?php } else { ?>
		<h3 class="align-center">No added products yet, please come back later.</h3>
	<?php } ?>
</div>