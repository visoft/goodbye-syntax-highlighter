<?php
/*
Plugin Name: goodbye-syntax-highlighter
Plugin URI: https://github.com/visoft/goodbye-syntax-highlighter
Description: Say goodbye to syntaxhighlighter and hello to highlight.js
Version: 0.1.2
Author: Damien White (Visoft, Inc.)
Author URI: http://www.visoftinc.com
License: GPLv2 or later
*/

/*
  Copyright 2012-2013 Visoft, Inc. <info@visoftinc.com>

  This file is part of goodbye-syntax-highlighter

    Goodbye Syntax Highlighter is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    Goodbye Syntax Highlighter is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Goodbye Syntax Highlighter; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_filter('the_content',       'gbsh_covert_code_blocks');
add_filter('the_content_rss',   'gbsh_covert_code_blocks');
add_filter('get_the_excerpt',   'gbsh_covert_code_blocks');

function gbsh_covert_code_blocks( $text ) {
    $text = preg_replace_callback('%<pre class="["]*brush:\s?([^;]*);[^>]*>([^<]*)</pre>%sim', 'gbsh_convert_code', $text);

    $text = preg_replace_callback('%<pre lang="([^"]*)"[^>]*>([^<]*)</pre>%sim', 'gbsh_convert_code', $text);

    return $text;
}

function gbsh_convert_code( $matches ) {
    // You can vary the replacement text for each match on-the-fly
    // $matches[0] holds the regex match
    // $matches[n] holds the match for capturing group n
    $code = trim( str_replace(array('&amp;', '&#039;', '&quot;'), array('&','\'','"'), $matches[2]) );
    $language = $matches[1];

    // covert csharp into cs
    if ($language == 'csharp') $language = 'cs';
    return '<pre><code class="language-'. $language . '">' . $code . '</code></pre>';
}