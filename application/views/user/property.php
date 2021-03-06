<div class="col-md-9 col-xs-12">
    <!-- DataTales Example -->
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Rumah</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rumah</h6>
        </div>
        <div class="card-body">
            <a href="<?= base_url() ?>Act/AddRumah" class="badge badge-primary p-3 text-md mb-4"><i class="fa fa-plus"></i> Tambah data</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Rumah</th>
                            <!-- <th>Penjual</th> -->
                            <th>Model</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th>Pic</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>ID Rumah</th>
                            <!-- <th>Penjual</th> -->
                            <th>Model</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th>Pic</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no =  1;
                        foreach ($db_property as $t) :
                        ?>
                            <tr id="target">
                                <td><?= $no++; ?></td>
                                <td><?= $t->id_perum; ?></td>
                                <!-- <td><? //= $t->id_user; 
                                            ?></td> -->
                                <td><?= $t->type; ?></td>
                                <td><?= $t->uk_rumah; ?></td>
                                <td><?= $t->harga; ?></td>
                                <td><img src="<?= base_url() ?>assets/img/<?= $t->pic; ?>" width="60" alt=""></td>
                                <td>
                                    <?php if ($t->status) : ?>
                                        <span class="badge badge-success">
                                            Sudah diboking
                                        </span>
                                    <?php else : ?>
                                        <span class="badge badge-danger">
                                            Belum diboking
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?= base_url() ?>Act/UpdateRumah/<?= $t->id_perum; ?>" type="button" class="btn btn-secondary">edit</a>
                                        <a href="" type="button" class="btn btn-secondary">info</a>
                                        <a href="#" type="button" id="delete" onclick="hapus('<?= $t->id_perum; ?>')" class="btn btn-secondary">delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script>
    function hapus(x) {
        var id = x;
        $.ajax({
            type: 'get',
            url: '<?= base_url() ?>Act/DeleteRumah',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(hasil) {
                $('#target').load('<?= base_url() ?>Home/showrumah')
            }
        });
    }
</script>