<?php get_header(); ?>

<section class="hero">
    <div class="container hero-content">
        <p class="eyebrow">Software developer · Stagezoeker</p>

        <h1>
            Ik bouw software die helder, praktisch en betrouwbaar is.
        </h1>

        <p>
            Mijn naam is Ruiz M. Phang. Ik ben software developer in opleiding
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