<?php

require_once '../library/twitter.class.php';

// enables caching (path must exists and must be writable!)
// Twitter::$cacheDir = dirname(__FILE__) . '/temp';


// ENTER HERE YOUR CREDENTIALS (see readme.txt)
$consumerKey= "V7TKGdfQAclF7zebgogvQ";
$consumerSecret="qNDiChwsHlBYsHz1E0DJXPdRc01vBf6mWnfJz8BVM";
$accessToken="134431610-a8lEhf3jKfJtYX7V8wOc6TmkmdM0b1x73VRXHxxq";
$accessTokenSecret="aIyhrxNLFMBwuRNrFTIYOeWa2LQ5UKKZXjbAJfNSVQ";	

$twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

$channel = $twitter->load(Twitter::ME_AND_FRIENDS);

?>
<!doctype html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Twitter timeline demo</title>

<ul>
<?php foreach ($channel->status as $status): ?>
	<li><a href="http://twitter.com/<?php echo $status->user->screen_name ?>"><img src="<?php echo htmlspecialchars($status->user->profile_image_url) ?>">
		<?php echo htmlspecialchars($status->user->name) ?></a>:
		<?php echo Twitter::clickable($status->text) ?>
		<small>at <?php echo date("j.n.Y H:i", strtotime($status->created_at)) ?></small>
	</li>
<?php endforeach ?>
</ul>
