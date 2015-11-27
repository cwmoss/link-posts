<aside class="related-posts <?php echo ( $format_horizontal )? ' horizontal' : ' vertical'; ?>">
    
    <?php if( $html_title && $show_title ) { ?>
        <h4><?php echo $html_title; ?></h4>
    <?php } ?>
    
    <ul>
<?php
/*
#$orig_post = $post; global $post;
$args=array(  
    'tag__in' => $tag_ids,  
    'post__not_in' => array($post->ID),  
    'posts_per_page'=>4, // Number of related posts to display.  
    'caller_get_posts'=>1  
    );
	$my_query = new wp_query( $args );  

	    while( $my_query->have_posts() ) {  
	    $my_query->the_post();
	}
#$post = $orig_post;
	wp_reset_query();  
*/

?>
    <?php foreach( $recommended_ids as $recommended_id ) :
        if( in_array( get_post_type( $recommended_id ), $author_recommended_posts_post_types ) ){
            $recommended_post_thumbnail = false;
            if( $show_featured_image )
               $rel_thumbnail_id = get_post_thumbnail_id( $recommended_id );
					if($rel_thumbnail_id){
						$rel_thumbnail_src = wp_get_attachment_image_src( $rel_thumbnail_id, 'medium', true );
						$thumb = get_post($rel_thumbnail_id);
						# $thumb_m = get_post_meta($thumb->ID, '_wp_attachment_image_alt', true);
						$thumb_notitle = get_post_meta($thumb->ID, 'dont_show_title', true);
						$thumb_title = $thumb->post_title;
						$thumb_caption = $thumb->post_excerpt;
						$thumb_description = $thumb->post_content;
						if($thumb_notitle) $thumb_title="...";
					}
               
					
            	$rel_title = get_the_title( $recommended_id );
					$rel = get_post($recommended_id);
					# $date = strftime('%x', strtotime($rel->post_date));
					$rel_date = get_the_date( $recommended_id );

					$rel_date = $rel->post_date;
					$rel_excerpt = $rel->post_excerpt;
				?>
            <li<?php echo($rel_thumbnail_id)? ' class="has-thumbnail"' : '';?>>
                <div>
                    <?php do_action( "{$namespace}_before_related", $recommended_id ); ?>
                    
                    <?php if( $rel_thumbnail_id ) { ?>
                        <a href="<?php echo get_permalink( $recommended_id ); ?>" class="related-thumbnail">
							<img src="<?php echo $rel_thumbnail_src[0]; ?>" alt="<?=wp_specialchars($thumb_title)?>" title="<?=wp_specialchars($thumb_title)?>" height="<?=$rel_thumbnail_src[2]?>">
						</a>
                    <?php } ?>
                    <a href="<?php echo get_permalink( $recommended_id ); ?>" class="related-title"><?=$rel_title?></a>
                   <p class="related-date">&nbsp;<?=$rel_date?></p>
				   <p>
				   		<?=$rel_excerpt?>
				   </p>
                    <?php do_action( "{$namespace}_after_related", $recommended_id ); ?>
                </div>
            </li>
            
        <?php }
    endforeach; ?>
    </ul>
</aside>