<?php
ob_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Presentation Pierre BOQUET</title>
		<meta name="description" content="A framework for easily creating beautiful presentations using HTML">
		<meta name="author" content="jambonbill">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="theme-color" content="#000000">
		<link rel="manifest" href="manifest.json">
		<link rel="stylesheet" href="dist/reset.css">
		<link rel="stylesheet" href="dist/reveal.css">
		<link rel="stylesheet" href="dist/theme/black.css" id="theme">
		<!-- Theme used for syntax highlighting of code -->
		<link rel="stylesheet" href="plugin/highlight/monokai.css">
	</head>
	
	<body>
		<div class="reveal">
			<!-- Any section element inside of this container is displayed as a slide -->
			<div class="slides">
				<?php
				foreach(glob("slides/*.html") as $file){
					echo file_get_contents($file);
				}
                ?>
			</div>
		</div>

		<script src="dist/reveal.js"></script>
		<script src="plugin/zoom/zoom.js"></script>
		<script src="plugin/notes/notes.js"></script>
		<script src="plugin/search/search.js"></script>
		<script src="plugin/markdown/markdown.js"></script>
		<script src="plugin/highlight/highlight.js"></script>
		<script>
			// Also available as an ES module, see:
			// https://revealjs.com/initialization/
			Reveal.initialize({
				controls: true,
				progress: true,
				center: true,
				hash: true,
				// Learn about plugins: https://revealjs.com/plugins/
				plugins: [ RevealZoom, RevealNotes, RevealSearch, RevealMarkdown, RevealHighlight ]
			});
		</script>
	</body>
</html>
<?php
$html=ob_get_clean();

$filename='index.html';

if (is_writable($filename)) {
	$f=fopen("./index.html","w+");
	fwrite($f, $html);
	fclose($f);
	
}else{
	exit("not writeable");
}

echo $html;