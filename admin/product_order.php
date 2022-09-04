<?php
include 'layouts/header.php';
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ordered Products</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Orders</li>
      <li class="breadcrumb-item active" aria-current="page">Ordered Products</li>
    </ol>
  </div>

  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Ordered Products Table</h6>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>SL</th>
                <th>Order Id</th>
                <th>User Name</th>
                <th>Mobile</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
              if (isset($_GET['confirm'])) {
                echo $confirm = $product->confirmorder($_GET['confirm']);
              }
              $i = 0;
              $view = $product->viewProductOrder();
              foreach ($view as $value) {
                $i++;
              ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $value['order_id']; ?></td>
                  <td><a href="singleuser.php?id=<?php echo $value['user_id']; ?>"><?php echo  $value['first_name'] . " " . $value['last_name']; ?></a></td>
                  <td><?php echo $value['mobile_no']; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['selling_price']; ?> BDT</td>
                  <td><?php echo $discount = ($value['discount'] / 100) * $value['selling_price']; ?> BDT</td>
                  <td>
                    <?php if ($value['status'] == 0) { ?>
                      <a href="?confirm=<?php echo $value['order_id']; ?>" class="btn btn-sm btn-success">SELL</a>
                    <?php } else { ?>
                      <button class="btn btn-info btn-sm">SOLD</button>
                    <?php } ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php'; ?>