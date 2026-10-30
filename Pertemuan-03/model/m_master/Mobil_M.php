<?php
class Mobil_M extends Model
{
    function datamobil()
    {
       $dbmobil = $this->db->prepare("SELECT no_plat, nm_mobil,nkkursi,jns_mobil,transmisi,thn_buat,ft_depan,ft_blkg,ft_interior,hrg_hari,cttn_unit,status_unit FROM mobil");
         $dbmobil->execute();
          return $dbmobil->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}