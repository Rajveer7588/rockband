<?php
    
    include_once('include/functions.php');
    
    $trans_id = $_POST["trax_id"];
    
    $del_tranx_id = $_POST['del_tranx_id'];

    
    $fetch = mysqli_query($conn, "SELECT * FROM `orders` WHERE transaction_id ='{$trans_id}'");
    
    $row = mysqli_num_rows($fetch);
    
   $output = "";
   
  $result = mysqli_fetch_assoc($fetch);
  if($result>0){
       $transaction_id = $result["transaction_id"];
       $product_image = explode(",", $result["product_image"]);
       $output.="
       <div class='user_record'>
       <div class='col-lg-12 col-md-12'>
            <div class='product_data'>
                <p class='ptxt'><strong>Transaction Id: </strong><small>".$result['transaction_id']."</small></p>
                <div class='col-md-12'>
                    <div class='row'>
                        <div class='col-lg-6 col-md-6'>
                            <div class='order_data'>
                                <P class='ptxt'><strong>Shipping Address: </strong>".$result['shiping_address']."</P>
                            </div>
                            
                        </div>
                        <div class='col-lg-6 col-md-6'>
                            <div class='order_data'>
                                <p class='ptxt'><strong>Order Date: </strong> ".$result['payment_date_time']."</p>
                            </div>
                        </div>
                        <div class='col-lg-6 col-md-6'>
                            <div class='order_data'>
                                <p class='ptxt'><strong>Username: </strong> ".$result['username']." ".$result['last_name']."</p>
                                <p class='ptxt'><strong>Address: </strong>".$result['address']."</p>
                                 <p class='ptxt'><strong>ZipCode: </strong>".$result['zip_code']."</p>
                               
                            </div>
                        </div>
                        <div class='col-lg-6 col-md-6'>
                            <div class='order_data'>
                                <p class='ptxt'><strong>Email: </strong>".$result['email']."</p>
                                <p class='ptxt'><strong>Phone No: </strong>".$result['phone']."</p>
                                <p class='ptxt'><strong>Country: </strong>".$result['country']."</p>
                                <p class='ptxt'><strong>State: </strong>".$result['state']."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='product_detail'>
                <div class='col-lg-12'>
                    <div class='row'>
                        <table class='responsive-table'>
                            <thead>
                                <tr>
                                    <th scope='col'>Product Image</th>
                                    <th scope='col'>Product Name</th>
                                    <th scope='col'>Product_size</th>
                                    <th scope='col'>Quantity</th>
                                    <th scope='col'>Rates</th>
                                </tr>
                            </thead>
                            <tbody>";
                               
                                
                          $img =   $result['product_image'];
                          $imgvalue =   explode(",",$img);
                          $co = count($imgvalue);
                          
                          $product_namevalue =$result['product_name'];
                          $product_name = explode(",",$product_namevalue);
                          
                          $product_sizevalue =$result['product_size'];
                          $product_size = explode(",",$product_sizevalue); 
                          
                          $qtysvalue =$result['qtys'];
                          $qtys = explode(",",$qtysvalue);
                          
                          $product_pricevalue =$result['product_price'];
                          $product_price = explode(",",$product_pricevalue);
                          
                                for($i=0;$i<$co;$i++)
                                {
                                     $output.=" <tr> 
                                    <td data-title=''><img src='../uploads/product/".$imgvalue[$i]."' width='200px' height='100px' alt='image'></td>
                                    <td data-title='Product Name'>".$product_name[$i]."</td>
                                    <td data-title='Product Size'>".$product_size[$i]."</td>
                                    <td data-title='Quantity'>".$qtys[$i]."</td>
                                    <td data-title='Product Price'>".$product_price[$i]."</td>
                                    </tr>";
                                    }
                                    
                                
                           $output.=" </tbody>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>";
  }
  else
  {
      echo "Transaction Id Not Found!!!.";
  }
       
   
    echo $output;

   if(!empty($del_tranx_id)){
       $delete_data = mysqli_query($conn, "DELETE FROM `orders`  WHERE transaction_id ='{$del_tranx_id}'");
       $del_output="";
       if($delete_data){
           $del_output .="
            <h1>Record Deleted Successfully</h1>
           ";
       }
   }
   echo $del_output;
   
    

?>