<h3>Add questions</h3>

<h4>Om producten te uploaden:</h4>

<p>1. Maak een CSV bestand waarbij de waardes zijn gescheiden dmv een comma(,). </p>

<p>Eerste column moet het product id zijn (artikel nummer)</p>

<p>Tweede dient de supllier te zijn (Wasco of Solar)</p>

<p>In de derde kolom schrijf je EUR als je een vast bedrag wilt toevoegen of aftrekken, voeg een % teken toe als je procentueel een korting wilt toevoegen of aftrekken</p>

<p>Schrijf in de vierde kolom het bedrag dat je wilt toevoegen aan de prijs van 2BA in deze notatie (exclusief accolades) {20,64}, als u een korting op de prijs van 2BA wilt dan doe je bijvoorbeeld {-24.65} </p>

<p>Voorbeeld: 315556,Wasco,EUR,154.54,</p>

<b>
	<p>Doe niet meer dan 200 producten per keer</p>
</b>

<p>2. Uploaden bestand</p>

<p>3. Controleer informatie en bewerk indien nodig</p>

<p>4. Klik op submit om de producten te importeren, cancel om de deleten en opnieuw te beginnen</p>

<h4>Synchroniseren voorraad informatie:</h4>

<p>1. Aanmaken OCS (Online Condition Server) via 2BA</p>
<!-- 
<p>2. PHP PNCTL extensie moet actief zijn</p> -->

<p>2. Stel een cronjob in <?php echo get_admin_url() . "admin.php?page=productync"; ?> wanneer je wilt </p>

<form method="post" id="csv-form" enctype="multipart/form-data">

	<?php settings_fields('productsync_optionsgroup');

	wp_nonce_field('nates_nonce_action', 'nates_nonce_field'); ?>

	<input type="file" name="csv-insert-new-products" id="csv-insert-new-products">
	<input type='submit' value='Importeer producten'>
</form>
<H3>Importeer een enkel product</H3>
<form method="post" id="csv-form-single" enctype="multipart/form-data">

	<?php settings_fields('productsync_optionsgroup');

	wp_nonce_field('nates_nonce_action', 'nates_nonce_field'); ?>
	<div class="questions_">
		<input type="text" placeholder="Product ID / Artikel nummer" name="csv-insert-new-products-id">
		<select name="csv-insert-new-products-supplier">
			<option value="wasco">Wasco</option>
			<option value="solar">Solar</option>
		</select>
		<select name="csv-insert-new-products-cur">
			<option value="fixed">Direct (EUR)</option>
			<option value="percent">Percentage</option>
		</select>
		<input type="text" placeholder="Korting (gebruik punt)" name="csv-insert-new-products-how">
	</div>

	<input type='submit' value='Save'>
	<input type='submit' value='Add another question...'>

</form>


</div>