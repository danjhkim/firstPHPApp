<?php
//file system - part 1

	// $quotes = readfile("readme.txt");
	// echo $quotes;

	$file = 'quotes.txt';

    // checking exists
	if(file_exists($file)){
        // $handle = fopen($file, "r");
        $handle = fopen($file, "a+");

		// // read file
        // // argu file and how much you want to read in terms of size
        // echo fread($handle, filesize($file));
        // //this will read 112 bytes
        // // echo fread($handle, 112);
	

		// // read a single line
        // echo fgets($handle);
        // echo fgets($handle);
		

	    // //read a single charater
        // echo fgetc($handle);

		//write to file
        fwrite($handle, "\nEverything popular is wrong.");
		

	    fclose($handle);

        // delete file
        // unlink($file);

	} else {
		echo 'file does not exist';
	}
?>