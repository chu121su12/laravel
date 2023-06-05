<?php

$param['risky'] = false;

$next = '';

foreach ($_SERVER['argv'] as $k => $argValue) {
    if (! $next) {
        if ($argValue === '--allow-risky') {
            $next = 'risky';
            break;
        }
    }
    else {
        $param[$next] = \strtolower($argValue) === 'yes';
        $next = '';
    }
}

$param['php53'] = false;
$param['app'] = true;
$param['sortRisky'] = false;
$param['yoda'] = false;
$param['folders'] = [
    'app',
    'config',
    'database',
    'public',
    'resources/views',
    'routes',
    'tests',
];

if ($param['app']) {
    // app
    $param['finalClass'] = false;
    $param['ifToBoolReturn'] = true;
    $param['keepUnusedImport'] = true;
    $param['moreRisky'] = $param['risky'];
    $param['regularRisky'] = $param['risky'];
    $param['sortOther'] = true;
    $param['superRisky'] = $param['risky'];
}
else {
    // lib
    $param['finalClass'] = false;
    $param['ifToBoolReturn'] = true;
    $param['keepUnusedImport'] = false;
    $param['moreRisky'] = $param['risky'];
    $param['regularRisky'] = $param['risky'];
    $param['sortOther'] = true;
    $param['superRisky'] = false;
}

//
$param['rules'] = [
    ///

    'array_push' => $param['regularRisky'],
    'backtick_to_shell_exec' => true,
    'ereg_to_preg' => $param['regularRisky'],
    'mb_str_functions' => $param['superRisky'],
    'modernize_strpos' => $param['regularRisky'],
    'no_alias_functions' => !$param['regularRisky'] ? false : [
        'sets' => ['@all'],
    ],
    'no_alias_language_construct_call' => true,
    'no_mixed_echo_print' => [
        'use' => 'echo',
    ],
    'pow_to_exponentiation' => $param['regularRisky'],
    'random_api_migration' => !$param['regularRisky'] ? false : [
        'replacements' => [
            'getrandmax' => 'mt_getrandmax',
            'rand' => 'mt_rand',
            'srand' => 'mt_srand',
        ],
    ],
    'set_type_to_cast' => $param['regularRisky'],

    ///

    'array_syntax' => [
        'syntax' => $param['php53'] ? 'long' : 'short',
    ],
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_whitespace_before_comma_in_array' => [
        'after_heredoc' => false,
    ],
    'normalize_index_brace' => true,
    'trim_array_spaces' => true,
    'whitespace_after_comma_in_array' => true,

    ///

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
    'non_printable_character' => !$param['regularRisky'] ? false : [
        'use_escape_sequences_in_strings' => true,
    ],
    'octal_notation' => true,
    // 'psr_autoloading' => '',
    'single_line_empty_body' => true,

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
    'modernize_types_casting' => $param['regularRisky'],
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
    'final_class' => $param['finalClass'],
    'final_internal_class' => $param['finalClass'],
    'final_public_method_for_abstract_class' => $param['finalClass'],
    'no_blank_lines_after_class_opening' => true,
    'no_null_property_initialization' => true,
    'no_php4_constructor' => $param['regularRisky'],
    'no_unneeded_final_method' => $param['regularRisky'],
    'ordered_class_elements' => !$param['sortRisky'] ? false : [
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
    'ordered_interfaces' => $param['sortOther'],
    'ordered_traits' => $param['moreRisky'] ? $param['sortOther'] : false,
    'ordered_types' => [
        'sort_algorithm' => 'alpha',
        'null_adjustment' => 'always_first',
    ],
    'protected_to_private' => true, // $param['finalClass'],
    'self_accessor' => $param['regularRisky'],
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

    'date_time_immutable' => $param['regularRisky'],

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

    'native_constant_invocation' => !$param['regularRisky'] ? false : [
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
            $param['superRisky'] ? 'negative_instanceof' : false,
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
    'simplified_if_return' => $param['ifToBoolReturn'],
    'switch_case_semicolon_to_colon' => true,
    'switch_case_space' => true,
    'switch_continue_to_break' => true,
    'trailing_comma_in_multiline' => $param['php53'] ? false : [
        'after_heredoc' => false,
        'elements' => [
            // 'arguments',
            'arrays',
            // 'match',
            // 'parameters',
        ],
    ],
    'yoda_style' => !$param['yoda'] ? false : [
        'always_move_variable' => true,
        'equal' => true,
        'identical' => true,
        'less_and_greater' => null,
    ],

    ///

    'combine_nested_dirname' => $param['regularRisky'],
    'date_time_create_from_format_call' => $param['regularRisky'],
    'fopen_flag_order' => $param['regularRisky'],
    'fopen_flags' => $param['regularRisky'],
    'function_declaration' => [
        'closure_function_spacing' => 'one',
        'closure_fn_spacing' => 'one',
        'trailing_comma_single_line' => false,
    ],
    'function_typehint_space' => true,
    'implode_call' => $param['regularRisky'],
    'lambda_not_used_import' => true,
    'method_argument_space' => [
        'after_heredoc' => false,
        'keep_multiple_spaces_after_comma' => false,
        'on_multiline' => 'ensure_fully_multiline',
    ],
    'native_function_invocation' => !$param['regularRisky'] ? false : [
        'exclude' => [],
        'include' => ['@internal'],
        'scope' => 'all',
        'strict' => true,
    ],
    'no_spaces_after_function_name' => true,
    'no_unreachable_default_argument_value' => false,
    'no_useless_sprintf' => $param['regularRisky'],
    'nullable_type_declaration_for_default_null_value' => [
        'use_nullable_type_declaration' => false,
    ],
    'regular_callable_call' => !$param['php53'] && $param['moreRisky'],
    'return_type_declaration' => [
        'space_before' => 'one',
    ],
    'single_line_throw' => true,
    'static_lambda' => !$param['php53'] && $param['regularRisky'],
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
    'no_unused_imports' => !$param['keepUnusedImport'],
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
    'dir_constant' => $param['regularRisky'],
    // 'error_suppression' => [],
    'explicit_indirect_variable' => $param['regularRisky'],
    'function_to_constant' => !$param['regularRisky'] ? false : [
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
    'is_null' => $param['regularRisky'],
    'no_unset_on_property' => $param['regularRisky'],
    'single_space_around_construct' => [
        'constructs_contain_a_single_space' => ['yield_from'],
        'constructs_preceded_by_a_single_space' => ['use_lambda'],
        'constructs_followed_by_a_single_space' => ['abstract', 'as', 'attribute', 'break', 'case', 'catch', 'class', 'clone', 'comment', 'const', 'const_import', 'continue', 'do', 'echo', 'else', 'elseif', 'enum', 'extends', 'final', 'finally', 'for', 'foreach', 'function', 'function_import', 'global', 'goto', 'if', 'implements', 'include', 'include_once', 'instanceof', 'insteadof', 'interface', 'match', 'named_argument', 'namespace', 'new', 'open_tag_with_echo', 'php_doc', 'php_open', 'print', 'private', 'protected', 'public', 'readonly', 'require', 'require_once', 'return', 'static', 'switch', 'throw', 'trait', 'try', 'type_colon', 'use', 'use_lambda', 'use_trait', 'var', 'while', 'yield', 'yield_from'],
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

    'no_homoglyph_names' => $param['regularRisky'],

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
    'logical_operators' => $param['regularRisky'],
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
    'ternary_to_elvis_operator' => $param['regularRisky'],
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
    'strict_comparison' => $param['moreRisky'],
    'strict_param' => $param['regularRisky'],

    ///

    'escape_implicit_backslashes' => [
        'double_quoted' => true,
        'heredoc_syntax' => true,
        'single_quoted' => false,
    ],
    'explicit_string_variable' => true,
    'heredoc_to_nowdoc' => true,
    'no_binary_string' => true,
    'no_trailing_whitespace_in_string' => $param['moreRisky'],
    'simple_to_complex_string_variable' => true,
    'single_quote' => [
        'strings_containing_single_quote_chars' => false,
    ],
    'string_length_to_empty' => $param['regularRisky'],
    'string_line_ending' => $param['moreRisky'],

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
    'phpdoc_param_order' => true,
    'phpdoc_trim' => true,
];

return (new PhpCsFixer\Config)
    ->setRules($param['rules'])
    ->setFinder(\call_user_func(static function () use ($param) {
        $folders = [];
        foreach ($param['folders'] as $folder) {
            $folders[] = __DIR__.'/'.$folder.'/';
        }
        return PhpCsFixer\Finder::create()->in($folders);
    }));
