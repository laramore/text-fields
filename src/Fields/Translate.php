<?php
/**
 * Define a translate field.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2020
 * @license MIT
 */

namespace Laramore\Fields;

use Illuminate\Support\Facades\Lang;

class Translate extends Slug
{
    /**
     * Serialize the value for outputs.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function serialize($value)
    {
        return Lang::get($value);
    }
}
