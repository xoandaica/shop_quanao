<link href="<?= base_url('assets/css/site/slider_full.css')?>" rel="stylesheet"/><!-- slider_full -->
<script type="text/javascript" src="<?= base_url('assets/js/site/jssor.core.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/site/jssor.slider.js')?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/site/slider_full.js')?>"></script><!-- slider_full -->
<script type="text/javascript" src="<?= base_url('assets/js/site/jssor.utils.js')?>"></script>
<div class="slider_full">
    <div id="slider1_container" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1350px; height: 492px; overflow: hidden;">
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1350px;  height: 492px; overflow: hidden;">
            <?php foreach ($slider as $key => $img) { ?>
                <div class="w_100 h_100">
                    <a class="w_100 h_100" target="<?= $img->target ?>" <?php if ($img->url != null) {
                        echo ' href="' . $img->url . '" ';
                    } ?> title="<?= $img->title ?>">
                        <img class="w_100 h_100" u="image" src="<?= base_url($img->link); ?>" alt="<?= $img->title ?>"/>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
            <div u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:White; font-size:12px;"></div>
        </div>
            <span u="arrowleft" class="jssora21l" style="width: 55px; height: 55px; top: 10px; left: 0px;">

            </span>
            <span u="arrowright" class="jssora21r" style="width: 55px; height: 55px; top: 100px; right: 0px;">
            </span>
    </div>
    
</div>
