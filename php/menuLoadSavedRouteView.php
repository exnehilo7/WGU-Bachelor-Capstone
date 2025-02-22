<?php

    // get login file
    require_once "login.php";

    // log into DB
    $dbConn = logIntoPostgreSQLroutes();

    // query
    $result = pg_query($dbConn, 
    "select name from lookup_routes
    where is_active = 'Y'
    order by name");

    // variable for result
    $data = array();

    // get rows. Do not use pg_fetch_row(). Do not include numerical indices.
    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC))
    {
        array_push($data, $row);
    }

    // send JSON response
    echo json_encode($data);

?>