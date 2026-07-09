<?php

declare(strict_types=1);

namespace Sylarele\PhpCsFixerConfig;

use PhpCsFixer\Config as CsFixerConfig;

class Config extends CsFixerConfig
{
    public function __construct()
    {
        parent::__construct('Sylarele');

        $this->setRiskyAllowed(true);
    }

    /**
     * @return array<string, array<string, mixed>|bool>
     */
    public function getRules(): array
    {
        return [
            '@PhpCsFixer' => true,

            'blank_line_before_statement' => [
                'statements' => [
                    'break',
                    'case',
                    'continue',
                    'declare',
                    'default',
                    'exit',
                    'do',
                    'for',
                    'foreach',
                    'goto',
                    'if',
                    'include',
                    'include_once',
                    // 'phpdoc', Override
                    // 'require', Override
                    // 'require_once' Override
                    'return',
                    'switch',
                    'throw',
                    'try',
                    'while',
                    'yield',
                    'yield_from',
                ],
            ],

            // Override braces_position @PhpCsFixer
            // anonymous_classes_opening_brace => 'same_line'
            'braces_position' => [
                'anonymous_classes_opening_brace' => 'next_line_unless_newline_at_signature_end',
            ],

            // Override global_namespace_import @PhpCsFixer
            // import_classes => false
            // import_constants => false
            // import_functions => false
            'global_namespace_import' => true,

            // Override increment_style @PhpCsFixer
            // style => 'pre'
            'increment_style' => [
                'style' => 'post',
            ],

            // Override multiline_whitespace_before_semicolons @PhpCsFixer
            // 'strategy' => 'new_line_for_chained_calls'
            'multiline_whitespace_before_semicolons' => [
                'strategy' => 'no_multi_line',
            ],

            // Override new_with_parentheses @PhpCsFixer
            // anonymous_class => false
            'new_with_parentheses' => [
                'anonymous_class' => true,
            ],

            // Override ordered_imports @PhpCsFixer
            // sort_algorithm => 'none'
            'ordered_imports' => [
                'sort_algorithm' => 'alpha',
                'imports_order' => [
                    'class',
                    'const',
                    'function',
                ],
            ],

            // Override phpdoc_types_order @PhpCsFixer
            // ordered_types => 'ordered_types'
            'ordered_types' => [
                'null_adjustment' => 'always_first',
            ],

            // Override php_unit_data_provider_method_order @PhpCsFixer
            // placement => 'after'
            'php_unit_data_provider_method_order' => false,

            'phpdoc_align' => [
                'align' => 'left',
                'spacing' => 1,
            ],

            // Override phpdoc_separation @PhpCsFixer to complex
            'phpdoc_separation' => false,

            // Override phpdoc_to_comment @PhpCsFixer
            // ignored_tags => []
            'phpdoc_to_comment' => [
                'ignored_tags' => ['link'],
            ],

            // Override phpdoc_types_order @PhpCsFixer
            // null_adjustment => 'always_first'
            'phpdoc_types_order' => [
                'null_adjustment' => 'always_last',
            ],

            // Override return_assignment @PhpCsFixer => true
            'return_assignment' => false,

            // Override single_line_empty_body @PhpCsFixer => true
            'single_line_empty_body' => false,

            // Override string_implicit_backslashes @PhpCsFixer
            // double_quoted => 'escape'
            // single_quoted => 'unescape'
            'string_implicit_backslashes' => [
                'double_quoted' => 'ignore',
                'single_quoted' => 'ignore',
            ],

            // Override trailing_comma_in_multiline @PhpCsFixer
            // elements => ['array_destructuring', 'arrays']
            'trailing_comma_in_multiline' => [
                'elements' => ['arrays', 'match'],
            ],

            // Override unary_operator_spaces @PhpCsFixer
            // only_dec_inc => true
            'unary_operator_spaces' => false,

            // Override yoda_style @PhpCsFixer
            // equal => true
            // identical => true
            'yoda_style' => false,

            // New Rules
            'attribute_empty_parentheses' => true,
            'comment_to_phpdoc' => true,  // @PhpCsFixer:risky
            'declare_strict_types' => true, // @Migration:risky
            'get_class_to_class_keyword' => true, // @Migration:risky
            'is_null' => true,
            'list_syntax' => true,
            'logical_operators' => true, // @PhpCsFixer:risky
            'modernize_strpos' => true, // @PhpCsFixer:risky
            'not_operator_with_successor_space' => true,
            'ordered_interfaces' => true,
            'ordered_traits' => true, // @PhpCsFixer:risky
            'php_unit_attributes' => true,
            'php_unit_construct' => true,
            'php_unit_set_up_tear_down_visibility' => true, // @PhpCsFixer:risky
            'php_unit_test_annotation' => ['style' => 'prefix'], // @PhpCsFixer:risky
            'php_unit_test_case_static_method_calls' => ['call_type' => 'self'],
            'phpdoc_array_type' => true,
            'simplified_if_return' => true,
            'static_lambda' => true,
            'stringable_for_to_string' => true,
            'ternary_to_null_coalescing' => true,
        ];
    }
}
