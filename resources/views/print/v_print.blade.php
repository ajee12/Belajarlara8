<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Print Laravel 8</title>
    <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!-- Theme style -->

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }



        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 6px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>

                        <tr>
                            <td class="title">
                                <p style="width:100%; max-width:300px; margin-top:-10px">Print Laravel</p>
                            </td>

                            <td>
                                Invoice <?= $print->nobukti; ?><br>
                                Pekanbaru,<?= date('d M Y'); ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="box box-danger">
                        <div class="box-body ">
                            <table class="table table-striped table-bordered">
                                <tr class="details">
                                    <th>
                                        Pemasok : <?= $print->name; ?>
                                    </th>

                                </tr>

                        </div>
                    </div>
                </div>
            </div>


        </table>

        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                        <th class="nomor" width="">No</th>
                        <th>Nama Stok</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>

                    </tr>
                <tbody>
                    <?php $n = 1;

                    $jml = 0;
                    ?>
                    @foreach($detail_barang as $db)
                    <?php

                    if ($pengguna->nobukti === $db->nobukti) {
                        // $db->subtotal = null;
                        // $db->subtotal = $db->qty * $db->hrgbeli;
                        $jml =  $jml + ($db->qty * $db->hrgbeli);
                        $hasil_rupiah = "Rp " . number_format($db->hrgbeli, 0);
                        $hasil_semua = "Rp " . number_format($db->subtotal, 0);
                        $hasil_jml = "Rp " . number_format($jml, 0);

                    ?>

                        <tr>
                            <td class="text-center"><?= $n++; ?></td>
                            <td class="text-center"><?= $db->name_satuan ?></td>
                            <td class="text-center"><?= $db->qty; ?></td>
                            <td class="text-center"><?= $hasil_rupiah; ?></td>
                            <td class="text-center">
                                <?= $hasil_semua; ?>
                            </td>
                        </tr>
                    <?php } else { ?>
                    <?php } ?>

                    @endforeach()
                    </thead>
                <tfoot class="text-center">
                    <tr>
                        <th colspan="4">Total :</th>
                        <th colspan="2">
                            <?php if (empty($hasil_jml)) {
                                echo '0';
                            } else {
                                echo $hasil_jml;
                            }
                            ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div> <!-- /.card-body -->
        <script type="text/javascript">
            window.addEventListener("load", window.print());
        </script>
</body>

</html>
