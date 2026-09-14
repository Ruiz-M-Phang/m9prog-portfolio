<?php

function stage_portfolio_setup() {
    add_theme_support('title-tag');

    register_nav_menus([
        'primary' => __('Hoofdmenu', 'CodePress'),
    ]);
}
add_action('after_setup_theme', 'stage_portfolio_setup');


function stage_portfolio_assets() { // functie die verwijst waar de style.css is
    wp_enqueue_style(
        'CodePress', // LET OP!: type hier de naam van jouw thema
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'stage_portfolio_assets');