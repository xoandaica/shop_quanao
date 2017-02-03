<link href="<?= base_url('assets/css/site/theme_nav_detail.css" rel="stylesheet') ?>" rel="stylesheet" media="all"/>

<div class="clearfix-3"></div>
<article>

    <div class="container p-relative">
        <div class="row">
            <div class="box_219 hidden-xs">
                <div class="navi-box">
                    <div class="cate-title " title="">
                        <div class="icon-menu icon_desk icon-menu2 icon_desk2" style="height: 15px  !important;">
                            <span class=" w_20 line line-1" style="height: 3px  !important;"></span>
                            <span class=" w_20 line line-2" style="height: 3px !important;"></span>
                            <span class=" w_20 line line-3" style="height: 3px !important;"></span>
                        </div>
                        <div class="corlo_17px">Danh mục sản phẩm</div>
                        <i></i>
                    </div>
                    <div class="catemenuBaza nav-for-page" id="baza-navcat" style="display: none;">
                        <div class="row">
                            <div class="catesmenu">
                                <ul class="level1">
                                    <?php if(isset($cate_home_root)){
                                        $i=1;
                                        foreach ($cate_home_root as $key=>$root){
                                            $id=$i++;
                                            ?>
                                            <li class="item araSubmenu theme-sushi" data-color="" data-id="spm<?= $id;?>">
                                                <div class="hover_icon<?= $i; ?> margint10 round-border">
                                                    <a  href="<?= base_url(@$root->alias.'-pc'.@$root->id); ?>"
                                                        class="hover_icon_active navimn1 border_menu pd_0_10px" title="<?= $root->name; ?>" >
                                                        <div class="bd_bot">
                                                            <div class="box_icon_menu">
                                                                <img  style="" src="<?= base_url($root->image2);?>"
                                                                     alt=""/>
                                                            </div>
                                                            <div class="title_menu" style="color: #fff">  <?= $root->name; ?>  </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <ul class="level2">
                                                    <?php foreach($cate_home_sub as $key_sub_2=>$sub_2){
                                                        if($sub_2->parent_id == $root->id){
                                                            ?>
                                                            <li>
                                                                <a style="color: #000" href="<?=base_url(@$sub_2->alias.'-pc'.@$sub_2->id);?>" >
                                                                    <?= $sub_2->name; ?>
                                                                </a>
                                                                <ul class="level3">
                                                                    <?php foreach($cate_home_sub as $key_sub_3=>$sub_3){
                                                                        if($sub_3->parent_id == $sub_2->id){
                                                                            ?>
                                                                            <li>
                                                                                <a href="<?=base_url(@$sub_3->alias.'-pc'.@$sub_3->id);?>" target="_blank">
                                                                                    <?= $sub_3->name; ?>
                                                                                </a>
                                                                                <ul class="level3">
                                                                                    <?php foreach($cate_home_sub as $key_sub_4=>$sub_4){
                                                                                        if($sub_4->parent_id == $sub_3->id){
                                                                                            ?>
                                                                                            <li>
                                                                                                <a href="<?=base_url(@$sub_4->alias.'-pc'.@$sub_4->id);?>" target="_blank">
                                                                                                    <?= $sub_4->name; ?>
                                                                                                </a>
                                                                                            </li>
                                                                                            <?php
                                                                                            unset($cate_home_sub[$key_sub_4]);
                                                                                        }
                                                                                    }?>
                                                                                </ul>
                                                                            </li>
                                                                            <?php
                                                                            unset($cate_home_sub[$key_sub_3]);
                                                                        }
                                                                    }?>
                                                                </ul>
                                                            </li>
                                                            <?php   unset($cate_home_sub[$key_sub_2]);  }}?>
                                                </ul>
                                            </li>
                                            <?php unset($cate_home_root[$key]);  } }?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>


                <style type="text/css">
                    .araSubmenu > a{
                        color: #fff !important;
                    }
                    .icon_desk2{
                        height: 15px !important;
                    }
                    .icon-menu2 .line{
                        height: 3px  !important;
                    }

                    @media (min-width:992px) and (max-width:1199px){
                        .subheader {
                            background: transparent !important;
                            margin-top: 0px !important;
                        }
                        .navi-box{
                            margin-top: -6px !important;
                        }
                        .container_pro{
                            margin-top: -3px;
                        }
                    }
                    @media (min-width:1200px){
                        .subheader {
                            background: transparent !important;
                            margin-top: 0px !important;
                        }
                        .navi-box{
                            margin-top: -6px !important;
                        }
                        .container_pro{
                            margin-top: -3px;
                        }
                    }

                </style>