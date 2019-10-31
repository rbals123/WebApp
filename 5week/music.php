<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
		<?php
			$song_count = 5678;
			print "I love music.
			I have $song_count total songs,
			which is over 123 hours of music!";
		?>
	</p>


		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>

			<ol>
				<?php for ($new_pages = 1; $new_pages < 6;$new_pages++) { ?>
			  	<li><a href="https://www.billboard.com/archive/article/2019<?=12 -$new_pages?>">2019-<?=12-$new_pages?></a></li>
				<?php } ?>
			</ol>
		</div>

		      <div class="section">
		         <h2>Billboard News</h2>
		         <?php
		            if(isset($_GET["newspages"])) {
									$newspages = $_GET["newspages"];
								}else {
									$newspages = 5;
								}
		         ?>
		         <ol>
		            <?php for ($point = 1; $point <= $newspages; $point++) { ?>
		               <li><a href="https://www.billboard.com/archive/article/2019<?=12-$point?>">2019-<?=12-$point?></a></li>
		            <?php } ?>
		         </ol>
		      </div>


		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
			<ol>
				<?php
					$name = array("Guns N' Roses", "Green Day", "Blink182");
					array_push($name, "Queen");
					for ($num = 0; $num < count($name); $num++) { ?>
						<li><?= $name[$num] ?></li>
				<?php } ?>
			</ol>
		</div>

		<div class="section">
			<h2>My Favorite Artists</h2>
			<ol>
				<?php
					//$name = array("Guns N' Roses", "Green Day", "Blink182", "The Cranberries", "Bruno Mars", "Amy WineHouse", "Jason Mraz");
					foreach (file("favorite.txt") as $name) { ?>
						<li><a href="http://en.wikipedia.org/wiki/<?= $name ?>"><?= $name ?></a></li>
				 <?php }?>
			</ol>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>
			<?php
			 	$lists = glob("lab5/musicPHP/songs/*.mp3");
				foreach ($lists as $list) { ?>
					<ul id="musiclist">
						<li class="mp3item">
							<?= $list ?>
						</li>
					</ul>
			<?php } ?>

			<div class="section">
				<h2>My Music and Playlists</h2>
			<?php
				$files = array();
			 	$lists = glob("lab5/musicPHP/songs/*.mp3");
				foreach ($lists as $list) {
					$files[basename($list)] = (int) (filesize($list)/1024);
				}
				arsort($files);
				foreach ($files as $file => $filesize) { ?>
					<ul id="musiclist">
						<li class="mp3item">
							<a href="lab5/musicPHP/songs/<?= $file ?>.mp3"><?= $file ?></a> (<?= $filesize ?> KB)
						</li>
					</ul>
			<?php } ?>
				<!-- Exercise 8: Playlists (Files) -->
<br />

			<?php
				$big_list = array_reverse(glob("lab5/musicPHP/songs/*.m3u"));
				foreach ($big_list as $big) { ?>
						<li class="playlistitem">
							<?= basename($big) ?>
							<ul>
								<?php
									$small = file($big);
									shuffle($small);
									foreach ($small as $line) {
										if(strpos($line, "#") === false) { ?>
								<li><?= $line ?></li>
							<?php }} ?>
							</ul>
					</li>
					<?php } ?>
				</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
