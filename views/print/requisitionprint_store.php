

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>StoreManager</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>additional/resources/css/bootstrap.css" type="text/css" />
    <head>
    <body >


<?php
//print_r($result);
foreach ($result as $data) {
    $product_id = json_decode($data->product_id);
    $quantity = json_decode($data->quantity);
    $product_name = json_decode($data->product_name);
    $fullname = $data->fullname;
    $designation = $data->designation;
    $status = $data->status;
    //  print_r($product_id);
    $t = 0;
}
?>
<?php echo $header; ?>
<section class = "vbox" style="width:90%;margin:0px auto;"> 
    <section class="scrollable wrapper">
        <div class="tab-content">

            <div  class="tab-pane active" id="static">
                <div class="row"></div>
                <section class = "panel">
                    <header class = "panel-heading">
                        Product Requisition Request:<br><br>
                        <strong>Requisition ID: <?php echo $result[0]->requisition_id; ?></strong><br>
                        <strong>Request By: <?php echo $fullname; ?></strong><br> 
                        <strong>Designation: <?php echo $designation; ?></strong><br>                 
                        <strong>Status:
                            <?php
                           $requisition_status = $result[0]->requisition_status;
                            if ($requisition_status == 0) {
                                echo '<b style="color:Red;">Panding</b>';
                            }
                            ?>
                            <?php
                            if ($requisition_status == 1) {
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
                                    <th width = "150">Quantity</th>
                                    <th width = "150">Date</th>
                                   
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
                                    <?php $store_status = $data->store; if($store_status != "Done"){ ?>
                                    <table>
                                        <tr>
                                            <td><b style="font-size:20px;text-decoration: underline;">Store Approval Form:</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>RECEIVER:</b><br>
                                                <input style="width:260px;" id="reciver" class="input-sm form-control input-s-sm inline" type="text" size="30" name="receiver" value="" />
                                            </td>                                          
                                        </tr>
                
                                        <tr>
                                            <td>
                                                <b>SECRET CODE:</b><br>
                                                <input style="width:260px;" id="code" class="input-sm form-control input-s-sm inline" type="text" size="30" name="code" value="" />
                                            </td>                                          
                                        </tr>                        
                                        
                                        <tr>
                                            <td><b>ACTION:</b>
                                                <br>
                                                <?php
                                                $store_status = $data->store;
                                                if ($store_status == "None") {
                                                    ?>
                                                    <select id="action" style="width:160px;" class="input-sm form-control input-s-sm inline">
                                                        <option value="None">None</option>
                                                        <option value="Accept">Accept</option>
                                                        <option value="Done">Done</option>>
                                                    </select><br><br>
                                                    <button style="width:160px;" onclick="requisition_s()" class="btn btn-sm btn-white">Apply</button>                                                  
                                                <?php } elseif($store_status == "Done") { ?>
                                                    <?php echo $store_status; ?>  
                                                <?php } else{ ?>
                                                     <?php echo $store_status; ?>  
                                                <?php } ?> 
                                                <br>
                                            </td>
                                        </tr>
                                    </table>
                                    <?php } else { echo "Reciver: ".$result[0]->reciver; }?>
                                    
                                  
                                    <?php ?>
                                </div>

                            </div>
                        </footer>
                    </div>
                </section>           
            </div>
        </div>
    </section>
</section>
<?php echo $footer; ?>
</body>
</html>
