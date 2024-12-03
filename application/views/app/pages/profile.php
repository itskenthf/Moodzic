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

/* Profile content container */
.profile-container {
  position: relative;
  z-index: 1;
  background: transparent;
}

/* Form styling */
.profile-div {
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 10px;
  padding: 20px;
}

.profile-input {
  background: rgba(255, 255, 255, 0.1) !important;
  border: 1px solid rgba(255, 255, 255, 0.2) !important;
  color: white !important;
  transition: all 0.3s ease;
}

.profile-input:focus {
  background: rgba(255, 255, 255, 0.15) !important;
  border-color: rgba(255, 255, 255, 0.3) !important;
}

/* Button hover effect */
.button.button1 {
  background-color: #555555;
  transition: all 0.3s ease;
}

.button.button1:hover {
  background-color: #fb324f !important;
}
</style>

<div class="bg-container"></div>
<div class="profile-container">
<div class="ms_download_wrapper common_pages_space">
    <div class="ms_download_inner">
        <div class="album_inner_list">
            <div class="slider_heading_wrap marger_bottom30">
                <div class="slider_cheading">
                    <h4 class="cheading_title">My Profile &nbsp;</h4>
                </div>
            </div>

            <div class="profile-div">
                <form id="update-form-data">
                <label for="fname"><font color='white'>Name </font></label>
                <input type="text" name="fullname" class="add-input profile-input" placeholder="Name.." value="<?=$profile['fullname']?>" required>

                <label for="lname"><font color='white'>Username</font></label>
                <input type="text" id="username" name="username" class="add-input profile-input" value="<?=$profile['username']?>"placeholder="Username..">

                <label for="lname"><font color='white'>Email</font></label>
                <input type="email" id="email" name="email" class="add-input profile-input" value="<?=$profile['email']?>" placeholder="Email..">

                <div class="ms_view_more text-center">
                    <!-- <button class="ms_btn" type="submit">Add</a> -->
                    <button class="button button1" style="background-color: #555555;" onclick="updateProfile();"><font color='white'>Save Profile</font></button>
                </div>

              </form>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    function updateProfile() {
        var formUpdate = $("#update-form-data").serialize();
        $.ajax({
            url: base_url + 'profile/update',
            type: 'POST',
            data: formUpdate,
            dataType:"json",
            success: function(data) {
                if (data.status == true) {
                    alert (data.msg);
                    // location.reload();
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
</div>
