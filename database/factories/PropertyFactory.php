<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $color = ['red', 'green', 'yellow'];
        $size = ['large', 'middle', 'small'];
        $state = ['new', 'secondHand', 'undefined'];
        return [
            'color' => Arr::random($color),
            'size' => Arr::random($size),
            'state' => Arr::random($state),
        ];
    }
}
