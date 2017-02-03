
                    <table id="rounded-corner" class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" class="rounded-company">ID</th>
                            <th scope="col" class="rounded-q1">Country Name</th>
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
                    <?=$page_links?>






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
//                    history.pushState({}, null, href);
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
//                history.pushState({}, null, href);
            }
        });
        bindClicks();
        return false;
    }
</script>


