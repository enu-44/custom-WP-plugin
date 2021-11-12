<?php
if(!isset($_GET) || !isset($_GET['deel']) || !isset($_GET['r']) ){
	header("Location: ../");
}
else{
	$deel = ( is_numeric((int)$_GET['deel']) && (int)$_GET['deel']>0 && (int)$_GET['deel']<7 ) ? $_GET['deel'] : 1;
	$r = ( is_numeric((int)$_GET['r']) && (int)$_GET['r']>-1 && (int)$_GET['r']<3 ) ? $_GET['r'] : 0;
}
if($deel<5){
?>

<p>Congratulations on passing part <?php echo $deel ?> of the test!</p>

<p>We found a course that at the moment this course will suit your needs:</p>

<?php echo do_shortcode('[product id="38"]'); if($_GET['r']==2){?>


<p>To continue taking the test, please press "Continue"</p>

<div id='wrapbtn'>
<button type="button" class="btn btn-primary btn-lg btn-block" id="submitTest" onclick="location.href='../test-deel-<?php echo $deel+1;?>/';"  style="font-size: inherit;">Volgende deel</button>
</div>
<?php } }else{ ?>



<p>Congratulations on passing the test!</p>

<p>We found a course that at the moment this course will suit your needs though we will contact you based on the open questions:</p>

<?php echo do_shortcode('[product id="38"]'); ?>


<?php }?>
<style type="text/css">.product {
    margin: auto!important;
}</style>