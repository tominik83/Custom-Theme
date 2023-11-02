

<!-- <img src="wp-content/themes/customtheme/assets/img/background2.jpg" class="parallax background-img"> -->
<div style="height:100px"></div>
<div class="text parallax">
    <h2>Dobro Dosli</h2>
    <h1>Zanimljivo</h1>
</div>

<div>
    <?php
$shortcode_location = get_option('shortcode_location');

if ($shortcode_location === 'header') {
    // Prikaz shortcode-a u headeru
} elseif ($shortcode_location === 'footer') {
    // Prikaz shortcode-a u footeru
}
?>
</div>

