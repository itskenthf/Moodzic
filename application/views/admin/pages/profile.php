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

/* Profile info styling */
.add-div {
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 10px;
  padding: 20px;
}

.info-label {
  color: white;
  font-weight: bold;
  margin-bottom: 5px;
  display: block;
}

.info-value {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 15px;
  color: white;
  display: block;
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

<div class="album_list_wrapper">
    <div class="ms_download_wrapper common_pages_space">
        <div class="ms_download_inner">
            <div class="album_inner_list">
                <div class="slider_heading_wrap marger_bottom30">
                    <div class="slider_cheading">
                        <h4 class="cheading_title">Admin Profile &nbsp;</h4>
                    </div>
                </div>

                <div class="add-div">
                    <div class="info-group">
                        <label class="info-label">Name</label>
                        <div class="info-value"><?=$profile['fullname']?></div>
                    </div>

                    <div class="info-group">
                        <label class="info-label">Username</label>
                        <div class="info-value"><?=$profile['username']?></div>
                    </div>

                    <div class="info-group">
                        <label class="info-label">Email</label>
                        <div class="info-value"><?=$profile['email']?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
