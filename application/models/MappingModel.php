<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MappingModel extends CI_Model
{
    public function viewMap()
    {
        $this->db->select('r.id as id')
            ->select('u.username as username')
            ->select('c.name as culinary_name')
            ->select('r.title as title')
            ->select('r.description as description')
            ->select('r.owner_name as owner_name')
            ->select('r.nama_kecamatan as nama_kecamatan')
            ->select('r.address as address')
            ->select('r.report_time as report_time')
            ->select('r.latitude as latitude')
            ->select('r.longitude as longitude')
            ->select('r.status as status')
            ->select('r.report_thumb as thumb')
            ->select('r.open_time as open_time')
            ->select('r.close_time as close_time')
            ->from('tb_reports as r')
            ->join('tb_users as u', 'r.id_user = u.id')
            ->join('tb_culinaries as c', 'r.id_culinary = c.id')
            ->where('r.status', "approved")
            ->order_by('r.report_time', 'desc');
        return $this->db->get()->result();
    }
    public function viewMapByCulinaryName($culinary_name)
    {
        $this->db->select('r.id as id')
            ->select('u.id as id_user')
            ->select('u.username as username')
            ->select('c.name as culinary_name')
            ->select('r.title as title')
            ->select('r.description as description')
            ->select('r.owner_name as owner_name')
            ->select('r.nama_kecamatan as nama_kecamatan')
            ->select('r.address as address')
            ->select('r.report_time as report_time')
            ->select('r.latitude as latitude')
            ->select('r.longitude as longitude')
            ->select('r.status as status')
            ->select('r.report_thumb as thumb')
            ->select('r.open_time as open_time')
            ->select('r.close_time as close_time')
            ->from('tb_reports as r')
            ->join('tb_users as u', 'r.id_user = u.id')
            ->join('tb_culinaries as c', 'r.id_culinary = c.id')
            ->where('r.status', "approved")
            ->like('c.name', "$culinary_name")
            ->order_by('r.report_time', 'desc');
        return $this->db->get()->result();
    }

    public function getMappingData()
    {
        $this->db->select('r.id as id')
            ->select('u.username as username')
            ->select('c.name as culinary_name')
            ->select('r.title as title')
            ->select('r.description as description')
            ->select('r.owner_name as owner_name')
            ->select('r.nama_kecamatan as nama_kecamatan')
            ->select('r.address as address')
            ->select('r.report_time as report_time')
            ->select('r.latitude as latitude')
            ->select('r.longitude as longitude')
            ->select('r.status as status')
            ->select('r.open_time as open_time')
            ->select('r.close_time as close_time')
            ->select('r.report_thumb as thumb')
            ->from('tb_reports as r')
            ->join('tb_users as u', 'r.id_user = u.id')
            ->join('tb_culinaries as c', 'r.id_culinary = c.id')
            ->order_by('r.report_time', 'desc');
        return $this->db->get()->result();
    }

    public function getMappingDataByIdUser($id)
    {
        $this->db->select('r.id as id')
            ->select('u.username as username')
            ->select('c.name as culinary_name')
            ->select('r.title as title')
            ->select('r.description as description')
            ->select('r.owner_name as owner_name')
            ->select('r.nama_kecamatan as nama_kecamatan')
            ->select('r.address as address')
            ->select('r.report_time as report_time')
            ->select('r.latitude as latitude')
            ->select('r.longitude as longitude')
            ->select('r.status as status')
            ->select('r.report_thumb as thumb')
            ->select('r.open_time as open_time')
            ->select('r.close_time as close_time')
            ->from('tb_reports as r')
            ->join('tb_users as u', 'r.id_user = u.id')
            ->join('tb_culinaries as c', 'r.id_culinary = c.id')
            ->where('id_user', $id)
            ->order_by('report_time', 'desc');
        return $this->db->get()->result();
    }

    public function getMappingDataByIdReports($id_report)
    {
        $this->db->select('r.id as id')
            ->select('u.username as username')
            ->select('c.id as id_culinary')
            ->select('c.name as culinary_name')
            ->select('r.title as title')
            ->select('r.description as description')
            ->select('r.owner_name as owner_name')
            ->select('r.address as address')
            ->select('r.report_time as report_time')
            ->select('r.latitude as latitude')
            ->select('r.longitude as longitude')
            ->select('r.status as status')
            ->select('r.nama_kecamatan as nama_kecamatan')
            ->select('r.report_thumb as report_thumb')
            ->select('r.open_time as open_time')
            ->select('r.close_time as close_time')
            ->from('tb_reports as r')
            ->join('tb_users as u', 'r.id_user=u.id')
            ->join('tb_culinaries as c', 'r.id_culinary=c.id')
            ->where('r.id', $id_report)
            ->order_by('r.report_time', 'desc');
        return $this->db->get()->row_array();
    }
    public function acceptReport($id)
    {
        return $this->db->where('id', $id)->update('tb_reports', array('status' => 'approved'));
    }
    public function declineReport($id)
    {
        return $this->db->where('id', $id)->update('tb_reports', array('status' => 'pending'));
    }
}

/* End of file MappingModel.php */
