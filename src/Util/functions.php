<?php

/**
 * Convert all applicable characters to HTML entities.
 *
 * @param string $text The string
 *
 * @return string The html encoded string
 */
function html(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}