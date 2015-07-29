<div id="confirmModal" class="modal fade" role="dialog" aria-labelledby="confirmModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="confirmModalLabel"><span class="glyphicon glyphicon-shopping-cart"></span> Add Item to Cart</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-2">
						<div class="thumbnail">
							<a><img src="<?php echo public_url(); ?>/images/temp/item1.jpg" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-7">
						<h3 class="cart-caption">A mile high playsuit in white</h3>
						<h4 class="cart-price font-semibold font-red">20<small class="font-red">AED</small></h4>
					</div>
					<div class="col-sm-3">
						<div class="input-group spinner">
							<input type="text" class="form-control" value="1" />
							<div class="input-group-btn-vertical">
								<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-triangle-top"></i></button>
								<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-triangle-bottom"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary">Add to Cart</button>
			</div>
		</div>
	</div>
</div>