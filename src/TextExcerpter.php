<?php

namespace Mellaoui\Excerpt;

class TextExcerpter implements Contracts\Excerpter
{

    /**
     * @inheritDoc
     */
    public function excerpt($text, $length)
    {

    // Check if $text is a valid string and not empty
    if (is_string($text) && !empty($text)) {
        // Remove HTML tags and trim white spaces
        
        $text = trim(strip_tags($text));

        // Explode the text into an array of words
        $words = explode(' ', $text);

        // Take the specified number of words from the beginning of the array
        $excerptWords = array_slice($words, 0, $length);

        // Join the words back into a string
        $excerpt = implode(' ', $excerptWords);

        // If the original text has more words than the specified count, append ellipses
        if (count($words) > $length) {
            $excerpt .= '...';
        }

        return $excerpt;

    }
    else
    {
      // Handle the case where $text is not a valid string
      return "Invalid input. Please provide a non-empty string.";  
    }

    }


}