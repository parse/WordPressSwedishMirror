<?php get_header(); ?>

	<div id="content" class="widecolumn">
				
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
	
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent l�nk: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	
			<div class="entrytext">
				<?php the_content('<p class="serif">L�st resten av det h�r inl�gget &raquo;</p>'); ?>
	
				<?php link_pages('<p><strong>Sidor:</strong> ', '</p>', 'nummer'); ?>
	
				<p class="postmetadata alt">
					<small>
						Det h�r inl�gget publicerades 
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?> 
						<?php the_time('l j F, Y') ?> kl. <?php the_time() ?>
						i <?php the_category(', ') ?>.
						Du kan f�lja kommentarer genom <?php comments_rss_link('RSS 2.0'); ?>. 
						
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Du kan <a href="#respond">l�mna en kommentar</a>, eller <a href="<?php trackback_url(true); ?>" rel="trackback">trackbacka</a> fr�n din egen webbplats.
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Kommentarer �r avst�ngda just nu, men du kan <a href="<?php trackback_url(true); ?> " rel="trackback">trackbacka</a> fr�n din egen webbplats.
						
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Du kan hoppa till slutet och l�mna en kommentar. Pingar �r avst�ngda just nu.
			
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							S�v�l kommentarer som pingar �r avst�ngda just nu.
						
						<?php } edit_post_link('Redigera detta inl�gg.','',''); ?>
						
					</small>
				</p>
	
			</div>
		</div>
		
	<?php comments_template(); ?>
	
	<?php endwhile; else: ?>
	
		<p>Tyv�rr, inga inl�gg motsvarade dina s�kord.</p>
	
<?php endif; ?>
	
	</div>

<?php get_footer(); ?>
