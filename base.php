<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
  <!--[if lt IE 9]>
  <div class="alert alert-warning">
  <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
  </div>
  <![endif]-->
  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
  <div class="wrap" role="document">
    <div class="content">
      <main class="main" role="main">
        <?php include Wrapper\template_path(); ?>
        <?php
          get_template_part('templates/footer');
          wp_footer();
        ?>
      </main><!-- /.main -->
      
    </div><!-- /.content -->
  </div><!-- /.wrap -->
</body>
</html>
