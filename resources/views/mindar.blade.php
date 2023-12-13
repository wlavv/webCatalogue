<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Laravel</title>
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <script src="https://aframe.io/releases/1.3.0/aframe.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/mind-ar@1.2.0/dist/mindar-image-aframe.prod.js"></script>
   </head>
   <body>
      <div class="flex-center position-ref full-height">
         <div class="content">
            <div class="title m-b-md">MindAR</div>
            <div class="links">
               <div class="example-container">
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
   </body>
</html>
