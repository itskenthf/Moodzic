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

/* Content container */
.all-users-container {
  position: relative;
  z-index: 1;
  background: transparent;
}

/* User list wrapper */
.album_list_wrapper {
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 10px;
  padding: 20px;
  margin-top: 20px;
}

/* User item styling */
.user-item {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 8px;
  padding: 10px;
  margin-bottom: 8px;
  transition: background 0.3s ease;
}

.user-item:hover {
  background: rgba(255, 255, 255, 0.15);
}
</style>

<div class="bg-container"></div>
<div class="all-users-container">
    <div class="ms_download_wrapper common_pages_space">
        <div class="ms_download_inner">
            <div class="album_inner_list">
                <div class="slider_heading_wrap marger_bottom30">
                    <div class="slider_cheading">
                        <h4 class="cheading_title">All Users &nbsp;</h4>
                    </div>
                </div>
                <div class="album_list_wrapper">
                    <ul class="album_list_name">
                        <li style="width: 1px;">#</li>
                        <li>Name</li>
                        <li>Email</li>
                        <li>Created on</li>
                        <li>Total Music Uploaded</li>
                        <li>Action</li>
                    </ul>
 
                    <? if($users){ ?>
                    <? $no = 1; foreach ($users as $key) { ?>
                    <?
                    $total_music = count_music_by_user($key['id']);
                    ?>
                    <ul class="user-item" style="color: white;">
                        <li style="width: 1px;">
                            <?=$no++ ?>
                        </li>
                        <li>
                            <?=$key['fullname']?>
                        </li>
                        <li>
                            <?=$key['email']?>
                        </li>
                        <li>
                            <?=dmy($key['create_dt'])?>
                        </li>
                        <li>
                            <?=$total_music?>
                        </li>
                        <li>
                            <!-- <i class="fa fa-info-circle fa-xl" aria-hidden="true"></i> -->
                            <a href="<?=base_url('admin/userAccount/'.$key['id'])?>">View Account</a>
                        </li>
                    </ul>
                    <? } ?>
                    <? } ?>
                </div>
            </div>
            
        </div>
    </div>
</div>