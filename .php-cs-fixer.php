<?php

$php53 = false;
$sortRisky = false;
$yoda = false;

// app
$finalClass = false;
$ifToBoolReturn = true;
$keepUnusedImport = true;
$moreRisky = true;
$regularRisky = true;
$sortOther = true;
$superRisky = true;

// // lib
// $finalClass = false;
// $ifToBoolReturn = true;
// $keepUnusedImport = false;
// $moreRisky = true;
// $regularRisky = true;
// $sortOther = true;
// $superRisky = false;

//
$rules = [
    ///

    'array_push' => $regularRisky,
    'backtick_to_shell_exec' => true,
    'ereg_to_preg' => $regularRisky,
    'mb_str_functions' => $superRisky,
    'modernize_strpos' => $regularRisky,
    'no_alias_functions' => !$regularRisky ? false : [
        'sets' => ['@all'],
    ],
    'no_alias_language_construct_call' => true,
    'no_mixed_echo_print' => [
        'use' => 'echo',
    ],
    'pow_to_exponentiation' => $regularRisky,
    'random_api_migration' => !$regularRisky ? false : [
        'replacements' => [
            'getrandmax' => 'mt_getrandmax',
            'rand' => 'mt_rand',
            'srand' => 'mt_srand',
        ],
    ],
    'set_type_to_cast' => $regularRisky,

    ///

    'array_syntax' => [
        'syntax' => $php53 ? 'long' : 'short',
    ],
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_whitespace_before_comma_in_array' => [
        'after_heredoc' => false,
    ],
    'normalize_index_brace' => true,
    'trim_array_spaces' => true,
    'whitespace_after_comma_in_array' => true,

    ///

    'braces' => [
        'allow_single_line_anonymous_class_with_empty_body' => true,
        'allow_single_line_closure' => true,
        'position_after_anonymous_constructs' => 'same',
        'position_after_control_structures' => 'same',
        'position_after_functions_and_oop_constructs' => 'next',
    ],
    'curly_braces_position' => [
        'allow_single_line_anonymous_functions' => true,
        'allow_single_line_empty_anonymous_classes' => true,
        'anonymous_classes_opening_brace' => 'same_line',
        'anonymous_functions_opening_brace' => 'same_line',
        'classes_opening_brace' => 'next_line_unless_newline_at_signature_end',
        'control_structures_opening_brace' => 'same_line',
        'functions_opening_brace' => 'next_line_unless_newline_at_signature_end',
    ],
    'encoding' => true,
    'no_multiple_statements_per_line' => true,
    'no_trailing_comma_in_singleline' => [
        'elements' => ['arguments', 'array', 'array_destructuring', 'group_import'],
    ],
    'non_printable_character' => !$regularRisky ? false : [
        'use_escape_sequences_in_strings' => true,
    ],
    'octal_notation' => true,
    // 'psr_autoloading' => '',

    ///

    'class_reference_name_casing' => true,
    'constant_case' => [
        'case' => 'lower',
    ],
    'integer_literal_case' => true,
    'lowercase_keywords' => true,
    'lowercase_static_reference' => true,
    'magic_constant_casing' => true,
    'magic_method_casing' => true,
    'native_function_casing' => true,
    'native_function_type_declaration_casing' => true,

    ///

    'cast_spaces' => [
        'space' => 'single',
    ],
    'lowercase_cast' => true,
    'modernize_types_casting' => $regularRisky,
    'no_short_bool_cast' => true,
    'no_unset_cast' => true,
    'short_scalar_cast' => true,

    ///

    'class_attributes_separation' => [
        'elements' => [
            'case' => 'none',
            'const' => 'one',
            'method' => 'one',
            'property' => 'one',
            'trait_import' => 'none',
        ],
    ],
    'class_definition' => [
        'inline_constructor_arguments' => false,
        'multi_line_extends_each_single_line' => false,
        'single_item_single_line' => true,
        'single_line' => true,
        'space_before_parenthesis' => false,
    ],
    'final_class' => $finalClass,
    'final_internal_class' => $finalClass,
    'final_public_method_for_abstract_class' => $finalClass,
    'no_blank_lines_after_class_opening' => true,
    'no_null_property_initialization' => true,
    'no_php4_constructor' => $regularRisky,
    'no_unneeded_final_method' => $regularRisky,
    'ordered_class_elements' => !$sortRisky ? false : [
        'order' => [
            'use_trait',
            'case',
            'constant_public',
            'constant_protected',
            'constant_private',
            'property_public',
            'property_protected',
            'property_private',
            'construct',
            'destruct',
            'magic',
            'phpunit',
            'method_public',
            'method_protected',
            'method_private',
        ],
        'sort_algorithm' => 'alpha',
    ],
    'ordered_interfaces' => $sortOther,
    'ordered_traits' => $sortOther,
    'protected_to_private' => true, // $finalClass,
    'self_accessor' => $regularRisky,
    'self_static_accessor' => true,
    'single_class_element_per_statement' => [
        'elements' => [
            'const',
            'property',
        ],
    ],
    'single_trait_insert_per_statement' => true,
    'visibility_required' => [
        'elements' => [
            // 'const',
            'method',
            'property',
        ],
    ],

    ///

    'date_time_immutable' => $regularRisky,

    ///

    'comment_to_phpdoc' => false,
    'header_comment' => false,
    'multiline_comment_opening_closing' => true,
    'no_empty_comment' => false,
    'no_trailing_whitespace_in_comment' => true,
    'single_line_comment_spacing' => true,
    'single_line_comment_style' => [
        'comment_types' => [
            'asterisk',
            // 'hash',
        ],
    ],

    ///

    'native_constant_invocation' => !$regularRisky ? false : [
        'exclude' => ['null', 'false', 'true'],
        'fix_built_in' => true,
        'include' => [],
        'scope' => 'all',
        'strict' => true,
    ],

    ///

    'control_structure_braces' => true,
    'control_structure_continuation_position' => [
        'position' => 'next_line',
    ],
    'elseif' => true,
    'empty_loop_body' => [
        'style' => 'braces',
    ],
    'empty_loop_condition' => [
        'style' => 'while',
    ],
    'include' => true,
    'no_alternative_syntax' => [
        'fix_non_monolithic_code' => true,
    ],
    'no_break_comment' => [
        'comment_text' => 'no break',
    ],
    'no_superfluous_elseif' => true,
    'no_trailing_comma_in_list_call' => true,
    'no_unneeded_control_parentheses' => [
        'statements' => array_filter([
            'break',
            'clone',
            'continue',
            'echo_print',
            $superRisky ? 'negative_instanceof' : false,
            'others',
            'return',
            'switch_case',
            'yield',
            'yield_from',
        ]),
    ],
    'no_unneeded_curly_braces' => [
        'namespaces' => false,
    ],
    'no_useless_else' => true,
    'simplified_if_return' => $ifToBoolReturn,
    'switch_case_semicolon_to_colon' => true,
    'switch_case_space' => true,
    'switch_continue_to_break' => true,
    'trailing_comma_in_multiline' => $php53 ? false : [
        'after_heredoc' => false,
        'elements' => [
            // 'arguments',
            'arrays',
            // 'match',
            // 'parameters',
        ],
    ],
    'yoda_style' => !$yoda ? false : [
        'always_move_variable' => true,
        'equal' => true,
        'identical' => true,
        'less_and_greater' => null,
    ],

    ///

    'combine_nested_dirname' => $regularRisky,
    'date_time_create_from_format_call' => true,
    'fopen_flag_order' => $regularRisky,
    'fopen_flags' => $regularRisky,
    'function_declaration' => [
        'closure_function_spacing' => 'one',
        'closure_fn_spacing' => 'one',
        'trailing_comma_single_line' => false,
    ],
    'function_typehint_space' => true,
    'implode_call' => $regularRisky,
    'lambda_not_used_import' => true,
    'method_argument_space' => [
        'after_heredoc' => false,
        'keep_multiple_spaces_after_comma' => false,
        'on_multiline' => 'ensure_fully_multiline',
    ],
    'native_function_invocation' => !$regularRisky ? false : [
        'exclude' => [],
        'include' => ['@internal'],
        'scope' => 'all',
        'strict' => true,
    ],
    'no_spaces_after_function_name' => true,
    'no_unreachable_default_argument_value' => false,
    'no_useless_sprintf' => $regularRisky,
    'nullable_type_declaration_for_default_null_value' => [
        'use_nullable_type_declaration' => false,
    ],
    'regular_callable_call' => !$php53 && $moreRisky,
    'return_type_declaration' => [
        'space_before' => 'one',
    ],
    'single_line_throw' => true,
    'static_lambda' => !$php53 && $regularRisky,
    'use_arrow_functions' => false,
    'void_return' => false,

    ///

    'fully_qualified_strict_types' => true,
    'global_namespace_import' => [
        'import_classes' => true,
        'import_constants' => null,
        'import_functions' => null,
    ],
    'group_import' => false,
    'no_leading_import_slash' => true,
    'no_unneeded_import_alias' => true,
    'no_unused_imports' => !$keepUnusedImport,
    'ordered_imports' => [
        'sort_algorithm' => 'alpha',
        'imports_order' => [
            'const',
            'class',
            'function',
        ],
    ],
    'single_import_per_statement' => [
        'group_to_single_imports' => false,
    ],
    'single_line_after_imports' => true,

    ///

    'combine_consecutive_issets' => false,
    'combine_consecutive_unsets' => false,
    'declare_equal_normalize' => [
        'space' => 'single',
    ],
    'declare_parentheses' => true,
    'dir_constant' => $regularRisky,
    // 'error_suppression' => [],
    'explicit_indirect_variable' => $regularRisky,
    'function_to_constant' => !$regularRisky ? false : [
        'functions' => [
            'get_called_class',
            'get_class',
            'get_class_this',
            'php_sapi_name',
            'phpversion',
            'pi',
        ],
    ],
    'get_class_to_class_keyword' => false,
    'is_null' => $regularRisky,
    'no_unset_on_property' => $regularRisky,
    'single_space_after_construct' => [
        'constructs' => [
            'abstract', 'as', 'attribute', 'break', 'case', 'catch', 'class', 'clone', 'comment', 'const', 'const_import', 'continue', 'do', 'echo', 'else', 'elseif', 'enum', 'extends', 'final', 'finally', 'for', 'foreach', 'function', 'function_import', 'global', 'goto', 'if', 'implements', 'include', 'include_once', 'instanceof', 'insteadof', 'interface', 'match', 'named_argument', 'namespace', 'new', 'open_tag_with_echo', 'php_doc', 'php_open', 'print', 'private', 'protected', 'public', 'readonly', 'require', 'require_once', 'return', 'static', 'switch', 'throw', 'trait', 'try', 'use', 'use_lambda', 'use_trait', 'var', 'while', 'yield', 'yield_from'
        ],
    ],

    ///

    'list_syntax' => [
        'syntax' => 'long',
    ],

    ///

    'blank_line_after_namespace' => true,
    'clean_namespace' => true,
    'no_blank_lines_before_namespace' => false,
    'no_leading_namespace_whitespace' => true,
    'single_blank_line_before_namespace' => true,

    ///

    'no_homoglyph_names' => $regularRisky,

    ///

    'assign_null_coalescing_to_coalesce_equal' => true,
    'binary_operator_spaces' => [
        'default' => 'single_space',
    ],
    'concat_space' => [
        'spacing' => 'one',
    ],
    'increment_style' => [
        'style' => 'pre',
    ],
    'logical_operators' => $regularRisky,
    'new_with_braces' => [
        'anonymous_class' => true,
        'named_class' => false,
    ],
    'no_space_around_double_colon' => true,
    'no_useless_concat_operator' => [
        'juggle_simple_strings' => true,
    ],
    'no_useless_nullsafe_operator' => true,
    'not_operator_with_space' => false,
    'not_operator_with_successor_space' => true,
    'object_operator_without_whitespace' => true,
    'operator_linebreak' => [
        'only_booleans' => false,
        'position' => 'beginning',
    ],
    'standardize_increment' => true,
    'standardize_not_equals' => true,
    'ternary_operator_spaces' => true,
    'ternary_to_elvis_operator' => $regularRisky,
    'ternary_to_null_coalescing' => false,
    'unary_operator_spaces' => true,

    ///

    'blank_line_after_opening_tag' => true,
    'echo_tag_syntax' => [
        'format' => 'short',
        'shorten_simple_statements_only' => true,
    ],
    'full_opening_tag' => true,
    'linebreak_after_opening_tag' => true,
    'no_closing_tag' => true,

    ///

    'no_useless_return' => true,
    'return_assignment' => true,
    'simplified_null_return' => false,

    ///

    'multiline_whitespace_before_semicolons' => [
        'strategy' => 'no_multi_line',
    ],
    'no_empty_statement' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'semicolon_after_instruction' => true,
    'space_after_semicolon' => [
        'remove_in_empty_for_expressions' => true,
    ],

    ///

    'declare_strict_types' => false,
    'strict_comparison' => $moreRisky,
    'strict_param' => $regularRisky,

    ///

    'escape_implicit_backslashes' => [
        'double_quoted' => true,
        'heredoc_syntax' => true,
        'single_quoted' => false,
    ],
    'explicit_string_variable' => true,
    'heredoc_to_nowdoc' => true,
    'no_binary_string' => true,
    'no_trailing_whitespace_in_string' => $moreRisky,
    'simple_to_complex_string_variable' => true,
    'single_quote' => [
        'strings_containing_single_quote_chars' => false,
    ],
    'string_length_to_empty' => $regularRisky,
    'string_line_ending' => $moreRisky,

    ///

    'array_indentation' => true,
    'blank_line_before_statement' => [
        'statements' => [
            'break',
            'continue',
            'declare',
            'return',
            'throw',
            'try',
        ],
    ],
    'blank_line_between_import_groups' => false,
    'compact_nullable_typehint' => true,
    'heredoc_indentation' => false,
    'indentation_type' => true,
    'line_ending' => true,
    'method_chaining_indentation' => true,
    'no_extra_blank_lines' => [
        'tokens' => [
            'attribute',
            // 'break',
            // 'case',
            // 'continue',
            'curly_brace_block',
            'default',
            'extra',
            'parenthesis_brace_block',
            // 'return',
            'square_brace_block',
            // 'switch',
            // 'throw',
            'use',
            'use_trait',
        ],
    ],
    'no_spaces_around_offset' => [
        'positions' => ['inside', 'outside'],
    ],
    'no_spaces_inside_parenthesis' => true,
    'no_trailing_whitespace' => true,
    'no_whitespace_in_blank_line' => true,
    'single_blank_line_at_eof' => true,
    'statement_indentation' => true,
    'types_spaces' => [
        'space' => 'none',
        'space_multiple_catch' => 'none',
    ],

    ///

    'class_keyword_remove' => false,

    ///

    'align_multiline_comment' => true,
    'no_blank_lines_after_phpdoc' => true,
    'no_empty_phpdoc' => true,
    'no_superfluous_phpdoc_tags' => [
        'allow_mixed' => true,
        'remove_inheritdoc' => false,
        'allow_unused_params' => true,
    ],
    'phpdoc_indent' => true,
    'phpdoc_trim' => true,
];

return (new PhpCsFixer\Config)
    ->setRules($rules)
    ->setFinder(PhpCsFixer\Finder::create()->in(__DIR__.'/app/'));
