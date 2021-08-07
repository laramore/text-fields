<?php
/**
 * Define a hexadecimal field.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2021
 * @license MIT
 */

namespace Laramore\Fields;

use Laramore\Contracts\Field\PatternField;

class Hexadecimal extends Char implements PatternField
{
    /**
     * Return the pattern to match.
     *
     * @return string
     */
    public function getPattern(): string
    {
        return '/^[0-9a-fA-F]*$/';
    }

    /**
     * Return all pattern flags
     *
     * @return mixed
     */
    public function getPatternFlags()
    {
        return null;
    }
}
