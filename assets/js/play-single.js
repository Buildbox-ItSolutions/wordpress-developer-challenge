(function () {
        "use strict";
        var e = {
                videoGroup: document.querySelectorAll(".video"),
            },
            t = {
                init: function () {
                    var e = this;
                    e.playVideo();
                },
                playVideo: function () {
                    var t = e.videoGroup;
                    t.forEach(function (e) {
                        var t = e.querySelectorAll(".vd-cover")[0];
                        t.addEventListener("click", function () {
                            e.classList.toggle("playing-video");
							var idVideo = document.querySelector('.vd-hidden');
							var playID = idVideo.getAttribute("data-id-video");
							if(!jQuery('#iframe').length) {
								jQuery('.vd-hidden').html('<iframe class="vd-embed" src="https://www.youtube.com/embed/" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
							}
                            var t = e.querySelectorAll(".vd-embed")[0],
                                n = t.src.indexOf("?") > -1 ? "&" : "?";
                            t.src += playID + n + "&autoplay=1";
                        });
                    });
                },
            };
        t.init();
})();