<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content after
*
* @package vStandard
* @since vStandard 2.0
*/
?>
<?php wp_footer(); ?>
        </div><!-- /maincontent -->
            <div id="footercontainer">
                <footer class="group">
                    <div class="col span_1_of_3 footer-widget">
                    <?php vstandard_widgets(); // above widgets hook ?>
                        <?php if (!dynamic_sidebar('footer-1')) : ?>
                        <?php endif; //end of footer-1 ?>
                    <?php vstandard_widgets_end(); // after widgets hook ?>
                    </div>
                    <div class="col span_1_of_3 footer-widget">
                    <?php vstandard_widgets(); // above widgets hook ?>
                        <?php if (!dynamic_sidebar('footer-2')) : ?>
                        <?php endif; //end of footer-2 ?>
                    <?php vstandard_widgets_end(); // after widgets hook ?>
                    </div>
                    <div class="col span_1_of_3 footer-widget">
                    <?php vstandard_widgets(); // above widgets hook ?>
                        <?php if (!dynamic_sidebar('footer-3')) : ?>
                        <?php endif; //end of footer-3 ?>
                    <?php vstandard_widgets_end(); // after widgets hook ?>
                    </div>
                </footer>
            </div><!-- /footercontaine-->
            <div id="smallprintcontainer">
                    <div class="section group">
                        <div class="col span_1_of_2">
                            <?php vstandard_widgets(); // above widgets hook ?>
                                <?php if (!dynamic_sidebar('small-print')) : ?>
                                <?php endif; //end of small-print ?>
                            <?php vstandard_widgets_end(); // after widgets hook ?>
                        </div>
                        <div class="col span_1_of_2 rory">
                            Developed by <a href="http://www.rstandley.co.uk" target="_blank">Rory Standley</a>
                        </div>
                    </div>
                </div><!-- /smallprint -->
            </div><!-- /smalprintcontainer -->
        </div><!-- /maincontentcontainer -->
    </div><!-- /wrapper -->
</body>
</html>