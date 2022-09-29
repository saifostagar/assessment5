<footer class="site_footer">
  <div class="container">
    <div class="row footer_content">
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 float-end">
        <img src="<?php bloginfo('template_url') ?>/assets/img/logo.png" id="footer_logo" alt="Logo">

      </div>

      <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
        <h5>Quick Links</h5>
        <?php wp_nav_menu(
          array(
            'theme_location' => 'footer-menu-1',
            'menu_class' => 'nav navbar-nav',
            'container_class' => 'footer_nav'
          )
        ) ?>
      </div>

      <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
        <h5>Resources</h5>
        <?php wp_nav_menu(
          array(
            'theme_location' => 'footer-menu-2',
            'menu_class' => 'nav navbar-nav',
            'container_class' => 'footer_nav'
          )
        ) ?>
      </div>
      <div class="col-md-2"></div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer_nav">
        <div class="site_address">
          <h5>Main Address</h5>
          <p>257 Cornelison Ave 6th floor, Jersey City, NJ 07302, United States</p>

          <h5>Phone</h5>
          <p>+1 201-3693470</p>
        </div>
      </div>
    </div>
    <div class="row pt-5 footer_content">
      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <h4 class="copyright">&copy; <?php echo date('Y'); ?> Hudson County All rights reserved.</h4>
      </div>

      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
        <ul class="footer-social-link">
          <li class="ms-3">
            <a class="link-dark" href="#">
              <img src="<?php bloginfo('template_url') ?>/assets/img/ic-facebook.png" alt="" />
            </a>
          </li>
          <li class="ms-3">
            <a class="link-dark" href="#">
              <img src="<?php bloginfo('template_url') ?>/assets/img/ic-twitter.png" alt="" />
            </a>
          </li>
          <li class="ms-3">
            <a class="link-dark" href="#">
              <img src="<?php bloginfo('template_url') ?>/assets/img/ic-instagram.png" alt="" />
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="d-flex justify-content-between py-4 my-4 footer_cr">


    </div>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="<?php bloginfo('template_url') ?>/js/script.js"></script>
<?php
wp_footer();
?>
</body>

</html>