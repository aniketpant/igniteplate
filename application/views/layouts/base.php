<!doctype html>
<html>
  <head>
    <title><?php echo $template['title'] ?> &ndash; igniteplate</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/public/style/style.css">
  </head>
  <body>
    <div class="wrapper">
      <header>
        <h1><a class="brand" href="<?php echo site_url(); ?>">igniteplate</a></h1>
      </header>
      <section>
        <h2><?php echo $template['title'] ?></h2>
        <?php echo $template['body'] ?>
      </section>
      <footer class="smallprint muted">
        <p>
          Copyright &copy; 2013 <a href="https://twitter.com/aniket_pant">Aniket</a><br>
          <strong class="caps">Work In Progress.</strong>
        </p>
      </footer>
    </div>
  </body>
</html>