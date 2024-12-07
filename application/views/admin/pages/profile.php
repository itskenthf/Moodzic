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

.edit-input {
  width: 100%;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 5px;
  padding: 10px;
  color: white;
  margin-bottom: 15px;
}

.edit-input:focus {
  outline: none;
  border-color: #fb324f;
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

.edit-btn {
  background: #fb324f;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.edit-btn:hover {
  background: #d61e3a;
}

.cancel-btn {
  background: rgba(255, 255, 255, 0.1);
  color: white;
  border: 1px solid rgba(255, 255, 255, 0.2);
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  margin-right: 10px;
  transition: background 0.3s ease;
}

.cancel-btn:hover {
  background: rgba(255, 255, 255, 0.2);
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
                    <form id="update-form-data">
                        <div class="info-group">
                            <label class="info-label">Name</label>
                            <input type="text" name="fullname" class="edit-input" value="<?=$profile['fullname']?>" required>
                        </div>

                        <div class="info-group">
                            <label class="info-label">Username</label>
                            <input type="text" name="username" class="edit-input" value="<?=$profile['username']?>" required>
                        </div>

                        <div class="info-group">
                            <label class="info-label">Email</label>
                            <input type="email" name="email" class="edit-input" value="<?=$profile['email']?>" required>
                        </div>

                        <div style="text-align: right;">
                            <button type="button" class="cancel-btn" onclick="window.location.reload()">Cancel</button>
                            <button type="button" class="edit-btn" onclick="updateProfile();">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function updateProfile() {
        var formUpdate = $("#update-form-data").serialize();
        $.ajax({
            url: base_url + 'admin/update',
            type: 'POST',
            data: formUpdate,
            dataType: "json",
            success: function(data) {
                if (data.status == true) {
                    iziToast.success({
                        title: 'Success',
                        message: data.msg,
                        position: 'topCenter',
                        timeout: 2000,
                        close: false,
                        onClosing: function() {
                            window.location.reload();
                        }
                    });
                } else {
                    iziToast.error({
                        title: 'Error',
                        message: data.msg,
                        position: 'topCenter',
                        timeout: 2000
                    });
                }
            },
            error: function() {
                iziToast.error({
                    title: 'Error',
                    message: 'An error occurred while updating profile',
                    position: 'topCenter',
                    timeout: 2000
                });
            }
        });
    }
</script>
