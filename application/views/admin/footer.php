</div>

<style>
    .btn{border-radius: 0px}
</style>
<!-- /#wrapper -->

<!-- jQuery Version 1.11.0 -->
<!--<script src="<?/*=base_url("assets/js/jquery-1.11.0.js")*/?>"></script>-->

<!-- Bootstrap Core JavaScript -->


<!-- Morris Charts JavaScript -->
<script src="<?= base_url('js/plugins/morris/raphael.min.js')?>"></script>
<script src="<?= base_url('assets/js/plugins/morris/morris.min.js')?>"></script>
<script src="<?= base_url('assets/js/plugins/morris/morris-data.js')?>"></script>


<div id="show_success_mss" style="position: fixed; top: 50px; right: 50px;z-index: 10000">
    <?php if(isset($_SESSION['mess_lang'] )){?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= @$_SESSION['mess_lang'];?>
    </div>
    <?php
        unset($_SESSION['mess_lang']);
    }?>

    <?php if(isset($_SESSION['mss_success'] )){?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= @$_SESSION['mss_success'];?>

        </div>
        <?php
        unset($_SESSION['mss_success']);
    }?>
</div>
<script>

    setTimeout(function(){
        $('#show_success_mss').fadeOut().empty();
    }, 5000);

    function base_url(){
        return '<?php echo base_url();?>';
    }
</script>
<script src="<?=base_url('assets/js/admin/main_site.js')?>"></script>
<style>

    #image_review{
        width: 100%;
        max-height: 200px;
        margin-top: 10px;
    }
</style>

<div id="show_alert" style="position: fixed; top: 5px; right: 5px;z-index: 99999 ">
    <?php if(isset($_SESSION['alert'])){?>

        <div class="alert alert-<?=$_SESSION['alert']['type']?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?=$_SESSION['alert']['mess'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <script>
            setTimeout(function(){
                $('#show_alert').fadeOut().empty();
            }, 10000);

        </script>
        <?php
        unset($_SESSION['alert']);
    }?>
</div>





</body>

</html>