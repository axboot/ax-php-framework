<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Tblmapper
 *
 * @author hoksi(hoksi2k@hanamil.net)
 */
class Tblmapper {
    protected $CI;
    protected $table = NULL;
    protected $org_table = NULL;
    protected $_select;
    protected $_set;
    protected $_join;
    protected $_where;
    protected $_group_by;
    protected $_having;
    protected $_order_by;
    protected $_limit;
    protected $_auto_init = true;
    protected $_table_alias = '';
    protected $_paging_header;
    protected $_alias = null;
    protected $_select_table = '';
    protected $db;
    protected $last_query;
    protected $soft_delete = false;
    protected $soft_delete_column = 'deleted_at';
    public $created_at = true;
    protected $created_at_column = 'created_at';
    public $updated_at = true;
    protected $updated_at_column = 'updated_at';

    public function __construct($table = '')
    {
        $this->CI = &get_instance();
        $this->db = $this->CI->db;
        $this->table = $table;
        $this->init();
        $this->_paging_header = array();
    }

    public function set_table($table, $new = false)
    {
        if($new) {
            return new EzCrud_Model($table);
        } else {
            $this->table = $table;

            return $this;
        }
    }

    public function set_alias($alias)
    {
        $this->chk_table();

        $this->org_table = $this->table;
        $this->_alias = $alias;
        $this->table = $this->table . ' AS ' . $alias;

        return $this;
    }
    
    public function set_select_table($select_table)
    {
        $this->_select_table = $select_table;
        
        return $this;
    }

    public function auto_init($value = true)
    {
        $this->_auto_init = $value;

        return $this;
    }
    
    public function enable_soft_delete($mode = true)
    {
        $this->soft_delete = $mode;
        
        return $this;
    }
    
    public function escape($str)
    {
        return $this->db->escape($str);
    }

    public function select($select = '*', $escape = TRUE)
    {
        if(!is_array($select)) {
            if($escape !== false && strpos($select, '.') === false && $this->_select_table != '') {
                $select = $this->_select_table . '.' . $select;
            }
        }

        $this->_select[] = array('select' => $select, 'escape' => $escape);

        return $this;
    }

    public function join($table, $cond, $type = '')
    {
        $this->_join[] = array('table' => $table, 'cond' => $cond, 'type' => $type);

        return $this;
    }

    public function where($key, $value = NULL, $escape = TRUE)
    {
        $this->_where[] = array('key' => $key, 'value' => $value, 'escape' => $escape, 'type' => 'where');

        return $this;
    }

    public function where_in($key = NULL, $values = NULL)
    {
        $this->_where[] = array('key' => $key, 'values' => $values, 'type' => 'in');

        return $this;
    }

    public function like($field, $match = '', $side = 'both')
    {
        $this->_where[] = array('field' => $field, 'match' => $match, 'side' => $side, 'type' => 'like');

        return $this;
    }

    public function group_by($by)
    {
        $this->_group_by[] = array('by' => $by);

        return $this;
    }

    public function having($key, $value = '', $escape = TRUE)
    {
        $this->_having[] = array('key' => $key, 'value' => $value, 'escape' => $escape);

        return $this;
    }

    public function order_by($orderby, $direction = '')
    {
        $this->_order_by[] = array('orderby' => $orderby, 'direction' => $direction);

        return $this;
    }

    public function limit($len, $offset = '')
    {
        $this->_limit = array('len' => $len, 'offset' => $offset);

        return $this;
    }

    public function set($key, $value = '', $escape = TRUE)
    {
        $this->_set[] = array('key' => $key, 'value' => $value, 'escape' => $escape);

        return $this;
    }

    public function get()
    {
        $this->compile_column()->compile_select();

        $rows = $this->db->get($this->table)->result_array();
        $this->init();
        
        $this->last_query = $this->db->last_query();

        return $rows;
    }

    public function get_one()
    {
        $row = $this->limit(1)->get();

        return isset($row[0]) ? $row[0] : false;
    }

    public function get_count()
    {
        $this->compile_select('count')->init();

        $cnt = $this->db->count_all_results($this->table);
        $this->last_query = $this->db->last_query();
        
        return $cnt;
    }

    public function insert($set = NULL)
    {
        $this->compile_set()->init();

        if($this->created_at && $this->created_at_column != null) {
            $this->db->set($this->created_at_column, date('Y-m-d H:i:s'));
        }

        if($this->updated_at && $this->updated_at_column != null) {
            $this->db->set($this->updated_at_column, date('Y-m-d H:i:s'));
        }
        
        $this->db->insert($this->table, $set);
        $this->last_query = $this->db->last_query();

        return $this->db->insert_id();
    }

    public function replace($set = NULL)
    {
        $this->compile_set()->init();

        $this->db->replace($this->table, $set);
        $this->last_query = $this->db->last_query();

        return $this->db->affected_rows();
    }

    public function update($set = NULL)
    {
        $this->compile_set()->compile_where()->init();
        
        if($this->updated_at && $this->updated_at_column != null) {
            $this->db->set($this->created_at_column, date('Y-m-d H:i:s'));
        }
        
        $this->db->update($this->table, $set);
        $this->last_query = $this->db->last_query();

        return $this->db->affected_rows();
    }

    public function delete()
    {
        $this->compile_where()->init();

        if($this->soft_delete && $this->soft_delete_column != null) {
            $this->db->set($this->soft_delete_column, date('Y-m-d H:i:s'));
            $this->db->update($this->table);
        } else {
            $this->db->delete($this->table);
        }
        $this->last_query = $this->db->last_query();

        return $this->db->affected_rows();
    }
    
    public function truncate()
    {
        $this->db->truncate($this->table);
        
        return $this;
    }
    
    public function last_query()
    {
        return $this->last_query;
    }
    
    public function cache_on()
    {
        $this->db->cache_on();
        return $this;
    }
    
    public function cache_off()
    {
        $this->db->cache_off();
        return $this;
    }
    
    public function cache_delete()
    {
        $this->db->cache_delete();
        return $this;
    }

    public function set_paging_header($key, $label, $width = '', $align = 'center', $sort = false, $formatter = '', $tooltip = '', $colHeadTool = false, $indent = false)
    {
        $this->_paging_header[$key] = array(
            'key' => $key,
            'label' => $label,
            'width' => $width,
            'align' => $align,
            'sort' => $sort,
            'formatter' => $formatter,
            'tooltip' => $tooltip,
            'colHeadTool' => $colHeadTool,
            'indent' => $indent
        );

        return $this;
    }

    public function set_paging_order_by($order_by, $default, $dir = 'desc')
    {
        $sort = $this->CI->input->get('sort');
        if(is_array($order_by) && $sort != '' and strstr($sort, '!')) {
            $sort = explode('!', $sort);

            if(isset($order_by[$sort[0]])) {
                return $this->order_by($order_by[$sort[0]], $sort[1]);
            }
        }

        return $this->order_by($default, $dir);
    }        

    public function get_pagination($cur_page = null, $per_page = null, $link_num = 14)
    {
        $qry_str = $this->CI->input->get();
        $cur_page = $cur_page === null ? intval($this->CI->input->get('cur_page')) : $cur_page;
        $per_page = $per_page === null ? intval($this->CI->input->get('per_page')) : $per_page;

        unset($qry_str['cur_page']);
        unset($qry_str['per_page']);

        $cur_page = $cur_page < 1 ? 1 : $cur_page;
        $per_page = $per_page <= 0 ? 10 : $per_page;
        $per_page = $per_page > 1000 ? 1000 : $per_page;
        $mid_range = intval(floor($link_num / 2));

        $total_rows = $this->auto_init(false)->get_count();

        $last_page = intval(ceil($total_rows / $per_page));
        $cur_page = $cur_page > $last_page ? $last_page : $cur_page;

        $mid_range = $mid_range > $last_page ? $last_page : $mid_range;

        $page_list = array();

        $start = $cur_page - $mid_range;
        $end = $cur_page + $mid_range;

        if($start <= 0) {
            $end += abs($start) + 1;
            $start = 1;
        }

        if($end > $last_page) {
            $start -= $end - $last_page;
            $start = $start < 1 ? 1 : $start;
            $end = $last_page;
        }

        $prev_jump = $start - ($mid_range + 1);
        $prev_jump = $prev_jump < 1 ? 1 : $prev_jump;
        $next_jump = $end + $mid_range + 1;
        $next_jump = $next_jump > $last_page ? $last_page : $next_jump;

        for($i = $start; $i <= $end; $i++) {
            $page_list[] = $i;
        }

        $offset = ($cur_page - 1) * $per_page;
        $offset = $offset <= 0 ? null : $offset;
        $data = $this->limit($per_page, $offset)->get();

        $paging_header = array();
        if(!empty($this->_paging_header)) {
            $paging_header = $this->_paging_header;
            $this->_paging_header = array();
        } elseif(empty($this->_paging_header) && isset($data[0])) {
            foreach($data[0] as $k => $v) {
                $paging_header[$k] = array(
                    'key' => $k,
                    'label' => $k,
                    'width' => '20',
                    'align' => 'center',
                    'sort' => false,
                    'formatter' => '',
                    'tooltip' => '',
                    'colHeadTool' => false
                );
            } 
        }

        return array(
            'paging_header' => $paging_header,
            'paging' => array(
                'first_page' => 1,
                'prev_jump' => $prev_jump,
                'prev_page' => $cur_page - 1 < 1 ? 1 : $cur_page - 1,
                'cur_page' => $cur_page,
                'next_page' => $cur_page + 1,
                'next_jump' => $next_jump,
                'last_page' => $last_page,
                'page_list' => $page_list,
                'per_page' => $per_page,
                'total' => $total_rows,
                'qry_str' => !empty($qry_str) ? http_build_query($qry_str) : '',
                'offset' => intval($offset)
            ),
            'data' => $data
        );
    }

    /**
     * protected method
     */

    protected function init()
    {
        if($this->_auto_init) {
            $this->_select = array();
            $this->_join = array();
            $this->_where = array();
            $this->_group_by = array();
            $this->_having = array();
            $this->_order_by = array();
            $this->_limit = array();
            $this->_select_table = '';
            if($this->org_table != NULL) {
                $this->table = $this->org_table;
                $this->org_table = NULL;
                $this->_alias = NULL;
            }
        } else {
            $this->_auto_init = true;
        }
        
        $this->_set = array();

        return $this;
    }

    protected function chk_table()
    {
        if($this->table == NULL) {
            show_error('Not setlect db table!');
        }

        return $this;
    }

    protected function compile_where()
    {
        $this->chk_table();

        // where setup
        if(!empty($this->_where)) {
            foreach($this->_where as $r) {
                if($r['type'] == 'where') {
                    $this->db->where($r['key'], $r['value'], $r['escape']);
                } elseif($r['type'] == 'in') {
                    $this->db->where_in($r['key'], $r['values']);
                } elseif($r['type'] == 'like') {
                    $this->db->like($r['field'], $r['match'], $r['side']);
                }
            }
        }

        return $this;
    }

    protected function compile_select($mode = 'select')
    {
        $this->chk_table()->compile_where();

        // table join setup
        if(!empty($this->_join)) {
            foreach($this->_join as $r) {
                $this->db->join($r['table'], $r['cond'], $r['type']);
            }
        }

        // group by setup
        if(!empty($this->_group_by)) {
            foreach($this->_group_by as $r) {
                $this->db->group_by($r['by']);
            }
        }

        // having setup
        if(!empty($this->_having)) {
            foreach($this->_having as $r) {
                $this->db->having($r['key'], $r['value'], $r['escape']);
            }
        }

        // order by setup
        if($mode == 'select' && !empty($this->_order_by)) {
            foreach($this->_order_by as $r) {
                $this->db->order_by($r['orderby'], $r['direction']);
            }
        }
        
        // soft_delete check
        if($this->soft_delete && $this->soft_delete_column != null) {
            if($this->_alias != NULL) {
                $this->db->where(sprintf("(%s.%s is null)", $this->_alias, $this->soft_delete_column), null, false);
            } elseif(!empty($this->_join)) {
                $this->db->where(sprintf("(%s.%s is null)", $this->table, $this->soft_delete_column), null, false);
            } else {
                $this->db->where(sprintf("(%s is null)", $this->soft_delete_column), null, false);
            }
        }

        // limit setup
        if(!empty($this->_limit)) {
            $this->db->limit($this->_limit['len'], $this->_limit['offset']);
        }
        
        return $this;
    }

    protected function compile_column()
    {
        $this->chk_table();

        // column setup
        if(!empty($this->_select)) {
            foreach($this->_select as $r) {
                $this->db->select($r['select'], $r['escape']);
            }
        }

        return $this;
    }	

    protected function compile_set()
    {
        $this->chk_table();
        if(!empty($this->_set)) {
            foreach($this->_set as $r) {
                $this->db->set($r['key'], $r['value'], $r['escape']);
            }
        }

        return $this;
    }
}