<?php
class ControllerProductFastorder extends Controller {

  public function index($data) {
    // If Display stock is enable and out of stock is disbale - do not show fastorder button
    if ( $this->config->get('config_stock_display') 
            and !$this->config->get('config_stock_checkout') 
            and $this->model_catalog_product->getProduct($data['product_id'])['quantity'] < 1
        ) {
        return false;
    }

    // Load language
    $this->load->language('product/fastorder');

    // Language data
    $data['text_fastorder_button']                      = $this->language->get('text_fastorder_button');
    $data['text_fastorder_form_header']                 = $this->language->get('text_fastorder_form_header');
    $data['text_fastorder_form_info']                   = $this->language->get('text_fastorder_form_info');
    $data['text_fastorder_name']                        = $this->language->get('text_fastorder_name');
    $data['text_fastorder_phone']                       = $this->language->get('text_fastorder_phone');
    $data['text_fastorder_mail']                        = $this->language->get('text_fastorder_mail');
    $data['text_fastorder_comment']                     = $this->language->get('text_fastorder_comment');
    $data['text_fastorder_button_submit']               = $this->language->get('text_fastorder_button_submit');
    $data['text_fastorder_button_close']                = $this->language->get('text_fastorder_button_close');
    $data['text_fastorder_success_message']             = $this->language->get('text_fastorder_success_message');
    $data['text_fastorder_button_cancel']               = $this->language->get('text_fastorder_button_cancel');
    $data['text_fastorder_input_name_placeholder']      = $this->language->get('text_fastorder_input_name_placeholder');
    $data['text_fastorder_input_phone_placeholder']     = $this->language->get('text_fastorder_input_phone_placeholder');
    $data['text_fastorder_input_mail_placeholder']      = $this->language->get('text_fastorder_input_mail_placeholder');
    $data['text_fastorder_input_comment_placeholder']   = $this->language->get('text_fastorder_input_comment_placeholder');
    $data['text_fastorder_success_title']               = $this->language->get('text_fastorder_success_title');
    $data['text_fastorder_mail_msg_order']              = $this->language->get('text_fastorder_mail_msg_order');
    $data['text_fastorder_mail_msg_price']              = $this->language->get('text_fastorder_mail_msg_price');
    $data['txt_text_fastorder_form_info_message']       = $this->language->get('txt_text_fastorder_form_info_message');
    $data['txt_none_price']                             = $this->language->get('txt_none_price');

    if(!isset($data['price'])){
      $data['price'] = $data['txt_none_price'];
    }

    if($this->config->get('config_template')) {
        $template = $this->config->get('config_template');
    }else{
        $template = 'default';
    }

    $this->document->addStyle('catalog/view/theme/'. $template.'/stylesheet/fastorder.css');

    if(VERSION >= '2.2.0.0') {
      return $this->load->view('product/fastorder', $data);
    }else{
      return $this->load->view($this->config->get('config_template') . '/template/product/fastorder.tpl', $data);
    }
  }

  public function getForm(){

    $this->load->language('product/fastorder');

    // Language data
    $data['text_fastorder_button']                      = $this->language->get('text_fastorder_button');
    $data['text_fastorder_form_header']                 = $this->language->get('text_fastorder_form_header');
    $data['text_fastorder_form_info']                   = $this->language->get('text_fastorder_form_info');
    $data['text_fastorder_name']                        = $this->language->get('text_fastorder_name');
    $data['text_fastorder_phone']                       = $this->language->get('text_fastorder_phone');
    $data['text_fastorder_comment']                     = $this->language->get('text_fastorder_comment');
    $data['text_fastorder_button_submit']               = $this->language->get('text_fastorder_button_submit');
    $data['text_fastorder_button_close']                = $this->language->get('text_fastorder_button_close');
    $data['text_fastorder_success_message']             = $this->language->get('text_fastorder_success_message');
    $data['text_fastorder_button_cancel']               = $this->language->get('text_fastorder_button_cancel');
    $data['text_fastorder_input_name_placeholder']      = $this->language->get('text_fastorder_input_name_placeholder');
    $data['text_fastorder_input_phone_placeholder']     = $this->language->get('text_fastorder_input_phone_placeholder');
    $data['text_fastorder_input_mail_placeholder']      = $this->language->get('text_fastorder_input_mail_placeholder');
    $data['text_fastorder_input_comment_placeholder']   = $this->language->get('text_fastorder_input_comment_placeholder');
    $data['text_fastorder_success_title']               = $this->language->get('text_fastorder_success_title');
    $data['text_fastorder_mail_msg_order']              = $this->language->get('text_fastorder_mail_msg_order');
    $data['text_fastorder_mail_msg_price']              = $this->language->get('text_fastorder_mail_msg_price');
    $data['txt_text_fastorder_form_info_message']       = $this->language->get('txt_text_fastorder_form_info_message');

    $data['product_name'] = $this->request->post['product_name'];
    $data['price'] = $this->request->post['price'];
    $data['product_id'] = $this->request->post['product_id'];

    if (VERSION >= '2.2.0.0') {
      $tpl =  $this->load->view('product/fastorder_form', $data);
    }else{
      $tpl =  $this->load->view($this->config->get('config_template') . '/template/product/fastorder_form.tpl', $data);
    }

    $this->response->setOutput($tpl);
  }

  public function sender(){
    // Load language
    $this->load->language('product/fastorder');

    $data['text_fastorder_mail_subject']    = $this->language->get('text_fastorder_mail_subject');
    $data['text_fastorder_mail_msg_data']   = $this->language->get('text_fastorder_mail_msg_data');
    $data['text_fastorder_name']            = $this->language->get('text_fastorder_name');
    $data['text_fastorder_phone']           = $this->language->get('text_fastorder_phone');
    $data['text_fastorder_mail']            = $this->language->get('text_fastorder_mail');
    $data['text_fastorder_comment']         = $this->language->get('text_fastorder_comment');
    $data['text_fastorder_mail_msg_order']  = $this->language->get('text_fastorder_mail_msg_order');
    $data['text_fastorder_mail_msg_price']  = $this->language->get('text_fastorder_mail_msg_price');

    $json = array();

    if (isset($this->request->post['product_id'])){
      $json['product_id'] = $this->request->post['product_id'];
    }
    if (isset($this->request->post['name'])){
      $json['name'] = $this->request->post['name'];
    }
    if (isset($this->request->post['phone'])){
      $json['phone'] = $this->request->post['phone'];
    }
    if (isset($this->request->post['mail'])){
      $json['mail'] = $this->request->post['mail'];
    }
    if (isset($this->request->post['comment'])){
      $json['comment'] = $this->request->post['comment'];
    }else{
        $json['comment'] = '-';
    }
    if (isset($this->request->post['product_name'])){
      $json['product_name'] = $this->request->post['product_name'];
    }
    if (isset($this->request->post['price'])){
      $json['price'] = $this->request->post['price'];
    }

    // Mail subject
    $subject    = $data['text_fastorder_mail_subject'] .' ('.$_SERVER['HTTP_HOST'] . ')';
    $products   = $json['product_name'];
    
    // Data to mail template
    $mail_tmpl_data = array (
        'subject'                       => $subject,
        'text_fastorder_name'           => $data['text_fastorder_name'],
        'text_fastorder_mail_msg_data'  => $data['text_fastorder_mail_msg_data'],
        'name'                          => $json['name'],
        'text_fastorder_phone'          => $data['text_fastorder_phone'],
        'phone'                         => $json['phone'],
        'text_fastorder_mail'           => $data['text_fastorder_mail'],
        'mail'                          => $json['mail'],
        'text_fastorder_comment'        => $data['text_fastorder_comment'],
        'comment'                       => $json['comment'],
        'text_fastorder_mail_msg_order' => $data['text_fastorder_mail_msg_order'],
        'text_fastorder_mail_msg_price' => $data['text_fastorder_mail_msg_price'],
        'price'                         => $json['price'],
        'config_name'                   => $this->config->get('config_name'),
        'products'                      => $products
        );

    // Get the main message template
    if (VERSION >= '2.2.0.0') {
      $mail_message =  $this->load->view('mail/fastorder_mail_msg', $mail_tmpl_data);
    }else{
      $mail_message =  $this->load->view($this->config->get('config_template') . '/template/mail/fastorder_mail_msg.tpl', $mail_tmpl_data);
    }

    $email_to = $this->config->get('config_email');

    // Create OpenCart mail object
    $mail = new Mail();

    // Гребанные мудаки, разработчики Opencart, никак не могу определиться с названием параметров конфига. Ебланы хуевы.
    // Пока что тестировано на OC_2.2, и каком-то более низком через mail, без использования SMTP
    // Потребуется доработка под разные версии.
    // Последнее изменение с версии 1.2.1

    if (VERSION >= '2.2.0.0') {
        // Setup the mail parameters
        $mail->protocol = $this->config->get('config_mail_protocol');
        $mail->parameter = $this->config->get('config_mail_parameter');
        // $mail->hostname = $this->config->get('config_smtp_host'); // Older Opencart
        $mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
        // $mail->username = $this->config->get('config_smtp_username'); // Older Opencart
        $mail->smtp_username = $this->config->get('config_mail_smtp_username');
        // $mail->password = $this->config->get('config_smtp_password'); // Older Opencart
        $mail->smtp_password = $this->config->get('config_mail_smtp_password');
        // $mail->port = $this->config->get('config_smtp_port'); // Older Opencart
        $mail->smtp_port = $this->config->get('config_mail_smtp_port');
        // $mail->timeout = $this->config->get('config_smtp_timeout'); // Older Opencart
        $mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');
        $mail->setTo($email_to);
        $mail->setFrom(explode(',', $this->config->get('config_email'))[0]);
        $mail->setSender($this->config->get('config_name'));
        $mail->setSubject(html_entity_decode($data['text_fastorder_mail_subject'] .' ('.$_SERVER['HTTP_HOST'] . ')'), ENT_QUOTES, 'UTF-8');
        $mail->setHtml($mail_message);
        $mail->setText(html_entity_decode($mail_message, ENT_QUOTES, 'UTF-8'));
    }else{
        // Setup the mail parameters
        $mail->protocol = $this->config->get('config_mail_protocol');
        $mail->parameter = $this->config->get('config_mail_parameter');
        $mail->hostname = $this->config->get('config_smtp_host');
        $mail->username = $this->config->get('config_smtp_username');
        $mail->password = $this->config->get('config_smtp_password');
        $mail->port = $this->config->get('config_smtp_port');
        $mail->timeout = $this->config->get('config_smtp_timeout');
        $mail->setTo($email_to);
        $mail->setFrom(explode(',', $this->config->get('config_email'))[0]);
        $mail->setSender($this->config->get('config_name'));
        $mail->setSubject(html_entity_decode($data['text_fastorder_mail_subject'] .' ('.$_SERVER['HTTP_HOST'] . ')'), ENT_QUOTES, 'UTF-8');
        $mail->setHtml($mail_message);
        $mail->setText(html_entity_decode($mail_message, ENT_QUOTES, 'UTF-8'));
    }

    // Send mail to the shop owner
    $mail->send();

    // Send mail to the customer
    $mail->setTo($json['mail']);
    $mail->send();

    $this->response->addHeader('Content-Type: application/json');
    $this->response->setOutput(json_encode($json));
  }
}

// Old mail sender (will be deleted after testing new send mail method) ============================

/*
 // Mail adress
    $mail_to    = $this->config->get('config_email');
    // Mail adress from mail were send (get from Opencart settings)
    // If multiple mail set in store admin settings - explode adresses and use the 1th e-mail adress
    $mail_from  = explode(',', $this->config->get('config_email'))[0];
    // Mail subject
    $subject    = $data['text_fastorder_mail_subject'] .' ('.$_SERVER['HTTP_HOST'] . ')';
    $products   = $json['product_name'];
    $mail_message =
        '<h1>' . $subject . '</h1>'.
        '<p><strog>'.$data['text_fastorder_mail_msg_data'].'</strog></p>'.
        '<table style="list-style: none;">'.
        '<tr><td>' . $data['text_fastorder_name'] . ': </td><td><strong>' .$json['name'].'</strong></td></tr>'.
        '<tr><td>' . $data['text_fastorder_phone'] . ': </td><td><strong>'.$json['phone'].'</strong></td></tr>'.
        '<tr><td>' . $data['text_fastorder_mail'] . ': </td><td><strong>'.$json['mail'].'</strong></td></tr>'.
        '<tr><td>' . $data['text_fastorder_comment'] . ': </td><td><i>'.$json['comment'].'</i></td></tr>'.
        '</table>'.
        $data['text_fastorder_mail_msg_order'] .': <strong>' . $products . '</strong><br />'.
        $data['text_fastorder_mail_msg_price'] . ': <strong>' . $json['price'] . '</strong><br />';
    // Set the mail headers
    $headers = "From: $mail_from" . "\r\n" .
        "Reply-To: $mail_from" . "\r\n" .
        'Content-Type: text/html; charset="utf8"'."\n".
        'X-Mailer: PHP/' . phpversion();
    // Send mail to the shop owner
    $result = mail($mail_to, $subject, $mail_message, $headers);
    // To customer =================================================================================
    // Send mail to the customer
    $result = mail($json['mail'], $subject, $mail_message, $headers);
*/
