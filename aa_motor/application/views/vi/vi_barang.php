<div class="col-lg-10 col-lg-offset-1">
    <h1>Daftar Barang</h1><br><br>
    <center>
        <table class="table">
            <thead class="thead-dark">
                <th scope="col">id</th>
                <th scope="col">barang</th>
                <th scope="col">harga/satuan</th>
                <th scope="col">stok</th>

            </thead>
            <tbody>
                <?php
                foreach ($barang as $rows) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $rows->id ?></td>
                        <td scope="row"><?php echo $rows->barang ?></td>
                        <td scope="row"><?php echo $rows->harga ?></td>
                        <td scope="row"><?php echo $rows->stok ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>
</div>