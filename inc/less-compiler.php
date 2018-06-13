<?php
if(isset($_GET['compile'])) {
	$files = [
		'style.less' => 'style.css',
	];
	$less_directory = get_template_directory().'/less/';
	$css_directory =  get_template_directory().'/css/';
	
	if(!file_exists($css_directory)) mkdir($css_directory, 0755, true);
	
	require_once  get_template_directory().'/lib/less/Less.php';
	$parser = new Less_Parser(array(
		'sourceMap'         => true,
		'compress'			=> true,
	));
	$parser->SetImportDirs($less_directory);

	foreach($files as $l => $c) {
		$less = $less_directory.$l;
		$css = $css_directory.$c;
		try {
			$parser->parseFile($less, '');
			$css_content = $parser->getCss();
			file_put_contents($css, $css_content);
		}
		catch(Exception $e) {
			echo $e->getMessage();
		}
	}
}