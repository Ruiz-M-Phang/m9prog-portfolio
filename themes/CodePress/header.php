<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container header-inner">

        <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>">
            <?php bloginfo('name'); ?>
        </a>

        <nav class="site-navigation" aria-label="<?php esc_attr_e('Hoofdnavigatie', 'CodePress'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'fallback_cb'    => false,
            ]);
            ?>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('over-mij'))); ?>">over mij</a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('projecten'))); ?>">projecten</a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">contact</a>
        </nav>

    </div>
</header>

<main>