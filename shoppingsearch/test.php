<?php 
    
require('lib/Semantics3.php');


$key = 'SEM38A46E47860AFABA29F1CD1992767383E';
$secret = 'ZjAxZGQ4MTU1MTNjNTJlMGRlZmFlMjY2NGVlMjhlMGU';

$requestor = new Semantics3_Products($key,$secret);


    ///**
    //* Random Complicated Query
    //* 
    //*/
    //$requestor->products_field("cat_id", 4992);
    //$requestor->products_field("brand", "Toshiba");
    //$requestor->products_field("name", "Portege");
    //
    //$requestor->products_field("sitedetails", "name", "amazon.com");
    //$requestor->sitedetails("latestoffers", "price", "gte", 100);
    //$requestor->sitedetails("latestoffers", "currency", "USD");
    //
    //$requestor->products_field("weight", "gte", 1000000);
    //$requestor->products_field("weight", "lt", 1500000);
    //
    //$requestor->products_field("sort", "name", "desc");
    //
    //echo $requestor->get_products()."\n";
    //$requestor->clear_query();
    //
    ///**
    //* Sem3_ID Array Query
    //* 
    //*/
    //$requestor->products_field("sem3_id", array("2NnNAztqoGeoQGeSya0y4K", "0xzFQX9Ss8ecMwkMy0C8Ui", "1XgtmTtMgWswmYaGS6Kgyc") );
    //
    //echo $requestor->get_products()."\n";
    //$requestor->clear_query();
    //
    ///**
    //* Category Query
    //* 
    //*/
    //$requestor->categories_field("name", "hard drives");
    //
    //echo $requestor->get_categories()."\n";
    //$requestor->clear_query();
    
    //echo "OK!\n";

# Build the request
$requestor->products_field( "search", $_POST["search"] );
//$requestor->products_field( "limit", "5" );
$requestor->products_field( "activeoffersonly", "1" );
$requestor->products_field( "isotime", "1" );
$requestor->products_field( "fields", ["price", "images", "updated_at", "sitedetails"] );

# Run the request
$results = $requestor->get_products();
//$results = $requestor->iterate_products();

# View the results of the request
echo $results;

// // $page = 1;
// while ($results = $requestor->iterate_products()) {
//     // $page++;
//     // echo "We are at page = $page\n";
//     // echo "The results for this page are:\n";
//     $requestor->products_field( "limit", "1" );
//     echo $results;
// };

