<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $params = array('server_key' => 'SB-Mid-server-QGNo8OL0jenOn1HmY99CzAeS', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
        $this->load->model('Paket_model');
        $this->load->model('Siswa_model');
    }

    public function index()
    {
        $data['title'] = 'Kendaraan Almira';
        $data['content'] = $this->load->view('admin/kendaraan/index', '', true);
        $this->load->view('_sharedadmin/layout', $data);
    }

    public function get($idkendaraan = null)
    {
        $result = $this->Kendaraan_model->select($idkendaraan);
        echo json_encode($result);
    }

    public function add()
    {
        $paket = $this->Paket_model->select($_POST['idpaket']);
        $file = $_FILES;
        $data = $_POST;
        $data['order_id']=rand();
        $data['nominal']=$paket['hargapaket'];

        $result = $this->Siswa_model->register($data);
        $result['token'] = $this->token($result);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Siswa_model->updatePembayaran($data);
        echo json_encode($result);
    }

    public function delete($idkendaraan)
    {
        $result = $this->Kendaraan_model->delete($idkendaraan);
        echo json_encode($result);
    }
    public function token($data)
    {
        // Required
        $paket = $this->Paket_model->select($data['idpaket']);
        $transaction_details = array(
            'order_id' => $data['order_id'],
            'gross_amount' => $data['jenisbayar']=='DP'? $data['nominaldp']: $paket['hargapaket'], // no decimal allowed for creditcard
        );

        // Optional
        $item_details = array(
            'id' => "a1",
            'price' => $data['jenisbayar']=='DP'? $data['nominaldp']: $paket['hargapaket'],
            'quantity' => 1,
            'name' => $paket['namapaket'],
        );

        // Optional
        $billing_address = array(
            'first_name' => $data['namasiswa'],
            'last_name' => "",
            'address' => $data['alamatsiswa'],
            'city' => "Jayapura",
            'postal_code' => "99111",
            'phone' => $data['notlpn'],
            'country_code' => 'IDN',
        );

        // Optional
        $shipping_address = array(
            'first_name' => "Almira",
            'last_name' => "",
            'address' => "Kota Jayapura",
            'city' => "Jayapura",
            'postal_code' => "99111",
            'phone' => "08111111111",
            'country_code' => 'IDN',
        );

        // Optional
        $customer_details = array(
            'first_name' => $data['namasiswa'],
            'last_name' => "",
            'email' => $data['email'],
            'phone' => $data['notlpn'],
            'billing_address' => $billing_address,
            'shipping_address' => $shipping_address,
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'minute',
            'duration' => 2,
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details' => $item_details,
            'customer_details' => $customer_details,
            'credit_card' => $credit_card,
            'expiry' => $custom_expiry,
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        return $snapToken;
    }
}

/* End of file Kendaraan.php */
