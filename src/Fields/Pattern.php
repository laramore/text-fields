<?php
/**
 * Define a pattern field.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2021
 * @license MIT
 */

namespace Laramore\Fields;

use Laramore\Contracts\Field\PatternField;
use Laramore\Exceptions\FieldException;

class Pattern extends Char implements PatternField
{
    protected $pattern;

    protected $patternFlags;

    /**
     * Return the pattern to match.
     *
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }

    /**
     * Return all pattern flags
     *
     * @return mixed
     */
    public function getPatternFlags()
    {
        return $this->patternFlags;
    }

    public function locking()
    {
        parent::locking();

        if (! $this->pattern) {
            throw new FieldException($this, "Pattern must be defined");
        }
    }
}
