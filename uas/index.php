<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'onlinecoffee');

if (!$conn) {
    die("Koneksi gagal. " . mysqli_connect_error()); // close koneksi
}

if (!isset($_GET['cari'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_produk");
} else {
    $query = mysqli_query($conn, "SELECT * FROM tb_produk WHERE nama_produk LIKE '%" . $_GET['cari'] . "%'");
}

require_once 'header.php';

if (isset($_SESSION['pesan'])) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              ' . $_SESSION['pesan'] . '
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>';

    unset($_SESSION['pesan']);
}
?>

<div class="container mt-5">

    <?php require_once 'cart.php'; ?>

    <div class="row mb-2">
        <div class="col">
            <h4>List Coffee</h4>
        </div>
        <div class="col">
            <form class="form-inline pull-right" action="" method="GET">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" name="cari" class="form-control" placeholder="Cari Produk">
                </div>
                <button type="submit" class="btn btn-success mb-2">Search</button>
            </form>
        </div>
    </div>

    <table class="table text-light">
        <thead class="thead" style="background-color: #d06f6f;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Coffee</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Qty</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $no = 1;
            while ($dt = $query->fetch_assoc()) :
            ?>

                <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="id_produk" value="<?= $dt['id']; ?>"></input>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $dt['nama_produk']; ?></td>
                        <td><?= $dt['harga']; ?></td>
                        <td><?= $dt['stok']; ?></td>
                        <td width="106">
                            <input class="form-control form-control-sm" type="number" name="pembelian" value="1" min="1" max="<?= $dt['stok']; ?>">
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm" type="submit" name="submit">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </td>
                    </tr>
                </form>

            <?php endwhile; ?>

        </tbody>
    </table>

    <a href="laporan.php"><button class="btn btn-danger">Order Report</button></a>
</div>

<?php require_once 'footer.php'; ?>