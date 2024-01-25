<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __invoke($language)
    {
        // Get the URL of the previous page
        $previousUrl = url()->previous();

        // Extract the path and segments from the URL
        $urlInfo = parse_url($previousUrl);
        $path = $urlInfo['path'];
        $segments = explode('/', trim($path, '/'));

        // Modify the first segment based on the selected language
        $segments[0] = $language;

        // Rebuild the URL with the modified segments
        $modifiedUrl = url(implode('/', $segments));

        // Redirect back to the modified URL
        return redirect()->to($modifiedUrl);
    }
}