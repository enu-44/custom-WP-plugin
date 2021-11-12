
<div class="wrap">
	<h2>WP_List_Table Class Example</h2>

	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<div id="post-body-content">
				<div class="meta-box-sortables ui-sortable">
					<form method="post">
						<?php
						$option = 'per_page';
						$args   = [
							'label'   => 'Customers',
							'default' => 5,
							'option'  => 'customers_per_page'
						];

						add_screen_option( $option, $args );

						$list= new Customers_List();
						$list->prepare_items();
						$list->display(); ?>
					</form>
				</div>
			</div>
		</div>
		<br class="clear">
	</div>
</div>


