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
    function requisition_s(){
        var reciver = $('#reciver').val();
        var code = $('#code').val();
        var action = $('#action').val();
        var requisition_id = $('#requisition_id').val();
        $.ajax({url: "<?php echo base_url(); ?>store/requisitionstatus", data: {code:code,reciver:reciver,store:action, requisition_id: requisition_id}, success: function(result) {
                alert(result);
               // window.location.reload()

            }});
    }
</script>


<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js" > </script> 
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'static', 'height=400,width=600');
        mywindow.document.write('<html><head><title>BITAC STORE</title>');
        /*optional stylesheet*/ //
        mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>additional/print.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
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
    $status = $data->status;
    //  print_r($product_id);
    $t = 0;
}
?>
<section class = "vbox">
    <header class = "header bg-success bg-gradient">
        <ul class = "nav nav-tabs">
            <li class = "active"><a href = "#static" data-toggle = "tab">Requisition ID # <?php echo $result[0]->requisition_id; ?></a>
            <input id="requisition_id" type="hidden" value="<?php echo $result[0]->requisition_id; ?>" name="requisition_id" />
            </li>
            <!--  <li class=""><a href="#datagrid" data-toggle="tab">Edit</a></li> -->

        </ul>
    </header>
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
                                    <br><br><a target="_blank" href="<?php echo base_url(); ?>store/requisitionviewprint/?id=<?php echo $result[0]->requisition_id; ?>">
                                    <button  style="text-align: center">Print</button></a>
                                    <?php ?>
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