<?php
/**
 * The template for displaying the footer.
 *
 * @package flatsome
 */

global $flatsome_opt;
?>

</main><!-- #main -->

<footer id="footer" class="footer-wrapper">

  <div class="container">
    <div class="">
      <h1>Kontakta oss</h1>
    </div>
    <p class="footer-first-text">Kontakta oss för en kostnadsfri konsultation kring dina fuktproblem och mer information om hur du dränerar utan att gräva.
</p>
    <?php echo do_shortcode("[contact-form-7 id='8' title='Kontaktformulär']"); ?>
  <div class="row" style="text-align:center; margin-top:50px;">
    <div class="col small-6 large-3">
      <ul>
        <li>Adress</li>
        <li>Electro Drain</li>
        <li>Frölunda Smedjegatan 4</li>
        <li>Göteborg</li>
        <li>Sverige</li>
      </ul>
    </div>
    <div class="col small-6 large-3">
    <ul>
        <li>Kontaktinformation</li>
        <li>info@electrodrain.se</li>
        <li>Jonas: 070-6304030</li>
        <li>Ulf: 070-5251110</li>
      </ul>
    </div>
    <div class="col small-6 large-3">
      <img class="footer-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo_CE-MARK_white.png" />
    </div>
    <div class="col small-6 large-3">
      <a href="https://www.tuv.com/sweden/en/about-us/t%C3%BCv-rheinland-sweden/" target="_blank">
      <img class="footer-img" style="background-color:white;" src="<?php echo get_stylesheet_directory_uri(); ?>/img/tuv-loggo.png" />
      </a> 
    </div>
  </div>
  </div>
</footer><!-- .footer-wrapper -->
<div class="absolute-footer <?php echo flatsome_option('footer_bottom_text'); ?> medium-text-center <?php echo $align;?>">
  <div class="container clearfix">

    <?php if ( $flatsome_footer_right_text || $flatsome_absolute_footer_secondary ) : ?>
      <div class="footer-secondary pull-right">
        <?php if ( $flatsome_footer_right_text ) : ?>
          <div class="footer-text inline-block small-block">
            <?php echo do_shortcode($flatsome_footer_right_text); ?>
          </div>
        <?php endif; ?>
        <?php echo $flatsome_absolute_footer_secondary; ?>
      </div><!-- -right -->
    <?php endif; ?>

    <div class="footer-primary">
      <?php if ( has_nav_menu( 'footer' ) ) : ?>
        <?php
        wp_nav_menu( array(
          'theme_location' => 'footer',
          'menu_class' => 'links footer-nav uppercase',
          'depth' => 1,
          'fallback_cb' => false,
        ) );
        ?>
      <?php endif; ?>
      <div class="copyright-footer" style="display:flex;">
        <div class=""><img class="footer-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/electro-white.png" /></div>
        <div class="footer-info">
          <!-- <?php echo do_shortcode( get_theme_mod( 'footer_left_text', 'Copyright [ux_current_year]' ) ); ?> -->
          <p>@ 2021 Electro Drain</p>
        </div>
        <div class="footer-logo-container">
          <a href="https://www.facebook.com/ElectroDrain" target="_blank">
            <img class="footer-loggo" src="<?php echo get_stylesheet_directory_uri(); ?>/img/fb-white.png" />
          </a>
        </div>
      </div>
      <?php do_action( 'flatsome_absolute_footer_primary' ); ?>
    </div><!-- .left -->
  </div><!-- .container -->
</div><!-- .absolute-footer -->
</div><!-- #wrapper -->

<?php wp_footer(); ?>


<!-- Mediakonsten Analytics -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//mk-analytics.mediakonsten.se/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '27']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Mediakonsten Analytics -->


</body>
</html>
