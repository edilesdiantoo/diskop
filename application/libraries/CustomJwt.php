<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/Firebase/JWT.php';

class CustomJwt { // <-- Hapus 'extends CI_Controller'

    private $key = "12345"; // Ganti dengan key rahasia kamu

    // Encode data menjadi token
    public function encode($data) {
        return JWT::encode($data, $this->key);
    }

    // Decode token menjadi data
    public function decode($token) {
        try {
            return JWT::decode($token, $this->key);
        } catch (Exception $e) {
            return null; // Token invalid
        }
    }
}