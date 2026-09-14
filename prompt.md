Laat AI een eerste WordPress-theme-structuur of homepage-opzet voorstellen. Bewaar de volledige prompt en output in prompt.md in je repository:

Zeker. Voor een eerste versie zou ik het theme **klein houden**: geen page builder, geen JavaScript-framework en geen onnodige templates. De inhoud staat voorlopig in de PHP-templates, zodat je later eenvoudig WordPress-content kunt koppelen.

## Bestandsstructuur

```text
stage-portfolio/
├── style.css
├── functions.php
├── header.php
├── footer.php
├── front-page.php
├── page-over-mij.php
├── page-projecten.php
└── page-contact.php
```

### 1. `style.css`

Dit is het centrale stylesheet van het theme. Het bevat ook de verplichte WordPress-theme-informatie.

```css
/*
Theme Name: Stage Portfolio
Theme URI: https://example.com/
Author: Jouw Naam
Description: Persoonlijk portfolio voor een software developer die stage zoekt.
Version: 1.0
*/

:root {
    --color-bg: #f7f8fa;
    --color-surface: #ffffff;
    --color-text: #17202a;
    --color-muted: #667085;
    --color-primary: #315c8c;
    --color-primary-dark: #24476d;
    --color-border: #e4e7ec;
    --radius: 12px;
    --max-width: 1100px;
}

* {
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    margin: 0;
    background: var(--color-bg);
    color: var(--color-text);
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    line-height: 1.6;
}

img {
    max-width: 100%;
    height: auto;
}

a {
    color: var(--color-primary);
}

a:hover {
    color: var(--color-primary-dark);
}

.container {
    width: min(100% - 2rem, var(--max-width));
    margin-inline: auto;
}

.site-header {
    background: var(--color-surface);
    border-bottom: 1px solid var(--color-border);
}

.header-inner {
    min-height: 4.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
}

.site-title {
    color: var(--color-text);
    font-weight: 700;
    text-decoration: none;
}

.site-navigation ul {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    list-style: none;
    margin: 0;
    padding: 0;
}

.site-navigation a {
    color: var(--color-text);
    text-decoration: none;
    font-size: 0.95rem;
}

.site-navigation a:hover {
    color: var(--color-primary);
}

.hero {
    padding: 5rem 0;
}

.hero-content {
    max-width: 750px;
}

.eyebrow {
    margin: 0 0 0.75rem;
    color: var(--color-primary);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-size: 0.8rem;
}

.hero h1 {
    max-width: 800px;
    margin: 0 0 1rem;
    font-size: clamp(2.25rem, 8vw, 4.5rem);
    line-height: 1.05;
}

.hero p {
    max-width: 650px;
    color: var(--color-muted);
    font-size: 1.1rem;
}

.button {
    display: inline-block;
    margin-top: 1rem;
    padding: 0.75rem 1.1rem;
    border-radius: 8px;
    background: var(--color-primary);
    color: #fff;
    text-decoration: none;
    font-weight: 600;
}

.button:hover {
    background: var(--color-primary-dark);
    color: #fff;
}

.section {
    padding: 4rem 0;
}

.section-header {
    margin-bottom: 2rem;
}

.section-header h2 {
    margin-bottom: 0.5rem;
}

.section-header p {
    margin: 0;
    color: var(--color-muted);
}

.projects-grid {
    display: grid;
    gap: 1.25rem;
}

.project-card {
    padding: 1.5rem;
    background: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius);
}

.project-card h3 {
    margin-top: 0;
}

.project-card p {
    color: var(--color-muted);
}

.project-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: 1rem;
}

.project-tag {
    padding: 0.25rem 0.6rem;
    border: 1px solid var(--color-border);
    border-radius: 999px;
    color: var(--color-muted);
    font-size: 0.8rem;
}

.page-content {
    padding: 4rem 0;
}

.page-content-inner {
    max-width: 750px;
}

.contact-box {
    padding: 2rem;
    background: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: var(--radius);
}

.site-footer {
    margin-top: 4rem;
    padding: 2rem 0;
    border-top: 1px solid var(--color-border);
    color: var(--color-muted);
    font-size: 0.9rem;
}

@media (min-width: 700px) {
    .projects-grid {
        grid-template-columns: repeat(3, 1fr);
    }

    .hero {
        padding: 7rem 0;
    }
}
```

---

### 2. `functions.php`

Hier registreer je de stylesheet en het navigatiemenu. Dit houdt WordPress-functionaliteit uit je templates.

```php
<?php

function stage_portfolio_setup() {
    add_theme_support('title-tag');

    register_nav_menus([
        'primary' => __('Hoofdmenu', 'stage-portfolio'),
    ]);
}
add_action('after_setup_theme', 'stage_portfolio_setup');


function stage_portfolio_assets() {
    wp_enqueue_style(
        'stage-portfolio-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'stage_portfolio_assets');
```

---

### 3. `header.php`

Dit bevat de opening van het HTML-document, de WordPress `wp_head()` en de globale header/navigatie.

```php
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

        <nav class="site-navigation" aria-label="<?php esc_attr_e('Hoofdnavigatie', 'stage-portfolio'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'fallback_cb'    => false,
            ]);
            ?>
        </nav>

    </div>
</header>

<main>
```

---

### 4. `footer.php`

Sluit de hoofdcontent en het HTML-document af. Ook `wp_footer()` is belangrijk voor WordPress en plugins.

```php
</main>

<footer class="site-footer">
    <div class="container">
        <p>
            &copy; <?php echo esc_html(wp_date('Y')); ?>
            <?php bloginfo('name'); ?>.
        </p>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
```

---

## Pagina's

### 5. `front-page.php`

Dit is de homepage. Hier staat de introductie en het overzicht van drie projecten.

```php
<?php get_header(); ?>

<section class="hero">
    <div class="container hero-content">
        <p class="eyebrow">Software developer · Stagezoeker</p>

        <h1>
            Ik bouw software die helder, praktisch en betrouwbaar is.
        </h1>

        <p>
            Mijn naam is Jouw Naam. Ik ben software developer in opleiding
            en zoek een stageplek waar ik mijn technische vaardigheden kan
            inzetten en verder ontwikkelen.
        </p>

        <a class="button" href="<?php echo esc_url(home_url('/projecten/')); ?>">
            Bekijk mijn projecten
        </a>
    </div>
</section>

<section class="section" aria-labelledby="projecten-title">
    <div class="container">

        <div class="section-header">
            <h2 id="projecten-title">Geselecteerde projecten</h2>
            <p>Een selectie van projecten waarmee ik mijn vaardigheden laat zien.</p>
        </div>

        <div class="projects-grid">

            <article class="project-card">
                <h3>Project één</h3>
                <p>
                    Een korte beschrijving van het project, het probleem
                    dat je hebt opgelost en wat jouw bijdrage was.
                </p>

                <div class="project-meta">
                    <span class="project-tag">PHP</span>
                    <span class="project-tag">MySQL</span>
                </div>
            </article>

            <article class="project-card">
                <h3>Project twee</h3>
                <p>
                    Een webapplicatie waarin bijvoorbeeld gebruikers,
                    data en een duidelijke interface samenkomen.
                </p>

                <div class="project-meta">
                    <span class="project-tag">JavaScript</span>
                    <span class="project-tag">API</span>
                </div>
            </article>

            <article class="project-card">
                <h3>Project drie</h3>
                <p>
                    Een persoonlijk of schoolproject waarmee je een
                    specifieke technische vaardigheid hebt ontwikkeld.
                </p>

                <div class="project-meta">
                    <span class="project-tag">WordPress</span>
                    <span class="project-tag">HTML/CSS</span>
                </div>
            </article>

        </div>

    </div>
</section>

<?php get_footer(); ?>
```

---

### 6. `page-over-mij.php`

WordPress gebruikt deze template voor een pagina met de slug `over-mij`.

```php
<?php get_header(); ?>

<section class="page-content">
    <div class="container">
        <div class="page-content-inner">

            <p class="eyebrow">Over mij</p>

            <h1>Wie ik ben</h1>

            <p>
                Ik ben Jouw Naam, een software developer in opleiding met
                interesse in webontwikkeling en het bouwen van praktische
                digitale oplossingen.
            </p>

            <p>
                Tijdens mijn opleiding heb ik gewerkt met verschillende
                programmeertalen, frameworks en databases. Ik vind het
                interessant om niet alleen code te schrijven, maar ook
                te begrijpen waarom een oplossing goed werkt voor de gebruiker.
            </p>

            <h2>Waar ik mij in ontwikkel</h2>

            <ul>
                <li>Backend development</li>
                <li>Web development</li>
                <li>Databases en API's</li>
                <li>Git en samenwerken in projecten</li>
            </ul>

            <h2>Mijn stage</h2>

            <p>
                Voor mijn stage zoek ik een organisatie waar ik kan leren
                van ervaren developers, verantwoordelijkheid kan nemen en
                kan bijdragen aan echte softwareprojecten.
            </p>

        </div>
    </div>
</section>

<?php get_footer(); ?>
```

---

### 7. `page-projecten.php`

Dit is het volledige projectoverzicht. Voor deze eerste versie zijn drie kaarten voldoende; later kun je ze vervangen door een custom post type of WordPress-loop.

```php
<?php get_header(); ?>

<section class="page-content">
    <div class="container">

        <div class="section-header">
            <p class="eyebrow">Portfolio</p>
            <h1>Mijn projecten</h1>
            <p>
                Een overzicht van projecten die mijn technische ontwikkeling
                en interesses laten zien.
            </p>
        </div>

        <div class="projects-grid">

            <article class="project-card">
                <h2>Project één</h2>
                <p>
                    Beschrijf hier kort wat je hebt gebouwd, voor wie het
                    bedoeld was en welk probleem je ermee oploste.
                </p>

                <div class="project-meta">
                    <span class="project-tag">PHP</span>
                    <span class="project-tag">MySQL</span>
                    <span class="project-tag">HTML/CSS</span>
                </div>
            </article>

            <article class="project-card">
                <h2>Project twee</h2>
                <p>
                    Beschrijf hier je tweede project en benadruk vooral
                    jouw eigen technische bijdrage.
                </p>

                <div class="project-meta">
                    <span class="project-tag">JavaScript</span>
                    <span class="project-tag">REST API</span>
                </div>
            </article>

            <article class="project-card">
                <h2>Project drie</h2>
                <p>
                    Beschrijf hier een derde project, bijvoorbeeld een
                    schoolopdracht, persoonlijke applicatie of website.
                </p>

                <div class="project-meta">
                    <span class="project-tag">WordPress</span>
                    <span class="project-tag">PHP</span>
                </div>
            </article>

        </div>

    </div>
</section>

<?php get_footer(); ?>
```

---

### 8. `page-contact.php`

De contactpagina. Voor een eerste versie gebruik ik bewust geen contactformulier-plugin; een eenvoudig e-mailadres is voldoende.

```php
<?php get_header(); ?>

<section class="page-content">
    <div class="container">
        <div class="page-content-inner">

            <p class="eyebrow">Contact</p>

            <h1>Neem contact op</h1>

            <div class="contact-box">
                <p>
                    Interesse in een stagiair software development?
                    Ik kom graag in contact om te bespreken wat ik voor
                    jullie organisatie kan betekenen.
                </p>

                <p>
                    <strong>E-mail:</strong>
                    <a href="mailto:jouwnaam@example.com">
                        jouwnaam@example.com
                    </a>
                </p>

                <p>
                    <strong>LinkedIn:</strong>
                    <a href="#">
                        Mijn LinkedIn-profiel
                    </a>
                </p>

                <p>
                    <strong>GitHub:</strong>
                    <a href="#">
                        Mijn GitHub-profiel
                    </a>
                </p>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
```

## WordPress instellen

Maak vervolgens in WordPress deze pagina's aan:

* **Over mij** → slug `over-mij`
* **Projecten** → slug `projecten`
* **Contact** → slug `contact`

De homepage hoeft niet als normale pagina te worden aangemaakt: `front-page.php` wordt daarvoor gebruikt.

Maak bij **Weergave → Menu's** een hoofdmenu met deze drie pagina's. De sitenaam in `header.php` komt automatisch uit de WordPress-instelling.

### Waarom deze opzet?

* **Mobile-first:** de standaardlayout is één kolom; vanaf `700px` worden de projectkaarten drie kolommen.
* **Semantisch:** `header`, `nav`, `main`, `section`, `article` en `footer` hebben elk een duidelijke functie.
* **Toegankelijker:** de navigatie en secties hebben passende labels/headings.
* **WordPress-conform:** CSS wordt via `wp_enqueue_style()` geladen en `wp_head()`, `wp_body_open()` en `wp_footer()` blijven aanwezig.
* **Geen overbodige bestanden:** voor deze statische eerste portfolio heb je geen JavaScript, `sidebar.php`, `single.php`, custom post type of build tooling nodig.
* **Makkelijk uit te breiden:** zodra je meerdere projecten krijgt, is de logische volgende stap om projecten als een **custom post type** te beheren in plaats van ze rechtstreeks in `front-page.php` en `page-projecten.php` te schrijven.
