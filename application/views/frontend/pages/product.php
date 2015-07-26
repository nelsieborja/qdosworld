<div class="container pad">
	<div class="in rel">
		<aside class="aside-filter abs">
			<div class="panel panel-default">
			  <div class="panel-heading font-semibold">DRESSES</div>
			  <ul class="list-group">
				<li class="list-group-item">
					<a>Dress 1</a>
					<span class="toggle pull-right">
						<span class="glyphicon glyphicon-plus"></span>
						<span class="glyphicon glyphicon-minus"></span>
					</span>
					<ul class="sublist-group">
						<li><a href="">Sub Dress 1</a></li>
						<li><a href="">Sub Dress 2</a></li>
					</ul>
				</li>
				<li class="list-group-item"><a>Dress 2</a></li>
				<li class="list-group-item"><a>Dress 3</a></li>
			  </ul>
			</div>
		</aside>
		
		<div class="product-list float-li">
			<ul>
				<?php for ($i=1; $i<=10; $i++) { ?>
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
			
			<div class="more-wrap align-center"><a href="#" class="btn btn-lg btn-red"><span class="glyphicon glyphicon-plus"></span> LOAD MORE ITEMS</a></div>
			
		</div>
		
	</div>
</div>