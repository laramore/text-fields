<?php
/**
 * Define a name field.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2020
 * @license MIT
 */

namespace Laramore\Fields;

use Illuminate\Support\{
    Str, Collection
};
use Laramore\Contracts\{
    Eloquent\LaramoreModel, Eloquent\LaramoreBuilder,
    Field\Field, Field\ExtraField, Field\PatternField, Field\Constraint\IndexableField
};
use Laramore\Elements\OperatorElement;
use Laramore\Facades\Operator;
use Laramore\Traits\Field\IndexableConstraints;

class Name extends BaseComposed implements ExtraField, PatternField, IndexableField
{
    use IndexableConstraints;
    /**
     * Structure with the last name in first.
     *
     * @var bool
     */
    protected $lastnameFirst;

    /**
     * Define the max length.
     *
     * @var int
     */
    protected $length;

    /**
     * Patterns for names.
     *
     * @var array
     */
    protected $patterns;

    /**
     * Indicate if the field has a value.
     *
     * @param LaramoreModel|array|\ArrayAccess $model
     * @return mixed
     */
    public function has($model)
    {
        return $this->getField('lastname')->has($model)
            && $this->getField('firstname')->has($model);
    }

    /**
     * Dry the value in a simple format.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function dry($value)
    {
        return is_null($value) ? $value : (string) $value;
    }

    /**
     * Hydrate the value in a simple format.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function hydrate($value)
    {
        return is_null($value) ? $value : (string) $value;
    }

    /**
     * Cast the value in the correct format.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function cast($value)
    {
        return is_null($value) ? $value : (string) $value;
    }

    /**
     * Serialize the value for outputs.
     *
     * @param  mixed $value
     * @return mixed
     */
    public function serialize($value)
    {
        return $value;
    }

    /**
     * Return the pattern to match.
     *
     * @return string
     */
    public function getPattern(): string
    {
        $template = $this->patterns[$this->lastnameFirst ? 'lastname_first' : 'firstname_first'];

        return Str::replaceInTemplate($template, [
            'lastname' => $this->patterns['lastname'],
            'firstname' => $this->patterns['firstname'],
        ]);
    }

    /**
     * Return all pattern flags
     *
     * @return mixed
     */
    public function getPatternFlags()
    {
        return $this->patterns['flags'];
    }

    /**
     * If no max length defined, get it from schema.
     *
     * @return void
     */
    protected function locking()
    {
        parent::locking();

        if (is_null($this->length)) {
            $this->length = $this->getField('lastname')->length + $this->getField('firstname')->length + 1;
        }
    }

    /**
     * Add a where null condition from this field.
     *
     * @param  LaramoreBuilder $builder
     * @param  string          $boolean
     * @param  boolean         $not
     * @return LaramoreBuilder
     */
    public function whereNull(LaramoreBuilder $builder, string $boolean='and', bool $not=false): LaramoreBuilder
    {
        $builder = $this->getField('firstname')->whereNull($builder, $boolean, $not);

        return $this->getField('lastname')->whereNull($builder, $boolean, $not);
    }

    /**
     * Add a where not null condition from this field.
     *
     * @param  LaramoreBuilder $builder
     * @param  string          $boolean
     * @return LaramoreBuilder
     */
    public function whereNotNull(LaramoreBuilder $builder, string $boolean='and'): LaramoreBuilder
    {
        return $this->whereNull($builder, $boolean, true);
    }

    /**
     * Add a where in condition from this field.
     *
     * @param  LaramoreBuilder    $builder
     * @param  Collection $value
     * @param  string             $boolean
     * @param  boolean            $notIn
     * @return LaramoreBuilder
     */
    public function whereIn(LaramoreBuilder $builder, Collection $value=null,
                            string $boolean='and', bool $notIn=false): LaramoreBuilder
    {
        $operator = $notIn ? Operator::equal() : Operator::different();

        return $builder->where(function ($builder) use ($value, $notIn, $operator) {
            foreach ($value as $name) {
                [$lastname, $firstname] = $this->split($name);

                $builder->where(function ($subBuilder) use ($lastname, $firstname, $operator) {
                    $this->getField('lastname')->where($subBuilder, $operator, $lastname, 'and');
                    $this->getField('firstname')->where($subBuilder, $operator, $firstname, 'and');
                }, $notIn ? 'and' : 'or');
            }
        }, $boolean);
    }

    /**
     * Add a where not in condition from this field.
     *
     * @param  LaramoreBuilder    $builder
     * @param  Collection $value
     * @param  string             $boolean
     * @return LaramoreBuilder
     */
    public function whereNotIn(LaramoreBuilder $builder, Collection $value=null, string $boolean='and'): LaramoreBuilder
    {
        return $this->whereIn($builder, $value, $boolean, true);
    }

    /**
     * Add a where condition from this field.
     *
     * @param  LaramoreBuilder $builder
     * @param  OperatorElement $operator
     * @param  mixed           $value
     * @param  string          $boolean
     * @return LaramoreBuilder
     */
    public function where(LaramoreBuilder $builder, OperatorElement $operator,
                          $value=null, string $boolean='and'): LaramoreBuilder
    {
        [$lastname, $firstname] = $this->split($value);

        return $builder->where(function ($subBuilder) use ($operator, $lastname, $firstname) {
            $this->getField('lastname')->where($subBuilder, $operator, $lastname, 'and');
            $this->getField('firstname')->where($subBuilder, $operator, $firstname, 'and');
        }, $boolean);
    }

    /**
     * Use the relation to set the other field values.
     *
     * @param LaramoreModel|array|\ArrayAccess $model
     * @param  mixed                            $value
     * @return mixed
     */
    public function set($model, $value)
    {
        if (empty($value)) {
            $value = $lastname = $firstname = null;
        } else {
            [$lastname, $firstname] = $this->split($value);
        }

        $this->getField('lastname')->set($model, $lastname);
        $this->getField('firstname')->set($model, $firstname);

        return parent::set($model, $value);
    }

    /**
     * Reset the value for the field.
     *
     * @param LaramoreModel|array|\ArrayAccess $model
     * @return mixed
     */
    public function reset($model)
    {
        $this->getField('lastname')->reset($model);
        $this->getField('firstname')->reset($model);

        return parent::reset($model);
    }

    /**
     * Resolve the value definied by the field.
     *
     * @param LaramoreModel|array|\ArrayAccess $model
     * @return mixed
     */
    public function resolve($model)
    {
        $firstname = $this->getField('firstname');
        $lastname = $this->getField('lastname');

        if (! $firstname->has($model) && ! $lastname->has($model)) {
            return null;
        }

        return $this->join($lastname->get($model), $firstname->get($model));
    }

    /**
     * Return the set value for a specific field.
     *
     * @param Field                            $field
     * @param LaramoreModel|array|\ArrayAccess $model
     * @param mixed                            $value
     * @return mixed
     */
    public function setFieldValue(Field $field, $model, $value)
    {
        parent::reset($model);

        return parent::setFieldValue($field, $model, $value);
    }

    /**
     * Split last and first names.
     *
     * @param string $value
     * @return array
     */
    public function split(string $value): array
    {
        $matched = \preg_match($this->getPattern(), $value, $matches, $this->getPatternFlags());

        if (!$matched) {
            throw new \Exception("The value `$value` is not a valid name");
        }

        return [$matches[1], $matches[2]];
    }

    /**
     * Join last and first names.
     *
     * @param string $lastname
     * @param string $firstname
     * @return string|null
     */
    public function join(string $lastname=null, string $firstname=null)
    {
        if (\is_null($lastname) || \is_null($firstname)) {
            return null;
        }

        if ($this->lastnameFirst) {
            return $lastname.' '.$firstname;
        }

        return $firstname.' '.$lastname;
    }

    /**
     * Generate a name.
     * For factories.
     *
     * @return string
     */
    public function generate(): string
    {
        $lastname = $this->getField('lastname');
        $firstname = $this->getField('firstname');

        return $this->join(
            $lastname->cast($lastname->generate()),
            $firstname->cast($firstname->generate())
        );
    }
}
