<?php
/* Sample code to open a plain text file */

$debug = true;

if(isset($_GET["debug"])){
    $debug = true;
}

$myFileName="coolbeans";

$fileExt=".csv";

$filename = $myFileName . $fileExt;

if ($debug) print "\n\n<p>";

$file=fopen($filename, "r");

/* the variable $file will be empty or false if the file does not open */
if($file){
    if($debug) print "<p></p>\n";
}



/* the variable $file will be empty or false if the file does not open */
if($file){
    
    if($debug) print "<p></p>\n";

    /* This reads the first row, which in our case is the column headers */
    $headers=fgetcsv($file);
    
    if($debug) {
        print "<p></p>\n";
        print "<p><p><pre> "; print_r($headers); print "</pre></p>";
    }
    /* the while (similar to a for loop) loop keeps executing until we reach 
     * the end of the file at which point it stops. the resulting variable 
     * $records is an array with all our data.
     */
    while(!feof($file)){
        $records[]=fgetcsv($file);
    }
    
    //closes the file
    fclose($file);
    
    if($debug) {
        print "<p></p>\n";
        print "<p><p><pre> "; print_r($records); print "</pre></p>";
    }
} // ends if file was opened



/* display the data */
print "<ol>";
foreach ($records as $oneRecord) {
    if ($oneRecord[0] != "") {  //the eof would be a "" 
        //print "\n\t<li>";
        //print out values
        print '<a href="' . $oneRecord[4] . '" target="_blank" ' . '>';
        print '<img src="images/' . $oneRecord[5] . '" alt="' . $oneRecord[2] . '">';
        print '</a>';
        print '<span class="userId">' . $oneRecord[1] . '</span>';
        print '<span class="description">' . $oneRecord[2] . '</span>';
        print '<span class="calories">' . $oneRecord[3] . '</span>';
print "\n\t</li>";
    }
}

print "</ol>";


    
?>