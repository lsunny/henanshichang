<?php
/**
 * @author webrx mysql pdo
 * $pager = new Pager ( $pdo, 'guestbook', 'gid asc', "gemail != ''", 1, $currpage, 'gid,gname,gemail',10 );
 * 说明:$conn 是数据库链接
 *      'guestbook' 代表表名
 *      'gid asc'  代表排序字段 DESC 降序
 *      "gemail != '' " 代表条件
 *      1 代表 每页几条记录，如果不写默认是10
 *      $currpage 代表当前页
 *      'gid,gname,gemail' 查询结果字段列表
 *      10 代表默认显示10页，必须偶数数字 如果不写默认是8
 *      输出分页效果是 $pager->page(); 或 $pager->pagenum();
 *      include 'Pager.pdo.class.php';
 *      $dsn = "mysql:host=localhost;dbname=tdeast";
 *      $option = array (PDO::MYSQL_ATTR_INIT_COMMAND => 'set names gbk');
 *      $user = "root";
 *      $password = "";
 *      $pdo = "";
 *      try {
 *      	$pdo = new pdo ( $dsn, $user, $password, $option );
 *      } catch ( Exception $e ) {
 *      	echo "数据库链接失败";
 *      	exit ();
 *      }
 *      $currpage = isset($_GET['p']) ? $_GET['p'] : 1;
 *      $pager = new Pager ( $pdo, 'goods', 'gid asc', "1=1", 1, $currpage);
 *      echo '<pre>';
 *      $row = $pager->query();
 *      print_r($row);
 *      //$pager->page();
 *      $pager->pagenum();
 */
class Pager {
	private $recordcount;
	private $pagecount;
	private $pagesize;
	private $currpage;
	private $table;
	private $propertylist;
	private $order;
	private $where;
	private $pdo;
	private $css;
	private $psize;
	private $type;
	
	
	public function getType(){
		return $this->type;
	}
	
	public function setType($type){
	    $this->type=$type;	
	}
	
	
	/**
	 *
	 * @return the $psize
	 */
	public function getPsize() {
		return $this->psize;
	}
	
	/**
	 *
	 * @param field_type $psize        	
	 */
	public function setPsize($psize) {
		$this->psize = $psize;
	}
	
	/**
	 *
	 * @return the $order
	 */
	public function getOrder() {
		return $this->order;
	}
	
	/**
	 *
	 * @return the $pdo
	 */
	public function getPdo() {
		return $this->pdo;
	}
	
	/**
	 *
	 * @param field_type $pdo        	
	 */
	public function setPdo($pdo) {
		$this->pdo = $pdo;
	}
	
	/**
	 *
	 * @return the $css
	 */
	public function getCss() {
		$css = <<<end
<style>
<!--
a.pager:link, a.pager:visited, a.pager:active { color: #00f; text-decoration: none; font-size: 12px; padding: 4px; border: 1px solid #e7ecf0; width: 20px; height: 20px; text-align: center; text-decoration: none; margin: 2px; }
a.pager:hover { margin: 2px; text-decoration: none; font-size: 12px; padding: 4px; border: 1px solid #e7ecf0; width: 20px; height: 20px; text-align: center; color: red; }
a.pagernext:link, a.pagernext:visited, a.pagernext:active { margin: 2px; color: #00f; text-decoration: none; font-size: 12px; padding: 4px; border: 1px solid #e7ecf0; width: 55px; height: 20px; text-align: center; text-decoration: none; }
a.pagernext:hover { margin: 2px; text-decoration: none; font-size: 12px; padding: 4px; border: 1px solid #e7ecf0; width: 55px; height: 20px; text-align: center; color: red; }
.currpage { margin: 2px; text-decoration: none; font-size: 12px; padding: 4px; border: none; width: 20px; height: 20px; color: #000; font-weight: 800; text-align: center; font-weight: 800; }
.currpagegray { margin: 2px; text-decoration: none; font-size: 12px; padding: 4px; border: none; width: 20px; height: 20px; color:#c3c3c3; font-weight: 800; text-align: center; font-weight: 800; }
.pagetextred {color:#f00;}
-->
</style>
end;
		return $css;
	}
	
	/**
	 *
	 * @return the $propertylist
	 */
	public function getPropertylist() {
		return $this->propertylist;
	}
	
	/**
	 *
	 * @param field_type $propertylist        	
	 */
	public function setPropertylist($propertylist) {
		$this->propertylist = $propertylist;
	}
	
	/**
	 *
	 * @return the $where
	 */
	public function getWhere() {
		return $this->where;
	}
	
	/**
	 *
	 * @param field_type $order        	
	 */
	public function setOrder($order) {
		$this->order = $order;
	}
	
	/**
	 *
	 * @param field_type $where        	
	 */
	public function setWhere($where) {
		$this->where = $where;
	}
	public function __construct($pdo, $table, $order, $where, $pagesize = 10, $currpage = 1, $propertylist = '*', $psize = 8,$type='') {
		$this->setType($type);
		$this->setPsize ( $psize );
		$this->setPdo ( $pdo );
		$this->setTable ( $table );
		$this->setPagesize ( $pagesize );
		$this->setOrder ( $order );
		$this->setWhere ( $where );
		$this->setPropertylist ( $propertylist );
		$q = "select count(*) from " . $this->getTable () . " where " . $this->getWhere ();
		$pdo = $this->getPdo ();
		$result = $pdo->query ( $q );
		$r = $result->fetchColumn ();
		$this->setRecordcount ( $r );
		$p = ceil ( $this->getRecordcount () / $this->getPagesize () );
		$this->setPagecount ( $p );
		
		$currpage = $currpage <= 1 ? 1 : $currpage;
		$currpage = $currpage >= $this->getPagecount () ? $this->getPagecount () : $currpage;
		$this->setCurrpage ( $currpage );
	}
	public function query() {
		$start = $this->getCurrpage () * $this->getPagesize () - $this->getPagesize ();
		$end = $this->getPagesize ();
		$qq = "select " . $this->getPropertylist () . " from " . $this->getTable () . " where " . $this->getWhere () . " order by " . $this->getOrder () . " limit $start,$end";
		$pdo = $this->getPdo ();
		$query = $pdo->query ( $qq );
		if ($query) {
			$result = $query->fetchAll ( PDO::FETCH_NUM );
			return $result;
		} else {
			return array();
		}
	}
	public function page() {
		if ($this->getRecordcount () == 0) {
			echo '无数据';
			return;
		}
		echo $this->getCss ();
		echo "<span class='currpagegray'>[当前<span class='pagetextred'>" . $this->getCurrpage () . "</span>页/共" . $this->getPagecount () . "页]</span>&nbsp;&nbsp;";
		echo "<a class='pagernext' href='?p=1'>首页</a>&nbsp;";
		echo "<a class='pagernext' href='?p=" . ($this->getCurrpage () + 1) . "'>下页</a>&nbsp;";
		echo "<a class='pagernext' href='?p=" . ($this->getCurrpage () - 1) . "'>上页</a>&nbsp;";
		echo "<a class='pagernext' href='?p=" . $this->getPagecount () . "'>末页</a>&nbsp;";
		echo "<span class='currpagegray'>[共" . $this->getRecordcount () . "条]</span>";
	}
	public function pagenum() {
		if ($this->getRecordcount () == 0) {
			echo '无数据';
			return;
		}
		echo $this->getCss ();
		if ($this->getCurrpage () > 1) {
			echo "<a class='pagernext' href='?p=" . ($this->getCurrpage () - 1) . "'>&lt;上一页</a>";
		}
		$i = 0;
		$psizes = $this->getPsize ();
		$ppnum = $psizes / 2;
		$pnum = 0;
		$sss = $this->getCurrpage () > $psizes ? $this->getCurrpage () - $ppnum : $this->getCurrpage ();
		$sss = ($this->getPagecount () - $this->getCurrpage ()) < $psizes ? $this->getCurrpage () - ($this->getPagecount () - $this->getCurrpage ()) : $this->getCurrpage ();
		$sss = $this->getCurrpage () < $psizes ? 1 : $this->getCurrpage () - $ppnum;
		
		if ($this->getCurrpage () >= $psizes) {
			echo "<a class='pager' href='?".$this->getType()."p=1'>1</a>";
			echo "<a class='pager' href='?".$this->getType()."p=1'>...</a>";
		}
		
		for($i = $sss; $i <= $this->getPagecount (); $i ++) {
			if ($i > $this->getPagecount ()) {
				break;
			} else if (++ $pnum > $psizes) {
				if (($this->getPagecount () - $ppnum) != $this->getCurrpage ()) {
					break;
				}
			}
			if ($this->getCurrpage () == $i) {
				echo "<span class='currpage'>" . $i . "</span>";
			} else {
				echo "<a class='pager' href='?".$this->getType()."p=" . $i . "'>" . $i . "</a>";
			}
		}
		if ($this->getCurrpage () < $this->getPagecount () && $i < $this->getPagecount ()) {
			echo "<a class='pager' href='?".$this->getType()."p=" . $this->getPagecount () . "'>...</a>";
			echo "<a class='pager' href='?".$this->getType()."p=" . $this->getPagecount () . "'>" . $this->getPagecount () . "</a>";
			echo "<a class='pagernext' href='?".$this->getType()."p=" . ($this->getCurrpage () + 1) . "'>下一页&gt;</a>";
		} else if ($this->getCurrpage () < $this->getPagecount ()) {
			echo "<a class='pagernext' href='?".$this->getType()."p=" . ($this->getCurrpage () + 1) . "'>下一页&gt;</a>";
		}
		// echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='currpage'>共" .
		// $this->getRecordcount () . "条</span>";
	}
	
	/**
	 *
	 * @return the $recordcount
	 */
	public function getRecordcount() {
		return $this->recordcount;
	}
	
	/**
	 *
	 * @return the $pagecount
	 */
	public function getPagecount() {
		return $this->pagecount;
	}
	
	/**
	 *
	 * @return the $pagesize
	 */
	public function getPagesize() {
		return $this->pagesize;
	}
	
	/**
	 *
	 * @return the $currpage
	 */
	public function getCurrpage() {
		return $this->currpage;
	}
	
	/**
	 *
	 * @return the $table
	 */
	public function getTable() {
		return $this->table;
	}
	
	/**
	 *
	 * @param field_type $recordcount        	
	 */
	public function setRecordcount($recordcount) {
		$this->recordcount = $recordcount;
	}
	
	/**
	 *
	 * @param field_type $pagecount        	
	 */
	public function setPagecount($pagecount) {
		$this->pagecount = $pagecount;
	}
	
	/**
	 *
	 * @param field_type $pagesize        	
	 */
	public function setPagesize($pagesize) {
		$this->pagesize = $pagesize;
	}
	
	/**
	 *
	 * @param field_type $currpage        	
	 */
	public function setCurrpage($currpage) {
		$this->currpage = $currpage;
	}
	
	/**
	 *
	 * @param field_type $table        	
	 */
	public function setTable($table) {
		$this->table = $table;
	}
}