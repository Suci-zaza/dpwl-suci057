<?php
class Login_M extends Model
{
    public function ambildata($username, $password)
    {
        $dtadmin = $this->db->prepare("select username,password, status_akun from admin where username=? and password=? and status_Akun='aktif'");
        $dtadmin->bind_param("ss", $username, $password);
        $dtadmin->execute();
        return  $dtadmin->get_result()->fetch_assoc();
    }
}