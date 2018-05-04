<?php
namespace modules\guestbook;

use Cross\Module\SQLModule;

class GuestBookModule extends SQLModule
{
    protected $t = 'cp_guestbook';
    protected $cache;
    /**
     * 增删改查
     * @return [type] [description]
     */
    public function usedata(){
    	//调用PDOStatement的fetchAll()方法获取数据
    	// return $this->link->select('*')
	    // ->from($this->t)
	    // ->where(array('id' => 1))
	    // ->groupBy(1)
	    // ->orderBy(1)
	    // ->limit(1)
	    // ->stmt()
	    // ->fetchAll(\PDO::FETCH_ASSOC);
	    // 链式写法可以很放方便的截取生成SQL语句和参数
	    // return $this->link->select('*')
	    // ->from($this->t)
	    // ->where(array('id' => 1))
	    // ->groupBy(1)
	    // ->orderBy(1)
	    // ->limit(1)
	    // ->getSQL();
	    // 简介查询
	    // get(表名,字段,条件)
	    // return $this->link->get($this->t,'url,name',array('id'=>1));
	    // getAll(表名,字段,条件,排序,分组,limit)
	    /*$page=array('p'=>0,'limit'=>2);
	    return $this->link->find($this->t, '*', array(
		    'id'    => array('>', 1),
		), 'id ASC', $page);
		*/
	    //add(表名,数据)返回新增id号
	    // return $this->link->add($this->t,array('name'=>'add','url'=>'www.add.com','content'=>'content'));
	    // 批量添加
	    //  $insert_data=array();
	    //  return $this->link->add($this->t, array(
		//     'fields' => array('name', 'url'),
		//     'values' => array(
		//         array(5, 1),
		//         array(5, 2),
		//         array(5, 3),
		//     )
		// ), true, $insert_data);
		//update
		// return $this->link->update($this->t, array(
		//     'name' => 1, 
		//     'url'    => 2
		// ), array('id'=>1));
		// del(表名,条件,是否批量删除数据,是否开启事务)删除单条记录
		// return $this->link->del($this->t,array('id'=>1));
		// del(表名,条件,是否批量删除数据,是否开启事务)删除多条记录
		/*return $this->link->del($this->t,array(
            'fields'=>array('id'),
            'values'=>array(array(9),array(10),array(11),)
			),true);
		*/
	    //联合查询LEFT JOIN, RIGHT JOIN
	    //简洁风格
	    /*$this->link->getAll('table t LEFT JOIN table_second ts ON t.id=ts.tid', '*', array(
		    't.id' =>  1
		));
		*/
	    //链式查询
	    /*$this->link->select('*')
	    ->from('table t LEFT JOIN table_second ts ON t.id=ts.tid')
	    ->where(array('t.id' => 1))
	    ->stmt()->fetchAll();
	    */
	    //COUNT
	    //$this->link->get(table, 'count(*)', array(....))
	    //$this->link->select('count(*)')->from(table)->stmt()->fetchAll();
    }
    public function redis(){
    	$this->cache->set('a',rand(1,100));
    	print_r($this->cache->get('a'));
    	var_dump($this->cache);  
    }
    public function session(){
        // $this->setAuth('a','qq',5);
        var_dump($this->getAuth('a'));
    }
    public function __construct(){
    	parent::__construct();
    	$this->cache = $this->getModel('redis:cache');
    }
}