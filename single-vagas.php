<?php get_header(); ?>

<main id="single-vacancies">

  <section class="intro">
    <div class="container">
      <div class="infos">
        <a href="/">
          Home
          <span>></span>
        </a>
        <a href="/trabalhe-conosco">
          Trabalhe conosco
          <span>></span>
        </a>
      </div>

      <h1><?php the_title(); ?></h1>
    </div>
  </section>

  <section class="section-content container">
    <div class="content">
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>