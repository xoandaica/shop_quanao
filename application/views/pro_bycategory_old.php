
<input  type="hidden" name="id_lay" id="id_lay" value="<?=$id_lay;?>" />
<script>
    $(document).ready(function(){
        var name = '';
        var id = $("#id_lay").val();
        timdanhmuc(id);

        tim_sanpham(id,1,1);
    });

    // get category pages
    function timdanhmuc(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>products/Tim_danhmuc",
            data: "id=" + id,
            success: function (ketqua) {
                $("#hienthuonghieu").html(ketqua);
            }
        })
    }

    function tim_sanpham(id,$page, $number_per_page) {

        var page = $page;
        var number_per_page = $number_per_page;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>products/Tim_sanpham",
            data: "id=" + id+"&page=" + page+"&number_per_page=" + number_per_page,
            success: function (ketqua) {
                $("#hien_sanpham").html(ketqua);
            }
        })
    }


    function Bo_loc(){
        alert('dáda');
        var danh_muc = [];
            danh_muc.push(this.value);
        tim_sanpham(danh_muc,1,20);
    }

    function tieptheo($page){
//        var id = $("#id_lay").val();
        var danh_muc = [];
        danh_muc.push(this.value);

        var $number_per_page = $("#paginate_length").val();

        tim_sanpham(danh_muc,$page,$number_per_page);
    }
    function doiphantrang(){
//        var id = $("#id_lay").val();
        var danh_muc = [];
        danh_muc.push(this.value);

        var $page = 1;
        var $number_per_page = $("#paginate_length").val();

        tim_sanpham(danh_muc,$page,$number_per_page);
    }

</script>

<section class="content-sp clearfix">
    <div class="logo">
        <div class="container">
            <div class="row">
                <div class="logo-sp text-center clearfix">
                    <a  title="<?= $cate_curent->name; ?>">
                        <img src="<?= base_url($cate_curent->image2); ?>" alt="<?= $cate_curent->name; ?>">
                    </a>
                </div><!--end logo-sp-->
            </div><!--end row-->
        </div><!--end container-->
    </div><!--end logo-->
    <div class="product clearfix">
        <div class="container">
            <div class="row">
                <div class="khung_1 khung_2 col-md-12 col-sm-12">
                    <div class="list-khung list-pro" id="hienthuonghieu">

                    </div>
                </div><!--end khung_1-->
            </div><!--end row-->
        </div><!--end container-->
    </div><!--end product-->
    <div class="main-pro clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12  col-sm-12" id="hien_sanpham">

                </div>
            </div><!--end row-->
        </div><!--end container-->
    </div><!--end main-sp-->
</section><!--end content-sp-->