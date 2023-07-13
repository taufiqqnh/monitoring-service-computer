<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-x41u_uXmrPejYeObFBuogFuo', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('checkout_bayar');
	}

	public function bayar()
	{
		$this->load->view('checkout_bayar');
	}

	public function token()
	{
		$no = $this->input->post('no');
		$tgl = $this->input->post('tgl');
		$total = $this->input->post('total');
		$hp = $this->input->post('hp');
		$alamat = $this->input->post('alamat');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');


		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $total, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $total,
			'quantity' => 1,
			'name' => "DC00 $no"
		);

		// Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );

		// Optional
		$item_details = array($item1_details);

		// Optional
		$billing_address = array(
			'first_name'    => "$nama",
			'address'       => "$alamat",
			'city'          => "",
			'postal_code'   => "",
			'phone'         => "$hp",
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => "$nama",
			'address'       => "$alamat",
			'city'          => "",
			'postal_code'   => "",
			'phone'         => "$hp",
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => "$nama",
			'email'         => "$email",
			'phone'         => "$hp",
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 1440
			// 'duration'  => 1
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);
		$id_pel = $this->input->post('id');
		$no_service = $this->input->post('no_service');

		// MENGHITUNG HARI
		$time_sekarang = date("d-m-Y H:i:s", strtotime($result['transaction_time']));
		$akhir = date("d-m-Y H:i:s", strtotime('+1 days', strtotime($time_sekarang)));

		$data = [
			'id_order' => $result['order_id'],
			'no_service' => $no_service,
			'gross_amount' => $result['gross_amount'],
			'payment_type' => $result['payment_type'],
			'transaction_time' => $result['transaction_time'],
			'bank' => $result['va_numbers'][0]['bank'],
			'va_number' => $result['va_numbers'][0]['va_number'],
			'pdf_url' => $result['pdf_url'],
			'status_code' => $result['status_code'],
			'batas_waktu' => $akhir
		];
		$data2 = [
			'id_order' => $result['order_id']
		];
		$data3 = [
			'id_order' => $result['order_id']
		];
		$simpan = $this->db->insert('transaksi_midtrans', $data);
		$this->db->update('service', $data2, array('no_service' => $no_service));
		if ($simpan) {
			header("location:../../../pelanggan/detail_monitoring.php");
		} else {
			header("location:../../../pelanggan/detail_monitoring.php");
		}
	}
}
