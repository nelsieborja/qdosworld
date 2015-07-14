<div class="container">
	<div class="jumbotron align-center">
		<h2 class="global-subtitle"><span class="font-red">QdoS</span> World Trading</h2>
		<p><strong>A door to the world's leading products.</strong></p>
		<p>The <strong class="font-red">QdoS</strong> brand stands out for a <em>unique mix of high quality, performance and robust design</em>.</p>
		<p>From our Dubai base we offer a vehicle to source high-class products across the globe from reputed brands in <strong>UK</strong>, <strong>USA</strong>, mainland <strong>Europe</strong>, <strong>Japan</strong>, <strong>China</strong> and <strong>South East Asia</strong>.</p>
		<p><a class="btn btn-lg btn-success" href="<?php echo base_url(); ?>products/">BROWSE PRODUCTS NOW</a></p>		
	</div>
</div>

<div class="bg-grey">
	<div class="container">
		<div class="home-offer">
			<h3 class="home-bottom-title">Greate Offers</h3>
			<?php if (isset($products) && $products) { ?>
				<product-list ng-hide="isView" ng-init='products = <?php echo json_encode($products); ?>'></product-list>
				
			<?php } else { ?>
				<p>No offers yet, please check later.</p>
			<?php } ?>
		</div>
	</div>
</div>

<div class="container">
	<div class="home-bottom">
		<div class="row">
			<div class="col-md-3">
				<category-list></category-list>
			</div>
			
			<div class="col-md-9">
				<h3 class="home-bottom-title">Widest Range of Products</h3>
				<p>By being located in Dubai with an extensive sales team and an wide pool of suppliers we can source your needs and offer them at extremely competitive prices and with true value-added service. We cut out the middleman and your requirements are addressed in time, to the right performance and within your budget.</p>
				<p>We can source and deliver the widest range of products such as Computers and Electronics, Furniture, Medical Equipment, Apparel, Home Appliances, Communications Equipment and Industrial Supplies with complete after-sales support.</p>
				<p>QdoS represents a reliable partner and a safe gateway for you. Let us manage your trading requirements.Type your paragraph here.</p>
			</div>
		</div>
	</div>
</div>