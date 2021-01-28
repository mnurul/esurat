<?php
defined('BASEPATH') or exit('No direct script access allowed');


class pageRW extends CI_Controller
{
    public function __construct()
    {
        // $this->load->model('model_auth', '', TRUE);
        parent::__construct();
        $this->load->model('M_surat_rt');
    }
    public function index()
    {
        $data['surat'] = $this->M_surat_rt->tampil_data()->result();
        $this->load->view('templatesRW/header');
        $this->load->view('templatesRW/sidebar');
        $this->load->view('rw/surat_permohonan', $data);
        $this->load->view('templatesRW/footer');
    }

    public function printPdf($id)
    {
        $data['surat'] = $this->M_surat_rt->detail_surat($id);
        //$data['surat'] = $this->M_surat_rt->tampil_data()->result();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "surat-keterangan-rw.pdf";
        $this->pdf->load_view('rw/laporan_pdf', $data);
    }

    public function edit_surat($id)
    {
        $data['warga'] = $this->M_surat_rt->tampil_warga()->result();
        $where = array('id_surat_masuk' => $id);
        $data['surat'] = $this->M_surat_rt->edit_surat($where, 'tb_surat_masuk_rt')->result();
        $this->load->view('templatesRW/header');
        $this->load->view('templatesRW/sidebar');
        $this->load->view('rw/edit_surat', $data);
        $this->load->view('templatesRW/footer');
    }

    public function update()
    {
        $id_surat_masuk              = $this->input->post('id_surat_masuk');
        $no_surat_masuk              = $this->input->post('no_surat_masuk');
        // $id_warga                    = $this->input->post('id_warga');
        $tgl_pengajuan               = $this->input->post('tgl_pengajuan');
        $jenis_surat                 = $this->input->post('jenis_surat');
        $perihal                     = $this->input->post('perihal');
        // $status_izin_rt              = $this->input->post('status_izin_rt');
        $status_izin_rw              = $this->input->post('status_izin_rw');
        // $tgl_persetujuan             = $this->input->post('tgl_persetujuan');
        // $keterangan                  = $this->input->post('keterangan');
        $tgl_persetujuan_rw          = $this->input->post('tgl_persetujuan_rw');
        $keterangan_rw               = $this->input->post('keterangan_rw');


        $data = array(
            'no_surat_masuk'        => $no_surat_masuk,
            //'id_warga'              => $id_warga,
            'tgl_pengajuan'         => $tgl_pengajuan,
            'jenis_surat'           => $jenis_surat,
            'perihal'               => $perihal,
            'status_izin_rw'        => $status_izin_rw,
            'tgl_persetujuan_rw'    => $tgl_persetujuan_rw,
            'keterangan_rw'         => $keterangan_rw
        );

        $where = array(
            'id_surat_masuk' => $id_surat_masuk
        );

        if ($this->M_surat_rt->update_surat($where, $data, 'tb_surat_masuk_rt')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Update Surat Permohonan Success!!</div>');
            redirect('pageRW/index');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Update surat permohonan Gagal!!</div>');
            redirect('pageRW/index');
        }
    }


    public function detail_surat($id)
    {
        $where = array('id_surat_masuk' => $id);
        $data['surat'] = $this->M_surat_rt->detail_surat($id);
        $this->load->view('templatesRW/header');
        $this->load->view('templatesRW/sidebar');
        $this->load->view('rw/Detail_surat', $data);
        $this->load->view('templatesRW/footer');
    }

    public function hapus_surat($id)
    {
        $where = array('id_surat_masuk' => $id);
        $this->M_surat_rt->hapus_surat($where, 'tb_surat_masuk_rt');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Delete surat permohonan Success!!</div>');
        redirect('pageRW/index');
    }

    public function dataPenduduk()
    {
        $rw = $this->session->userdata('rw');
        $data['rekap'] = $this->M_surat_rt->getRekap($rw);
        $data['rekap'] = $this->M_surat_rt->tampil_rekap()->result();
        // var_dump($rw);
        // die();
        $this->load->view('templatesRT/header');
        $this->load->view('templatesRT/sidebar');
        $this->load->view('rw/dataPenduduk', $data);
        $this->load->view('templatesRW/footer');
    }
}
