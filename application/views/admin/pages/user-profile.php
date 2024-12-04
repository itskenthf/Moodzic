<div class="ms_download_wrapper common_pages_space">
    <div class="ms_download_inner">
        <div class="album_inner_list">
            <div class="slider_heading_wrap marger_bottom30">
                <div class="slider_cheading">
                    <h4 class="cheading_title">User Profile &nbsp;</h4>
                </div>
            </div>

            <div class="add-div ms_profile_box">
                <form id="update-form-data" class="ms_pro_form">
                <input type="hidden" name="id" value="<?=$profile['id']?>">
                <label for="fname"><font color='white'>Name </font></label>
                <input type="text" name="fullname" class="add-input" placeholder="Name.." value="<?=$profile['fullname']?>" required>

                <label for="lname"><font color='white'>Email</font></label>
                <input type="email" id="email" name="email" class="add-input" value="<?=$profile['email']?>" placeholder="Email..">
              
                <div class="ms_view_more text-center">
                    <!-- <button class="ms_btn" type="submit">Add</a> -->
                    <a class="button button1" style="background-color: #555555;" onclick="updateProfile();"><font color='white'>Update Profile</font></a>
                    <a class="button button1" style="background-color: red;" onclick="deleteAccount('<?=$profile['id']?>');"><font color='white'>Delete Account</font></a>
                </div>

              </form>
            </div>
                        
        </div>
    </div>
</div>

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

/* Profile section styling */
.ms_profile_box {
  background: rgba(0, 0, 0, 0.5) !important;
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 10px;
  padding: 20px;
}

/* Music list wrapper */
.album_list_wrapper {
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 10px;
  padding: 20px;
  margin-top: 20px;
}

/* Music item styling */
[id^="all-music-ul-"] {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 8px;
  padding: 10px;
  margin-bottom: 8px;
  transition: background 0.3s ease;
}

[id^="all-music-ul-"]:hover {
  background: rgba(255, 255, 255, 0.15);
}

/* Action links styling */
.action-link {
  color: white;
  text-decoration: none;
  transition: color 0.3s ease;
}

.action-link:hover {
  color: #fb324f;
}
</style>

<div class="bg-container"></div>

<div class="ms_download_wrapper common_pages_space">
    <div class="ms_download_inner">
        <div class="album_inner_list">
            <div class="slider_heading_wrap marger_bottom30">
                <div class="slider_cheading">
                    <h4 class="cheading_title">User's Music &nbsp;</h4>
                </div>
            </div>
            <div class="album_list_wrapper">
                <ul class="album_list_name">
                    <li style="width:1px;">#</li>
                    <li>Song Title</li>
                    <li>Artists</li>
                    <li class="text-center">Duration</li>
                    <li class="text-center">Original Filename</li>
                    <li class="text-center">remove</li>
                </ul>
                <? if($musics){ ?>
                <? $no = 1; foreach ($musics as $key) { ?>
                <?
                $source_music = base_url() . $key['path'] . "/" . $key['filename'];
                ?>

                <ul id="all-music-ul-<?=$key['id']?>" id="fix-id-ul-song">
                    <li style="width:1px;">
                        <a href="javascript:;" class="dwld_sn btn-play-the-music action-link" data-init="audiomod-<?=$key['id']?>" data-musicid="<?=$key['id']?>">
                        <?/*<audio id="audioPlayer" src="<?=$source_music?>" preload="auto"></audio> */?>
                        <audio id="audiomod-<?=$key['id']?>" src="<?=$source_music?>" preload="auto"></audio>
                        <span class="play_nox"><?= $no++ ?></span>
                        <!-- <span class="play_hover"> -->
                            <!-- <i id="musicIcon-<?=$key['id']?>" class="fas fa-play"></i> -->
                            <?/*<img src="<?= base_url();?>assetsmoods/images/svg/play_songlist.svg" alt="Play" class="img-fluid list_play">
                            <img src="<?= base_url();?>assetsmoods/images/svg/sound_bars.svg" alt="bar" class="img-fluid list_play_bar"> */?>
                        <!-- </span> -->
                        </a>
                    </li>
                    <li>
                        <input type="hidden" id="music-name-<?=$key['id']?>" value="<?=$key['name']?>">
                        <input type="hidden" id="artists-name-<?=$key['id']?>" value="<?=$key['singer']?>">
                        <a href="javascript:;" class="action-link">
                        <img src="<?= base_url();?>assetsmoods/images/loader.gif" alt="bar" class="img-fluid fix-bar-class" width="30px;" style="display: none;" id="bar-play-<?=$key['id']?>">&nbsp;
                        <?= $key['name']?>
                        </a>
                    </li>
                    <li><a href="javascript:;" class="action-link"><?=$key['singer']?></a></li>
                    <li class="text-center"><a href="javascript:;" class="action-link"><?=musicDuration($key['duration']);?></a></li>
                    
                    <li class="list_more">
                        <a href="javascript:;" class="action-link"><?=$key['original_filename']?></a>              
                    </li>
                    <li class="text-center">
                        <a href="javascript:;" onclick="deleteMusic('<?=$key['id']?>')" class="action-link">
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

<script type="text/javascript">
    function updateProfile() {
        var formUpdate = $("#update-form-data").serialize();
        $.ajax({
            url: base_url + 'admin/updateUserProfile',
            type: 'POST',
            data: formUpdate,
            dataType:"json",
            success: function(data) {
                if (data.status == true) {
                    iziToast.success({
                        title: data.msg,
                        position: 'topCenter',
                        timeout: 2000,
                        close: false,
                    });
                } else {
                    alert (data.msg);
                }
            },
            error: function() {
                alert ('error');
            }
        });
    }
</script>
