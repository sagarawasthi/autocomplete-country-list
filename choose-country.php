<?php
/**
 * Complete Country Listing; 
 * Rendering XML based country listing in three different ways i.e Selection, AutoComplete and List/Tabular
 *
 * @author 		Sagar Awasthi
 * @email 		sagar@designlex.com
 * @uri 		designlex.com
 * @version 	1.0
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Choose Country - Autocomplete</title>
	
	<link rel="stylesheet" href="jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<?php $countries = simplexml_load_file('country-list.xml');  ?>
	
	<script>
		$(function() {
			var availableTags = [
			 <?php
					foreach($countries->children() as $country){
						echo '"'.$country->name.'",';
					}
				?>
			];
			$( "#tags" ).autocomplete({
			source: availableTags
			});
		});
	</script>
	
  </head>
  <body>
  <div style="padding:20px">
    <h1>Choose country</h1>
	<h3>Select/Option Box</h3>
	 <?php
		$countries = simplexml_load_file('country-list.xml'); 
		echo '<select id="country" class="ui-corner-all ui-widget-shadow">';
		foreach($countries->children() as $country){
			echo '<option value="'.$country->iso.'">'.$country->name.'</option>';
		}
		echo '</select>';
	?>
	<p class="ui-priority-secondary">You have selected : <span class="ui-state-error-text"></span></p>
	<p>&nbsp;</p>
	<hr>

	<h3>Autocomplete</h3>
	<div class="ui-widget"><input id="tags"></div>
	<script>
		$(function(){
			$('#country').on('change',function(){
				var countryName = $(this).val();
				var countryName = $("#country option:selected" ).text();
				$('.ui-priority-secondary span').html(countryName)
			});
			var countryName = $("#country option:selected" ).text();
			$('.ui-priority-secondary span').html(countryName)
		});
	</script>
	<p>&nbsp;</p>
	<hr>
	<h3>Complete Listing</h3>
	<ul class="ui-helper-clearfix">
		<?php foreach($countries->children() as $country): ?>
			<li><?php echo $country->iso.' - '.$country->name; ?></li>
		<?php endforeach; ?>
	</ul>
	<p>&nbsp;</p><p>&nbsp;</p>
	<p class="ui-helper-clearfix" style="color:#888;">Developed by <a href='http://www.designlex.com'>Designlex.com</a> and  is distributed with the GNU General Public License, which allows free use, and free copying and redistribution under certain conditions (including, in some cases, commercial distribution) </p>
</div>
	
  </body>
</html>
