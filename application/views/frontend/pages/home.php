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
	
	<aside class="home-aside">
		<div class="row">
			<div class="col-md-6">
				<h3 class="font-red">Don't have account yet? <a class="btn btn-success" href="#" role="button">Sign up</a></h3>
			</div>
			<div class="social-wrap col-md-6">
				<h3 class="font-red">Find us on</h3>
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
					<img class="item-img abs" src="<?php echo public_url(); ?>/images/category/twopiece.jpg" alt="" />
					<span class="item-caption abs">Two Piece</span>
				</a>
			</li>
			<li>
				<a href="/c/test" class="item rel">
					<img class="item-img abs" src="<?php echo public_url(); ?>/images/category/accessories.jpg" alt="" />
					<span class="item-caption abs">Accessories</span>
				</a>
			</li>
			<li>
				<a href="/c/test" class="item rel">
					<img class="item-img abs" src="<?php echo public_url(); ?>/images/category/shorts.jpg" alt="" />
					<span class="item-caption abs">Shorts</span>
				</a>
			</li>
			<li>
				<a href="/c/test" class="item rel">
					<img class="item-img abs" src="<?php echo public_url(); ?>/images/category/dresses.jpg" alt="" />
					<span class="item-caption abs">Dresses</span>
				</a>
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
	
	<div class="product-list float-li">
		<h2 class="product-list-caption">Greate offers</h2>
		<ul>
			<?php for ($i=1; $i<=6; $i++) { ?>
				<li>
					<a href="/i/test" class="item">
						<img class="item-img" src="<?php echo public_url(); ?>/images/temp/item1.jpg" alt="" />
						<span class="item-price abs">20 <em>AED</em></span>
					</a>
					<a class="add-cart btn-lg abs" data-toggle="modal" data-target="#confirmModal"><span class="glyphicon glyphicon-shopping-cart"></span></a>
					<p class="item-caption">A mile high playsuit in white</p>
				</li>
			<?php } ?>
		</ul>
		<div class="clearfix"></div>
	</div>
	
	<div class="product-list float-li">
		<h2 class="product-list-caption">New Arrivals</h2>
		<ul>
			<?php for ($i=1; $i<=6; $i++) { ?>
				<li>
					<a href="/i/test" class="item">
						<img class="item-img" src="<?php echo public_url(); ?>/images/temp/item1.jpg" alt="" />
						<span class="item-price abs">20 <em>AED</em></span>
					</a>
					<a class="add-cart btn-lg abs" data-toggle="modal" data-target="#confirmModal"><span class="glyphicon glyphicon-shopping-cart"></span></a>
					<p class="item-caption">A mile high playsuit in white</p>
				</li>
			<?php } ?>
		</ul>
		<div class="clearfix"></div>
	</div>
	
	<div class="more-wrap align-center"><a href="/c/test" class="btn btn-lg btn-red"><span class="glyphicon glyphicon-plus"></span> VIEW MORE ITEMS</a></div>

</div>