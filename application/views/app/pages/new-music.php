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

/* Button hover effect */
.button.button1 {
  background-color: #555555;
  transition: all 0.3s ease;
}

.button.button1:hover {
  background-color: #fb324f !important;
}

/* Form styling */
.add-div {
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 10px;
  padding: 20px;
}

.add-input {
  background: rgba(255, 255, 255, 0.1) !important;
  border: 1px solid rgba(255, 255, 255, 0.2) !important;
  color: white !important;
  transition: all 0.3s ease;
}

.add-input:focus {
  background: rgba(255, 255, 255, 0.15) !important;
  border-color: rgba(255, 255, 255, 0.3) !important;
}

/* Style the select dropdown */
.add-input option {
  background-color: #2c2c2c;
  color: white;
}
</style>

<div class="bg-container"></div>
<div class="new-music-container">
    <div class="ms_download_wrapper common_pages_space">
        <div class="ms_download_inner">
            <div class="album_inner_list album_list_wrapper">
                <div class="slider_heading_wrap marger_bottom30">
                    <div class="slider_cheading">
                        <h4 class="cheading_title">Add New Music &nbsp;</h4>
                    </div>
                </div>

               <!--  <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <label for="musicFile">Choose a music file (MP3 only):</label>
                    <input type="file" name="musicFile" id="musicFile" accept=".mp3" required>
                </form> -->

                <div class="add-div">
                    <form action="<?= base_url('newmusics/upload')?>" method="POST" enctype="multipart/form-data">
                    <label for="fname"><font color='white'>Song Title </font></label>
                    <input type="text" name="name" class="add-input" placeholder="Title.." required>

                    <label for="lname"><font color='white'>Artists</font></label>
                    <input type="text" id="lname" name="singer" class="add-input" placeholder="Artists..">

                    <label for="country"><font color='white'>Category</font></label>
                    <select id="category" name="category" class="add-input" required>
                      <option value="">Choose category</option>
                      <option value="1">Sad</option>
                      <option value="2">Happy</option>
                    </select>

                    <input type="file" id="musicFile" name="musicFile" class="add-input" accept=".mp3" required>

                  
                    <div class="ms_view_more text-center">
                        <!-- <button class="ms_btn" type="submit">Add</a> -->
                        <button class="button button1" style="background-color: #555555;"><font color='white'>Add Music</font></button>
                    </div>

                  </form>
                </div>
                            
            </div>
            
            
        </div>
    </div>
</div>
