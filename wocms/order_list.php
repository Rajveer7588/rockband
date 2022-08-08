<?php include_once('session_destroy.php') ;
      include_once('include/functions.php');
      
  
		//  echo "SELECT * FROM aid_listing WHERE admin_id='".$admin_id."' and property_id not in (7,15,8)";
		
	    $limit = 5; 
        // Look for a GET variable page if not found default is 1.     
        if (isset($_GET['page'])) { 
            
          $pn  = $_GET["page"]; 
        } 
        else { 
          $pn=1; 
        };  
  
        $start_from = ($pn-1) * $limit; 
        
        // order table query
        
        $order_query = mysqli_query($conn, "SELECT * FROM `orders` Limit $start_from, $limit");
        
        $rows = mysqli_num_rows($order_query);
        
        

//         $fetch_pro = mysqli_query($conn,"SELECT * FROM `services` LIMIT $start_from, $limit");
      

// 		@$nums = mysqli_num_rows($fetch_pro);


    ?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin</title>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

<link href="framework/css/import.css" rel="stylesheet">

<script src="framework/js/ajax.js"></script>



</head>

<body class="hold-transition skin-blue sidebar-mini">



<?php include_once('include/topbar.php'); ?>

<div class="wrapper">

    <?php include_once('include/sidebar.php'); ?>

    <?php $base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/' ;?>

    <div class="content-wrapper">
         
        <section class="content-header">
    
        <h1><small>Upcoming Orders</small> </h1>
        <div class="product_record">
            <!--<div class="user_record">-->
            <!--    <div class="product_data">-->
            <!--        <p><strong>Transaction Id: </strong><small>11365351166565</small></p>-->
            <!--        <div class="col-md-12">-->
            <!--            <div class="row">-->
            <!--                <div class="col-lg-6 col-md-6">-->
            <!--                    <div class="order_data">-->
            <!--                        <P><strong>Shipping Address: </strong>Ghaziabad</P>-->
            <!--                    </div>-->
                                
            <!--                </div>-->
            <!--                <div class="col-lg-6 col-md-6">-->
            <!--                    <div class="order_data">-->
            <!--                        <p><strong>Date: </strong> 12-12-2020</p>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-6 col-md-6">-->
            <!--                    <div class="order_data">-->
            <!--                        <p><strong>Username: </strong> Rajveer</p>-->
            <!--                        <p><strong>Address: </strong>Noida</p>-->
            <!--                         <p><strong>ZipCode: </strong>201013</p>-->
                                   
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-6 col-md-6">-->
            <!--                    <div class="order_data">-->
            <!--                        <p><strong>Email: </strong>rajveer@gmiail.com</p>-->
            <!--                        <p><strong>Phone No: </strong>rajveer@gmiail.com</p>-->
            <!--                        <p><strong>Country: </strong>Inida</p>-->
            <!--                        <p><strong>State: </strong>Utterpradesh</p>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <div class="product_data">-->
            <!--        <div class="col-lg-12">-->
            <!--            <div class="row">-->
            <!--                <table class="responsive-table">-->
            <!--                    <thead>-->
            <!--                        <tr>-->
            <!--                            <th scope="col">Product Image</th>-->
            <!--                            <th scope="col">Product Name</th>-->
            <!--                            <th scope="col">Description</th>-->
            <!--                            <th scope="col">Rates</th>-->
            <!--                            <th scope="col">Quantity</th>-->
            <!--                        </tr>-->
            <!--                    </thead>-->
            <!--                    <tbody>-->
            <!--                        <tr>-->
            <!--                             <td><img src="../uploads/10243.png" width="200px" height="100px" alt="image"></td>-->
            <!--                            <td>ICE Qube</td>-->
            <!--                            <td>$200</td>-->
            <!--                            <td>fdf</td>-->
            <!--                            <td>fsf</td>-->
            <!--                        </tr>-->
            <!--                    </tbody>-->
                               
            <!--                </table>-->
            <!--                 <div class="col-lg-6 col-md-6">-->
            <!--                    <div class="order-data">-->
            <!--                        <img src="../uploads/10243.png" width="200px" height="100px" alt="image">-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-6 col-md-6">-->
            <!--                    <div class="order-data">-->
            <!--                        <p><strong>Product Name: </strong> ICE Qube</p>-->
            <!--                        <p><strong>Description: </strong>Now if we were to press the trigger or the close button, the modal should smoothly animate between the states</p>-->
            <!--                        <p><strong>Rates: </strong>$200</p>-->
            <!--                        <p><strong>Quantity</strong>3</p>-->
                                    
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
      
        </div>
       
        
            <div class="ta_pad">
    			<table class="responsive-table">
    			
    				<thead>
    					<tr>
    						<th scope="col">S.No </th>
    						<th scope="col">Order Id</th>
    						<th scope="col">Product Name</th>
    						<th scope="col">User Name</th>
    						<th scope="col">Order Date</th>
    						<th scope="col">Delete</th>
    						<th scope="col">View</th>
    					</tr>
    				</thead>
    		
    				<tbody>
                        <?php
    					$i=1;
    					while($order_result = mysqli_fetch_assoc($order_query))
    					{
    					$id = $order_result['id'];
    					$transaction_id = $order_result['transaction_id'];
    					$product_name = $order_result['product_name'];
    					$username = $order_result['username'];
    					$heading = $order_result['heading'];
    					$status = $order_result['status'];
    					$payment_date_time = $order_result['payment_date_time'];	  
    					?>
    					<tr>
    						<td data-title="S.NO"><?php echo $i; ?></td>
    						<td data-title="Transaction Id"><?= $transaction_id; ?></td>
    						<td data-title="Category"><?php echo @$product_name; ?> </td>
    						<td><?=$username; ?></td>
    						<td data-title="Date" ><?php echo @$payment_date_time; ?></td>
    					
    						<td data-title="Delete" ><button type="submit" data-del_transaction_id="<?= $transaction_id; ?>" class="delete_data"><i class="fa fa-trash"></i></button></td>
    					
    						<td data-title="Edit" ><button type="submit" data-trasaction_id="<?= $transaction_id; ?>" class="view_data"><i class="fa fa-eye"></i></button></td>
    					</tr>
                    
    						<?php
    						$i++;
    					    }
    					    ?>  
    			    </tbody>
    			</table>
    			    <ul class="pagination">
                      <?php
                            $sql1 = "SELECT COUNT(*) FROM `orders`";  
                            $rs_result = mysqli_query($conn,$sql1);  
                            $row = mysqli_fetch_row($rs_result);  
                            $total_records = $row[0];
                            // Number of pages required.
                            $total_pages = ceil($total_records / $limit);     
                            if($pn >=2){
                            ?>
                                 <li class='active'><a href="<?= $base_url; ?>order_list.php?page=<?= $pn-1; ?>" id="pagination_txt">Prev</a></li>
                            <?php
                            }
                            for ($i=1; $i<=$total_pages; $i++) {
                              if ($i==$pn) {
                                ?>
                                  <li class='active'><a href='<?= $base_url; ?>order_list.php?page=<?= $i ?>' id="pagination_txt"><?php echo $i; ?></a></li>
                                <?php
                              }            
                              else{
                                ?>
                                    <li><a href='<?= $base_url; ?>order_list.php?page=<?= $i ?>' id="pagination_txt">
                                                                    <?php echo $i; ?></a></li> 
                                <?php
                                } 
                            }
                            if($pn<=$total_pages){
                            ?>
                                 <li class='active'><a href="order_list.php?page=<?= $pn+1; ?>" id="pagination_txt">Next</a></li>
                            <?php
                            }
                        ?>
                  </ul>
    		</div>
    
    </section>
    </div>
    <script src="framework/js/bootstrap.min.js"></script> 
    
    <script src="framework/js/custom.js"></script> 
    
    <script src="framework/js/app.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
         
                $(".view_data").click(function(){
                var trax_id = $(this).data("trasaction_id");
                // alert(tran_id);
                $.ajax({
                    type: "POST",
                    url: "ajax_order_data.php",
                    data :{ trax_id:trax_id},
                    success:function(data){ 
                        $(".product_record").html(data);
                    }
                });
            });
       
            
            $(".delete_data").click(function(){
                var del_tranx_id = $(this).data("del_transaction_id");
                // alert(tran_id);
                $.ajax({
                    type: "POST",
                    url: "ajax_order_data.php",
                    data :{ del_tranx_id:del_tranx_id},
                    success:function(data){ 
                        $(".product_record").html(data);
                         setTimeout(function(){
                             location.reload();
                         },100);
                    }
                });
            });
            
            
            
        });

    </script>

</body>

</html>
