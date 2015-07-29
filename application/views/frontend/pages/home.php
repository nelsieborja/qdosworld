<div class="container">
	<div class="rel">
		<div id="carousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel" data-slide-to="0" class="active"></li>
				<li data-target="#carousel" data-slide-to="1"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<a class="item carousel-1 active"></a>
				<a class="item carousel-2"></a>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<a href="c/test" class="shopnow abs font-semibold">SHOP NOW</a>
	</div>
	
	<aside class="home-aside bg-danger">
		<div class="row">
			<div class="col-md-7">
				<?php if ($this->session->userdata('logged_in')) { ?>
					<h3 class="home-aside-caption welcome">Welcome back <strong><?php echo $this->session->userdata('logged_in')['name']?ucwords($this->session->userdata('logged_in')['name']):$this->session->userdata('logged_in')['username']; ?></strong>!</h3>
				<?php } else { ?>
					<h3 class="home-aside-caption">Don't have account yet? <a class="btn btn-warning" href="#" role="button">Sign up</a></h3>
				<?php } ?>
			</div>
			<div class="social-wrap col-md-5">
				<h3 class="home-aside-caption">Find us on</h3>
				<ul>
					<li><a href="" class="social-twitter">Twitter</a></li>
					<li><a href="" class="social-facebook">Facebook</a></li>
					<li><a href="" class="social-instagram">Instagram</a></li>
					<li><a href="" class="social-gplus">Google+</a></li>
					<li><a href="" class="social-youtube">Youtube</a></li>
				</ul>
			</div>
		</div>		
	</aside>
	
	<div class="thumbnail-categories float-li">
		<ul>
			<li>
				<a href="/c/test" class="item rel">
					<img class="item-img abs" src="<?php echo public_url(); ?>/images/category/bags.jpg" alt="" />
					<span class="item-caption abs">Bags</span>
				</a>
			</li>
			<li>
				<a href="/c/test" class="item rel">
					<img class="item-img abs" src="<?php echo public_url(); ?>/images/category/jackets.jpg" alt="" />
					<span class="item-caption abs">Jackets</span>
				</a>
			</li>
			<li>
				<a href="/c/test" class="item rel">
					<img class="item-img abs" src="<?php echo public_url(); ?>/images/category/shorts.jpg" alt="" />
					<span class="item-caption abs">Shorts</span>
				</a>
			</li>
			<li>
				<a href="/c/dresses" class="item rel">
					<img class="item-img abs" src="<?php echo public_url(); ?>/images/category/dresses.jpg" alt="" />
					<span class="item-caption abs">Dresses</span>
				</a>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
	
	<div class="product-list float-li">
		<h2 class="product-list-caption">Great offers</h2>
		<?php if (isset($offers_tpl) && $offers_tpl) { ?>
			<?php echo $offers_tpl; ?>
			<div class="clearfix"></div>
		<?php } else { ?>
			<p class="bg-warning">No offers added yet. We'll be adding soon! :)</p>
		<?php } ?>
	</div>
	
	<div class="product-list float-li">
		<h2 class="product-list-caption">New Arrivals</h2>
		<?php if (isset($latest_tpl) && $latest_tpl) { ?>
			<?php echo $latest_tpl; ?>
			<div class="clearfix"></div>
		<?php } else { ?>
			<p class="bg-warning">No products added yet. Please come back later.</p>
		<?php } ?>
	</div>
	
	<div class="more-wrap align-center"><a href="/c/test" class="btn btn-lg btn-red"><span class="glyphicon glyphicon-plus"></span> VIEW MORE ITEMS</a></div>

</div>