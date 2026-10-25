<?php
class Login_M extends Model
{
    public function ambildata($email, $pass)
    {
        $dtadmin = $this->db->prepare("select username,password, status_akun from admin where usernamae=? and password=? and status_Akun='aktif'");
        $dtadmin->bind_param("ss", $email, $pass);
        $dtadmin->execute();
        return  $dtadmin->get_result()->fetch_assoc();
    }
}