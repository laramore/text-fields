<?php
/**
 * Add the field Text as a Type.
 *
 * @author Samy Nastuzzi <samy@nastuzzi.fr>
 *
 * @copyright Copyright (c) 2019
 * @license MIT
 */

namespace Laramore\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Grammars\{
    Grammar, MySqlGrammar
};
use Laramore\Traits\Provider\MergesConfig;
use Laramore\Facades\{
    Type, GrammarType
};

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
            __DIR__."/../../config/field.php", "field",
        );

        $this->mergeConfigFrom(
            __DIR__."/../../config/option.php", "option",
        );

        $this->mergeConfigFrom(
            __DIR__."/../../config/type.php", "type",
        );
    }

    /**
     * At booting, add migration fields.
     *
     * @return void
     */
    public function boot()
    {
         $this->addMigrationFields();
    }

    /**
     * Add the migration field 'binaryText'.
     *
     * @return void
     */
    protected function addMigrationFields()
    {
        $TextType = Type::get('Text')->getDefaultMigrationType();
        $primaryType = Type::get('primary_Text')->getDefaultMigrationType();

        // For all grammars, the Text is already a binary or a specific Text type.
        $handler = GrammarType::getHandler(Grammar::class);
        $handler->create($TextType, $TextType, function ($column) {
            return $this->typeText($column);
        });

        // For all grammars, the Text is already a binary or a specific Text type.
        $handler = GrammarType::getHandler(Grammar::class);
        $handler->create($primaryType, $primaryType, function ($column) {
            return $this->typeText($column);
        });

        // For only the Mysql grammar, the Text type is a 16 length string.
        // So, in order to optimize it, we create a new type: a binary one.
        // It is programatically converted by the Text field:
        // Binary (for the database) <=> String (for all PHP interactions).
        $handler = GrammarType::getHandler(MySqlGrammar::class);
        $handler->create($TextType, $TextType, function ($column) {
            return 'binary(16)';
        });
    }
}
