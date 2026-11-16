<?php
class LoginPlg_M extends Model
{
    function DataPlg($email)
    {
        $dtadmin = $this->db->prepare("select user_plg070, sandi070, nm_lngkp070
            from penyewa where user_plg070=?");
        $dtadmin->bind_param("s", $email);
        $dtadmin->execute();
        return $dtadmin->get_result()->fetch_assoc();
    }
}