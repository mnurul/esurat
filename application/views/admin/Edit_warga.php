<div class="content-wrapper">


    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Warga</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h3><i class="fas fa-edit"></i>EDIT DATA WARGA</h3>

        <?php foreach ($warga as $wg) : ?>
            <form method="post" action="<?php echo base_url() . 'Warga/update' ?>" enctype="multipart/form-data">

                <div class="for-group">
                    <label>NIK</label>
                    <input type="hidden" name="id_warga" class="form-control" value="<?php echo $wg->id_warga ?>">
                    <input type="text" name="nik" class="form-control" value="<?php echo $wg->nik ?>">
                </div>

                <div class="for-group">
                    <label>NAMA</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $wg->nama ?>">
                </div>

                <div class="for-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $wg->tempat_lahir ?>">
                </div>

                <div class="for-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $wg->tanggal_lahir ?>">
                </div>


                <div class="for-group">
                    <label>alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $wg->alamat ?>">
                </div>

                <div class="for-group">
                    <label for="agama">Agama</label>
                    <select class="form-control" name="agama" value="<?php echo $wg->agama ?>">
                        <option value="Pilih">Pilih</option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                    </select>
                </div>

                <div class="for-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" value="<?php echo $wg->jenis_kelamin ?>">
                        <option value="Pilih">Pilih</option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                </div>

                <div class="for-group">
                    <label>Pendidikan</label>
                    <input type="text" name="pendidikan" class="form-control" value="<?php echo $wg->pendidikan ?>">
                </div>

                <div class="for-group">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" value="<?php echo $wg->pekerjaan ?>">
                </div>

                <div class="for-group">
                    <label>RT</label>
                    <input type="text" name="rt" class="form-control" value="<?php echo $wg->rt ?>">
                </div>

                <div class="for-group">
                    <label>RW</label>
                    <input type="text" name="rw" class="form-control" value="<?php echo $wg->rw ?>">
                </div>

                <div class="for-group">
                    <label>Kelurahan</label>
                    <input type="text" name="kelurahan" class="form-control" value="<?php echo $wg->kelurahan ?>">
                </div>


                <button type="submit" class="btn btn-primary btn-sm mt-3">SIMPAN</button>

            </form>
        <?php endforeach; ?>
    </div>
</div>