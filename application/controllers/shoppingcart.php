<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shoppingcart extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('f_shoppingcartmodel');
        $this->load->helper('text');
//        $config['sess_use_database'] = TRUE;
//        session_start();
    }

    //index
    public function baokim_BPN() {
        $seo = array(
            'title' => 'Thanh Toán Bảo Kim',
            'description' => 'Thanh  Toán Bảo Kim',
            'keyword' => 'Thanh  Toán Bảo Kim',
            'type' => 'products');
        $this->LoadHeader($seo);
        $this->load->view('old/BPN');
        $this->LoadFooter();
    }

    public function baokim_request() {
        if (isset($_SESSION['info_baokim'])) {
            unset($_SESSION['info_baokim']);
        }
        $seo = array(
            'title' => 'Thanh Toán Bảo Kim',
            'description' => 'Thanh  Toán Bảo Kim',
            'keyword' => 'Thanh  Toán Bảo Kim',
            'type' => 'products');
        $this->LoadHeader($seo);
        $this->load->view('baokim_request');
        $this->LoadFooter();
    }

    public function order_baokim() {
        $this->load->helper('model_helper');
        if (isset($_POST['sendcart_bk'])) {
            $arr = array(
                'fullname' => $this->input->post('payer_name'),
                'address' => $this->input->post('address_hidden'),
                'user_id' => $this->input->post('user_id'),
                'total_price' => $this->input->post('total_amount'),
                'code_sale' => $this->input->post('code_sale_all_hidden'),
                'price_ship' => $this->input->post('price_ship_hidden'),
                'province' => $this->input->post('province'),
                'phone' => $this->input->post('payer_phone_no'),
                'email' => $this->input->post('payer_email'),
                'note' => $this->input->post('note_hidden'),
                'time' => time(),
                'user_id' => $this->session->userdata('userid'),
            );

            $id = $this->f_shoppingcartmodel->Add('order', $arr);
            if ($id) {
                $code = 'DH_' . date('d') . $id;
                $this->f_shoppingcartmodel->Update_where('order', array('id' => $id), array('code' => $code));
            }
            $madon_hang = $code;
            @$arr_sesion_bk = array(
                'payer_name' => $this->input->post('payer_name'),
                'payer_phone_no' => $this->input->post('payer_phone_no'),
                'payer_email' => $this->input->post('payer_email'),
                'address' => $this->input->post('address_hidden'),
                'tongtienthanhtoan' => $this->input->post('total_amount'),
                'madon_hang' => $madon_hang,
            );
            for ($i = 0; $i < sizeof($_POST['item_id']); $i++) {
                $temp_item = $this->f_shoppingcartmodel->getFirstRowWhere('product', array('id' => $_POST['item_id'][$i]));
                $buyted = $temp_item->bought + 1;
                $detai_order = array(
                    'order_id' => $id,
                    'item_id' => $_POST['item_id'][$i],
                    'count' => $_POST['count'][$i],
                    'price_sale' => $_POST['price_sale'][$i],
                        /* 'color'=>$_POST['color'][$i],
                          'size'=>$_POST['size'][$i], */
                );
                $this->f_shoppingcartmodel->Update('product', $temp_item->id, array(
                    'bought' => $buyted
                ));
                $id_order_item = $this->f_shoppingcartmodel->Add('order_item', $detai_order);
            }
            if ($id) {
                @$province = $this->f_shoppingcartmodel->getFirstRowWhere('province', array('provinceid' => $this->input->post('province')));
                @$district = $this->f_shoppingcartmodel->getFirstRowWhere('district', array('districtid' => $this->input->post('district')));
                @$ward = $this->f_shoppingcartmodel->getFirstRowWhere('ward', array('wardid	' => $this->input->post('ward')));
                $this->load->library('email', @$config);
                $htm = '<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#caf6ea">
                            <thead>
                            <tr style="background:#92ddc9">
                                <td>Stt</td>
                                <td>Tên sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Đơn giá(vnđ)</td>
                                <td>Thành tiền(vnđ)</td>
                            </tr>
                            </thead>
                            <tbody>';
                $subtotal = 0;
                $totals = 0;
                $tongtien = 0;
                $stt = 0;

                foreach ($_SESSION['cart'] as $key => $tcat) {
                    $stt++;
                    $subtotal = $tcat['price_sale'] * $tcat['qty'];
                    $code_sale = $this->input->post('code_sale_all');
                    $price_ship = $this->input->post('price_ship');
                    $total_sale = $subtotal * $code_sale / 100;
                    $tongtien += $subtotal - $total_sale;
                    $totals += $subtotal - $total_sale;
                    $htm .= '<tr>';
                    $htm .= '<td>' . ($stt) . '</td>';
                    $htm .= '<td>' . $tcat['name'] . '<br>';
                    $htm .= '</td>';
                    $htm .= '<td>' . $tcat['qty'] . '</td>';
                    $htm .= '<td>' . number_format($tcat['price_sale']) . '</td>';
                    $htm .= '<td>' . number_format($tcat['price_sale'] * $tcat['qty']) . '</td>';
                    $htm .= '</tr>';
                }

                $htm .= '<tr><td colspan="5" align="right"><span style="color:red">Mã giảm giá: -' . $this->input->post('code_sale_all') . '%</span></td></tr>';
                $htm .= '<tr><td colspan="5" align="right"><span style="color:red">Tổng tiền đơn hàng:' . number_format($tongtien) . '&nbsp;vnđ</span></td></tr>';
                $htm .= '<tr><td colspan="5" align="right"><span style="color:red">Phí vận chuyển:' . number_format(@$price_ship) . '&nbsp;vnđ</span></td></tr>';
                $htm .= '<tr><td colspan="5" align="right"><span style="color:red">Tổng tiền thanh toán là:' . number_format($totals + $this->input->post('price_ship')) . '&nbsp;vnđ</span></td></tr>';
                $htm .= '</tbody>';
                $htm .= '</table>';
                $subject = $this->site_name . ' - Thông tin đặt hàng';
                $img = '<p><img src="http://myphamgiadinh.vn/assets/css/img/logo_email.PNG" alt=""/></p>';
                $img_footer = '<p style="float: right" class="pull-right"><img src="http://myphamgiadinh.vn/assets/css/img/logo_email_2.PNG" alt=""/></p>';
                $message = '';
                $message .= $img;
                $message .= '<p><h2 style="color: green">EMAIL XÁC NHẬN ĐƠN HÀNG !</h2></p>';
                $message .= '<p>Kính chào &nbsp;' . $this->input->post('fullname') . ',<p>';
                $message .= '<p>Myphamgiadinh.vn đã nhận được đơn đặt hàng của Qúy khách:<p></br>';

                $message .= '<b>Thông tin khách hàng:</b></br>';
                $message .= '<p>Họ tên:' . $this->input->post('fullname') . '<p></br>';
                $message .= '<p>Điện thoại:' . $this->input->post('phone') . '<p></br>';
                $message .= '<p>Địa chỉ nhận hàng:' . $this->input->post('address') . '<p></br>';

                $message .= '<p>Quí khách vui lòng thanh toán <span style="color:red">' . number_format($totals + $this->input->post('price_ship')) . 'vnđ</span>&nbsp;khi nhận hàng.</p>';
                $message .= '<p><b>Mã đơn hàng: </b>' . $code . '</p>';
                $message .= '<p>Tình trạng : Chưa thanh toán.</p>';
                $message .= '<p><b>Chi tiết đơn hàng :</b></p>';
                $message .= $htm;

                $message .= '<br>Địa chỉ :&nbsp;&nbsp;' . $this->input->post('address') . ',&nbsp;' . @$ward->name . ',&nbsp;' . @$district->name . '</p>';
                $message .= '<p style="border: 1px solid #e7d17a;padding: 8px">Ngoài hình thức thanh toán và giao hàng tận nơi, Quí khách có thể đến văn
                    phòng giao dịch của myphamgiadinh.vn tại Hà Nội để thanh toán<br>';
                $message .= $this->address . '</p>';
                $message .= '<p>Nếu quí khách cần hỗ trợ, vui lòng gọi <span style="color:red">04 63297649</span> hoặc gửi đến mail :admin@bnfvietnam.vn</p>';
                $message .= '<p>Cảm ơn quí khách đã mua sắm trên myphamgiadinh.vn</p>';
                $message .= '<p><br><br><br>(<span style="color:red">*</span>)Đây là mail hệ thống tự động gửi, vui lòng không trả lời (Reply) lại mail này.</p>';
                $message .= $img_footer;
                // Get full html:
                $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->email->charset) . '</title>
                            <style type="text/css">
                                body {
                                    font-family: Arial, Verdana, Helvetica, sans-serif;
                                    font-size: 16px;
                                }
                            </style>
                        </head>
                        <body>
                        ' . $message . '
                        </body>
                        </html>';
                //$this->email->send();
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <contact@myphamgiadinh.vn>' . "\r\n";
                mail($this->input->post('email'), "$subject", $body, $headers);
                mail('DungPA@bnfvietnam.vn', "$subject", $body, $headers);
                mail('ductm@bnfvietnam.vn', "$subject", $body, $headers);
                mail('lannguyen@bnfvietnam.vn', "$subject", $body, $headers);
                $_SESSION['message'] = "Bạn đã đặt hàng thành công !";
                if (isset($_SESSION['cart'])) {
                    unset($_SESSION['cart']);
                     $_SESSION['totalProduct'] = 0;
                }
            }
//            redirect(base_url('thanh-toan-dat-hang'));
            if (isset($_SESSION['cart'])) {
                unset($_SESSION['cart']);
                 $_SESSION['totalProduct'] = 0;
            }
        }
        @$madon_hang = @$madon_hang;
        $info_baokim = array(
            $data['madon_hang'] = $madon_hang,
            $payer_name = @$arr_sesion_bk['payer_name'],
            $payer_phone_no = @$arr_sesion_bk['payer_phone_no'],
            $payer_email = @$arr_sesion_bk['payer_email'],
            $address = @$arr_sesion_bk['address'],
            $total_amount = @$arr_sesion_bk['tongtienthanhtoan'],
            $madon_hang = @$arr_sesion_bk['madon_hang']
        );
        if (!array_key_exists($madon_hang, $info_baokim)) {
            $_SESSION['info_baokim'][$madon_hang] = $info_baokim;
        }
        $data['list_info_baokim'] = $_SESSION['info_baokim'];
//        echo'<pre>';
//        print_r($data['list_info_baokim']);
//
        $data['cart'] = @$_SESSION['cart'];
        $count = 0;
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $total += ($v['qty'] * $v['price_sale']);
            }
        }
        $data['count'] = $count;
        $data['total'] = $total;
        $data['fullname'] = $this->session->userdata('fullname');
        $data['user_mail'] = $this->session->userdata('usermail');
        $data['shipping'] = $this->f_shoppingcartmodel->GetData('shipping');
        $data['user'] = $this->f_shoppingcartmodel->getFirstRowWhere('users', array('id' => $this->session->userdata('userid')));
        $data['province'] = $this->f_shoppingcartmodel->GetData('province', null, null);
        $data['product_cats'] = $this->f_shoppingcartmodel->get_data('product_category', array('home' => 1));
        $data['last_news'] = $this->f_shoppingcartmodel->get_data('news', array(), array('id' => 1), 4);

        if (!empty($data['user']->province)) {
            $data['district'] = $this->f_homemodel->Get_where('district', array(
                'provinceid' => $data['user']->province
            ));
        }
        if (!empty($data['user']->district)) {
            $data['ward'] = $this->f_homemodel->Get_where('ward', array(
                'districtid' => $data['user']->district
            ));
        }
        $seo = array(
            'title' => 'Thanh Toán Bảo Kim',
            'description' => 'Thanh  Toán Bảo Kim',
            'keyword' => 'Thanh  Toán Bảo Kim',
            'type' => 'products');
        $this->LoadHeader($seo);
        $this->load->view('order_baokim', $data);
        $this->LoadFooter();
    }

    public function order_payment() {
        $check_cart = $_SESSION['cart'];
        if ($check_cart == null) {
            redirect(base_url());
        }
        $this->load->helper('model_helper');
        if (isset($_POST['sendcart_dathang'])) {
            $arr = array(
                'fullname' => $this->input->post('fullname'),
                'address' => $this->input->post('address'),
                'user_id' => $this->input->post('user_id'),
                'total_price' => $this->input->post('total_price_add'),
                'code_sale' => $this->input->post('code_sale_all'),
                'price_ship' => $this->input->post('price_ship'),
                'province' => $this->input->post('province'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'lang' => $this->input->post('lang'),
                'note' => $this->input->post('note'),
                'time' => time(),
                'user_id' => $this->session->userdata('userid'),
            );
            $id = $this->f_shoppingcartmodel->Add('order', $arr);
            if ($id) {
                $code = 'DH_' . date('d') . $id;
                $this->f_shoppingcartmodel->Update_where('order', array('id' => $id), array('code' => $code));
            }
            for ($i = 0; $i < sizeof($_POST['item_id']); $i++) {
                $temp_item = $this->f_shoppingcartmodel->getFirstRowWhere('product', array('id' => $_POST['item_id'][$i]));
                $buyted = $temp_item->bought + 1;
                $detai_order = array(
                    'order_id' => $id,
                    'item_id' => $_POST['item_id'][$i],
                    'count' => $_POST['count'][$i],
                    'price_sale' => $_POST['price_sale'][$i],
                        /* 'color'=>$_POST['color'][$i],
                          'size'=>$_POST['size'][$i], */
                );
                $this->f_shoppingcartmodel->Update('product', $temp_item->id, array(
                    'bought' => $buyted
                ));
                $id_order_item = $this->f_shoppingcartmodel->Add('order_item', $detai_order);
            }
            if ($id) {
                @$province = $this->f_shoppingcartmodel->getFirstRowWhere('province', array('provinceid' => $this->input->post('province')));
                @$district = $this->f_shoppingcartmodel->getFirstRowWhere('district', array('districtid' => $this->input->post('district')));
                @$ward = $this->f_shoppingcartmodel->getFirstRowWhere('ward', array('wardid	' => $this->input->post('ward')));
                $this->load->library('email', @$config);
                $htm = '<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#caf6ea">
                            <thead>
                            <tr style="background:#92ddc9">
                                <td>Stt</td>
                                <td>Tên sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Đơn giá(vnđ)</td>
                                <td>Thành tiền(vnđ)</td>
                            </tr>
                            </thead>
                            <tbody>';
                $subtotal = 0;
                $totals = 0;
                $tongtien = 0;
                $stt = 0;

                foreach ($_SESSION['cart'] as $key => $tcat) {
                    $stt++;
                    $subtotal = $tcat['price_sale'] * $tcat['qty'];
                    $code_sale = $this->input->post('code_sale_all');
                    $price_ship = $this->input->post('price_ship');
                    $total_sale = $subtotal * $code_sale / 100;

                    $tongtien += $subtotal - $total_sale;
                    $totals += $subtotal - $total_sale;
                    $htm .= '<tr>';
                    $htm .= '<td>' . ($stt) . '</td>';
                    $htm .= '<td>' . $tcat['name'] . '<br>';
//                    $htm .=$tcat['color']=='0'?'':'<div style="padding: 0px 5px ; float: left">Màu:</div> <div style="background:'.$tcat['color'].';width: 20px; height:20px;float:left; border:1px #ddd solid "></div> ';
//                    $htm .=$tcat['size']=='0'?'':'<div style="padding: 0px 5px ; float: left">Size:</div> <div style="">'.$tcat['size'].'</div> ';
                    $htm .= '</td>';
                    $htm .= '<td>' . $tcat['qty'] . '</td>';
                    $htm .= '<td>' . number_format($tcat['price_sale']) . '</td>';
                    $htm .= '<td>' . number_format($tcat['price_sale'] * $tcat['qty']) . '</td>';
                    $htm .= '</tr>';
                }

                $htm .= '<tr><td colspan="5" align="right"><span style="color:red">Mã giảm giá: -' . $this->input->post('code_sale_all') . '%</span></td></tr>';
                $htm .= '<tr><td colspan="5" align="right"><span style="color:red">Tổng tiền đơn hàng:' . number_format($tongtien) . '&nbsp;vnđ</span></td></tr>';
                $htm .= '<tr><td colspan="5" align="right"><span style="color:red">Phí vận chuyển:' . number_format($price_ship) . '&nbsp;vnđ</span></td></tr>';
                $htm .= '<tr><td colspan="5" align="right"><span style="color:red">Tổng tiền thanh toán là:' . number_format($totals + $this->input->post('price_ship')) . '&nbsp;vnđ</span></td></tr>';
                $htm .= '</tbody>';
                $htm .= '</table>';


                $subject = $this->site_name . ' - Thông tin đặt hàng';
                $img = '<p><img src="' . base_url($this->site_logo) . '" alt=""/></p>';
                $img_footer = '<p style="float: right" class="pull-right"><img src="' . base_url($this->site_logo) . '" alt=""/></p>';

                $message = '';
                $message .= $img;
                $message .= '<p><h2 style="color: green">EMAIL XÁC NHẬN ĐƠN HÀNG !</h2></p>';
                $message .= '<p>Kính chào &nbsp;' . $this->input->post('fullname') . ',<p>';
                $message .= '<p>' . $this->site_name . ' đã nhận được đơn đặt hàng của Qúy khách:<p></br>';

                $message .= '<b>Thông tin khách hàng:</b></br>';
                $message .= '<p>Họ tên:' . $this->input->post('fullname') . '<p></br>';
                $message .= '<p>Điện thoại:' . $this->input->post('phone') . '<p></br>';
                $message .= '<p>Địa chỉ nhận hàng:' . $this->input->post('address') . '<p></br>';

                $message .= '<p>Quí khách vui lòng thanh toán <span style="color:red">' . number_format($totals + $this->input->post('price_ship')) . 'vnđ</span>&nbsp;khi nhận hàng.</p>';
                $message .= '<p><b>Mã đơn hàng: </b>' . $code . '</p>';
                $message .= '<p>Tình trạng : Chưa thanh toán.</p>';
                $message .= '<p><b>Chi tiết đơn hàng :</b></p>';
                $message .= $htm;

                $message .= '<br>Địa chỉ :&nbsp;&nbsp;' . $this->input->post('address') . ',&nbsp;' . @$ward->name . ',&nbsp;' . @$district->name . '</p>';
                $message .= '<p style="border: 1px solid #e7d17a;padding: 8px">Ngoài hình thức thanh toán và giao hàng tận nơi, Quí khách có thể đến văn
                    phòng giao dịch của ' . $this->site_name . '   để thanh toán<br>';
                $message .= $this->address . '</p>';
                $message .= '<p>Nếu quí khách cần hỗ trợ, vui lòng gọi <span style="color:red">' . $this->hotline1 . '</span> hoặc gửi đến mail :' . $this->site_email . '</p>';
                $message .= '<p>Cảm ơn quí khách đã mua sắm trên ' . $this->site_name . '</p>';
                $message .= '<p><br><br><br>(<span style="color:red">*</span>)Đây là mail hệ thống tự động gửi, vui lòng không trả lời (Reply) lại mail này.</p>';
                $message .= $img_footer;
                // Get full html:
                $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->email->charset) . '</title>
                            <style type="text/css">
                                body {
                                    font-family: Arial, Verdana, Helvetica, sans-serif;
                                    font-size: 16px;
                                }
                            </style>
                        </head>
                        <body>
                        ' . $message . '
                        </body>
                        </html>';
                //$this->email->send();
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= 'From: <' . $this->site_email . '>' . "\r\n";
                mail($this->input->post('email'), "$subject", $body, $headers);
                $_SESSION['message'] = "Bạn đã đặt hàng thành công !";

                if (isset($_SESSION['cart'])) {
                    unset($_SESSION['cart']);
                }
            }
            if (isset($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }
            if ($id) {
                $_SESSION['mss_success'] = "Bạn đã đặt hàng thành công!!!";
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['cart'] = @$_SESSION['cart'];
        $count = 0;
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $total += ($v['qty'] * $v['price_sale']);
            }
        }
        $data['count'] = $count;
        $data['total'] = $total;
        $data['fullname'] = $this->session->userdata('fullname');
        $data['user_mail'] = $this->session->userdata('usermail');
        $data['shipping'] = $this->f_shoppingcartmodel->GetData('shipping');
        $data['user'] = $this->f_shoppingcartmodel->getFirstRowWhere('users', array('id' => $this->session->userdata('userid')));
        $data['province'] = $this->f_shoppingcartmodel->GetData('province', null, null);
        $data['product_cats'] = $this->f_shoppingcartmodel->get_data('product_category', array('home' => 1));
        $data['last_news'] = $this->f_shoppingcartmodel->get_data('news', array(), array('id' => 1), 4);

        if (!empty($data['user']->province)) {
            $data['district'] = $this->f_homemodel->Get_where('district', array(
                'provinceid' => $data['user']->province
            ));
        }
        if (!empty($data['user']->district)) {
            $data['ward'] = $this->f_homemodel->Get_where('ward', array(
                'districtid' => $data['user']->district
            ));
        }
        $seo = array(
            'title' => 'Thanh toán đặt hàng',
            'description' => 'Thanh toán đặt hàng',
            'keyword' => 'Thanh toán đặt hàng',
            'type' => 'products');
        $this->LoadHeader($seo);
        $this->load->view('order_payment', $data);
        $this->LoadFooter();
    }

    public function check_out() {
        $this->load->helper('model_helper');
        if (isset($_POST['sendcart'])) {
            $arr = array(
                'fullname' => $this->input->post('fullname'),
                'address' => $this->input->post('address'),
                'user_id' => $this->input->post('user_id'),
                'price_ship' => $this->input->post('price_ship'),
                'code_sale' => $this->input->post('code_sale_all'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'lang' => $this->input->post('lang'),
                'note' => $this->input->post('note'),
                'total_price' => $this->input->post('total_price'),
                'time' => time(),
            );
            $id = $this->f_shoppingcartmodel->Add('order', $arr);
            if ($id) {
                $code = 'DH_' . date('d') . $id;
                $this->f_shoppingcartmodel->Update_where('order', array('id' => $id), array('code' => $code));
            }
            for ($i = 0; $i < sizeof($_POST['item_id']); $i++) {
                $temp_item = $this->f_shoppingcartmodel->getFirstRowWhere('product', array('id' => $_POST['item_id'][$i]));
                $buyted = $temp_item->bought + 1;
                $detai_order = array(
                    'order_id' => $id,
                    'item_id' => $_POST['item_id'][$i],
                    'count' => $_POST['count'][$i],
                    'price_sale' => $_POST['price_sale'][$i],
                        /* 'color'=>$_POST['color'][$i],
                          'size'=>$_POST['size'][$i], */
                );
                $this->f_shoppingcartmodel->Update('product', $temp_item->id, array(
                    'bought' => $buyted
                ));
                $id_order_item = $this->f_shoppingcartmodel->Add('order_item', $detai_order);
                if (isset($id)) {
                    $_SESSION['mss_success'] = "Bạn đã đặt hàng thành công!!!";
                }
                /*       if($id_order_item){
                  $config = Array(
                  'protocol'  => 'smtp',
                  'smtp_host' => 'ssl://smtp.googlemail.com',
                  'smtp_port' => 465,
                  'smtp_user' => 'trantrung129@vnnetsoft.com', // change it to yours
                  'smtp_pass' => 'trungtrung129@@', // change it to yours
                  'mailtype'  => 'html',
                  'charset'   => 'utf-8',
                  'wordwrap'  => TRUE
                  );
                  $this->load->library('email', $config);

                  $subject = 'Thông tin liên hệ - '.'order_id';
                  $message = '<p>Thông tin của khách hàng liên hệ như sau:</p>';
                  $message .='<p>Họ và tên :'.'item_id'.',<p>';
                  $message .='<p>Số điện thoại :'.'count'.'</p>';
                  $message .='<p>Email :'.'price_sale'.'</p>';

                  $message .='<p>Nội dung :'.$this->input->post('comment').'</p>';
                  // Get full html:
                  $body =
                  '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                  <html xmlns="http://www.w3.org/1999/xhtml">
                  <head>
                  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                  <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->email->charset) . '</title>
                  <style type="text/css">
                  body {
                  font-family: Arial, Verdana, Helvetica, sans-serif;
                  font-size: 16px;
                  }
                  </style>
                  </head>
                  <body>
                  ' . $message . '
                  </body>
                  </html>';
                  $this->email->set_newline("\r\n");
                  $this->email->from($this->input->post('email'),$this->input->post('full_name')); // change it to yours
                  $this->email->to('bangoctrung89@gmail.com'); // change it to yours
                  $this->email->subject($subject);
                  $this->email->message($body);
                  $this->email->send();
                  $_SESSION['message']="Bạn đã gửi thông tin thành công!!!";
                  } */
            }
            unset($_SESSION['cart']);
            redirect(base_url('thanh-toan-dat-hang'));
        }
        $data['cart'] = @$_SESSION['cart'];
        $count = 0;
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $total += ($v['qty'] * $v['price_sale']);
            }
        }
        $data['count'] = $count;
        $data['total'] = $total;
        $data['fullname'] = $this->session->userdata('fullname');
        $data['lang'] = $this->session->userdata('lang');
        $data['user_mail'] = $this->session->userdata('usermail');
        $data['shipping'] = $this->f_shoppingcartmodel->getFirstRowWhere('site_option');
        $data['user'] = $this->f_shoppingcartmodel->getFirstRowWhere('users', array('id' => $this->session->userdata('userid')));
        $data['province'] = $this->f_shoppingcartmodel->GetData('province', null, null);
        $data['shipping'] = $this->f_shoppingcartmodel->getFirstRowWhere('site_option');

        $data['product_cats'] = $this->f_shoppingcartmodel->get_data('product_category', array('home' => 1));
        $data['last_news'] = $this->f_shoppingcartmodel->get_data('news', array(), array('id' => 1), 4);
        $data['total_price'] = @$_SESSION['total_price'];
        if (!empty($data['user']->province)) {
            $data['district'] = $this->f_homemodel->Get_where('district', array(
                'provinceid' => $data['user']->province
            ));
        }
        if (!empty($data['user']->district)) {
            $data['ward'] = $this->f_homemodel->Get_where('ward', array(
                'districtid' => $data['user']->district
            ));
        }
        $seo = array(
            'title' => lang('cart'),
            'description' => lang('cart'),
            'keyword' => lang('cart'),
            'type' => 'products');

//        $this->LoadHeader($this->site_name, $this->site_keyword, $this->site_description);
        $this->LoadHeader($seo);

        $this->load->view('shoppingcart_checkout', $data);
        $this->LoadFooter();
    }

    public function quickbuy() {
        if (isset($_POST['sendProfiler'])) {
            $arr = array(
                'fullname' => $this->input->post('hoten'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'user_id' => $this->input->post('user_id'),
                'total_price' => $this->input->post('total_price'),
                'note' => $this->input->post('note'),
                'time' => time(),
            );
        }
        $id = $this->f_shoppingcartmodel->Add('order', $arr);

        if ($id) {
            $code = 'DH_' . date('d') . $id;
            $_SESSION['madonhang'] = $code;
            $this->f_shoppingcartmodel->Update_where('order', array('id' => $id), array('code' => $code));
            //var_dump($this->input->post('quantity'));die();
            $detai_order = array(
                'order_id' => $id,
                'item_id' => $this->input->post('pro_id'),
                'pro_name' => $this->input->post('pro_name'),
                'count' => $this->input->post('quantity'),
                'price_sale' => $this->input->post('price_sale')
            );
            $id_order_item = $this->f_shoppingcartmodel->Add('order_item', $detai_order);
        }
        redirect(base_url('thanh-toan-dat-hang'));
    }

    public function Payment() {
        $this->LoadHeader($this->site_name, $this->site_keyword, $this->site_description);
        $this->load->view('payment');
        $this->LoadFooter();
    }

    public function add_cart() {
        $id = $this->input->post('id');
//        $quantity=$this->input->post('quantity');
        $id = (int) $id;
        $row = $this->f_shoppingcartmodel->getFirstRowWhere('product', array('id' => $id));
        //  print_r($row);
        //echo "<pre>";var_dump($row);die();
        $_SESSION['messege'] = '';
        $rs['status'] = false;
        if (!empty($_SESSION['cart']) && isset($_SESSION['cart'][$id]) && in_array($_SESSION['cart'][$id], $_SESSION['cart'])) {

            $old = ($_SESSION['cart'][$id]);
            /*   if ($this->language == 1) {
              $count   = ($old['qty1'] + 1);
              }elseif ($this->language == 1) {
              $count   = ($old['qty2'] + 1);
              } */
            $_SESSION['cart'][$id] = array(
                'rowid' => $id,
                'alias' => $row->alias,
                'name' => $row->name,
//                'lang'  => $row->lang,
                'qty' => ($old['qty'] + 1),
                //   'qty'   => $count,
                'price_sale' => $row->price_sale,
                'image' => $row->image,
            );
            $_SESSION['messege'] = 'Sản phẩm đã cập nhật vào giỏ hàng của bạn!';
            $rs['status'] = true;
        } else {
            $_SESSION['cart'][$id] = array(
                'rowid' => $id,
                'name' => $row->name,
                'alias' => $row->alias,
                'qty' => 1,
//                'lang'  => $row->lang,
                'price_sale' => $row->price_sale,
                'image' => $row->image,
            );
            $_SESSION['messege'] = 'Sản phẩm đã cập nhật vào giỏ hàng của bạn!';
            $rs['status'] = true;
        }
        $count = 0;
        $totalPrice = 0;
        foreach ($_SESSION['cart'] as $v) {
            $count += $v['qty'];
            $totalPrice += $v['qty'] * $v['price_sale'];
        }
        $rs['count'] = $count;
        $rs['totalPrice'] = $totalPrice;
        $rs['mess'] = $_SESSION['messege'];
        $_SESSION['totalProduct'] = $count;
        echo json_encode($rs);
    }

    public function add_cart_pro() {
        $id = $this->input->post('id');
        $quantity = $this->input->post('quantity');
        $id = (int) $id;
        $row = $this->f_shoppingcartmodel->getFirstRowWhere('product', array('id' => $id));
        //        print_r($row); die($id);
        //echo "<pre>";var_dump($row);die();
        $_SESSION['messege'] = '';
        $rs['status'] = false;
        if (!empty($_SESSION['cart']) && isset($_SESSION['cart'][$id]) && in_array($_SESSION['cart'][$id], $_SESSION['cart'])) {

            $old = ($_SESSION['cart'][$id]);

            $_SESSION['cart'][$id] = array(
                'rowid' => $id,
                'alias' => $row->alias,
                'name' => $row->name,
                'qty' => ($old['qty'] + $quantity),
                'price_sale' => $row->price_sale,
                'image' => $row->image,
            );
            $_SESSION['messege'] = 'Sản phẩm đã cập nhật vào giỏ hàng của bạn!';
            $rs['status'] = true;
        } else {
            $_SESSION['cart'][$id] = array(
                'rowid' => $id,
                'name' => $row->name,
                'alias' => $row->alias,
                'qty' => $quantity,
                'price_sale' => $row->price_sale,
                'image' => $row->image,
            );
            $_SESSION['messege'] = 'Sản phẩm đã được thêm vào giỏ hàng của bạn!';
            $rs['status'] = true;
        }
        $count = 0;
        $totalPrice = 0;
        foreach ($_SESSION['cart'] as $v) {
            $count += $v['qty'];
            $totalPrice += $v['qty'] * $v['price_sale'];
        }
        $rs['count'] = $count;
        $rs['totalPrice'] = $totalPrice;
        $rs['mess'] = $_SESSION['messege'];
        echo json_encode($rs);
    }

    public function add_liked() {
//        $alias=$this->input->post('alias');
        $id = $this->input->post('id');
        $id = (int) $id;
        $row = $this->f_shoppingcartmodel->getFirstRowWhere('product', array('id' => $id));
        $_SESSION['messege'] = '';
        $rs['status'] = false;
        parse_str($_SERVER['QUERY_STRING'], $_GET);
        //then you can use:
        if (isset($_GET["par"])) {
            echo $_GET["par"];
        }
        //if you want to get current page url use:
        $current_url = current_url();
        if (!empty($_SESSION['liked']) && isset($_SESSION['liked'][$id]) && in_array($_SESSION['liked'][$id], $_SESSION['liked'])) {
            $old = ($_SESSION['liked'][$id]);
            $_SESSION['liked'][$id] = array(
                'rowid' => $id,
                'alias' => $row->alias,
                'alias_full' => 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'],
                'name' => $row->name,
                'cid' => $row->category_id,
                'qty' => ($old['qty'] + 1),
                'price_sale' => $row->price_sale,
                'image' => $row->image,
                'like' => 0,
            );
            $_SESSION['messege'] = 'Sản phẩm đã được quan tâm!';
            $rs['status'] = true;
        } else {
            $_SESSION['liked'][$id] = array(
                'rowid' => $id,
                'name' => $row->name,
                'alias_full' => 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'],
                'alias' => $row->alias,
                'cid' => $row->category_id,
                'qty' => 1,
                'price_sale' => $row->price_sale,
                'image' => $row->image,
                'like' => 1,
            );
            $_SESSION['messege'] = 'Sản phẩm được bạn quan tâm!';
            $rs['status'] = true;
        }
        $trangthai = 0;
        $count = 0;
        $name = ' a';
        foreach ($_SESSION['liked'] as $v) {
            $count += $v['qty'];
            $name = $v['name'];
            $like = $v['like'];
        }
//        var_dump($data['liked']);
        $rs['like'] = $like;
        $rs['count'] = $count;
        $rs['name'] = $name;
        $rs['mess'] = $_SESSION['messege'];
        echo json_encode($rs);
    }

    //ajax
    public function update_cart() {
        if (isset($_POST['id']) && isset($_POST['qty'])) {
            $old = $_SESSION['cart'][$_POST['id']];
            $new = array(
                'rowid' => $old['rowid'],
                'name' => $old['name'],
                'qty' => $_POST['qty'],
                'price_sale' => $old['price_sale'],
                'image' => $old['image'],
                'color' => $old['color'],
                'size' => $old['size'],
            );
            $_SESSION['cart'][$_POST['id']] = $new;
            $count = 0;
            $total = 0;
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $total += ($v['qty'] * $v['price_sale']);
            }
            $data['count'] = $count;
            $data['total'] = $total;
            $data['item_price'] = $old['price_sale'];
            $data['item_total'] = $old['price_sale'] * $_POST['qty'];
            echo json_encode($data);
        }
//            redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id) {
        unset($_SESSION['cart'][$id]);
        $count = 0;
        foreach ($_SESSION['cart'] as $v) {
            $count += $v['qty'];
            $totalPrice += $v['qty'] * $v['price_sale'];
        }
        $_SESSION['totalProduct'] = $count;
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete_like($id) {
        unset($_SESSION['liked'][$id]);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function destroy_cart() {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        if (isset($_SESSION['totalProduct'])) {
            unset($_SESSION['totalProduct']);
        }
        redirect(base_url());
    }

    public function getdistric() {
        if (isset($_POST['id'])) {
            $list = $this->f_shoppingcartmodel->Get_where('district', array('provinceid' => $_POST['id']));
            echo json_encode($list);
        }
    }

    public function getward() {
        if (isset($_POST['id'])) {
            $list = $this->f_shoppingcartmodel->Get_where('ward', array('districtid' => $_POST['id']));
            echo json_encode($list);
        }
    }

    //Update shipping
    public function update_shipping() {
        if (isset($_POST['price_sale'])) {
            $price_ship = $_POST['price_sale'];
            $count = 0;
            $total = 0;
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $total += ($v['qty'] * $v['price_sale']);
            }
            $_SESSION['shipping'] = $price_ship;
            $_SESSION['total_price'] = $total + $price_ship;
            $data['shipp'] = $price_ship;
            $data['total'] = $total + $price_ship;
            echo json_encode($data);
        }
        //            redirect($_SERVER['HTTP_REFERER']);
    }

    public function check_sale() {
        if (isset($_POST['code'])) {
            $data['check'] = false;
            $item = $this->f_shoppingcartmodel->getFirstRowWhere('code_sale', array('code' => $_POST['code']));
            if ($item) {
                $data['check'] = true;
                $data['item'] = $item;
            } else {
                $data['check'] = false;
            }
            echo json_encode($data);
        }
    }

}
