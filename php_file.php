<!DOCTYPE html>
<html>
<head>
	<title>News Headlines</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-v4.css">
	<style type="text/css">
		.card-columns {
		  @include media-breakpoint-only(lg) {
		    column-count: 4;
		  }
		  @include media-breakpoint-only(xl) {
		    column-count: 5;
		  }
		}

		body{
			margin: 20px;
		}
	</style>
</head>
<body>
	<h1 class="jumbotron text-center"> USA News Headline</h1>
	<div class="container">
	<?php
	$statisticsJson = file_get_contents("https://newsapi.org/v2/top-headlines?country=us&apiKey=7579e2323e674279af832abe1a1cb10b");

	$statisticsObj = json_decode($statisticsJson);

	if ($statisticsObj !== null) {
	?>
		
<div class="card-columns">
	<?php foreach($statisticsObj->articles as $key): ?>

	  <div class="card">
	    <img class="card-img-top" src="<?= $key->urlToImage;?>" alt="Card image cap">
	    <div class="card-body">
	      <h4 class="card-title"><a href="<?= $key->url;?>"><?= $key->title;?></a></h4>
	      <p class="card-text"><?= $key->description; ?>This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
	      	<small class="text-muted">
	          Source <cite title="Source Title"><?= $key->source->name;?></cite>
	        </small>
	    </div>
	  </div>

	<?php endforeach; ?>

</div>

	<?php
	} else {
	   echo "Unknown";
	} ?>
</div>
</body>
</html>
