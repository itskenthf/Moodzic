 <style>
/* Background image */
.bg-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  background-image: url('<?php echo base_url(); ?>/assets/media/auth/purple.jpeg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

/* Favorites content container */
.fav-container {
  position: relative;
  z-index: 1;
  background: transparent;
}

/* Song list blur background */
.album_list_wrapper {
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 10px;
  padding: 20px;
  margin-top: 20px;
}

#fix-id-ul-song {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 8px;
  padding: 10px;
  margin-bottom: 8px;
  transition: background 0.3s ease;
}

#fix-id-ul-song:hover {
  background: rgba(255, 255, 255, 0.15);
}
</style>

<div class="bg-container"></div>
<div class="ms_download_wrapper common_pages_space fav-container">
    <div class="ms_download_inner">
        <div class="album_inner_list">
            <div class="slider_heading_wrap marger_bottom30">
                <div class="slider_cheading">
                    <h4 class="cheading_title">Your Favourites &nbsp;</h4>
                </div>
            </div>
            <div class="album_list_wrapper">
                <ul class="album_list_name">
                    <li>#</li>
                    <li>Song Title</li>
                    <li>Artists</li>
                    <li class="text-center">Duration</li>
                    <li class="text-center">remove from favourite</li>
                </ul>
                <? if($favs){ ?>
                <? $no = 1; foreach ($favs as $key) { ?>
                <ul id="fix-id-ul-song">
                    <li>
                        <a href="javascript:;" class="dwld_sn">
                        <span class="play_no"><?= $no++ ?></span>
                        <span class="play_hover">
                            <img src="<?= base_url();?>assetsmoods/images/svg/play_songlist.svg" alt="Play" class="img-fluid list_play">
                            <img src="<?= base_url();?>assetsmoods/images/svg/sound_bars.svg" alt="bar" class="img-fluid list_play_bar">  
                        </span>
                        </a>
                    </li>
                    <li><a href="javascript:;"><?= $key['name']?></a></li>
                    <li><a href="javascript:;"><?=$key['singer']?></a></li>
                    <li class="text-center"><a href="javascript:;"><?=musicDuration($key['duration']);?></a></li>
                    
                    <li class="text-center"><a href="javascript:;" onclick="removeFromFav('<?=$key['id']?>');">
                        <span class="list_close">
                            <svg 
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="8px" height="8px">
                            <path fill-rule="evenodd"  fill="rgb(124 142 165)"
                            d="M4.945,3.993 L7.802,1.135 C8.065,0.872 8.065,0.446 7.802,0.183 C7.539,-0.080 7.113,-0.080 6.850,0.183 L3.993,3.040 L1.135,0.183 C0.872,-0.080 0.446,-0.080 0.183,0.183 C-0.080,0.446 -0.080,0.872 0.183,1.135 L3.040,3.993 L0.183,6.850 C-0.080,7.113 -0.080,7.539 0.183,7.802 C0.446,8.065 0.872,8.065 1.135,7.802 L3.993,4.945 L6.850,7.802 C7.113,8.065 7.539,8.065 7.802,7.802 C8.065,7.539 8.065,7.113 7.802,6.850 L4.945,3.993 Z"/>
                            </svg>
                        </span></a>
                    </li>
                </ul>
                <? } ?>
                <? } ?>
            </div>
        </div>
        
    </div>
</div>