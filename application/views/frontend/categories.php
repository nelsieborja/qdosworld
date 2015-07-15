<div class="subcontent-wrap container">
	<h2 class="font-capitalize font-red">
		Browse All Categories
		<span class="glyphicon btn-lg glyphicon-menu-right"></span>
	</h2>
	<hr>
	
	<?php if (isset($categories) && $categories) { ?>
		<div class="row category-list" ng-init='categories_ = <?php echo json_encode($categories); ?>'>
			<div class="col-sm-3 col-md-4" ng-repeat="category in categories_">
				<h3 class="category-list-title">{{ category.name }}</h3>
				<div class="category-item">
					<ul>
						<!--category-lists ng-if="category.children" ng-init="children = category.children; unique_id = category.id"></category-lists-->
						
						<!-- YET ANOTHER HACK, UP TO 3 LEVEL ONLY, SHOULD BE DYNAMIC AND SIMPLIFIED!!! -->
						<li ng-if="category.children" ng-class="{ 'category-withsub':children1.children }" ng-repeat="children1 in category.children">
							<span ng-controller="TogglerController" ng-if="children1.children" class="category-withsub-btn" data-toggle="collapse" data-target="#collapse{{ category.id + children1.id }}" aria-expanded="false" aria-controls="collapse{{ category.id + children1.id }}" ng-click="toggle()">
								<span ng-show="isOpen" class="glyphicon glyphicon-plus-sign"></span>
								<span ng-hide="isOpen" class="glyphicon glyphicon-minus-sign"></span>
							</span>
							<a href="<?php echo base_url(); ?>products/{{ category.id }}/{{ children1.id }}">{{ children1.name }}</a>
							
							<ul ng-if="children1.children" class="collapse" id="collapse{{ category.id + children1.id }}">
								<li ng-class="{ 'category-withsub':children2.children }" ng-repeat="children2 in children1.children">
									<span ng-controller="TogglerController" ng-if="children2.children" class="category-withsub-btn" data-toggle="collapse" data-target="#collapse{{ category.id + children1.id + children2.id }}" aria-expanded="false" aria-controls="collapse{{ category.id + children1.id + children2.id }}" ng-click="toggle()">
										<span ng-show="isOpen" class="glyphicon glyphicon-plus-sign"></span>
										<span ng-hide="isOpen" class="glyphicon glyphicon-minus-sign"></span>
									</span>
									<a href="<?php echo base_url(); ?>products/{{ category.id }}/{{ children1.id }}/{{ children2.id }}">{{ children2.name }}</a>
									
									<ul ng-if="children2.children" class="collapse" id="collapse{{ category.id + children1.id + children2.id }}">
										<li ng-repeat="children3 in children2.children">
											<a href="<?php echo base_url(); ?>products/{{ category.id }}/{{ children1.id }}/{{ children2.id }}/{{ children3.id }}">{{ children3.name }}</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li ng-if="!category.children">
							<a href="<?php echo base_url(); ?>products/{{ category.id }}">{{ category.name }}</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	
	<?php } else { ?>
		<h3 class="align-center">No added categories yet, please come back later.</h3>
	<?php } ?>
</div>