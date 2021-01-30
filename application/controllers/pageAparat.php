<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load library phpspreadsheet
// require('../../uploads/file_excel/vendor/autoload.php');
require('./application/third_party/vendor/autoload.php');

// require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet


class pageAparat extends CI_Controller
{
    public function __construct()
    {
        // $this->load->model('model_auth', '', TRUE);
        parent::__construct();
        $this->load->model('M_surat_aparat');
        $this->load->helper('download');
    }
    public function index()
    {
        $data['surat'] = $this->M_surat_aparat->tampil_data()->result();
        $this->load->view('templatesAparat/header');
        $this->load->view('templatesAparat/sidebar');
        $this->load->view('aparat/surat_permohonan', $data);
        $this->load->view('templatesAparat/footer');
    }

    public function printPdf($id)
    {
        $data['surat'] = $this->M_surat_rt->detail_surat($id);
        // $data['warga'] = $this->M_warga->detail_warga($id);
        //$data['surat'] = $this->M_surat_rt->tampil_data()->result();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "surat-keterangan.pdf";
        $this->pdf->load_view('rt/laporan_pdf', $data);
    }


    public function edit_surat($id)
    {
        $data['warga'] = $this->M_surat_aparat->tampil_warga()->result();
        $where = array('id_surat_masuk' => $id);
        $data['surat'] = $this->M_surat_aparat->edit_surat($where, 'tb_surat_masuk_rt')->result();
        $this->load->view('templatesAparat/header');
        $this->load->view('templatesAparat/sidebar');
        $this->load->view('aparat/edit_surat', $data);
        $this->load->view('templatesAparat/footer');
    }

    public function update()
    {
        $nik              = $this->input->post('nik');
        $tgl_pengajuan               = $this->input->post('tgl_pengajuan');
        $jenis_surat                 = $this->input->post('jenis_surat');
        $perihal                     = $this->input->post('perihal');
        $status_izin_rt              = $this->input->post('status_izin_rt');
        $tgl_persetujuan             = $this->input->post('tgl_persetujuan');
        $keterangan                  = $this->input->post('keterangan');


        $data = array(
            'nik'        => $nik,
            'tgl_pengajuan'         => $tgl_pengajuan,
            'jenis_surat'           => $jenis_surat,
            'perihal'               => $perihal,
            'status_izin_rt'        => $status_izin_rt,
            'tgl_persetujuan'       => $tgl_persetujuan,
            'keterangan'            => $keterangan
        );

        $where = array(
            'nik' => $nik
        );

        if ($this->M_surat_aparat->update_surat($where, $data, 'tb_surat_masuk_rt')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Update Surat Permohonan Success!!</div>');
            redirect('pageAparat/index');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Update surat permohonan Gagal!!</div>');
            redirect('pageAparat/index');
        }
    }


    public function detail_surat($id)
    {
        $where = array('id_surat_masuk' => $id);
        $data['surat'] = $this->M_surat_aparat->detail_surat($id);
        $this->load->view('templatesAparat/header');
        $this->load->view('templatesAparat/sidebar');
        $this->load->view('aparat/Detail_surat', $data);
        $this->load->view('templatesAparat/footer');
    }

    public function hapus_surat($id)
    {
        $where = array('id_surat_masuk' => $id);
        $this->M_surat_aparat->hapus_surat($where, 'tb_surat_masuk_rt');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Delete surat permohonan Success!!</div>');
        redirect('pageAparat/index');
    }

    public function rekapData()
    {
        $data['rekapData'] = $this->M_surat_aparat->getRekapData()->result();
        $this->load->view('templatesAparat/header');
        $this->load->view('templatesAparat/sidebar');
        $this->load->view('aparat/rekapData', $data);
        $this->load->view('templatesAparat/footer');
    }

    public function downloadExcel($id)
    {
        $this->load->helper('download');

        //get file info from database
        $fileInfo = $this->M_surat_aparat->getFileExcel($id)->row_array();
        ob_clean();

        //file path
        $file = file_get_contents(base_url() . "uploads/file_excel/" . $fileInfo['file_excel']);

        $file_name = $fileInfo['file_excel'];
        force_download($file_name, $file);
    }

    public function detail_rekap($id)
    {
        $data['rekapData'] = $this->M_surat_aparat->detail_rekap($id)->result();
        // var_dump($id, $data['rekapData']);
        // die();
        $this->load->view('templatesRW/header');
        $this->load->view('templatesRW/sidebar');
        $this->load->view('aparat/Detail_rekap', $data);
        $this->load->view('templatesRW/footer');
    }
}
