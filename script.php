<?php

echo PHP_EOL;

define( 'CSVFILEPATH', 'streetfoodvendors.csv' );

define( 'LINECHARLENGTHMAX', 1000 );

$handle = fopen( CSVFILEPATH, 'r' ) or die( 'Unable to open CSV file' . PHP_EOL );

// Read header line in CSV file (to move file pointer to next line)
$data = fgetcsv( $handle, LINECHARLENGTHMAX, ',' );

// Create list
$list = array();

while ( ( $data = fgetcsv( $handle, LINECHARLENGTHMAX, ',' ) ) !== FALSE ) {

    $name = trim( $data[5] );

    if ( empty( $name ) ) continue;

    array_push(
        $list,
        array(
            'name' => $name,
            'latitude' => $data[1],
            'longitude' => $data[2],
            'location' => $data[6],
            'description' => $data[7]
        )
    );

}

fclose( $handle );

print_r( $list );

echo PHP_EOL;

?>
