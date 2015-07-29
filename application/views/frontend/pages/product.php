<div class="container pad">

	<?php if (isset($products_tpl) && $products_tpl) { ?>
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
				<?php echo $products_tpl; ?>
				<div class="clearfix"></div>
				<div class="more-wrap align-center"><a href="#" class="btn btn-lg btn-red"><span class="glyphicon glyphicon-plus"></span> LOAD MORE ITEMS</a></div>
			</div>
		</div>
	
	<?php } else { ?>
		<p class="bg-warning">No products added to yet. Please come back later.</p>
	<?php } ?>
	
</div>