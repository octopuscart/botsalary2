<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . 'libraries/REST_Controller.php');

class LocalApi extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->checklogin = $this->session->userdata('logged_in');
        $this->load->model('Order_model');
    }

    function testGet_get() {
        print_r($this->checklogin['user_type']);
    }

    //function for user settingt
    function updateUserSession_post() {
        $fieldname = $this->post('name');
        $value = $this->post('value');
        $pk_id = $this->post('pk');
        if ($this->checklogin) {
            $data = array($fieldname => $value);
            $this->db->set($data);
            $this->db->where("id", $pk_id);
            $this->db->update("admin_users", $data);
            if (isset($this->checklogin[$fieldname])) {

                $this->checklogin[$fieldname] = $value;
                $this->session->set_userdata('logged_in', $this->checklogin);
            }
        }
    }

    function updateUserClient_post() {
        $fieldname = $this->post('name');
        $value = $this->post('value');
        $pk_id = $this->post('pk');
        if ($this->checklogin) {
            $data = array($fieldname => $value);
            $this->db->set($data);
            $this->db->where("id", $pk_id);
            $this->db->update("admin_users", $data);
        }
    }

    function updateUser() {
        $fieldname = $this->post('name');
        $value = $this->post('value');
        $pk_id = $this->post('pk');

        if ($this->checklogin) {
            $data = array($fieldname => $value);
            $this->db->set($data);
            $this->db->where("id", $pk_id);
            $this->db->update("admin_user", $data);
        }
    }

    function updateAppointment_post() {
        $fieldname = $this->post('name');
        $value = $this->post('value');
        $pk_id = $this->post('pk');
        $tablename = $this->post('appointment_entry');
        if ($this->checklogin) {
            $data = array($fieldname => $value);
            $this->db->set($data);
            $this->db->where("aid", $pk_id);
            $this->db->update('appointment_entry', $data);
        }
    }

    function updateAppointmentTime_post() {
        $fieldname = $this->post('name');
        $value = $this->post('value');
        $pk_id = $this->post('pk');
        $tablename = $this->post('appointment_entry');
        if ($this->checklogin) {
            $data = array($fieldname => $value);
            $this->db->set($data);
            $this->db->where("id", $pk_id);
            $this->db->update('appointment_entry', $data);
        }
    }

    //function for curd update
    function updateCurd_post() {
        $fieldname = $this->post('name');
        $value = $this->post('value');
        $pk_id = $this->post('pk');
        $tablename = $this->post('tablename');
        if ($this->checklogin) {
            $data = array($fieldname => $value);
            $this->db->set($data);
            $this->db->where("id", $pk_id);
            $this->db->update($tablename, $data);
        }
    }

    //function for curd update
    function curd_get($table_name) {
        $fieldname = $this->post('name');
        $value = $this->post('value');
        $pk_id = $this->post('pk');
        if ($this->checklogin) {
            $data = array($fieldname => $value);
            $this->db->set($data);
            $this->db->where("id", $pk_id);
            $this->db->update($table_name, $data);
        }
    }

    //function for product list
    function deleteCurd_post($table_name) {
        $fieldname = $this->post('name');
        $value = $this->post('value');
        $pk_id = $this->post('pk');
        if ($this->checklogin) {
            $data = array($fieldname => $value);
            $this->db->set($data);
            $this->db->where("id", $pk_id);
            $this->db->update($table_name, $data);
        }
    }

    //function for curd update
    function cartUpdate_post() {
        $fieldname = $this->post('name');
        $value = $this->post('value');
        $pk_id = $this->post('pk');
        $quantity = $this->post('quantity');
        $totalPrice = (intval($quantity) * intval($value));
        if ($this->checklogin) {
            $data = array($fieldname => $value, "total_price" => "$totalPrice");
            $this->db->set($data);
            $this->db->where("id", $pk_id);
            $this->db->update("cart");

            $this->db->where('id', $pk_id);
            $query = $this->db->get('cart');
            $cart_items = $query->row();

            $order_details = $this->Order_model->recalculateOrder($cart_items->order_id);
        }
    }

    function notificationUpdate_get() {
        $this->db->order_by('id', 'desc');
        $this->db->limit(5);
        $query = $this->db->get('system_log');
        $systemlog = $query->result_array();
        $this->response($systemlog);
    }

   public function pageUpdate_get() {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        if ($this->checklogin) {

            $content_pages = array(
                "title" => $this->post("title"),
                "content" => $this->post("content"),
            );
             $this->db->set($content_pages);
            $this->db->where('id', $this->post("pageId"));
            $this->db->update("content_pages");
            $this->response(array("status"=>200));
        }
    }

}

?>