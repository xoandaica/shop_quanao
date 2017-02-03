<div id="page-wrapper">


    <a  class="btn btn-xs btn-default" data-confirm='Confirm text'>Confirm</a>

    <div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="dataConfirmLabel">Please Confirm</h3></div>
        <div class="modal-body" id="confirmtext"></div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <a class="btn btn-primary" id="dataConfirmOK">OK</a></div>
    </div>
    <script>
        $(document).ready(function() {
            $('a[data-confirm]').click(function(ev) {
                var href = $(this).attr('href');
                if (!$('#dataConfirmModal').length) {
                    $('body').append('');
//                    alert(1);
                }else{
//                    alert(0);
                }

                $('#dataConfirmModal').find('#confirmtext').text($(this).attr('data-confirm'));
                $('#dataConfirmOK').attr('href', href);
//                $('#dataConfirmModal').modal();
                return false;
            });
        });
    </script>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?=base_url('vnadmin')?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> Email đăng ký
                    </li>
                </ol>
            </div>
            <div class="col-md-12">
                <form>
                    <input id="name" placeholder="name..">
                    <input id="cat" placeholder="name..">
                    <input id="submit" type="button" value="Lọc" onclick="search_click()"
                        data-href="<?=current_url()?>"
                        >
                </form>
                <br>
                <div class="clear"></div>
                <div id="divID">
                    <table id="rounded-corner" class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" class="rounded-company">ID</th>
                            <th scope="col" class="rounded-q1">Product Name</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        if(count($countriesdata) > 0) {
                            foreach($countriesdata as $val) { ?>
                                <tr>
                                    <td><?=$val["id"];?></td>
                                    <td><?=$val['name']?></td>
                                </tr>
                            <?php } ?>
                        <?php
                        }
                        else {
                            ?>
                            <tr><td colspan="5">No records</td></tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <?php echo $page_links; ?>
                </div>



            </div>
        </div>


    </div>

</div>





<script type="text/javascript" src="<?=base_url('assets/js/jquery-1.9.1.js')?>"> </script>


    <script type="text/javascript">
        $(document).ready(function() {

            function bindClicks() {
                $("ul.pagination a").click(paginationClick);
            }

            function paginationClick() {

                var href = $(this).attr('href');
                if(href=='#'){
                    return false;
                }
                $("#rounded-corner").css("opacity","0.4");


                $.ajax({
                    type: "GET",
                    dataType: "html",
                    url: href,
                    data: {},
                    success: function(response)
                    {
                        $("#rounded-corner").css("opacity","1");

                        $("#divID").html(response);
//                        history.pushState({}, null, href);
    //                    bindClicks();
                    }
                });

                return false;
            }

            bindClicks();

        });

        function search_click() {

            var href = '<?php echo base_url()?>'+'admin/product/jQueryPagination'+'?name='+$('#name').val()+'&cat='+$('#cat').val()+'';
            $("#rounded-corner").css("opacity","0.4");


            $.ajax({
                type: "GET",
                dataType: "html",
                url: href,
                data: {},
                success: function(response)
                {
                    $("#rounded-corner").css("opacity","1");

                    $("#divID").html(response);
//                    history.pushState({}, null, href);
                }
            });
            bindClicks();
            return false;
        }
    </script>



<style>
    .tsc_pagination li{
        float: left;
        padding: 5px;
        margin-right: 2px;
        border: 1px #666 solid;
        list-style: none;
    }
    .tsc_pagination li.current{
        float: left;
        padding: 5px;
        margin-right: 2px;
        border: 1px #666 solid;
        background: red;
    }
    .tsc_pagination li a{
        text-decoration: none;
    }
</style>
