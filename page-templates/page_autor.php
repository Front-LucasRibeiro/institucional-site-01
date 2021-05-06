<?php

/*

Template Name: Autor

*/

define( 'WP_USE_THEMES', false );

get_header(); 

global $sa_options;

$sa_settings = get_option( 'sa_options', $sa_options );



?>



<!-- Content -->

<div class="institucional autor">

  <div class="box-top">

      <span class="bg-icons"></span>



      <div class="content-wrapper">

        <span class="image">

          <?php the_post_thumbnail(); ?>

        </span>

        <div class="box-title">

          <?php the_title(); ?>
        </div>

      </div>

  </div>

  

  <div class="container">

      <div class="box-content">

        <span class="image">

          <?php the_post_thumbnail('imagem-autor-170x170'); ?>

        </span>

        <?php 
          $author_id = get_post_field( 'post_author', $post_id );
          $meta_user_description = get_user_meta($author_id,'description');
          echo $meta_user_description[0];
        ?>

        <?php the_content(); ?>

      </div>

  </div>



  <section class="autor ">

    <div class="container">

      <div class="wrapper-autor ">

        <h2 class="section-title">

          <span class="title-desk">

            Últimos posts de <?php the_title(); ?>

          </span>

          <span class="separator"></span>

        </h2>



        <ul class="list-posts desk">

          <?php	

            $author_id = get_post_field( 'post_author', $post_id );



            $args = array( 

              'posts_per_page' => 3,

              'order' => 'DESC', //Ou ASC

              'orderby' => 'date',

              'hide_empty' => true,

              'author' => $author_id

            );

            

            $loop = new WP_Query( $args );

            if( $loop->have_posts() ) { 

              while( $loop-> have_posts()) {

                $loop-> the_post();

                $post = get_post();

                $id_post = $post->ID;

                $autor_id = $post->post_author;

          ?>

      

          <li class="list-post-item">

            <a href="<?php the_permalink() ?>">

              <div class="image-desk">

                <?php the_post_thumbnail('banner-370x260');?>

              </div>

            </a>

            

            <div class="box-title">

              <a href="<?php the_permalink() ?>">

                <h3 class="title-post">

                  <?php the_title(); ?>

                </h3>

    

                <div class="data">

                  <?= get_the_date('d \d\e F Y'); ?>

                </div>

              </a>

            </div>

    

            <div class="box-bottom">

              <div class="box-autor">

                <?php 

                  $user_info = get_userdata($autor_id);

                  $user_name = $user_info->display_name;

                  $user_email = $user_info->user_email;

                ?>



                <div class="box-avatar">

                  <?= get_avatar($user_email, 24);?>

                </div>

                

                <?php

                  $userName =  preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$user_name);



                  $autor_formatted = str_replace ( " ", "-", strtolower($userName) );

                ?>



                <p class="nome-autor">

                  <a href="<?= get_home_url().'/'.$autor_formatted; ?>">

                    <?php the_author(); ?>

                  </a>

                </p>

              </div>

              <a href="<?php the_permalink() ?>" class="ler-tudo">Ler mais</a>

            </div>

          </li>

      

          <?php

            wp_reset_query(); 

            wp_reset_postdata();

              }

            }

          ?> 

        </ul>	

      </div>

    </div>

  </section>

</div>





<?php get_footer(); ?>