<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Petshop">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, intial-scale=1,shrink-to-fit=no">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    </head>
    <body>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Stock Product</h4>
                                <p class="card-description">
                                    Stock Product <code>dapat dilihat disini.</code>
                                </p>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID Product</th>
                                                <th>Nama Product</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Total Produk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $conn = new mysqli("localhost", "root", "password", "petshop");
                                            $sql="SELECT * FROM produk";
                                            $res=$conn->query($sql);
                                            while($row=$res->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td><?= $row['id_produk'] ?></td>
                                                <td><?= $row['nama_produk'] ?></td>
                                                <td><?= $row['kategori_produk'] ?></td>
                                                <td><?= $row['harga_produk'] ?></td>
                                                <td><?= $row['total_produk'] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('table').DataTable();
                    });
                </script>
            </div>
    </body>
</html>