<?php

if (!defined('ABSPATH')) {

	exit; // Exit if accessed directly

}

global $table_prefix, $wpdb;

$tblname = 'spanish_answers';

$wp_track_table = $table_prefix . "$tblname";

$sql = "SELECT * FROM $wp_track_table;";

$results = $wpdb->get_results($sql);

?>

<table class="wp-list-table widefat fixed striped pages" id="prodtable">

	<thead>

		<tr>

			<th scope="col" id="name" class="manage-column column-name column-primary ">

				<span>ID</span>

			</th>
			<th scope="col" id="name" class="manage-column column-name column-primary ">

				<span>Name</span>

			</th>
			<th scope="col" id="name" class="manage-column column-name column-primary ">

				<span>Email</span>

			</th>
			<th scope="col" id="name" class="manage-column column-name column-primary ">

				<span>Date</span>

			</th>

		</tr>

	</thead>

	<tbody id="the-list">

		<?php

		foreach ($results as $details) {
			$id = $details->id;
			$name = $details->name;
			$email = $details->email;
			$date = $details->date;
		?>

			<tr class="iedit author-self level-0  type-page status-publish hentry">

				<td class="name column-name has-row-actions column-primary page-title">

					<strong class="row-title">

						<?php echo $id; ?>

					</strong>

					<div class="row-actions">

						<span class="edit">

							<a target="_blank" href="<?php echo admin_url('admin.php?page=viewtestans&id=' . $id); ?>">View</a>

						</span>

					</div>

				</td>

				<td class="prodid column-namee">

					<?php echo $name; ?>

				</td>
				<td class="prodid column-namee">

					<?php echo $email; ?>

				</td>
				<td class="prodid column-namee">

					<?php echo date("Y-m-d H:i:s", $date); ?>

				</td>
			</tr>

		<?php } ?>

	</tbody>

	<tfoot>

		<tr>

			<th scope="col" class="manage-column column-name column-primary sortable desc">

				ID

			</th>

			<th scope="col" class="manage-column column-name column-primary sortable desc">

				Name

			</th>
			<th scope="col" class="manage-column column-name column-primary sortable desc">

				Email

			</th>
			<th scope="col" class="manage-column column-name column-primary sortable desc">

				Date

			</th>
		</tr>

	</tfoot>

</table>





<!-- <button id='confirmBTN' type="button">Confirm</button>

	<button id='resetBTN' type="button">Cancel</button> -->

<script type="text/javascript">
	jQuery(document).ready(function($) {

		$('#confirmBTN').click(function() {

			var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";

			var data = {

				'action': 'productsyncsubmit',

			};

			$.ajax({

				url: ajax_url,

				type: 'post',

				data: data,

				success: function(response) {

					location.reload();

				}

			});

		});

		$('#resetBTN').click(function() {

			$('#prodtable').remove();

			$('#status').text = "Import successfully cancelled";

			var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";

			var data = {

				'action': 'productsyncreset',

			};

			$.ajax({

				url: ajax_url,

				type: 'post',

				data: data,

				success: function(response) {

					location.reload();

				}

			});

		});

	});
</script>