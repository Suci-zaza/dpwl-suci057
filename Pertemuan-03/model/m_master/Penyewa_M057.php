<?php
class Penyewa_M057 extends Model
{
    public function datapenyewa()
    {
        $dbpenyewa = $this->db->prepare("SELECT user_plg057, Sandi057, Nik057, nm_lngkp057, no_hp057, almt_lngkp057, ft_ktp057, ft_sim_a057 FROM penyewa");
        $dbpenyewa->execute();
        return $dbpenyewa->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function cekuser($user_plg057)
    {
        $cekuser = $this->db->prepare("SELECT user_plg057 FROM penyewa WHERE user_plg057=?");
        $cekuser->bind_param("s", $user_plg057);
        $cekuser->execute();
        $hasil = $cekuser->get_result();
        return $hasil->num_rows > 0;
    }

    public function simpan($data)
    {
        $sql = $this->db->prepare("INSERT INTO penyewa (user_plg057, Sandi057, Nik057, nm_lngkp057, no_hp057, almt_lngkp057, ft_ktp057, ft_sim_a057) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $sql->bind_param(
            "ssssssss",
            $data['user_plg057'],
            $data['Sandi057'],
            $data['Nik057'],
            $data['nm_lngkp057'],
            $data['no_hp057'],
            $data['almt_lngkp057'],
            $data['ft_ktp'],
            $data['ft_sim_a']
        );

        return $sql->execute();
    }

    public function detailpenyewa($user_plg057)
    {
        $sql = $this->db->prepare(
            "SELECT user_plg057, Sandi057, Nik057, nm_lngkp057, no_hp057, almt_lngkp057, ft_ktp, ft_sim_a 
            FROM penyewa 
            WHERE user_plg057=?"
        );
        $sql->bind_param("s", $user_plg057);
        $sql->execute();
        return $sql->get_result()->fetch_assoc();
    }

    public function UbahDtPenyewa($data)
    {
        $stmt = $this->db->prepare("UPDATE penyewa SET Sandi057 = ?, Nik057 = ?, nm_lngkp057 = ?, no_hp057 = ?, almt_lngkp057 = ?, ft_ktp = ?, ft_sim_a = ? WHERE user_plg057 = ?");

        $stmt->bind_param(
            "ssssssss",
            $data['Sandi057'],
            $data['Nik057'],
            $data['nm_lngkp057'],
            $data['no_hp057'],
            $data['almt_lngkp057'],
            $data['ft_ktp'],
            $data['ft_sim_a'],
            $data['user_plg057']
        );

        $hasil = $stmt->execute();
        $stmt->close();
        return $hasil;
    }

    public function HapusDtPenyewa($user_plg057)
    {
        $dtpenyewa = $this->db->prepare("DELETE FROM penyewa WHERE user_plg057 = ?");
        $dtpenyewa->bind_param("s", $user_plg057);
        $hasil = $dtpenyewa->execute();
        $dtpenyewa->close();
        return $hasil;
    }
}