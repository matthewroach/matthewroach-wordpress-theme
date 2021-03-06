<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * Wrapped Analytics code in is_admin() to only show if not logged in
 *
 * @package matthewroach
 */
?>

	</div><!-- #content -->

</div><!-- #page -->

<?php wp_footer(); ?>


<?php if ( !is_user_logged_in() ) { ?>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-163036-1', 'auto');
		ga('send', 'pageview');

	</script>

<?php } ?>

<script>
	var modalA = new Modal({
		modalItems: '.tiled-gallery a'
	});
</script>

</body>
</html>
