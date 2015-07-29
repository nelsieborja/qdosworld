<div class="container pad">
	<div class="i">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-5">
					<?php if ($product['images']) { ?>
						<div class="i-photos">
							<div class="i-photos-zoom">
								<img src="<?php echo public_url(); ?>/products/<?php echo $product['images'][0]; ?>" alt="" />
							</div>
							<?php if ($product['images'] && count($product['images'])>1) { ?>
								<div class="i-photos-thumbnail many">
									<!--a class="i-photos-thumbnail-control up disabled"><span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span></a>
									<a class="i-photos-thumbnail-control down"><span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a-->
									<div class="i-photos-thumbnail-scoller">
										<ul>
											<?php foreach($product['images'] as $kk => $image) { ?>
												<li><img data-smoothzoom="group1" <?php echo (!$kk?'class="active"':''); ?> src="<?php echo public_url(); ?>/products/<?php echo $image; ?>" alt="" /></li>
											<?php } ?>
										</ul>
										<div class="clearfix"></div>
									</div>
								</div>
							<?php } ?>
					<?php } else { ?>
						<div class="i-photos none">
					<?php } ?>
					</div>
				</div>
				<div class="col-sm-7 rel">
					<h2 class="i-caption font-semibold"><?php echo $product['name']?$product['name']:'No Name'; ?></h2>
					<h4 class="i-price font-red"><?php echo $product['price']?$product['price']:'?'; ?><small class="font-red">AED</small></h4>
					
					<?php if ($product['description']) { ?>
					<div class="i-desc">
						<h4 class="font-semibold">Description:</h4>
						<?php echo $product['description']; ?>
					</div>
					<?php } ?>
					
					<?php if ($product['specs']) { ?>
					<div class="i-desc">
						<h4 class="font-semibold">Specs:</h4>
						<?php echo $product['specs']; ?>
					</div>
					<?php } ?>
					
					<!--div class="i-addcart">
						<div class="pull-left">
							<a class="btn btn-lg btn-success">Add to Cart</a>
						</div>
						
						<div class="pull-left i-quantity rel">
							<span class="abs font-semibold">Quantity:</span>
							<div class="input-group spinner">
								<input type="text" class="form-control" value="1" type="number" />
								<div class="input-group-btn-vertical">
									<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-triangle-top"></i></button>
									<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-triangle-bottom"></i></button>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div-->
					
					<div class="i-contact align-center">
						<span class="addcart-txt text-warning"><span class="glyphicon glyphicon-ok"></span> <strong>Already in Inquiry Cart</strong></span>
						<?php if ($product['images'] || $product['thumbnail']) { ?>
							<a class="btn btn-lg btn-warning addcart-btn" data-addcart-img="<?php echo public_url(); ?>/products/<?php echo $product['thumbnail']?$product['thumbnail']:$product['images'][0]; ?>" data-loading-text="Loading...">
						<?php } else { ?>
							<a class="btn btn-lg btn-warning addcart-btn" data-loading-text="Loading...">
						<?php } ?>
						
						<span class="glyphicon glyphicon-shopping-cart"></span> Add to Inquiry Cart</a>
						<a class="btn btn-lg btn-primary" data-toggle="modal" data-target="#contactModal"><span class="glyphicon glyphicon-envelope"></span> Contact Us Now</a>
					</div>
					
					<div class="i-share">
						<script type="text/javascript">var switchTo5x=true;</script>
						<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
						<script type="text/javascript">stLight.options({publisher: "4e5ecf5e-c415-4eb4-8860-bd44a153674a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
						<span class='st_facebook' displayText=''></span>
						<span class='st_twitter' displayText=''></span>
						<span class='st_googleplus' displayText=''></span>
						<span class='st_pinterest' displayText=''></span>
						<span class='st_email' displayText=''></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>