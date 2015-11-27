<div class="arp-editor-box" data-namespace="<?=$namespace?>">
<div style="display:none;">
    <?php wp_nonce_field($namespace, "{$namespace}_post_ids_nonce" ); ?>
</div>
<div class="arp-items">
    <div class="arp-items-container">
        <?php 
        if( $author_recommended_posts ) {
            foreach( $author_recommended_posts as $author_recommended_post ) : ?>
                <?php if( in_array( get_post_type( $author_recommended_post ), $author_recommended_posts_post_types ) ) { ?>
                    <div class="author-recommended-post-row" data-post_id="<?php echo $author_recommended_post; ?>">
                        <span class="ui-handle"></span>
                        <span class="recommended-post-title"><?php echo get_the_title( $author_recommended_post ); ?></span>
                        <input type="hidden" name="arp-<?=$namespace?>-posts[]" value="<?php echo $author_recommended_post; ?>" />
                        <a href="#remove" class="button remove-recommended-post">&#215;</a>
                    </div>
                <?php } ?>
            <?php endforeach;
        } ?>
    </div>
    <div class="arp-search">
        <label for="arp-<?=$namespace?>-q">Search...</label>
        <input class="widefat" type="text" name="author-recommended-posts-search" id="arp-<?=$namespace?>-q" />
    </div>
    <div class="arp-results">
        <ul>
        <?php echo $author_recommended_posts_search_results; ?>
        </ul>
    </div>
    <!--div id="recommended-posts-settings">
        <p>Post type not showing up? <a href="<?php echo $author_recommended_posts_options_url; ?>">Change Settings</a></p>
    </div-->
</div>
</div>