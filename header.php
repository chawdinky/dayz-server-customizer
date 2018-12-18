<!DOCTYPE html>
<html>
<head>
	<title>DSSC - Dayz standalone server customizer</title>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="favicon.png" />
	<script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
	<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
	<script src="https://unpkg.com/babel-standalone@6.26.0/babel.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" async defer>
	<link rel="stylesheet" type="text/css" href="css/dssc.css" async defer>
	<script src="js/upload.js"></script>
</head>
<body>
<?PHP
	function scan_dir($path){
	    $ite=new RecursiveDirectoryIterator($path);

	    $bytestotal=0;
	    $nbfiles=0;
	    foreach (new RecursiveIteratorIterator($ite) as $filename=>$cur) {
	        $filesize=$cur->getSize();
	        $bytestotal+=$filesize;
	        $nbfiles++;
	        $files[] = $filename;
	    }

	    $bytestotal=number_format($bytestotal);

	    return array('total_files'=>$nbfiles,'total_size'=>$bytestotal,'files'=>$files);
	}

	$files = scan_dir('uploads/');

	$users = count(glob("uploads/*", GLOB_ONLYDIR));
	$filecount = $files['total_files'] - $users;
?>	
<section class="header">
	<div class="container">
		<p class="h1 text-center">Dayz Standalone Server Customizer</p>
		<p class="text-center"><?PHP echo '<mark>' . $users . '</mark> users have generated <mark>'. $filecount . '</mark> files with this tool.'; ?><br/>
			Made by <strong><a target="_blank" href="https://www.reddit.com/u/nixonhenrixon">/u/nixonhenrixon</a></strong> & <strong><a target="_blank" href="https://github.com/iJigg">git/iJigg</a></strong><br>
		<span class="cookies">This site uses cookies to store some useless values</span>
		</p>
	</div>
</section>

<section class="footer">
		<p><code><a href="https://github.com/niklashenrixon/dayz-server-customizer" target="_blank">release 1.0</a> - only <mark>types.xml</mark> format supported at the moment</code></p>
		<p><code><a href="https://streamlabs.com/nix0npc" target="_blank">Buy us a beer 🍺</a></code></p>
</section>