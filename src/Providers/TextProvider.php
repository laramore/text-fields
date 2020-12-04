<?php
/**
 * Add text fields.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2020
 * @license MIT
 */

namespace Laramore\Providers;

use Illuminate\Support\ServiceProvider;
use Laramore\Traits\Provider\MergesConfig;

class TextProvider extends ServiceProvider
{
    use MergesConfig;

    /**
     * Prepare all configs and default options, types and fields.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__."/../../config/field/properties.php", "field.properties",
        );

        $this->mergeConfigFrom(
            __DIR__."/../../config/field/migrations.php", "field.migrations",
        );

        $this->mergeConfigFrom(
            __DIR__."/../../config/field/factories.php", "field.factories",
        );

        $this->mergeConfigFrom(
            __DIR__."/../../config/option.php", "option",
        );
    }
}
