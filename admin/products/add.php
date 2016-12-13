<?php
include '../../inc/products.php';

$prod = new Products;
$prod->isloggedin();

if (isset($_POST['addprod'])) {
  $res = $prod->insert_product($_POST);
  if ($res) {
    echo "Successfully added!</br></br>";
  }else{
    echo "Fail to add product!</br></br>";
  }
}


?>
<style type="text/css">
    
</style>
<!-- Sign Up -->

<a href="<?php echo $prod->base_url().'admin'; ?>">Dashboard</a>
      <!-- body (form)-->
      <div class="modal-body">
        <form role="form" name="productform" id="productform" method="post">
          <div class="form-group">
            <label>Product Name:</label>
            <input type="text" class="form-control" name="product[prod_name]" placeholder="Product Name" required>
            </div>

          <div class="form-group">
             <label>Price:</label>
             <input type="text" class="form-control" name="product[prod_price]" placeholder="Price" required>
            </div>

           <div class="form-group">
             <label>Quantity:</label>
             <input type="text" class="form-control" name="product[prod_qty]" placeholder="Quantity" required>
            </div>

          <div class="form-group">
            <label>Store:</label>
            <select class="form-control" name="product[store_id]" required>
              <option value ="0">-Please select-</option>
            
              <?php 
                $id = $prod->current_user_id();
                $mystore = $prod->my_store($id);
                foreach ($mystore as $store) {
                  echo '<option value ="'.$store['store_id'].'">'.$store['store_name'].'</option>';
                }
              ?>
            </select>

            
          </div>
      <!-- button footer -->
      <div class="modal-footer">
        <button type="submit" name="addprod" class="btn btn-primary btn-block">Add Product</button>
      </div>

    </form>   
  </div>
  
<a href="<?php echo $prod->base_url().'admin/products'; ?>">View Products</a>

<!-- end of sign up -->



    <!-- Start Footer -->
  <footer id="mu-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="mu-footer-area">
           
          <div class="mu-footer-copyright">
            <p>&copy; FoodEx Team, University of San Carlos | <a href="foodex@gmail.com"> foodex@gmail.com </a></p>
          </div>         
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  </body>
  <script ty pe="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript">
    // $('#registrationform').submit(function(){
    //   var value = $('.password').val();
    //   if (!value || value != '') {
    //     return false;
    //   }
    // });
    // $('.numbersonly').keydown(function () { 
    //   if ( event.keyCode == 46 || event.keyCode == 8 ) {
    //   }
    //   else {
    //     if (event.keyCode < 48 || event.keyCode > 57 ) {
    //         event.preventDefault(); 
    //     }   
    //   }
    });
  </script>
</html>