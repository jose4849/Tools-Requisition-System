<script type="text/javascript">
    $(document).ready(function() {
        $('#selectbox-o').select2({
            placeholder: "Select a Product",
            allowClear: true,
            minimumInputLength: 2,
            ajax: {
                url: "<?php echo base_url(); ?>store/product_search",
                dataType: 'json',
                data: function(term, page) {
                    return {
                        q: term
                    };
                },
                results: function(data, page) {
                    return {results: data};
                }
            }
        });

        $(".add-product").click(function() {
            var val = $('[name=optionvalue]').val();
            $.ajax({url: "<?php echo base_url(); ?>store/product_select", data: {id: val}, success: function(result) {
                    $("#tblData tbody").append(result);

                }});

        });


    });

    function delete_pro(id) {
        console.log(id);
        $('#' + id + '_row').remove();

    }
</script>
<?php
//print_r($result);
foreach ($result as $data) {
    $product_id = json_decode($data->product_id);
    $quantity = json_decode($data->quantity);
    $product_name = json_decode($data->product_name);
    $fullname = $data->fullname;
    $designation = $data->designation;
    $code = $data->code;
    $status = $data->status;
    //  print_r($product_id);
    $t = 0;
}
?>
<section class = "vbox">
    <header class = "header bg-success bg-gradient">
        <ul class = "nav nav-tabs">
            <li class = "active"><a href = "#static" data-toggle = "tab">Requisition ID # <?php echo $result[0]->requisition_id; ?></a></li>
            <!--  <li class=""><a href="#datagrid" data-toggle="tab">Edit</a></li> -->

        </ul>
    </header>
    <section class="scrollable wrapper">
        <div class="tab-content">

            <div class="tab-pane active" id="static">
                <div class="row"></div>
                <section class = "panel">
                    <header class = "panel-heading">
                        Product Requisition Request<br>
                        <strong>Request By: <?php echo $fullname; ?></strong><br> 
                        <strong>Designation: <?php echo $designation; ?></strong><br>                 
                        <strong>Status:
                            <?php
                            if ($status == 0) {
                                echo '<b style="color:Red;">Panding</b>';
                            }
                            ?>
                            <?php
                            if ($status == 1) {
                                echo '<b style="color:green;">Apporved</b>';
                            }
                            ?>
                            <?php
                            if ($status == 2) {
                                echo '<b style="color:;">Reject</b>';
                            }
                            ?>
                        </strong><br> 
                        <strong>Code: <?php echo $code; ?></strong>
                    </header>
                    <div class = "table-responsive">
                        <table class = "table table-striped b-t text-sm">
                            <thead>
                                <tr>
                                    <th width = "20">ID</th>
                                    <th class = "th-sortable" data-toggle = "class">Product Name</th>
                                    <th width = "150">Quantity</th>
                                    <th width = "150">Date</th>
                                    <th width = "150">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $idx = 0;
                                foreach ($product_id as $id) {
                                    ?>   
                                    <tr id="<?php echo $id; ?>_row">
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $product_name[$idx]; ?></td>
                                        <td><?php echo $q = $quantity[$idx]; ?></td>                                      
                                        <td><?php echo $data->date; ?></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    $idx++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-sm-12 hidden-xs">
                                    <table>
                                        <tr>
                                            <td><b>Store:</b></td>
                                            <td>
                                                <?php echo $store_status = $data->store; ?>

                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <br>
                                                <?php
                                                if ($store_status == "None") {
                                                    ?>
                                                   <a href="<?php echo base_url(); ?>director/requisitiondelete/?id=<?php echo $result[0]->requisition_id; ?>"><button  class="btn btn-sm btn-white">Cancel Request</button></a>
                                                <?php } ?> 
                                                <br>
                                            </td>
                                        </tr>
                                    </table>              
                                </div>

                            </div>
                        </footer>
                    </div>
                </section>           



            </div>




            <div class = "tab-pane" id = "datagrid">



                <section class = "panel">
                    <header class = "panel-heading">
                        New Product List
                        <i class = "icon-info-sign text-muted" data-toggle = "tooltip" data-placement = "bottom" data-title = "ajax to load the data."></i>
                    </header>
                    <div class = "table-responsive">
                        <table class = "table table-striped b-t text-sm">
                            <thead>
                                <tr>
                                    <th width = "20">ID</th>
                                    <th class = "th-sortable" data-toggle = "class">Product Name</th>
                                    <th width = "150">Quantity</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($result as $data) {
                                    $product_id = json_decode($data->product_id);
                                    $quantity = json_decode($data->quantity);
                                    $product_name = json_decode($data->product_name);

                                    //  print_r($product_id);
                                }
                                $idx = 0;
                                foreach ($product_id as $id) {
                                    ?>   
                                    <tr id="<?php echo $id; ?>_row">
                                        <td><?php echo $id; ?><input type="hidden" value="<?php echo $id; ?>" name="id[]" value="0" /></td>
                                        <td><?php echo $product_name[$idx]; ?><input type="hidden" value="<?php echo $product_name[$idx]; ?>" name="product_name[]"  /></td>
                                        <td><input value="<?php echo $quantity[$idx]; ?>" type="text" size="11" name="quantity[]" value="0" /></td>
                                        <td><?php echo $data->date; ?></td>
                                        <td><input type="button" onclick="delete_pro(<?php echo $id; ?>)" class="del" value="Delete" /></td>
                                    </tr>
                                    <?php
                                    $idx++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-sm-4 hidden-xs">
                                 <!-- <select class="input-sm form-control input-s-sm inline">
                                    <option value="0">Bulk action</option>
                                    <option value="1">Delete selected</option>
                                    <option value="2">Bulk edit</option>
                                    <option value="3">Export</option>
                                  <button class="btn btn-sm btn-white">Apply</button>  -->                
                                </div>
                                <div class="col-sm-4 text-center">
                                  <!-- <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>-->
                                </div>
                                <div class="col-sm-4 text-right text-center-xs">                
                                    <!--<ul class="pagination pagination-sm m-t-none m-b-none">
                                      <li><a href="#"><i class="icon-chevron-left"></i></a></li>
                                      <li><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#">4</a></li>
                                      <li><a href="#">5</a></li>
                                      <li><a href="#"><i class="icon-chevron-right"></i></a></li> </ul>-->                 

                                </div>
                            </div>
                        </footer>
                    </div>
                </section>                  

            </div>







        </div>
    </section>
</section>