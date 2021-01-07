<div class="content-wrapper">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="container-fluid">
        <h3><i class="fas fa-edit"></i>EDIT DATA MANAGE PROFILE</h3>

        <?php foreach ($Mg_profile as $mgp) : ?>
            <form method="post" action="<?php echo base_url() . 'Manage_profile/update' ?>" enctype="multipart/form-data">

                <div class="for-group">
                    <label>NAMA</label>
                    <input type="hidden" name="id_user" class="form-control" value="<?php echo $mgp->id_user ?>">
                    <input type="text" name="nama" class="form-control" value="<?php echo $mgp->nama ?>">
                </div>

                <div class="for-group">
                    <label>alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $mgp->alamat ?>">
                </div>

                <div class="for-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $mgp->username ?>">
                </div>

                <div class="for-group">
                    <label>Role ID</label>
                    <input type="text" name="role_id" class="form-control" value="<?php echo $mgp->role_id ?>">
                </div>

                <div class="form-group">
                    <label>Foto </label>
                    <input type="file" name="foto" class="form-control">
                </div>


                <button type="submit" class="btn btn-primary btn-sm mt-3">SIMPAN</button>
            </form>
        <?php endforeach; ?>
    </div>
</div> <br><br>