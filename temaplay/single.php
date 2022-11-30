<?php get_header(); ?>

<div class="site-content">

        <main>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article  id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
                    
                        <div class="post-videos-single">
                            <div class="video-data-single">
                                    <button class="button-category-single">
                                        <?php if( has_category()):
                                         the_category( ' ' ); 
                                         endif;?>
                                    </button>
                                
                                    <button class="button-lenght-single">
                                        <?php 
                                        echo get_post_meta($post->ID, 'playtheme_video_lenght', true); ?>
                                    </button>
                                </div>
                                <h1 class= "title-videos-single" 
                                href="<?php the_title( get_the_permalink()); ?>"> <?php echo the_title()?>
                                </h1>
                           
                          
                          <!-- PLAYER YOUTUBE
                          1. The <iframe> (and video player) will replace this <div> tag. -->
                              <div class="embed-space-single">
                              <button class="button-play" href= #>
                              <img src="http://desafioplay.local/wp-content/uploads/2022/11/play-light-1.png" />
                            </button> 
                              <div class="wrap-video">
                              <div id="player"></div>
                              </div>
                              <img class = "single-cover" src="<?php echo get_post_meta($post->ID, 'playtheme_upload_file', true); ?>"/>
                              </div>
                                                       
                             <script>
                              var btn = document.querySelector('.button-play');
                              var cover = document.querySelector('.single-cover');
                              var wrapV = document.querySelector('.wrap-video');
                              btn.addEventListener('click', () => {cover.style.display='none';
                                                                   btn.style.display='none';
                                                                   wrapV.style.display='block';
                                                                   wrapV.style.width = '100%';
                                                                   wrapV.style.height= '100%';
                                                                   wrapV.style.margin='0';                                                                    
                              });

                                                                                    
                          // 2. This code loads the IFrame Player API code asynchronously.
                              var tag = document.createElement('script');tag.src = "https://www.youtube.com/iframe_api";
                              var firstScriptTag = document.getElementsByTagName('script')[0];
                              firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                          // 3. This function creates an <iframe> (and YouTube player)
                          //    after the API code downloads.
                              var player;
                              function onYouTubeIframeAPIReady() {
                                player = new YT.Player('player', {
                                  videoId: '<?php echo get_post_meta($post->ID, 'playtheme_video_embed', true);?>',
                                  events: {
                                    'onReady': onPlayerReady,
                                    'onStateChange': onPlayerStateChange
                                  }
                                });
                              }

                          // 4. The API will call this function when the video player is ready.
                              function onPlayerReady(event) {
                                event.target.playVideo(); }

                          // 5. The API calls this function when the player's state changes.
                          //    The function indicates that when playing a video (state=1),
                          //    the player should play for six seconds and then stop.
                                  var done = false;
                                  function onPlayerStateChange(event) {
                                    if (event.data == YT.PlayerState.PLAYING && !done) {
                                      setTimeout(stopVideo, 6000);
                                      done = true;
                                    }
                                  }
                                  function stopVideo() {
                                    player.stopVideo();
                                  }
                                </script>
                              </body>
                            </html>

                          </script>
                      

                       


                                                          
                                <p class="sinopse-span"> 
                                <? echo get_post_meta($post->ID, 'playtheme_video_sinopse', true); ?></p>
                          </div>

                        </article>
                <?php endwhile; endif; ?>
                
         
            </main>
</div>

<!--categorias mobile-->
<div class="category-mobile" id="mobile-single">
          
          <div class="icons-car1"><a href="/index.php?cat=1">
            <img class="icon-carousel1" src="http://desafioplay.local/wp-content/uploads/2022/11/Caminho-8@2x.png">
            <p>Filmes</p></a>
          </div>
  
         
          <div class="icons-car2"><a href="/index.php?cat=4">
            <img class="icon-carousel" src="http://desafioplay.local/wp-content/uploads/2022/11/Caminho-7@2x.png">
            <p>Documentários</p></a>
          </div>
  
         
          <div class="icons-car3"><a href="/index.php?cat=3">
            <img class="icon-carousel" src="http://desafioplay.local/wp-content/uploads/2022/11/Grupo-62@2x.png">
            <p>Séries</p></a>
          </div>
</div>

<?php get_footer() ?>


                  

