<?php
//file system - part 1

	// $quotes = readfile("readme.txt");
	// echo $quotes;

	$file = 'readme.txt';

    // checking exists
	if(file_exists($file)){

		// read file
		echo readfile($file) . '<br />';

		// copy file
		copy($file, 'quotes.txt');

		// absolute path
        // just shows entire path from root directory
		echo realpath($file) . '<br />';

		// file size
		echo filesize($file) . '<br />';

		// rename the file
		// rename($file, 'test.txt');

	} else {
		echo 'file does not exist';
	}

	// make directory
	mkdir('quotes');

?>