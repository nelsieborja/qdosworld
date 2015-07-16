<div class="row">
	<!--div class="col-sm-4 col-md-3" ng-repeat="product in products" ng-click="app.viewProduct(product.id)"-->
	<div class="col-sm-4 col-md-3" ng-repeat="product in products">
		<a href="<?php echo base_url(); ?>i/{{ product.url }}" class="product-item align-center view-more">
			<div class="product-img" ng-class="{ noimage:!product.images.length }">
				<span ng-if="product.images.length">
					<!--img ng-src="<?php //echo public_url(); ?>products/{{ product.images.split(',')[0] }}" alt="" /-->
					<img ng-src="<?php echo public_url(); ?>products/{{ product.images[0] }}" alt="" />
				</span>
			</div>
			
			<h4 class="product-name font-capitalize">{{ product.name | limitTo:40 }}</h4>
			<span class="mask"><span class=icon></span></span>
			<span ng-if="product.discount" class="product-discount">
				<strong class="font-round ng-binding">{{ product.discount }}<small>%</small></strong>
			</span>
		</a>
	</div>
</div>