@extends('layouts.app')

@section('content')


<script src="https://aframe.io/releases/1.4.2/aframe.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/mind-ar@1.2.2/dist/mindar-image-aframe.prod.js"></script>



<script>
      const showInfo = () => {
        let y = 0;
        const profileButton = document.querySelector("#profile-button");
        const webButton = document.querySelector("#web-button");
        const emailButton = document.querySelector("#email-button");
        const locationButton = document.querySelector("#location-button");
        const text = document.querySelector("#text");

        profileButton.setAttribute("visible", true);
        setTimeout(() => {
          webButton.setAttribute("visible", true);
        }, 300);
        setTimeout(() => {
          emailButton.setAttribute("visible", true);
        }, 600);
        setTimeout(() => {
          locationButton.setAttribute("visible", true);
        }, 900);

        let currentTab = '';
        webButton.addEventListener('click', function (evt) {
          text.setAttribute("value", "https://softmind.tech");
          currentTab = 'web';
        });
        emailButton.addEventListener('click', function (evt) {
          text.setAttribute("value", "hello@softmind.tech");
          currentTab = 'email';
        });
        profileButton.addEventListener('click', function (evt) {
          text.setAttribute("value", "AR, VR solutions and consultation");
          currentTab = 'profile';
        });
        locationButton.addEventListener('click', function (evt) {
          console.log("loc");
          text.setAttribute("value", "Vancouver, Canada | Hong Kong");
          currentTab = 'location';
        });

        text.addEventListener('click', function (evt) {
          if (currentTab === 'web') {
            window.location.href="https://softmind.tech";
          }
        });
      }

      const showPortfolio = (done) => {
        const portfolio = document.querySelector("#portfolio-panel");
        const portfolioLeftButton = document.querySelector("#portfolio-left-button");
        const portfolioRightButton = document.querySelector("#portfolio-right-button");
        const paintandquestPreviewButton = document.querySelector("#paintandquest-preview-button");

        let y = 0;
        let currentItem = 0;

        portfolio.setAttribute("visible", true);

        const showPortfolioItem = (item) => {
          for (let i = 0; i <= 2; i++) {
            document.querySelector("#portfolio-item" + i).setAttribute("visible", i === item);
          }
        }
        const id = setInterval(() => {
          y += 0.008;
          if (y >= 0.6) {
            clearInterval(id);
            portfolioLeftButton.setAttribute("visible", true);
            portfolioRightButton.setAttribute("visible", true);
            portfolioLeftButton.addEventListener('click', () => {
              currentItem = (currentItem + 1) % 3;
              showPortfolioItem(currentItem);
            });
            portfolioRightButton.addEventListener('click', () => {
              currentItem = (currentItem - 1 + 3) % 3;
              showPortfolioItem(currentItem);
            });

            paintandquestPreviewButton.addEventListener('click', () => {
              paintandquestPreviewButton.setAttribute("visible", false);
              const testVideo = document.createElement( "video" );
              const canplayWebm = testVideo.canPlayType( 'video/webm; codecs="vp8, vorbis"' );
              if (canplayWebm == "") {
                document.querySelector("#paintandquest-video-link").setAttribute("src", "#paintandquest-video-mp4");
                document.querySelector("#paintandquest-video-mp4").play();
              } else {
                document.querySelector("#paintandquest-video-link").setAttribute("src", "#paintandquest-video-webm");
                document.querySelector("#paintandquest-video-webm").play();
              }
            });

            setTimeout(() => {
              done();
            }, 500);
          }
          portfolio.setAttribute("position", "0 " + y + " -0.01");
        }, 10);
      }

      const showAvatar = (onDone) => {
        const avatar = document.querySelector("#avatar");
        let z = -0.3;
        const id = setInterval(() => {
          z += 0.008;
          if (z >= 0.3) {
            clearInterval(id);
            onDone();
          }
          avatar.setAttribute("position", "0 -0.25 " + z);
        }, 10);
      }

      AFRAME.registerComponent('mytarget', {
        init: function () {
          this.el.addEventListener('targetFound', event => {
            console.log("target found");
            showAvatar(() => {
              setTimeout(() => {
                showPortfolio(() => {
                  setTimeout(() => {
                    showInfo();
                  }, 300);
                });
              }, 300);
            });
          });
          this.el.addEventListener('targetLost', event => {
            console.log("target found");
          });
          //this.el.emit('targetFound');
        }
      });
    </script>

    <style>
      body {
        margin: 0;
      }
      .example-container {
        overflow: hidden;
        position: absolute;
        width: 100%;
        height: 100%;
      }
     
      #example-scanning-overlay {
	display: flex;
	align-items: center;
	justify-content: center;
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	background: transparent;
	z-index: 2;
      }
      @media (min-aspect-ratio: 1/1) {
	#example-scanning-overlay .inner {
	  width: 50vh;
	  height: 50vh;
	}
      }
      @media (max-aspect-ratio: 1/1) {
	#example-scanning-overlay .inner {
	  width: 80vw;
	  height: 80vw;
	}
      }

      #example-scanning-overlay .inner {
	display: flex;
	align-items: center;
	justify-content: center;
	position: relative;

	background:
	  linear-gradient(to right, white 10px, transparent 10px) 0 0,
	  linear-gradient(to right, white 10px, transparent 10px) 0 100%,
	  linear-gradient(to left, white 10px, transparent 10px) 100% 0,
	  linear-gradient(to left, white 10px, transparent 10px) 100% 100%,
	  linear-gradient(to bottom, white 10px, transparent 10px) 0 0,
	  linear-gradient(to bottom, white 10px, transparent 10px) 100% 0,
	  linear-gradient(to top, white 10px, transparent 10px) 0 100%,
	  linear-gradient(to top, white 10px, transparent 10px) 100% 100%;
	background-repeat: no-repeat;
	background-size: 40px 40px;
      }

      #example-scanning-overlay.hidden {
	display: none;
      }

      #example-scanning-overlay img {
	opacity: 0.6;
	width: 90%;
	align-self: center;
      }

      #example-scanning-overlay .inner .scanline {
	position: absolute;
	width: 100%;
	height: 10px;
	background: white;
	animation: move 2s linear infinite;
      }
      @keyframes move {
	0%, 100% { top: 0% }
	50% { top: calc(100% - 10px) }
      }
    </style>

    
<div class="container"><div class="flex-center position-ref full-height">
         <div class="content">
            <div class="links">
               <div class="example-container" style="display: contents">
                  <div id="example-scanning-overlay" class="hidden">
                     <div class="inner">
                        <img src="https://cdn.jsdelivr.net/gh/hiukim/mind-ar-js@1.1.5/examples/image-tracking/assets/card-example/card.png">
                        <div class="scanline"></div>
                     </div>
                  </div>
                  <a-scene mindar-image="imageTargetSrc: https://cdn.jsdelivr.net/gh/hiukim/mind-ar-js@1.1.5/examples/image-tracking/assets/card-example/card.mind; showStats: false; uiScanning: #example-scanning-overlay;" embedded="" color-space="sRGB" renderer="colorManagement: true, physicallyCorrectLights" vr-mode-ui="enabled: false" device-orientation-permission-ui="enabled: false" inspector="" keyboard-shortcuts="" screenshot="">
                     <a-assets>
                     <img id="card" src="/img/icons/card.png" />
                    <img id="icon-web" src="/img/icons/web.png" />
                    <img id="icon-location" src="/img/icons/location.png" />
                    <img id="icon-profile" src="/img/icons/profile.png" />
                    <img id="icon-phone" src="/img/icons/phone.png" />
                    <img id="icon-email" src="/img/icons/email.png" />
                    <img id="icon-play" src="/img/icons/play.png" />
                    <img id="icon-left" src="/img/icons/left.png" />
                    <img id="icon-right" src="/img/icons/right.png" />
                    <img id="paintandquest-preview" src="/img/icons/paintandquest-preview.png" />
                    <video id="paintandquest-video-mp4" autoplay="false" loop="true" src="/img/icons/paintandquest.mp4"></video>
                    <video id="paintandquest-video-webm" autoplay="false" loop="true" src="/img/icons/paintandquest.webm"></video>
                    <img id="coffeemachine-preview" src="/img/icons/coffeemachine-preview.png" />
                    <img id="peak-preview" src="/img/icons/peak-preview.png" />
                        <a-asset-item id="avatarModel" src="https://cdn.jsdelivr.net/gh/hiukim/mind-ar-js@1.0.0/examples/image-tracking/assets/card-example/softmind/scene.gltf"></a-asset-item>
                     </a-assets>
                     <a-camera position="0 0 0" look-controls="enabled: false" cursor="fuse: false; rayOrigin: mouse;" raycaster="far: 10000; objects: .clickable" camera="" rotation="" wasd-controls="">
                     </a-camera>
                     <a-entity id="mytarget" mytarget="" mindar-image-target="targetIndex: 0">
                        <a-plane src="#card" position="0 0 0" height="0.552" width="1" rotation="0 0 0" material="" geometry=""></a-plane>
                        <a-entity visible="false" id="portfolio-panel" position="0 0 -0.01">
                           <a-text value="Portfolio" color="black" align="center" width="2" position="0 0.4 0" text=""></a-text>
                           <a-entity id="portfolio-item0">
                              <a-video id="paintandquest-video-link" webkit-playsinline="" playsinline="" width="1" height="0.552" position="0 0 0" material="" geometry=""></a-video>
                              <a-image id="paintandquest-preview-button" class="clickable" src="#paintandquest-preview" alpha-test="0.5" position="0 0 0" height="0.552" width="1" material="" geometry="">
                              </a-image>
                           </a-entity>
                           <a-entity id="portfolio-item1" visible="false">
                              <a-image class="clickable" src="#coffeemachine-preview" alpha-test="0.5" position="0 0 0" height="0.552" width="1" material="" geometry="">
                              </a-image>
                           </a-entity>
                           <a-entity id="portfolio-item2" visible="false">
                              <a-image class="clickable" src="#peak-preview" alpha-test="0.5" position="0 0 0" height="0.552" width="1" material="" geometry="">
                              </a-image>
                           </a-entity>
                           <a-image visible="false" id="portfolio-left-button" class="clickable" src="#icon-left" position="-0.7 0 0" height="0.15" width="0.15" material="" geometry=""></a-image>
                           <a-image visible="false" id="portfolio-right-button" class="clickable" src="#icon-right" position="0.7 0 0" height="0.15" width="0.15" material="" geometry=""></a-image>
                        </a-entity>
                        <a-image visible="false" id="profile-button" class="clickable" src="#icon-profile" position="-0.42 -0.5 0" height="0.15" width="0.15" animation="property: scale; to: 1.2 1.2 1.2; dur: 1000; easing: easeInOutQuad; loop: true; dir: alternate" material="" geometry=""></a-image>
                        <a-image visible="false" id="web-button" class="clickable" src="#icon-web" alpha-test="0.5" position="-0.14 -0.5 0" height="0.15" width="0.15" animation="property: scale; to: 1.2 1.2 1.2; dur: 1000; easing: easeInOutQuad; loop: true; dir: alternate" material="" geometry=""></a-image>
                        <a-image visible="false" id="email-button" class="clickable" src="#icon-email" position="0.14 -0.5 0" height="0.15" width="0.15" animation="property: scale; to: 1.2 1.2 1.2; dur: 1000; easing: easeInOutQuad; loop: true; dir: alternate" material="" geometry=""></a-image>
                        <a-image visible="false" id="location-button" class="clickable" src="#icon-location" position="0.42 -0.5 0" height="0.15" width="0.15" animation="property: scale; to: 1.2 1.2 1.2; dur: 1000; easing: easeInOutQuad; loop: true; dir: alternate" material="" geometry=""></a-image>
                        <a-gltf-model id="avatar" rotation="0 0 0" position="0 -0.25 0" scale="0.004 0.004 0.004" src="#avatarModel" gltf-model=""></a-gltf-model>
                        <a-text id="text" class="clickable" value="" color="black" align="center" width="2" position="0 -1 0" geometry="primitive:plane; height: 0.1; width: 2;" material="opacity: 0.5" text=""></a-text>
                     </a-entity>
                     <canvas class="a-canvas a-mouse-cursor-hover" data-aframe-canvas="true" data-engine="three.js r137" width="1920" height="927"></canvas>
                     <div class="a-loader-title" style="display: none;"></div>
                     <a-entity light="" data-aframe-default-light="" aframe-injected=""></a-entity>
                     <a-entity light="" position="" data-aframe-default-light="" aframe-injected=""></a-entity>
                  </a-scene>
                  <video autoplay="" muted="" playsinline="" style="position: absolute; top: 0px; left: 0px; z-index: -2;"></video>
               </div>
            </div>
         </div>
      </div>
</div>
@endsection
