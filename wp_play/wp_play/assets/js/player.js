                             /* var btn = document.querySelector('.btn-play');
                              var cover = document.querySelector('.single-post__single-cover');
                              var wrapV = document.querySelector('.single-post__wrap-video');
                              btn.addEventListener('click', () => {cover.style.display='none';
                                                                   btn.style.display='none';
                                                                   wrapV.style.display='block';
                                                                   wrapV.style.width = '100%';
                                                                   wrapV.style.height= '100%';
                                                                   wrapV.style.margin='0';                                                                    
                              });*/
                                                                                                                  
                          // 2. This code loads the IFrame Player API code asynchronously.
                              var tag = document.createElement('script');tag.src = "https://www.youtube.com/iframe_api";
                              var firstScriptTag = document.getElementsByTagName('script')[0];
                              firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                          // 3. This function creates an <iframe> (and YouTube player)
                          //    after the API code downloads.
                              var player;
                              function onYouTubeIframeAPIReady() {
                                player = new YT.Player('player', {
                                    width: '960',
                                    height: '540',
                                    videoId: "<?php echo get_post_meta($post->ID, 'playtheme_video_embed', true);?>",
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
                                
                                  

                                  

      
