<link href="<?= base_url('assets/css/site/theme_nav_detail.css" rel="stylesheet') ?>" rel="stylesheet" media="all"/>
<div class="clearfix-5"></div>
<article>

<div class="subheader hidden-xs">
<div class="container p-relative">
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
    <div class="catemenuBaza nav-for-page" id="baza-navcat" style="display: none; "><!-- nav-for-page-->
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
                                    <div class="bd_bot  <?php if($i == 8){ echo 'bd_bot_none';}?>">
                                        <div class="box_icon_menu">
                                            <img class="imagetop<?= $i; ?>" style="display: none;" src="<?= base_url($root->image2);?>"
                                                 alt=""/>
                                            <img class="imagebtt<?= $i; ?>" src="<?= base_url($root->image2);?>" alt=""/>

                                        </div>
                                        <div class="title_menu">  <?= $root->name; ?>  </div>
                                    </div>
                                </a>
                            </div>
                            <ul class="level2">
                                <?php foreach($cate_home_sub as $key_sub_2=>$sub_2){
                                    if($sub_2->parent_id == $root->id){
                                        ?>
                                        <li>
                                            <a href="<?=base_url(@$sub_2->alias.'-pc'.@$sub_2->id);?>" >
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
                                        <?php
                                        unset($cate_home_sub[$key_sub_2]);
                                    }
                                }?>


                            </ul>
                        </li>
                    <?php unset($cate_home_root[$key]);  } }?>
                </ul>
            </div>
        </div>
    </div>

</div>

<!--    <div class="cat-header">-->
<!--        <ul>-->
<!--            <li>-->
<!--                <a href="" title="Sản phẩm mới">Sản phẩm mới</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="">sản phẩm ?a chu?ng</a>-->
<!--            </li>-->
<!--        </ul>-->
<!---->
<!--    </div>-->

    <style type="text/css">
        @media (min-width:992px) and (max-width:1199px){
            .subheader {
                background: transparent !important;
                margin-top: -5px !important;
            }
            .navi-box{
                margin-top: -4px !important;
            }
        }
        @media (min-width:1200px){
            .subheader {
                background: transparent !important;
                margin-top: -5px !important;
            }
            .navi-box{
                margin-top: -4px !important;
            }
        }

    </style>
