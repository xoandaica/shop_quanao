<div id="divID">
<table id="rounded-corner">
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
</div>

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


<script type="text/javascript" src="<?=base_url('assets/js/jquery-1.9.1.js')?>"> </script>


<script type="text/javascript">
    $(document).ready(function() {

        function bindClicks() {
            $("ul.tsc_pagination a").click(paginationClick);
        }

        function paginationClick() {

            var href = $(this).attr('href');
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

//                    bindClicks();
                }
            });

            return false;
        }

        bindClicks();
    });
</script>