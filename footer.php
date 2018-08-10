<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package northarc_investments
 */
?>
           
		</div><!-- close .site-content -->
       </div>

	<footer class="sitefooter">
     <div class="container">
       <div class="footertop">
          <div class="col-sm-4 col-xs-12 col-md-2">
            <h4 class="widgettitle">Who we are</h4>
            <?php wp_nav_menu(array('menu'=>'who-we-are'));?>
          </div>
           <div class="col-sm-4 col-xs-12 col-md-2">
            <h4 class="widgettitle">What We Do</h4>
            <?php wp_nav_menu(array('menu'=>'what-we-do'));?>
            <h4 class="widgettitle resourcetitle">Resources</h4>
           <?php wp_nav_menu(array('menu'=>'resources'));?>
          </div>
          <div class="col-sm-4 col-xs-12 col-md-3">
            <h4 class="widgettitle">Debt Funds</h4>
            <?php wp_nav_menu(array('menu'=>'debt-funds'));?>
          </div>
          <div class="clearfix"></div>
           <div class="col-sm-6 col-xs-12 col-md-3">
            <h4 class="widgettitle">Impact Focused Funds</h4>
            <?php wp_nav_menu(array('menu'=>'focused-funds'));?>
          </div>
           <div class="col-sm-6 col-xs-12 col-md-2">
           <h4 class="widgettitle">Media</h4>
            <?php wp_nav_menu(array('menu'=>'media'));?>
            <?php northarc_capital_footer_links() ?>
          </div>
       </div>
       <div class="footerbot">
           <div class="row">
             <div class="logofoo col-sm-3"><img src="<?php bloginfo('template_url');?>/inc/images/footerlogo.png"/></div>
             <div class="col-sm-6 col-xs-12"><div class="copyrighttext">&copy; 2018 NORTHERN ARC INVESTMENTS. ALL RIGHTS RESERVED.</div></div>
             <div class="col-sm-3  col-xs-12"><div class="socialicons"><a href="https://twitter.com/_NorthernArc"><i class="fa fa-twitter"></i></a> <a href="https://in.linkedin.com/company/northern-arc-capital"><i class="fa fa-linkedin"></i></a></div></div>
           </div>
       </div>
     </div>
  </footer>

</div><!-- #page -->



<?php wp_footer();?>
<!-- Animation start -->
<script>
	new WOW().init();
</script>
<!-- Animation end  -->
</body>
</html>