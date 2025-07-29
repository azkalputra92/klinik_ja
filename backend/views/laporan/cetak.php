<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception*/

use yii\helpers\Html;

?>
<div
    class="table-responsive"
>
  <h3 style="text-align: center;"> Laporan Pasien JA Medical Skincare </h3> 
  Tanggal : <?= $model->tanggal_dari .' sd '. $model->tanggal_sampai  ?>
  <br>
  <br>
    <table
        class="table "
    >
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Treatment</th>
                <th scope="col">Produk</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $no = 0;
            foreach ($data as $key => $value) { 
            $no += 1;
        ?>
            <tr class="">
                <td><?= $no ?></td>
                <td><?= $value->getPasien()->nama ?></td>
                <td>
                    <ul>
                    <?php
                        foreach ($value->penangananTreatment as $key => $treatment) { 
                            echo '<li>'.$treatment->getTreatment()->nama.'</li>';
                        }
                    ?>
                    </ul>
                </td>
                <td>
                    <ul>
                    <?php
                        foreach ($value->penangananProduk as $key => $Produk) { 
                            echo '<li>'.$Produk->getProduk()->nama.'</li>';
                        }
                    ?>
                    </ul>
                </td>
                <td>Rp. <?= number_format($value->harga_total ?? 0); ?></td>
                
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
