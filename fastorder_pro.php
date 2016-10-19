<?php
$allowed = array(
    'localhost', // Free license for fastororder.ocmod
    'tauweb.ru'
  );

// 744febb6b4788596b757892de3f3210c
$allowed_ip = array('127.0.0.1', '91.143.44.68');



if ( $_POST['host'] == in_array($_POST['host'], $allowed) 
    and $_POST['key'] === md5($_POST['host'].$_POST['extension_name']) ){
  // Do code
  if ($_SERVER['REMOTE_ADDR'] != in_array($_SERVER['REMOTE_ADDR'], $allowed_ip) and $_POST['key'] == '744febb6b4788596b757892de3f3210c' ) {
    
    ?> echo "Неверное испольование лицензии";<?php
    return;
  }
}else{
  if ($_GET['gen'] and $_GET['ext']) {
    echo md5($_GET['gen'].$_GET['ext'] );
    die();
  }
  if ( !$_POST ) {
    die('access denied');
  }

  return false;
}

?>

// Load language
$this->load->language('product/fastorder');

// Language data
$data['text_fastorder_order'] = $this->language->get('text_fastorder_order');
$data['text_fastorder_order_totals_0_title'] = $this->language->get('text_fastorder_order_totals_0_title');
$data['text_fastorder_order_totals_4_title'] = $this->language->get('text_fastorder_order_totals_4_title');
$data['text_fastorder_order_totals_0_title'] = $this->language->get('text_fastorder_order_totals_0_title');
$data['text_fastorder_order_totals_0_title'] = $this->language->get('text_fastorder_order_totals_0_title');
$data['text_fastorder_order_totals_0_title'] = $this->language->get('text_fastorder_order_totals_0_title');
$data['text_fastorder_order_totals_0_title'] = $this->language->get('text_fastorder_order_totals_0_title');

// Add order to OpenCart ===========================================================================

// Get Customer info
$this->load->model('account/customer');
$customer_info = $this->model_account_customer->getCustomer($this->customer->getId());

if($customer_info){
    $data['customer_id'] = $this->customer->getId();
    $data['customer_group_id'] = $customer_info['customer_group_id'];
    $data['firstname'] = $customer_info['firstname'];
    $data['lastname'] = $customer_info['lastname'] . ' (' .$data['text_fastorder_order'] . ')';
    $data['email'] = $customer_info['email'];
    $data['telephone'] = $customer_info['telephone'];
    $data['fax'] = $customer_info['fax'];
    $data['custom_field'] = json_decode($customer_info['custom_field'], true);
}else{
    $data['customer_id'] = '0';
    $data['customer_group_id'] = '0';

    $data['firstname'] = $this->request->post['name'];
    $data['lastname'] = '('.$data['text_fastorder_order'] . ')';
}

$order_data = array (
  'totals' =>
  array (
    0 =>
    array (
      'code' => 'sub_total',
      'title' => $data['text_fastorder_order_totals_0_title'],
      'value' => $json['total'],
      'sort_order' => '1',
    ),
  //   1 =>
  //   array (
  //     'code' => 'shipping',
  //     'title' => 'Доставка с фиксированной стоимостью доставки',
  //     'value' => '5.00',
  //     'sort_order' => '3',
  //   ),
  //   2 =>
  //   array (
  //     'code' => 'tax',
  //     'title' => 'Eco Tax (-2.00)',
  //     'value' => 4.0,
  //     'sort_order' => '5',
  //   ),
  //   3 =>
  //   array (
  //     'code' => 'tax',
  //     'title' => 'VAT (20%)',
  //     'value' => 21.199999999999999,
  //     'sort_order' => '5',
  //   ),
    4 =>
    array (
      'code' => 'total',
      'title' => $data['text_fastorder_order_totals_0_title'] = 'Сумма',
      'value' => $json['total'],
      'sort_order' => '9',
    ),
  ),

//             'customer_group_id' => '1',
//             'firstname' => $this->request->post['name'],
//             'lastname' => 'FastOrder',

  'invoice_prefix' => 'FastOrder',
  'store_id' => $this->config->get('config_store_id'),
  'store_name' => $this->config->get('config_name'),
  'store_url' => $this->config->get('config_url'),
  'customer_id' => $data['customer_id'],
  'customer_group_id' => $data['customer_group_id'],
  'firstname' => $data['firstname'],
  'lastname' =>  $data['lastname'],
  'email' => $json['mail'],
  'telephone' => $this->request->post['phone'],
  'fax' => '',
  'custom_field' => NULL,
  'payment_firstname' => $this->request->post['name'],
  'payment_lastname' => '',
  'payment_company' => '',
  'payment_address_1' => '',
  'payment_address_2' => '',
  'payment_city' => '',
  'payment_postcode' => '',
  'payment_zone' => '',
  'payment_zone_id' => '0',
  'payment_country' => '',
  'payment_country_id' => '0',
  'payment_address_format' => '',
  'payment_custom_field' =>
  array (
  ),
  'payment_method' => $data['text_fastorder_order'],
  'payment_code' => 'cod',
  'shipping_firstname' => '',
  'shipping_lastname' => '',
  'shipping_company' => '',
  'shipping_address_1' => '',
  'shipping_address_2' => '',
  'shipping_city' => '',
  'shipping_postcode' => '',
  'shipping_zone' => '',
  'shipping_zone_id' => '',
  'shipping_country' => '',
  'shipping_country_id' => '',
  'shipping_address_format' => '',
  'shipping_custom_field' =>
  array (
  ),
  'shipping_method' => $data['text_fastorder_order'],
  'shipping_code' => 'flat.flat',
  'products' =>
  array (
    0 =>
    array (
      'product_id' => $json['product_id'],
      'name' => $json['product_name'],
      'model' => '',
      'option' =>
      array (
      ),
      'download' =>
      array (
      ),
      'quantity' => $json['count'],
      'subtract' => '1',
      'price' => $json['price'],
      'total' => $json['total'],
      'tax' => '',
      'reward' => 0,
    ),
  ),
  'vouchers' =>
  array (
  ),
  'comment' => $json['comment'],
  'total' => $json['total'],
  'affiliate_id' => 0,
  'commission' => 0,
  'marketing_id' => 0,
  'tracking' => '',
  'language_id' => '2',
  'currency_id' => '2',
  'currency_code' => $this->session->data['currency'],
  'currency_value' => '1.00000000',
  'ip' => '',
  'forwarded_ip' => '',
  'user_agent' => '',
  'accept_language' => '',
);


$this->load->model('checkout/order');
$orderId= $this->session->data['order_id'] = $this->model_checkout_order->addOrder($order_data);
$this->model_checkout_order->addOrderHistory($orderId, '1');

// End Order