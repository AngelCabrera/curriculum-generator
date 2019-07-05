<?php

namespace App\Traits;

Trait HasDefaultImageTrait
{
    public function getImage(string $altext){
        if(!$this->image){
            return "https://ui-avatars.com/api/?name=$altext&size=255";            
        }
        return $this->image;
    }
}