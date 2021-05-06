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
        <a class="thumb" href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('banner-67x67');?>
        </a>

        <div class="box-content-last-posts">

            <a class="title" href="<?php the_permalink() ?>">
                <?php the_title()?>
            </a>
    
            <a class="content" href="<?php the_permalink() ?>">
                <?php
                $limite = '80';
                $descricao = get_the_content();
                $descricao = strip_tags($descricao); 
                $descricao = mb_substr($descricao,0,$limite);
                echo $descricao; ?>
            </a>
        </div>

        
    </li>

    <?php wp_reset_query(); wp_reset_postdata(); } }?> 
</ul>