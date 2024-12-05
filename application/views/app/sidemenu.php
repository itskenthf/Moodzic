<div class="ms_sidemenu_wrapper">
    <div class="ms_nav_close ms_cmenu_toggle">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    </div>
    <div class="ms_sidemenu_inner">
        <div class="">
            <div class="">
                <a href="<?= base_url('home')?>">
                    <img src="<?= base_url('assets/media/music-wall/logo.png')?>" alt="logo" class="img-fluid" width="190px"/>
                    <!-- <strong>MoodZic</strong> -->
                </a>
            </div>
            <div class="ms_logo_mini">
                <a href="<?= base_url('assets/media/music-wall/logo.png')?>" alt="mini_logo" class="img-fluid"/></a>
            </div>
        </div>
        <div class="ms_nav_wrapper">
            <h4 class="nav_heading">Menu</h4>
            <ul>
                <li><a href="<?= base_url('home');?>" title="Home">
                <span class="nav_icon">
                    <i class="fa-solid fa-fire"></i>
                </span>
                <span class="nav_text">
                    Explore
                </span>
                </a>
                </li>

            </ul>
            <h4 class="nav_heading">Your Music</h4>
            <ul class="nav_downloads">
                <li><a href="<?= base_url('allmusic');?>" title="Music">
                    <span class="nav_icon">
                        <i class="fa-solid fa-music"></i>
                    </span>
                    <span class="nav_text">
                        Songs
                    </span>
                    </a>
                </li>
                <li><a href="<?= base_url('favourite')?>" title="Favourites">
                <span class="nav_icon">
                    <i class="fa-solid fa-heart"></i>
                </span>
                <span class="nav_text">
                    favourites
                </span>
                </a>
                </li>
                <li>
                    <a href="<?= base_url('app')?>" title="Albums">
                        <span class="nav_icon">
                            <i class="fa-solid fa-compact-disc"></i>
                        </span>
                        <span class="nav_text">
                            albums
                        </span>
                    </a>
                </li>
            </ul>

            <h4 class="nav_heading">Features</h4>
            <ul class="nav_downloads">
            <li><a href="<?= base_url('aimusic'); ?>" title="AI Images">
                <span class="nav_icon">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </span>
                <span class="nav_text">
                    Analyze Mood
                </span>
                </a>
                </li>

                <li><a href="<?= base_url('newmusics'); ?>" title="Favourites">
                <span class="nav_icon">
                    <i class="fa-solid fa-plus"></i>
                </span>
                <span class="nav_text">
                    Add Music
                </span>
                </a>
                </li>
            </ul>
        </div>
    </div>
</div>
