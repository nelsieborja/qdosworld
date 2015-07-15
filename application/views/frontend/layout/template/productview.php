<!--a class="view-product-back btn btn-link" aria-haspopup="true" ng-click="app.hideProduct()"-->
<a href="javascript:history.back()" class="view-product-back btn btn-link" aria-haspopup="true">
	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back
</a>

<div class="row">
	<div class="col-md-10">
		<h2 class="view-product-name font-capitalize">{{ product.name }}</h2>
	</div>
	<div class="col-md-2">
		<h2 class="view-product-price">
			<a ng-if="product.discount" class="btn btn-lg btn-success" aria-haspopup="true" popover="{{ product.discount }}% off" popover-title="Discounted!" tooltip="Click to show discount" tooltip-placement="bottom">
				<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> {{ product.price | currency:"" }} <small>AED</small>
			</a>
			<em ng-if="!product.discount" class="font-red font-semibold">{{ product.price | currency:"" }} <small class="font-red">AED</small></em>
		</h2>
	</div>
</div>

<carousel ng-show="product.images.length">
	<slide ng-repeat="image in product.images" active="slide.active">
		<img ng-src="<?php echo public_url(); ?>products/{{image}}" />
	</slide>
</carousel>

<tabset>
	<tab>
		<tab-heading>
			<i class="glyphicon glyphicon-search"></i> Description
		</tab-heading>
		<blockquote ng-bind-html="product.description"></blockquote>
	</tab>
	<tab>
		<tab-heading>
			<i class="glyphicon glyphicon-cog"></i> Specs
		</tab-heading>
		<blockquote ng-bind-html="product.specs"></blockquote>
	</tab>
</tabset>