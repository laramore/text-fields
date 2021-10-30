<?php
/**
 * Define a specific firstname field.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2020
 * @license MIT
 */

namespace Laramore\Fields;

class FirstName extends Body
{
    public function get($model)
    {
        return $this->getOwner()->getFieldValue($this, $model);
    }
}
