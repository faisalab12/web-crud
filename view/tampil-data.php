<div class="text-center mt-5">
    <h2>Data Barang</h2>
</div>
<br>


<?php
if (empty($_GET['alert'])) {
    echo "";
} else if ($_GET['alert'] == 1) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Gagal!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
} else if ($_GET['alert'] == 2) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil disimpan!</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
} else if ($_GET['alert'] == 3) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil diedit!</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
} else if ($_GET['alert'] == 4) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Berhasil dihapus!</strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}




?>

<div class="row">
    <div class="col-md-2"><a href="?page=tambah" class="btnadd">Add Items</a></div>
    <div class="col-md-2"><a href="#" class="btnadd">Cetak Excel</a></div>
    <div class="col-md-4">
        <form class="d-flex" role="search" action="./dashboard.php" method="GET">
            <input class="form-control me-2" type="search" name="keywordCol" placeholder="Cari..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</div>


<table class="table table-hover table-striped-columns mt-4">
    <thead>
        <th scope="col">No.</th>
        <th scope="col">ID Barang</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col">Tanggal Produksi</th>
        <th scope="col">Tanggal Expired</th>
        <th scope="col">Action</th>

    </thead>

    <tbody>
        <?php 
        
        require_once "../controller/Barang-Controller.php";
        
        $data = new showData;

        $items = $data->readData();

        // echo "<pre>";
        // echo print_r($items);
        // echo "</pre>";
        $nomor = $items['nomor'];

        ?>

        <?php if (count($items["hasil"]) > 0) { ?>
            <?php foreach ($items['hasil'] as $item) { ?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td><?= $item->id_barang; ?></td>
                    <td><?= $item->nm_barang; ?></td>
                    <td><?= $item->hrg_barang; ?></td>
                    <td><?= $item->stok_barang; ?></td>
                    <td><?= $item->tgl_prod; ?></td>
                    <td><?= $item->tgl_expired; ?></td>
                    <td>
                        <a href="?page=edit&id=<?= $item->id_barang ?>" class="btn btn-warning">Edit</a>
                        <a href="../process/hapus-data.php?id=<?= $item->id_barang ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin data ini akan dihapus?') ">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>

    </tbody>

</table>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
        require_once "../database/database.php";

        $db = new dbApps();

        $mysqli = $db->connect();

        $pages = $items['pages'];

        $keywordCol = $items['keywordCol'];

        $limit = $items['limit'];

        if ($pages == 1) {

        ?>
            <li class="page-item disabled">
                <a class="page-link" href="#">Previous</a>
            </li>

            <?php } else {

            $linkPrev = ($pages > 1) ? $pages - 1 : 1;

            if ($keywordCol == "") {

            ?>

                <li class="page-item">
                    <a class="page-link" href="dashboard.php?pages=<?= $linkPrev; ?>">Previous</a>
                </li>

            <?php
            } else {
            ?>
                <li class="page-item">
                    <a class="page-link" href="dashboard.php?keywordCol=<?= $keywordCol; ?>&pages=<? $linkPrev; ?>">Previous</a>
                </li>
        <?php
            }
        }
        ?>
        <?php
        if ($keywordCol == "") {
            $sql = "SELECT * FROM master_barang";
        } else {
            $sql = "SELECT * FROM master_barang WHERE nm_barang LIKE '%$keywordCol%'";
        }

        $result = $mysqli->query($sql);

        $jumlahData = mysqli_num_rows($result);

        $jumlahHal  = ceil($jumlahData / $limit);

        $jumlahNomor = 2;

        $awalNomor = ($pages > $jumlahNomor) ? $pages - $jumlahNomor : 1;

        $akhirNomor = ($pages < ($jumlahHal - $jumlahNomor)) ? $pages + $jumlahNomor : $jumlahHal;

        for ($i = $awalNomor; $i <= $akhirNomor; $i++) {
            $linkActive = ($pages == $i) ? 'class="page-item active"' : 'class="page-item"';

            if ($keywordCol == "") { ?>
                <li <?= $linkActive; ?>><a class="page-link" href="dashboard.php?pages=<?= $i; ?>"><?= $i; ?></a></li>
            <?php } else { ?>
                <li <?= $linkActive; ?>><a class="page-link" href="dashboard.php?keywordCol=<?= $keywordCol; ?>&pages=<? $i; ?>"><?= $i; ?></a></li>
        <?php }
        }
        ?>

        <?php
        if ($pages == $jumlahHal) {
        ?>
            <li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
            </li>
            <?php } else {
            $linkNext = ($pages < $jumlahHal) ? $pages + 1  : $jumlahHal;

            if ($keywordCol == "") {
            ?>
                <li class="page-item">
                    <a class="page-link" href="dashboard.php?pages=<?= $linkNext; ?>">Next</a>
                </li>
            <?php } else { ?>
                <li class="page-item">
                    <a class="page-link" href="dashboard.php?keywordCol=<?= $keywordCol; ?>&pages=<?= $linkNext; ?>">Next</a>
                </li>
        <?php }
        }
        ?>
    </ul>
</nav>

<?php
if (empty($_GET['keywordCol']) && empty($_GET['keywordCol'])) {
?>
    <script>
        function refreshPage() {
            window.location = "http://localhost/webcrud/view/dashboard.php";
        }

        if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            refreshPage();

        }
    </script>
<?php }
?>