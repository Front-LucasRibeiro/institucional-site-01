<ul class="last-posts">
    <?php			
        $args = array( 
            'posts_per_page' => 5,
            'order' => 'DESC'
        );
        
        $loop = new WP_Query( $args );
        if( $loop->have_posts() ) { 
            while( $loop-> have_posts()) {
                $loop-> the_post();
    ?>

    <li>
        <a href="<?php the_permalink() ?>">
            <div class="thumb">
                <?php the_post_thumbnail('banner-370x370');?>
            </div>
        </a>

        <a class="title" href="<?php the_permalink() ?>">
            <?php the_title()?>
        </a>

        <a href="<?php the_permalink() ?>">
            <?php
            $limite = '100';
            $descricao = get_the_content();
            $descricao = strip_tags($descricao); 
            $descricao = mb_substr($descricao,0,$limite);
            echo $descricao; ?>
        </a>
        
    </li>

    <?php wp_reset_query(); wp_reset_postdata(); } }?> 
</ul>