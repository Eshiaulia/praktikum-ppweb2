<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja Bulanann</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @media (max-width: 767px) {
            #container {
                display: flex;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5" id="container">
        <div class="col-12 col-md-4" style="float: right;" id="card-container">
            <div class="card">
                <div class="card-header bg-primary text-white">Daftar Harga</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-light">TV : Rp. 4.200.000</li>
                    <li class="list-group-item bg-light">Kulkas : Rp. 3.100.000</li>
                    <li class="list-group-item bg-light">Mesin Cuci : Rp. 3.800.000</li>
                </ul>
            </div>
            <div class="card-footer bg-primary text-white">Harga Dapat Berubah Setiap Saat</div>
        </div>

        <div class="col-8">
            <h3>Belanja Online</h3>
            <hr />
        </div>
        <div class="col-12 col-md-8 align-middle">
            <form method="POST" action="form_TugasBelanja_get.php"> 
                <div class="form-group row text-end mt-3">
                    <label for="nama" class="col-4 col-form-label font-weight-bold text-right">Customer</label>
                    <div class="col-6">
                        <input id="customer" name="customer" type="text" class="form-control" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="produk" class="col-4 text-end font-weight-bold text-right">Pilih Produk</label>
                    <div class="col-8">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="produk" id="produk1" type="radio" class="custom-control-input" value="Televisi" required>
                            <label for="produk1" class="custom-control-label">TV</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="produk" id="produk2" type="radio" class="custom-control-input" value="Kulkas" required>
                            <label for="produk2" class="custom-control-label">Kulkas</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="produk" id="produk3" type="radio" class="custom-control-input" value="Mesin Cuci" required>
                            <label for="produk3" class="custom-control-label">Mesin Cuci</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row text-end mt-3">
                    <label for="jumlah" class="col-4 col-form-label font-weight-bold text-right">Jumlah</label>
                    <div class="col-4">
                        <input id="jumlah" name="jumlah" type="number" class="form-control" required min="1">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="proses" type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <hr />
    </div>

    <?php
    $nama_customer = isset($_POST['customer']) ?$_POST['customer'] : "" ;
    $produk_pilihan = isset($_POST['produk']) ?$_POST['produk'] : "" ;
    $jumlah_beli = isset($_POST['jumlah']) ? (int) $_POST['jumlah'] : 0;

    switch ($produk_pilihan) {
        case 'TV':
            $harga_satuan = 4200000;
            break;
        case 'Kulkas':
            $harga_satuan = 3100000;
            break;
        case 'MESIN CUCI':
            $harga_satuan = 3800000;
            break;
        default:
            $harga_satuan = 0;
            break;
    }

    $total_belanja = $harga_satuan * $jumlah_beli;

    echo "Nama Customer : " . htmlspecialchars($nama_customer) . "<br>";
    echo "Produk Pilihan : " . htmlspecialchars($produk_pilihan) . "<br>";
    echo "Jumlah Beli : " . htmlspecialchars($jumlah_beli) . "<br>";
    echo "Total Belanja : Rp " . number_format($total_belanja, 0, ',', '.');
?>

    </div>
</body>

</html>