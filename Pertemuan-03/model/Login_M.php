<?php
class Login_M extends Model
{
    public function ambildata($username)
    {
        $dtadmin = $this->db->prepare("select username,password, status_akun from admin where username=? and status_Akun='aktif'");
        $dtadmin->bind_param("s", $username);
        $dtadmin->execute();
        return  $dtadmin->get_result()->fetch_assoc();
    }
}