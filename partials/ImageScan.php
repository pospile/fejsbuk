<?php

require("./auth.php");
require ("./db.php");
include './../vendor/autoload.php';



class ImageScan
{
    function Scan($url) {

        $clarifai = new \DarrynTen\Clarifai\Clarifai(
            'babda998adb94fb2b1c644411fb7076b'
        );
        $modelResult = $clarifai->getModelRepository()->predictUrl(
            "{$url}",
            \DarrynTen\Clarifai\Repository\ModelRepository::GENERAL
        );

        var_dump($modelResult);

        /*
        $result = $conn->query("");
        return $result->field_count;
        */
    }
}