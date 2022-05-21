<?php

class LoginModel extends CI_Model {

    public function cekUser($email, $password) {
        $syarat = array(
            "email_user" => $email,
//			"password" => $password
        );
        $this->db->where($syarat);
        $user = $this->db->get("users")->row();
        //cek error
        //1. Jika email tidak ditemukan
        if (!$user) {
            return false;
        }
        $passwordUser = $user->password_user;
        //2.JIka password yang dimasukkan salah
        if (!password_verify($password, $passwordUser)) {
            return false;
        }
        return $user;
    }

    public function check($email, $password) {
        date_default_timezone_set("Asia/jakarta");
        if (strpos($email, '@') !== false) {
            $this->db->where('email_user', $email);
            // $this->db->where('is_active', '1');
            $query = $this->db->get('users')->row();
        } else {
            $this->db->where('email_user', $email);
            // $this->db->where('is_active', '1');
            $query = $this->db->get('users')->row();
        }

        if (!$query)
            return false;
        $hash = $query->password_user;
        if (!password_verify($password, $hash))
            return false;
        return $query;
    }

}
