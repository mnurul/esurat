<div class="content-wrapper">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Surat Permohonan Penduduk</h1>
                <?php echo $this->session->flashdata('pesan') ?>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="container-fluid">

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr class="text-center">
                    <th>NO</th>
                    <th>No Surat</th>
                    <th>Nik Pemohon</th>
                    <th>Tanggal Permohonan Surat</th>
                    <th>Jenis Surat</th>
                    <th>Perihal</th>
                    <th>Status Izin RT</th>
                    <th>Tanggal Persetujuan</th>
                    <th>Keterangan</th>
                    <th colspan="4">Aksi</th>
                </tr>
                <?php
                $no = 1;
                foreach ($surat as $s) :
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $s->no_surat_masuk ?></td>
                        <td><?php echo $s->nik ?></td>
                        <td><?php echo $s->tgl_pengajuan ?></td>
                        <td><?php echo $s->jenis_surat ?></td>
                        <td><?php echo $s->perihal ?></td>
                        <td><?php echo $s->status_izin_rt ?></td>
                        <td><?php echo $s->tgl_persetujuan ?></td>
                        <td><?php echo $s->keterangan ?></td>

                        <td> <?php echo anchor('pageRT/detail_surat/' . $s->id_surat_masuk, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>') ?> </td>
                        <td> <?php echo anchor('pageRT/edit_surat/' . $s->id_surat_masuk, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?> </td>
                        <td> <?php echo anchor('pageRT/hapus_surat/' . $s->id_surat_masuk, '<div class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></div>') ?> </td>
                        <td> <?php echo anchor('pageRT/printPdf/' . $s->id_surat_masuk, '<div class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i></div>') ?> </td>
                    </tr>

                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <!-- link button tambah -->
    <!-- Modal -->

    <!-- Modal -->
</div>