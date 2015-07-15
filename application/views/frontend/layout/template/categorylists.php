<li ng-repeat="child in children">
	<span ng-if="child.children" class="glyphicon glyphicon-plus-sign" data-toggle="collapse" href="#collapse{{ unique_id }}" aria-expanded="false" aria-controls="collapse{{ unique_id }}"></span>
	<a ng-class="{ 'category-withsub':child.children }" href="<?php echo base_url(); ?>products/{{ parseURL() }}/{{ child.id }}">{{ child.name }}</a>
	<ul ng-if="child.children" class="collapse" id="collapse{{ unique_id }}">
		<category-lists ng-init="children = child.children; unique_id = unique_id+'_'+child.id"></category-lists>
	</ul>
</li>