<?php

get_header(); 

while ( have_posts() ) :
    the_post(); 

    $url = get_permalink();
?>


<main>
    <a href="<?= $url ?>">
        <h1><?= get_the_title() ?></h1>
    </a>
    <p><?= the_content() ?></p>
</main>

<?php
endwhile;

get_footer();

?>