<script type="text/javascript">
    function demond_s() {
    //    alert('hi');
    
        var val = $('#p').val();
        var collection_id = $('#collection_id').val();
        $.ajax({url: "<?php echo base_url(); ?>store/demondstatus_s", data: {store: val, collection_id: collection_id}, success: function(result) {
                alert(result);
                window.location.reload()

            }});
    }
</script>
<?php
foreach ($result as $data) {
    $product_id = json_decode($data->product_id);
    $quantity = json_decode($data->quantity);
    $product_name = json_decode($data->product_name);
    $price = json_decode($data->price);
    $memo = json_decode($data->memo);
    $mobile = json_decode($data->mobile);
    $purchase_date = json_decode($data->purchase_date);
    $fullname = $data->fullname;
    $designation = $data->designation;
    $status = $data->collection_status;
    $t = 0;
}
?>
<section class = "vbox">
    <header class = "header bg-success bg-gradient">
        <ul class = "nav nav-tabs">
            <li class = "active"><a href = "#static" data-toggle = "tab">Demand ID # <?php echo $result[0]->collection_id; ?></a>
                <input id="collection_id" type="hidden" value="<?php echo $result[0]->collection_id; ?>" name="collection_id" />
            </li>
            <?php 
                                    $sto=$data->store;
                                    if($sto != 'Received'){
            ?>
            <li class=""><a href="#datagrid" data-toggle="tab">Edit</a></li>
                                    <?php } ?>
        </ul>
    </header>
    <section class="scrollable wrapper">
        <div class="tab-content">
            <div class="tab-pane active" id="static">
                <div class="row"></div>
                <section class = "panel">
                    <header class = "panel-heading">
                        Product Collection Request<br>
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
                    </header>
                    <div class = "table-responsive">
                        <table class = "table table-striped b-t text-sm">
                            <thead>
                                <tr>
                                    <th width = "20">ID</th>
                                    <th class = "th-sortable" data-toggle = "class">Product Name</th>
                                    <th width = "150">New Quantity</th>
                                    <th width = "150">New Price</th>
                                    <th>Cash Memo#</th>
                                    <th>Party Mobile#</th>
                                    <th>Purchase Date</th>
                                    <th>Date</th>
                                    <th>Action</th>
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
                                        <td><?php
                                            echo $p = $price[$idx];
                                            $t+=$q * $p;
                                            ?></td>
                                        <td><?php echo $memo[$idx]; ?></td>
                                        <td><?php echo $mobile[$idx]; ?></td>
                                        <td><?php echo $purchase_date[$idx]; ?></td>
                                        <td><?php echo $data->date; ?></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    $idx++;
                                }
                                ?>
                                <tr>
                                    <th width = "20"></th>
                                    <th class = "th-sortable" data-toggle = "class"></th>
                                    <th width = "150">Total Price:</th>
                                    <th width = "150"><?php echo $t; ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>                
                            </tbody>
                        </table>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-sm-12 hidden-xs">
                                    <?php 
                                    $sto=$data->store;
                                    if($sto != 'Received'){
                                    ?>
                                    <table>
                                        <tr>
                                            <td><b>Ass. Director:</b></td>
                                            <td>
                                                <input style="width:160px;" class="input-sm form-control input-s-sm inline" value="<?php echo $assd=$data->ass_director; ?>" disabled/>  
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td><b>Director:</b></td>
                                            <td>                                            
                                                <input style="width:160px;" class="input-sm form-control input-s-sm inline" value="<?php echo $dire=$data->director; ?>" disabled/>                                        
                                            </td>
                                            <td></td> 
                                        </tr>

                                        <tr>
                                            <td><b>Director General:</b></td>
                                            <td>                                               
                                                <input style="width:160px;" class="input-sm form-control input-s-sm inline" value=" <?php echo $data->dg; ?> " disabled/>  
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td><b>Purchase:</b></td>
                                            <td>                                                                                     
                                                    <input style="width:160px;" class="input-sm form-control input-s-sm inline" value="<?php echo $data->purchase; ?> " disabled/>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td><b>Store:</b></td>
                                            <td>
                                                <?php
                                                $pur = $data->purchase;
                                              
                                                if (($level == "G") && ($pur == "Purchase-Done") && ($assd == "Approved") && ($dire == "Approved") ) {
                                                  
                                                    ?>
                                                    <select id="p" style="width:160px;" class="input-sm form-control input-s-sm inline">
                                                        <option value="None">None</option>
                                                        <option value="Received">Received</option>>
                                                        <option value="Not-Received">Not Received</option>>
                                                    </select><button onclick="demond_s()" class="btn btn-sm btn-white">Apply</button>
                                                    <?php  } else { ?>           
                                                    <input style="width:160px;" class="input-sm form-control input-s-sm inline" value="<?php echo $data->store; ?> " disabled/>
                                                <?php } ?> 
                                            </td>
                                            <td></td>
                                        </tr>                                        
                                    </table>  
                                    <?php } else { ?>
                                    <a target="_blank" href="<?php echo base_url(); ?>store/collectionviewprint/?id=<?php echo $result[0]->collection_id; ?>"><button>Print</button></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </footer>
                    </div>
                </section>           
            </div>




            <div class = "tab-pane" id = "datagrid">

                <form action="<?php echo base_url(); ?>purchase/collection_update/?id=<?php echo $result[0]->collection_id; ?>" method="post" />
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
                                    <th width = "150">New Quantity</th>
                                    <th width = "150">New Price</th>
                                    <th>Cash Memo#</th>
                                    <th>Party Mobile#</th>
                                    <th>Purchase Date</th>
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
                                    $price = json_decode($data->price);
                                    $memo = json_decode($data->memo);
                                    $mobile = json_decode($data->mobile);
                                    $purchase_date = json_decode($data->purchase_date);
                                    //  print_r($product_id);
                                }
                                $idx = 0;
                                foreach ($product_id as $id) {
                                    ?>   
                                    <tr id="<?php echo $id; ?>_row">
                                        <td><?php echo $id; ?><input type="hidden" value="<?php echo $id; ?>" name="id[]" value="0" /></td>
                                        <td><?php echo $product_name[$idx]; ?><input type="hidden" value="<?php echo $product_name[$idx]; ?>" name="product_name[]"  /></td>
                                        <td><input value="<?php echo $quantity[$idx]; ?>" type="text" size="11" name="quantity[]" value="0" /></td>
                                        <td><input value="<?php echo $price[$idx]; ?>" type="text" size="11" name="price[]"  /></td>
                                        <td><input value="<?php echo $memo[$idx]; ?>" type="text" name="memo[]"  /></td>
                                        <td><input value="<?php echo $mobile[$idx]; ?>" type="text" name="mobile[]"  /></td>
                                        <td><input value="<?php echo $purchase_date[$idx]; ?>" type="text" name="purchase_date[]" value="0" /></td>
                                        <td><?php echo $data->date; ?></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                    $idx++;
                                }
                                ?>
                                <tr>
                                    <td colspan="9"><input type="submit" value="Save Update" class="btn btn-sm btn-white" /></td>
                                </tr>
                            </tbody>
                            </form>
                        </table>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-sm-4 hidden-xs">            
                                </div>
                                <div class="col-sm-4 text-center">
                                </div>
                                <div class="col-sm-4 text-right text-center-xs">                
                                </div>
                            </div>
                        </footer>
                    </div>
                </section>                  

            </div>







        </div>
    </section>
</section>