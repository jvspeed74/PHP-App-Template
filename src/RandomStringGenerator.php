<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;

class RandomStringGenerator
{
    /**
     * Generate a random string of the specified length.
     *
     * @param int $length
     * @return string
     */
    public function generate(int $length = 10): string
    {
        if ($length < 1) {
            throw new InvalidArgumentException("Length must be a positive integer.");
        }

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
