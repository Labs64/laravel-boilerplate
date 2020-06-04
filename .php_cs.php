<?php

// https://mlocati.github.io/php-cs-fixer-configurator
// https://stackoverflow.com/questions/29839194/php-cs-fixer-need-more-information-on-using-fix-level-option

// Fixers ruleset
$fixers = [
    // General Standards
    '@Symfony' => true,
    '@PSR1'    => true,
    '@PSR2'    => true,

    // Generic
    'array_indentation'           => false,
    'array_syntax'                => ['syntax' => 'short'],
    'combine_consecutive_issets'  => true,
    'combine_consecutive_unsets'  => true,
    'increment_style'             => false,
    'explicit_indirect_variable'  => true,
    'explicit_string_variable'    => true,
    'linebreak_after_opening_tag' => true,
    'list_syntax'                 => ['syntax' => 'long'],
    'lowercase_static_reference'  => true,
    'no_extra_blank_lines'        => [
        'tokens' => [
            'break', 'continue', 'extra', 'return', 'throw', 'use', 'parenthesis_brace_block', 'square_brace_block', 'curly_brace_block',
        ],
    ],
    'no_leading_import_slash'               => true,
    'no_short_echo_tag'                     => true,
    'no_superfluous_elseif'                 => true,
    'no_trailing_comma_in_singleline_array' => true,
    'no_unreachable_default_argument_value' => false, // DANGER IF TRUE!!
    'no_unused_imports'                     => true,
    'no_useless_else'                       => true,
    'no_useless_return'                     => true,
    'ordered_class_elements'                => false,
    'ordered_imports'                       => ['sortAlgorithm' => 'alpha'],
    'protected_to_private'                  => false,
    'return_assignment'                     => true,
    'semicolon_after_instruction'           => true,
    'short_scalar_cast'                     => true,
    'ternary_to_null_coalescing'            => true,
    'trailing_comma_in_multiline_array'     => true,
    'yoda_style'                            => false,

    // Newly added Laravel style
    // https://gist.github.com/petericebear/72e2b462f59b305c551c
    'blank_line_before_statement' => [
        'statements' => [
            'continue', 'die', 'exit', 'return', 'switch', 'if', 'do', 'throw', 'try', 'yield',
        ],
    ],
    'heredoc_to_nowdoc'           => true,
    'class_attributes_separation' => [
        'elements' => [
            'method', 'property',
        ],
    ],
    'no_blank_lines_after_class_opening'     => true,
    'multiline_whitespace_before_semicolons' => [
        'strategy' => 'new_line_for_chained_calls',
    ],
    'no_whitespace_in_blank_line' => true,
    'self_accessor'               => true,

    // More newly added Laravel style
    // https://gist.github.com/vluzrmos/e9354bcafca256bdf64e
    'blank_line_after_opening_tag'                => true,
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_leading_namespace_whitespace'             => true,
    'no_blank_lines_after_phpdoc'                 => true,
    'object_operator_without_whitespace'          => true,
    'not_operator_with_space'                     => false,
    'modernize_types_casting'                     => true,
    'cast_spaces'                                 => ['space' => 'single'],
    'standardize_not_equals'                      => true,
    'ternary_operator_spaces'                     => true,
    'unary_operator_spaces'                       => true,
    'phpdoc_no_useless_inheritdoc'                => false,

    // Docblocks & Comments
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_align'                        => [
        'tags'  => ['param'],
        'align' => 'vertical',
    ],
    'phpdoc_indent'                                 => true,
    'phpdoc_inline_tag'                             => true,
    'phpdoc_no_empty_return'                        => false,
    'phpdoc_no_package'                             => false,
    'phpdoc_order'                                  => true,
    'phpdoc_scalar'                                 => true,
    'phpdoc_separation'                             => true,
    'phpdoc_trim'                                   => true,
    'phpdoc_trim_consecutive_blank_line_separation' => true,
    'phpdoc_types'                                  => true,
    'phpdoc_var_without_name'                       => true,

    'no_empty_comment'           => false,
    'no_empty_phpdoc'            => false,
    'no_empty_statement'         => false,
    'no_superfluous_phpdoc_tags' => false,

    'single_line_comment_style' => false,

    // Spacing and alignment
    'align_multiline_comment' => true,
    'binary_operator_spaces'  => [
        'default'   => 'align_single_space_minimal',
        'operators' => [
            '+=' => 'single_space',
        ],
    ],
    'concat_space'                      => ['spacing' => 'none'],
    'method_argument_space'             => ['on_multiline' => 'ignore'],
    'method_chaining_indentation'       => true,
    'not_operator_with_successor_space' => true,
    'no_spaces_around_offset'           => [
        'positions' => ['outside'],
    ],
    'trim_array_spaces' => true,

    // PHPUnit
    'php_unit_test_class_requires_covers' => true,
    'general_phpdoc_annotation_remove'    => [
        'expectedException', 'expectedExceptionMessage', 'expectedExceptionMessageRegExp',
    ],
];

// Directories to not scan
$excludeDirs = [
    'bootstrap/',
    'config/',
    'docs/',
    'public/',
    'resources/',
    'storage/',
    'vendor/',
    '.circleci/',
];

// Files to not scan
$excludeFiles = [
    'public/index.php',
    'server.php',
];

// Create a new Symfony Finder instance
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude($excludeDirs)
    ->ignoreDotFiles(true)->ignoreVCS(true)
    ->filter(function (\SplFileInfo $file) use ($excludeFiles) {
        return ! in_array($file->getRelativePathName(), $excludeFiles);
    })
;

// Create and return a PHP CS Fixer instance
return PhpCsFixer\Config::create()
    ->setRules($fixers)->setFinder($finder)
    ->setUsingCache(false)->setRiskyAllowed(true);
