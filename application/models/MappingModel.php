<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MappingModel extends CI_Model
{
    public function viewMap()
    {
        $this->db->select('r.id as id')
            ->select('r.id_user')
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
            ->from('tb_reports as r')
            ->join('tb_users as u', 'r.id_user = u.id')
            ->join('tb_culinaries as c', 'r.id_culinary = c.id')
            ->where('status', "approved");
        return $this->db->get()->result();
    }

    public function getMappingData()
    {
        $this->db->select('r.id as id')
            ->select('r.id_user')
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
            ->from('tb_reports as r')
            ->join('tb_users as u', 'r.id_user = u.id')
            ->join('tb_culinaries as c', 'r.id_culinary = c.id');
        return $this->db->get()->result();
    }

    public function getMappingDataByIdUser($id)
    {
        $this->db->select('r.id as id')
            ->select('r.id_user')
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
            ->from('tb_reports as r')
            ->join('tb_users as u', 'r.id_user = u.id')
            ->join('tb_culinaries as c', 'r.id_culinary = c.id')
            ->where('id_user', $id);
        return $this->db->get()->result();
    }

    public function getMappingDataByIdReports($id_report)
    {
        $this->db->select('*')
            ->from('tb_reports')
            ->where('id', $id_report);
        return $this->db->get()->row_array();
    }
}

/* End of file MappingModel.php */
