<?php

if (!defined('ABSPATH')) {

	exit; // Exit if accessed directly

}

global $table_prefix, $wpdb;

$tblname = 'spanish_answers';

$wp_track_table = $table_prefix . "$tblname";

$sql = "SELECT questions FROM $wp_track_table WHERE id = " . $_GET['id'] . ";";

$answers = unserialize($wpdb->get_var($sql));
$sql = "SELECT answers FROM $wp_track_table WHERE id = " . $_GET['id'] . ";";

$questions = unserialize($wpdb->get_var($sql));

$sql = "SELECT * FROM $wp_track_table WHERE id = " . $_GET['id'] . ";";
$all = $wpdb->get_row($sql);
?>

<table class="wp-list-table widefat fixed striped pages" id="prodtable">

	<thead>

		<th scope="col" id="name" class="manage-column column-name column-primary ">

			<span>Question</span>

		</th>

		<th scope="col" id="name" class="manage-column column-namee  ">

			<span>Answer</span>

		</th>
	</thead>

	<tbody id="the-list">
		<tr class="iedit author-self level-0  type-page status-publish hentry">

			<td class="name column-name has-row-actions column-primary page-title">

				<strong class="row-title">

					Name:

				</strong>
			</td>


			<td class="prodid column-namee">

				<?php echo $all->name; ?>

			</td>
		</tr>
		<tr class="iedit author-self level-0  type-page status-publish hentry">

			<td class="name column-name has-row-actions column-primary page-title">

				<strong class="row-title">

					Email:

				</strong>
			</td>
			<td class="prodid column-namee">

				<?php echo $all->email; ?>

			</td>
		</tr>
		<tr class="iedit author-self level-0  type-page status-publish hentry">

			<td class="name column-name has-row-actions column-primary page-title">

				<strong class="row-title">

					Date

				</strong>


			</td>
			<td class="prodid column-namee">

				<?php echo date("Y-m-d H:i:s", $all->date); ?>

			</td>
		</tr>
		<?php
		$i = 0;
		foreach ($questions as $question) {
		?>
			<tr class="iedit author-self level-0  type-page status-publish hentry">

				<td class="name column-name has-row-actions column-primary page-title">

					<strong class="row-title">

						<?php echo $answers[$i];  ?>

					</strong>


				</td>

				<td class="prodid column-namee">

					<?php echo $question; ?>

				</td>
			</tr>
		<?php $i++;
		} ?>

	</tbody>

	<tfoot>

		<tr>

			<th scope="col" class="manage-column column-name column-primary sortable desc">

				Question

			</th>

			<th scope="col" class="manage-column column-namee column-primary sortable desc">

				Answer

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