<?php

/**
 * HasDefaultImage
 */

namespace App\Traits;

trait HasDefaultImage
{
    public function getImg($altTxt)
    {
        if (!$this->img) {
            return "https://ui-avatars.com/api/?name=$altTxt&size=160";
        } else {
            return $this->img;
        }
    }
}