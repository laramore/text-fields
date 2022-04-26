<?php
/**
 * Define a text enum field.
 * It is like an enum field but instead of an enum value in database, it is a string.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2020
 * @license MIT
 */

namespace Laramore\Fields;

class TextEnum extends Enum
{
    /**
     * Max length.
     * Can be calculated
     *
     * @var int
     */
    protected $length;

    /**
     * Define the max length for this field.
     *
     * @param int $length
     *
     * @return self
     */
    public function length(int $length)
    {
        $this->needsToBeUnlocked();

        if ($length <= 0) {
            throw new \Exception('The max length must be a positive number');
        }

        $this->defineProperty('length', $length);

        return $this;
    }
    /**
     * During locking, define the max length if it is not.
     *
     * @return void
     */
    public function locking()
    {
        parent::locking();

        if (\is_null($this->length)) {
            $this->length = \array_reduce($this->elements->all(), function ($length, $element) {
                return ($length < ($newLenght = \strlen($element->getName()))) ? $newLenght : $length;
            }, 0);
        }
    }
}
