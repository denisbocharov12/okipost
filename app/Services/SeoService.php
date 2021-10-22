<?php


namespace App\Services;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

use Artesaos\SEOTools\Facades\SEOTools;

class SeoService
{
    public function setSEO($title, $description, $keywords, $openGraphTitle, $openGraphDescription, $openGraphImage){
        $setTitle = SEOMeta::setTitle($title);
        $setDescription = SEOMeta::setDescription($description);
        $setKeywords = SEOMeta::setKeywords($keywords);
        $setOpenGraphTitle = OpenGraph::setTitle($openGraphTitle);
        $setOpenGraphDescription = OpenGraph::setDescription($openGraphDescription);
        $setOpenGraphImage = OpenGraph::addImage($openGraphImage);
        return [$setTitle, $setDescription, $setKeywords, $setOpenGraphTitle, $setOpenGraphDescription, $setOpenGraphImage];
    }
}
