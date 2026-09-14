

# Begrijp ik al

## footer.php

```php
<p>
    &copy; <?php echo esc_html(wp_date('Y')); ?>
    <?php bloginfo('name'); ?>.
</p>
```

# Begrijp ik niet

## functions.php

```php
add_theme_support('title-tag');

register_nav_menus([
    'primary' => __('Hoofdmenu', 'CodePress'),
]);

wp_enqueue_style(
    'CodePress',
    get_stylesheet_uri(),
    [],
    wp_get_theme()->get('Version')
);

add_action('wp_enqueue_scripts', 'stage_portfolio_assets');
```

## header.php

```php
wp_nav_menu([
    'theme_location' => 'primary',
    'fallback_cb'    => false,
]);
```

# Moet ik later veranderen

## functions.php

### ChatGPT's code

```php
function stage_portfolio_assets() {
    wp_enqueue_style(
        'stage-portfolio-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}
```

### Ruiz M. Phang's veranderening

```php
function stage_portfolio_assets() { // functie die verwijst waar de style.css is
    wp_enqueue_style(
        'CodePress', // LET OP!: type hier de naam van jouw thema
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}
```

## front-page.php

### ChatGPT's code

```html
<p>
    Mijn naam is Jouw Naam. Ik ben software developer in opleiding
    en zoek een stageplek waar ik mijn technische vaardigheden kan
    inzetten en verder ontwikkelen.
</p>
```

### Ruiz M. Phang's veranderening

```html
<p>
    Mijn naam is Ruiz M. Phang. Ik ben software developer in opleiding
    en zoek een stageplek waar ik mijn technische vaardigheden kan
    inzetten en verder ontwikkelen.
</p>
```