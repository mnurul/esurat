<div class="content-wrapper">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Profile</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="container-fluid">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr class="text-center">
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>ALAMAT</th>
                    <th>Jabatan</th>
                    <th>Role ID</th>
                    <th>Foto</th>
                    <th colspan="2">AKSI</th>
                </tr>

                <?php
                $no = 1;
                foreach ($Mg_profile as $mgp) :
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $mgp->nama ?></td>
                        <td><?php echo $mgp->alamat ?></td>
                        <td><?php echo $mgp->username ?></td>
                        <td><?php echo $mgp->role_id ?></td>
                        <td><?php echo $mgp->foto ?></td>

                        <td> <?php echo anchor('Manage_profile/Detail_user/' . $mgp->id_user, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?> </td>
                        <td> <?php echo anchor('Manage_profile/edit_user/' . $mgp->id_user, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?> </td>
                    </tr>

                <?php endforeach; ?>

            </table><br><br><br><br><br><br>
        </div>
    </div>