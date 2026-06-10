<?php

namespace MolehillCMS\Core;

class ContentRouter
{
    public function locate($url_path)
    {
        // Get/clean the url path.
        $url_path = preg_replace('#/\.+/#', '/', $url_path);
        $url_path = preg_replace('#/?$#', '', $url_path);

        // Convert the url path to a path in the content filesystem.
        $content_path = $_SERVER['DOCUMENT_ROOT'] . '/../content' . $url_path;
        if (is_dir($content_path)) {
            $content_path .= '/_index.md';
        } else {
            $content_path .= '.md';
        }
        if (!is_file($content_path)) {
            http_response_code(404);
            die('Content not found.');
        }

        return $content_path;
    }
}
