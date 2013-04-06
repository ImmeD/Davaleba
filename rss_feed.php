<!doctype html>

<html>

<head>
	<meta charset="utf-8">
	<link rel = "stylesheet" href = "rss_feed.css"/>
	<title>Jobs.ge RSS</title>
</head>

<body> 
	<?php
			$file = file_get_contents('http://www.jobs.ge/rss/jobs/');
			$feed = simplexml_load_string($file);
	?>

	<header>
		<h1> <?php  echo $feed->channel->title; ?> </h1>
	</header>
		<?php
			foreach ($feed->channel->item as $item):
				$pubDate = $item->pubDate;
				$pubDate = strftime("%Y-%m-%d %H:%M:%S", strtotime($pubDate));
		?>
	<section>
		<ul>
			<li><b><?php echo $item->title;?></b>
			<time id = "time"><?php echo $pubDate;?></time>
			</li>
			<li><?php echo $item->description;?>
			<a href = "<?php echo $item->link;?>">Read more</a>
			</li>
		</ul>
	</section>
	<?php endforeach; ?>
</body>

</html>