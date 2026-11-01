<?php
class Mobil_M extends Model
{
    function datamobil()
    {
       $dbmobil = $this->db->prepare("SELECT no_plat, nm_mobil,nkursi,nbagasi,jns_mobil,transmisi,thn_buat,ft_depan,ft_blkg,ft_interior,hrg_hari,cttn_unit,status_unit FROM mobil");
         $dbmobil->execute();
          return $dbmobil->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function cekplat($no_plat)
    {
        $cekplat = $this->db->prepare("SELECT no_plat FROM mobil WHERE no_plat=?");
        $cekplat->bind_param("s", $no_plat);
        $cekplat->execute();
        $hasil = $cekplat->get_result();
        return $hasil->num_rows > 0;
    }
    public function simpan($data)
{
    $sql = $this->db->prepare("INSERT INTO mobil (no_plat, nm_mobil, nkursi, nbagasi, jns_mobil, transmisi, thn_buat, ft_depan, ft_blkg, ft_interior, hrg_hari, cttn_unit, status_unit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $sql->bind_param(
        "ssiississsdss",
        $data['no_plat'],
        $data['nm_mobil'],
        $data['nkursi'],
        $data['nbagasi'],
        $data['jns_mobil'],
        $data['transmisi'],
        $data['thn_buat'],
        $data['ft_depan'],
        $data['ft_blkg'],
        $data['ft_interior'],
        $data['hrg_hari'],
        $data['cttn_unit'],
        $data['status_unit']
    );

    return $sql->execute();
}
}