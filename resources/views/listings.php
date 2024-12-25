<h1>Listings</h1>
<br>
<h1><?php echo $heading; ?></h1>
<br>
<?php foreach($listings as $listing):?>
    <h2><?php echo $listing['title'] ?></h2>
    <p><?php echo $listing['description'] ?></p>
<?php endforeach?>