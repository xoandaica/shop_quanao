<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of MY_Model
 *
 * @author Nhattay
 */
class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function getField_array($table, $field,$where=null)
    {
        $this->db->select($field);
        if($where!=null){
            $this->db->where($where);
        }

        $q = $this->db->get($table);
        return $q->result_array();
    }
    public function Update_where($table, $where, $data)
    {
        if (isset($data) && $data != NULL) {
            $this->db->where($where);
            $this->db->update($table, $data);
            return 1;
        }
    }
    public function Get_where($table, $where_array)
    {
        if ($table && is_array($where_array)) {
            $this->db->where($where_array);
        } else {
            return false;
        }

        $q = $this->db->get($table);
        return $q->result();
    }
    public function Delete_where($table,$where)
    {
        if ($table&&$where) {
            $this->db->where($where);
            $this->db->delete($table);
        } else return false;
    }
    public function getFirstRowWhere($table,$where=array())
    {
        if ($table && is_array($where)) {
            $this->db->where($where);
        } else {
            return false;
        }
        $q = $this->db->get($table);
        return $q->first_row();
    }
    public function SelectMax($table, $col)
    {
        if (($table && $col)) {
            $this->db->select_max($col);

            return $this->db->get($table)->first_row()->$col;
        } else return false;
    }

    public function GetData($table, $where = null,$order=null, $limit = null, $offset = null)
    {
        if (is_array($where)) {
            $this->db->where($where);
        }

        if ($limit || $offset) {
            $this->db->limit($limit, $offset);
        }
        if (is_array($order)) {
            $this->db->order_by($order[0],$order[1]);
        }

        $q = $this->db->get($table);
        return $q->result();
    }
    public function GetData2($table, $where = null,$order=null, $limit = null, $offset = null)
    {
        if (!is_array($where)||$where==null) {
            return array();
        }
        $this->db->like($where);
        if ($limit || $offset) {
            $this->db->limit($limit, $offset);
        }
        if (is_array($order)) {
            $this->db->order_by($order[0],$order[1]);
        }

        $q = $this->db->get($table);
        return $q->result();
    }
    public function getLikedPro($in){
        if(is_array($in)){
            $this->db->select('*');
            $this->db->where_in('id',$in);
            $n=$this->db->get('product');
            return $n->result();
        }else return array();

    }


//========================================================================================================



//Get_multi_table('table_name',where_array=aray( 'collum'=>'conditional'),join_array=array( array( ), array( ),.....))
    public function Get_multi_table($table, $where_array, $join_array)
    {

        foreach ($join_array as $v) {

            if (is_array($v)) {

                $this->db->join($v[0], $v[2] . "." . $v[3] . "=" . $v[0] . "." . $v[1], $v[4]);

            } else {
                return false;
            }
        }


        if ($table && is_array($where_array)) {

            $this->db->where($where_array);
        } else {
            return false;
        }

        $q = $this->db->get($table);

        return $q->result();
//        return $this->db->last_query();

    }

    public function getBanner_lang($type){
        $this->db->select('*');
        $this->db->where('type',$type);
        $this->db->where('type',$type);
        $this->db->where('images.lang',$this->language);
        $q = $this->db->get('images');
        return $q->result();
    }
    public function getBanner($type){
        $this->db->select('*');
        $this->db->where('type',$type);

        $q = $this->db->get('images');
        return $q->result();
    }
    public function Count($table, $where = array())
    {
        $q = $this->db->select('*')
            ->from($table)
            ->where($where)
            ->get();
        return $q->num_rows();
    }
    public function Count2($table, $where = null)
    {
        if($where==null || !is_array($where)){
            return 0;
        }
        $this->db->select('*');
        $this->db->from($table);

        $this->db->like($where);
        $q= $this->db->get();
        return $q->num_rows();
    }
//==================================
    public function getAdminAcc($id){

        if($id){
            $this->db->select('id,username,username,email,lastlogin,level');
            $this->db->where('id',$id);
            $q = $this->db->get('nt_admin');
            return $q->first_row();
        }else return false;
    }

    public function getUserModules($admin_id){
        if($admin_id){
            $this->db->where('user_id',$admin_id);
            $q = $this->db->get('user_modules');
            return $q->first_row();
        }else return false;
    }

    public function listAll($table, $limit=null, $offset=null)
    {
        $this->db->select('*');
        if($limit&&$offset){
            $this->db->limit($limit, $offset);
        }

        $this->db->order_by('id', 'desc');
        $q = $this->db->get($table);
        return $q->result();
    }

    public function getList($table)
    {
        $this->db->select('*');
        $q = $this->db->get($table);
        return $q->result();
    }

    public function count_All($table)
    {
        return $this->db->count_all($table);
    }

    public function getItemByID($table, $id)
    {
        $this->db->where('id', $id);
        $q = $this->db->get($table);
        return $q->first_row();
    }

    public function getItemByAlias($table, $alias)
    {
        $this->db->where('alias', $alias);
        $q = $this->db->get($table);
        return $q->first_row();
    }

    public function getFirstRow($table)
    {
        $q = $this->db->get($table);
        return $q->first_row();
    }

    public function getWhere($table, $col, $where)
    {
        $this->db->where($col, $where);
        $q = $this->db->get($table);
        return $q->first_row();
    }

    public function Add($table, $data)
    {
        if (isset($data) && $data != NULL) {
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }
    }

    public function Update($table, $id, $data)
    {
        if (isset($data) && $data != NULL) {
            $this->db->where('id', $id);
            $this->db->update($table, $data);
        }
    }

    public function AddProject($table, $data)
    {
        if (isset($data) && $data != NULL) {
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }
    }
    public function UpdateProject($table, $id, $data)
    {
        if (isset($data) && $data != NULL) {
            $this->db->where('project_id', $id);
            $this->db->update($table, $data);
        }
    }

    public function Delete($table, $id)
    {
        if (is_numeric($id)) {
            $this->db->where('id', $id);
            $this->db->delete($table);
        } else return false;
    }

    public function get_data($tablename,$where=array(),$order=array(),$getfirst=false,$limit=0,$offset=0){
        $this->db->from($tablename);

        if(is_array($where)&&!empty($where)){
            $this->db->where($where);
        }

        if(!empty($order)&&is_array($order)){
            foreach ($order as $field => $val){
                if ($val){
                    $this->db->order_by($field,'desc');
                }else{
                    $this->db->order_by($field,'asc');
                }
            }
        }


        if ($limit){
            if ($offset){
                $this->db->limit($limit,$offset);
            }else{
                $this->db->limit($limit);
            }
        }

        if ($getfirst===true){
            return $this->db->get()->first_row();
        }else{
            return $this->db->get()->result();
        }
    }


    /*============================old tam dao=================================================================================*/

    public function Getdata_old($tablename,$where=array(),$order=array(),$getfirst=false,$limit=0,$offset=0){
        $this->db->from($tablename);

        if(is_array($where)&&!empty($where)){
            $this->db->where($where);
        }

        if(!empty($order)&&is_array($order)){
            foreach ($order as $field => $val){
                if ($val){
                    $this->db->order_by($field,'desc');
                }else{
                    $this->db->order_by($field,'asc');
                }
            }
        }


        if ($limit){
            if ($offset){
                $this->db->limit($limit,$offset);
            }else{
                $this->db->limit($limit);
            }
        }

        if ($getfirst===true){
            return $this->db->get()->first_row();
        }else{
            return $this->db->get()->result();
        }
    }

    public function create($data,$multi=false){
        $result = false;
        if ($multi){
            foreach ($data as &$d){
                $d = $this->checkData($d);
            }

            $result = $this->db->insert_batch($this->tableName,$data);
        }else{
            $data = $this->checkData($data);
            $result = $this->db->insert($this->tableName,$data);
        }

        if ($result){
            return $this->db->insert_id();
        }
        return $result;
    } public function Update2($tablename,$data=array(),$where=array()){
    if(is_array($where)&&!empty($where)){
        $this->db->where($where);
    }else return false;

    $result = $this->db->update($tablename,$data);

    return $result;
}

    public function Delete2($table, $where=array()){
        if(is_array($where)&&!empty($where)){
            $this->db->where($where);
            $this->db->delete($table);
            return true;
        }else return false;

    }
    public function read($where=array(),$order=array(),$getFirst=false,$limit=0,$limit2=0){
        $this->db->from($this->tableName);

        $this->checkWhere($where);
//        $this->db->where($where);
        foreach ($order as $field => $val){
            if (!isset($this->table[$field])){
                $this->error();
            }

            if ($val){
                $this->db->order_by($this->tableName.'.'.$field,'asc');
            }else{
                $this->db->order_by($this->tableName.'.'.$field,'desc');
            }
        }

        if ($limit){
            if ($limit2){
                $this->db->limit($limit,$limit2);
            }else{
                $this->db->limit($limit);
            }
        }
        if ($getFirst){
            return $this->db->get()->first_row();
        }else{
            return $this->db->get()->result();
        }
    }
    protected function checkTableDefine(){
        if (!$this->tableName){
            $this->error();
        }

        if (!is_array($this->table)){
            $this->error();
        }

        foreach ($this->table as $field => $detail){
            if (!$field){
                $this->error();
            }

            if (!is_array($detail)){
                $this->error();
            }

            if (!isset($detail['isIndex']) || !isset($detail['nullable']) ||!isset($detail['type'])){
                $this->error();
            }

            if (!in_array($detail['type'],$this->columnType)){
                $this->error();
            }
        }

        return true;
    }
    private function checkData($data){
        foreach ($data as $field => &$val){
            if (!isset($this->table[$field])){
                $this->error();
            }

            if (!$this->checkType($val, $this->table[$field]['type'])){
                $this->error();
            }

            if (!$this->table[$field]['nullable'] && (is_null($val))){
                $this->error();
            }

            /*if ($this->table[$field]['type'] != 'string'){
                $val = $this->db->escape($val);
            }else{
                $val = $this->db->escape_str($val);
            }*/
        }

        return $data;
    }
    private function checkWhere($where=array()){
        if (!is_array($where)){
            return false;
        }
        foreach ($where as $field => $val){
            if (!isset($this->table[$field])){
                $this->error("Trường không tồn tại $field");
            }

            if (!$this->checkType($val, $this->table[$field]['type'])){
                $this->error("Sai kiểu $field (".$this->table[$field]['type'].") $val");
            }

            if ($this->table[$field]['type'] != 'string'){
                $val = $this->db->escape($val);
            }else{
                $val = $this->db->escape_str($val);
            }
            $like = 0;
            if (strstr($val, '%')) {
                if (($val[0] == '%') && ($val[strlen($val) - 1] == '%')) {
                    $like = 'both';
                    $val = substr($val, 1, strlen($val) - 2);
                } else if ($val[0] == '%') {
                    $like = 'before';
                    $val = substr($val, 1, strlen($val) - 1);
                } else if ($val[strlen($val) - 1] == '%') {
                    $like = 'after';
                    $val = substr($val, 0, strlen($val) - 1);
                }
            }

            if ($like) {
                $this->db->like($this->tableName . '.' . $field, $val, $like);
            } else {
                $this->db->where($this->tableName . '.' . $field, $val);
            }
        }
    }
    private function checkType($val,$type){
        if (!in_array($type,$this->columnType)){
            return false;
        }

        if ($type == 'integer'){
            return is_int((int)$val);
        }else if ($type == 'double'){
            return is_double($val);
        }else if ($type == 'string'){
            return is_string($val);
        }else{
            return false;
        }

        return true;
    }
    private function error($msg=''){
        if ($msg == ''){
            show_error('Định nghĩa bảng không đúng ('.get_class($this).')', 500);
        }else{
            show_error($msg.' ('.get_class($this).')', 500);
        }
    }

} ?>
