<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
?>
<!--Player-->
<?php if(class_exists('ACF') && rekord_has_posts('track') ): ?>


<div id="mediaPlayer" class="player-bar col-lg-9 col-md-5"
    <?php if(get_theme_mod('auto_play'))  echo 'data-auto="true"'; ?>>
    <div class="row align-items-center grid">

    <div class="col-2 active-track">
    </div>
        <div class="col">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center mt-1">
                    <?php if(get_theme_mod('layout_rtl')) : ?>
                    <button id="nextTrack" class="btn btn-link d-none d-sm-block">
                        <i class="icon-next s-18"></i>
                    </button>

                    <button class=" btn btn-link" id="playPause">
                        <span id="play"><i class="icon-play s-36"></i></span>
                        <span id="pause" style="display: none"><i class="icon-pause s-36 text-primary"></i></span>
                    </button>
                    <button id="previousTrack" class="btn btn-link d-none d-sm-block">
                        <i class="icon-back s-18"></i>
                    </button>
                    <?php else: ?>
                    <button id="previousTrack" class="btn btn-link d-none d-sm-block">
                        <i class="icon-back s-18"></i>
                    </button>
                    <button class=" btn btn-link" id="playPause">
                        <span id="play"><i class="icon-play s-36"></i></span>
                        <span id="pause" style="display: none"><i class="icon-pause s-36 text-primary"></i></span>
                    </button>
                    <button id="nextTrack" class="btn btn-link d-none d-sm-block">
                        <i class="icon-next s-18"></i>
                    </button>
                    <?php endif;?>
                </div>

            </div>
        </div>


        <div class="col-6 d-none d-lg-block">
            <div id="waveform" data-bar-width='3'
                data-progress-color="<?php if ( ! empty(get_theme_mod( 'primary_color')) )  echo sanitize_hex_color(get_theme_mod( 'primary_color')); ?>">
            </div>
            <div class="music_pseudo_bars">
                <?php for($i=0 ; $i<=20; $i++): ?>
                <div class="music_pseudo_bar"></div>
                <?php endfor; ?>
            </div>
        </div>



        <div class="col d-none d-lg-block">
            <small id="mediaPlayer-time" class="track-time mr-2 text-primary align-middle"></small>
            <?php if (get_theme_mod( 'player_volume') ) : ?>
            <!-- Volume button -->
            <div class="btn-group dropup">
                <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-speaker-6 s-18 align-middle mr-2"></i>
                </div>
                <div class="dropdown-menu volume-dropdown-menu ">
                    <div class="slidecontainer">
                        <input type="range" min="0" max="1" value="1" step="0.1" class="form-control-range slider"
                            id="volume">
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <a class="no-ajaxy" data-toggle="control-sidebar">
                <i class="icon icon-menu-3 s-18 align-middle"></i>
            </a>
        </div>
    </div>
</div>
<?php endif; ?>
<!--@Player-->