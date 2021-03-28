<?php

namespace GJames\Helpers;

use Markdown;
use GJames\Shortcode;

class ShortcodeHelpers
{
    public function ApplyShortcodes($content, $toHtml = true)
    {
        // Get shortcodes in content (more efficient than looping over all shortcodes)
        if (preg_match_all('/\[(.*?)\]/', $content, $matches)) {
            $shortcodes = Shortcode::whereIn('shortcode', $matches[1])->get();

            foreach ($shortcodes as $shortcode) {
                $content = str_replace("[$shortcode->shortcode]", $toHtml ? Markdown::convertToHtml($shortcode->content) : $shortcode->content, $content);
            }
        }

        return $content;
    }
}
