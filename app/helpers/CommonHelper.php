<?php

use App\Models\PageSection;

if (!function_exists('getpageSection')) {
    function getpageSection($pageId) {
        return PageSection::where('page_id', $pageId)->count();
    }
}