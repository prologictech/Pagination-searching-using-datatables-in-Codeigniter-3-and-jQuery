<?php

class Paggination_model extends CI_Model
{

    protected $table = 'authors';

    public function __construct()
    {
        parent::__construct();
    }
    // get employee function
    public function get_employess($postData)
    {
        $response = array();
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
        $colums = array('id', 'first_name', 'last_name', 'email','birthdate');
        $searchQuery = "";
        // serch query
        if ($searchValue !== "") {
            $searchQuery .= "(";
            // foreach for search query
            foreach ($colums as $recor) {
                $searchQuery .= "$recor like '%" . $searchValue . "%' or ";
            }
            $searchQuery = substr($searchQuery, 0, -3);
            $searchQuery .= ")";
        }
        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('authors')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        // search query is not empty
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('authors')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        // if search query is not empty
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('authors')->result();
        $data = array();
        // for each to fetach record
        foreach ($records as $record) {
            $data[] = array(
                "id" => $record->id,
                "first_name" => $record->first_name,
                "last_name" => $record->last_name,
                "email" => $record->email,
                "birthdate" => $record->birthdate,
                "added" => $record->added,
            );
        }
        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );
        return $response;
    }
}
