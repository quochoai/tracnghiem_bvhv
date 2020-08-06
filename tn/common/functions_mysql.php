<?php
#function included every pages
class mysql 
{
	// Define Variables
	var $errno;
	var $error;
	var $error_msg;
	var $link;
	var $sql;
	var $query;
	/*==========================*\
	|| Error Handling Functions ||
	\*==========================*/
	// Get Errors
	function getError() {
		if(empty($this->error))
		{
			$this->errno = mysql_errno();
			$this->error = mysql_error();
		}
		return $this->error.' (code:'.$this->errno.')';
	}
	// Print Error Message
	function printError($msg1,$msg2) {
		printf("<b>ERROR! </b> %s<br/><i>%s</i>", $msg1,$msg2);
		exit;
	}

 	// PHP Equivalent: mysql_connect
	function connect($host, $user, $pass, $db) {
		$this->link = @mysql_connect($host, $user, $pass);
		if(!$this->link) {
			$this->errno = 0;
			$this->error = "Connection failed to " . $host . ".";
			$this->error_msg = $this->errno . ": " . $this->error;
			return $this->printError($this->error_msg,0);
		} elseif(!@mysql_select_db($db, $this->link)) {
			$this->errno = mysql_errno();
			$this->error = mysql_error();
			$this->error_msg = $this->printError($this->getError(),0);
			return $this->error_msg;
		} else {
			return $this->link;
		}
	}
	
	function close() {
		mysql_close($this->link);
	}
    
	function query($sql) {  
		$query = @mysql_query($sql);
		if(!$query) {
			$this->error_msg = $this->printError($this->getError(),$sql);
			return $this->error_msg;
		} else {
			return $query;
		}
	}
    function query_mysql($select,$table, $where = '1=1') {
	    $sql = "select $select from $table where $where";   
		$query = @mysql_query($sql);
		if(!$query) {
			$this->error_msg = $this->printError($this->getError(),$sql);
			return $this->error_msg;
		} else {
			return $query;
		}
	}
	function affected_rows() {
		return mysql_affected_rows($this->link);
	}
	
	function escape_string($string) {
		return mysql_escape_string($string);
	}
    
	function fetch_array($query) {
		return mysql_fetch_array($query);
	}
    
	function fetch_field($query, $offset) {
		$query = mysql_fetch_field($query, $offset);
		if(!$query) {
			$this->errno = 0;
			$this->error = "No information available!";
			$this->error_msg = $this->errno . ": " . $this->error;
			return $this->printError($this->error_msg,0);
		} else {
			return $query;
		}
	}
	
	function fetch_row($query) {
		return mysql_fetch_row($query);
	}
	
	function fetch_assoc($query) {
		return mysql_fetch_assoc($query);
	}
	
	function field_name($query, $offset) {
		return mysql_field_name($query, $offset);
	}
	
	function free_result($query) {
		mysql_free_result($query);
	}
	
	function list_fields($db_name,$table_name) {
		mysql_list_fields($db_name,$table_name);
	}

	function insert_id() {
		return mysql_insert_id();
	}

	function num_fields($query) {
		return mysql_num_fields($query);
	}
	
	function num_rows($query) {
		return mysql_num_rows($query);
	}

	function real_escape_string($string) {
		return mysql_real_escape_string($string, $this->link);
	}

	function result($query,$x,$field) {
		return @mysql_result($query,$x, $field);
	}

	function result_array($query,$x,$string_field) {
		$string_array = explode(",",$string_field);
		foreach ($string_array as $string_id=>$string_value) {
			$result[$string_value] = $this->result($query,$x,$string_value);
		}
		return $result;
	}
	
	function insert($data = array(),$table){
		$key = "";
		$value = "";
		foreach($data as $k => $v){
			$key .= "," . $k;
			$value .= ",'" . str_replace("'","\'",trim($v))  ."'";
		}
		if($key{0} == ",") $key{0} = "(";
		$key .= ")";
		if($value{0} == ",") $value{0} = "(";
		$value .= ")";
		$sql = "insert into ".$table.$key." values ".$value;
		$query = $this->query($sql);
		return $query;
	}
	
	function update($data = array(),$table,$where=""){
		$values = "";
		foreach($data as $k => $v){
			$values .= ", " . $k . " = '" . str_replace("'","\'",trim($v))  ."' ";
		}
		if($values{0} == ",") $values{0} = " ";
		$sql = "update " . $table . " set " . $values.$where;
		$query = $this->query($sql);
		return $query;
	}
	
	function delete($table,$where){
		$sql = "delete from " . $table . $where;
		$query = $this->query($sql);
		return $query;
	}
	
	function mahoa($p) {
		$mk = "#*@".$p."#@*";
		$pass = md5($mk);
		$p1 = substr($pass,2,17);
		$pass1 = md5($p1);
		$p2 = substr($pass1,4,13);
		$pass2 = md5($p2);
		$p3 = substr($pass2,8,19)."!@#$";
		$pass3 = md5($p3);
		$p4 = substr($pass3,5,16);
		$pass4 = md5($p4);
		$password = $pass4.":".substr($pass3,3,20)."#$*@!";
		return $password;
	}
	function login_user($user, $password, $table = 'profiles', $column_user = 'profile_code', $column_password = 'password')
    {
	   $password = mahoa($password);
       $su = $this->query("select id, department_id, title_id, profile_code, password, fullname, birthday, role, active from $table where $column_user = '$user' and active = 1");
       $nu = $this->num_rows($su);
       if($nu){
            $ru = $this->fetch_array($su);
            $pass = $ru['password'];
            if($password == $pass) {
                $_SESSION['is_logined'] = $ru;
                echo '1';
            }
            else echo '3'; 
       } else echo '2';
	}
    
    function insertData($data = array(),$table){
		$key = "";
		$value = "";
        $created_at = $updated_at = strtotime(date("Y-m-d H:i:s"));
        foreach($data as $k => $v){
			$key .= "," . $k;
			$value .= ",'" . str_replace("'","\'",trim($v))  ."'";
		}
        $key .= ",created_at";
        $value .= ",'" .$created_at."'";
        $key .= ",updated_at";
        $value .= ",'" .$updated_at."'";
		if($key{0} == ",") $key{0} = "(";
		$key .= ")";
		if($value{0} == ",") $value{0} = "(";
		$value .= ")";
		$sql = "insert into ".$table.$key." values ".$value;
		$query = $this->query($sql);
		return $query;
	}
    function insertDataBy($data = array(),$table, $user_id){
		$key = "";
		$value = "";
        $created_at = $updated_at = strtotime(date("Y-m-d H:i:s"));
        foreach($data as $k => $v){
			$key .= "," . $k;
			$value .= ",'" . str_replace("'","\'",trim($v))  ."'";
		}
        $key .= ",created_by";
        $value .= ",'" .$user_id."'";
        $key .= ",updated_by";
        $value .= ",'" .$user_id."'";
        $key .= ",created_at";
        $value .= ",'" .$created_at."'";
        $key .= ",updated_at";
        $value .= ",'" .$updated_at."'";
		if($key{0} == ",") $key{0} = "(";
		$key .= ")";
		if($value{0} == ",") $value{0} = "(";
		$value .= ")";
		$sql = "insert into ".$table.$key." values ".$value;
		$query = $this->query($sql);
		return $query;
	}
    function updateData($data = array(), $table, $where = ""){
        $values = "";
		foreach($data as $k => $v){
			$values .= ", " . $k . " = '" . str_replace("'","\'",trim($v))  ."' ";
		}
        $value .=", updated_at = '" .strtotime(date("Y-m-d H:i:s")) ."' "; 
		if($values{0} == ",") $values{0} = " ";
		$sql = "update " . $table . " set " . $values.$where;
		$query = $this->query($sql);
		return $query;
	}
    function updateDataBy($data = array(), $table, $where = "", $user_id){
        $values = "";
		foreach($data as $k => $v){
			$values .= ", " . $k . " = '" . str_replace("'","\'",trim($v))  ."' ";
		}
        $value .=", updated_by = '" .$user_id ."' ";
        $value .=", updated_at = '" .strtotime(date("Y-m-d H:i:s")) ."' "; 
		if($values{0} == ",") $values{0} = " ";
		$sql = "update " . $table . " set " . $values.$where;
		$query = $this->query($sql);
		return $query;
	}
    function softDelete($table, $where){
        $deleted_at = strtotime(date("Y-m-d H:i:s"));
        $values = " deleted_at = '".strtotime(date("Y-m-d H:i:s"))."'";
        $sql = "update " . $table . " set " . $values.$where;
		$query = $this->query($sql);
		return $query;
	}
    function softDeleteBy($table, $where, $user_id){
        $deleted_at = strtotime(date("Y-m-d H:i:s"));
        $values = " deleted_by = '".$user_id."' ";
        $values .= ", deleted_at = '".strtotime(date("Y-m-d H:i:s"))."' ";
        $sql = "update " . $table . " set " . $values.$where;
		$query = $this->query($sql);
		return $query;
	}
    // count nums profile active and deleted_at is null
    function number_profile_active()
    {
        $s = $this->query("select count(id) as num_profile from profiles where active = 1 and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r['num_profile'];
    }
    
    // count nums candidate
    function number_candidates()
    {
        $s = $this->query("select count(id) as num_candidate from profiles where active = 1 and deleted_at is null and active_exam = 1");
        $r = $this->fetch_array($s);
        return $r['num_candidate'];
    }
    
    // count number questions
    function number_questions()
    {
        $s = $this->query("select count(id) as num_question from qandas where deleted_at is null");
        $r = $this->fetch_array($s);
        return $r['num_question'];
	}
	// get data questions
    function getQuestions()
    {
        $data = array();
        $s = $s = $this->query("select * from qandas where deleted_at is null order by id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
	}
	// get data question by id
    function getQuestionById($id) 
    {
        $s = $this->query("select * from qandas where id = $id and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r;
        
	}
	// get data question by question
    function getNumberByQuestion($question) 
    {
        $s = $this->query("select * from qandas where question = '$question' and deleted_at is null");
        $n = $this->num_rows($s);
        return $n;
        
    }
    // blocks
    // count number block
    function number_blocks()
    {
        $s = $this->query("select count(id) as num_block from departments where block_id = 0 and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r['num_block'];
    }
    // get data blocks
    function getBlocks()
    {
        $data = array();
        $s = $s = $this->query("select id, name from departments where block_id = 0 and deleted_at is null");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
    }
    // get data block by id
    function getBlockById($id) 
    {
        $s = $this->query("select id, name from departments where block_id = 0 and id = $id and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r;
        
    }
    // get data block by name
    function getBlockByName($name) 
    {
        $s = $this->query("select id, name from departments where block_id = 0 and name = '$name' and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r;
        
    }
    // count number department
    function number_departments()
    {
        $s = $this->query("select count(id) as num_department from departments where block_id != 0 and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r['num_department'];
    }
    // get data departments
    function getDepartments()
    {
        $data = array();
        $s = $s = $this->query("select id, block_id, name from departments where block_id != 0 and deleted_at is null");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
	}
	// get data distinct departments
    function getDistinctDepartments()
    {
        $data = array();
        $s = $s = $this->query("select distinct(name), id, block_id from departments where block_id != 0 and deleted_at is null");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
    }
    // get data department by id
    function getDepartmentById($id) 
    {
        $s = $this->query("select id, block_id, name from departments where block_id != 0 and id = $id and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r;
        
	}
	// get data department by name
    function getDepartmentByName($name) 
    {
        $s = $this->query("select id, block_id, name from departments where block_id != 0 and name = '$name' and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r;
        
	}
	// get data department by blockid
    function getDepartmentByBlockId($block_id) 
    {
		$data = array();
        $s = $this->query("select id, block_id, name from departments where block_id = $block_id and deleted_at is null");
        while($r = $this->fetch_array($s)) {
			array_push($data, $r);
		}
        return $data;
        
    }
    // count number titles
    function number_titles()
    {
        $s = $this->query("select count(id) as num_title from titles where deleted_at is null");
        $r = $this->fetch_array($s);
        return $r['num_title'];
    }
    // get data titles
    function getTitles()
    {
        $data = array();
        $s = $s = $this->query("select id, name, name_short from titles where deleted_at is null");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
    }
    // get data titles not
    function getTitlesNotIn($title_id)
    {
        $data = array();
        $s = $s = $this->query("select id, name, name_short from titles where id NOT IN ($title_id) and deleted_at is null");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
    }
    // get data title by id
    function getTitleById($id) 
    {
        $s = $this->query("select id, name, name_short from titles where id = $id and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r;
        
	}
	// get data title by name
    function getTitleByName($name) 
    {
        $s = $this->query("select id, name, name_short from titles where name = '$name' and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r;
        
	}
	// get data profiles
    function getProfiles()
    {
        $data = array();
        $s = $this->query("select id, block_id, department_id, title_id, profile_code, fullname, birthday, role, active, active_exam, email, phone from profiles where id != 1 and deleted_at is null order by id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
	}
    // get data profiles exam
    function getProfilesExam()
    {
        $data = array();
        $s = $this->query("select id, block_id, department_id, title_id, profile_code, fullname, birthday, role, active, active_exam, email, phone from profiles where id != 1 and active = 1 and active_exam = 1 and deleted_at is null order by id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
	}
    // get data profiles block_id and department_id
    function getProfilesBlockDepartment($block_id, $department_id)
    {
        $data = array();
        $s = $this->query("select id, block_id, department_id, title_id, profile_code, fullname, birthday, role, active, active_exam, email, phone from profiles where id != 1 and block_id = $block_id and department_id = $department_id and active = 1 and active_exam = 1 and deleted_at is null order by id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
	}
    // get data profiles block_id
    function getProfilesBlock($block_id)
    {
        $data = array();
        $s = $this->query("select id, block_id, department_id, title_id, profile_code, fullname, birthday, role, active, active_exam, email, phone from profiles where id != 1 and block_id = $block_id and active = 1 and active_exam = 1 and deleted_at is null order by id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
	}
    // get data profiles department_id
    function getProfilesDepartment($department_id)
    {
        $data = array();
        $s = $this->query("select id, block_id, department_id, title_id, profile_code, fullname, birthday, role, active, active_exam, email, phone from profiles where id != 1 and department_id = $department_id and active = 1 and active_exam = 1 and deleted_at is null order by id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
	}
	// getProfilesRole
	function getProfilesRole($id)
    {
		$data = array();
		$ss = $this->query("select block_id, department_id from profiles where id = $id and deleted_at is null");
		$rs = $this->fetch_array($ss);
		$block_id = $rs['block_id'];
		$department_id = $rs['department_id'];
        $s = $this->query("select id, block_id, department_id, title_id, profile_code, fullname, birthday, role, active, active_exam, email, phone from profiles where id NOT IN (1, $id) and block_id = $block_id and department_id = $department_id and deleted_at is null order by id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
	}
	// get data profile by id
    function getProfileById($id) 
    {
        $s = $this->query("select * from profiles where id = $id and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r;
        
	}
	// get data profile has exist
    function profileExist($profile_code)
    {
		$s = $this->query("select id from profiles where profile_code = '$profile_code' and deleted_at is null order by id desc");
		$n = $this->num_rows($s);
        return $n;
	}
	// get data profile has exist not id
    function profileExistId($profile_code, $id)
    {
		$s = $this->query("select id from profiles where profile_code = '$profile_code' and id != $id and deleted_at is null order by id desc");
		$n = $this->num_rows($s);
        return $n;
	}
	// active or inactive profile with id
    function profileActive($id)
    {
		$s = $this->query("select active from profiles where id = $id and deleted_at is null");
		$r = $this->fetch_array($s);
		$active = $r['active'];
		if ($active == 1) {
			$ss = $this->query("update profiles set active = 0 where id = $id");
			$text_active = '<a title="Click để kích hoạt tài khoản"><i class="fas fa-square btn-danger clsactive" data-id="'.$id.'" style="cursor:pointer;"></i></a>';
		} else {
			$ss = $this->query("update profiles set active = 1 where id = $id");
			$text_active = '<a title="Click để hủy kích hoạt tài khoản"><i class="fas fa-check-square btn-success clsactive" data-id="'.$id.'" style="cursor:pointer;"></i></a>';
		}
		return $text_active;
	}
	// active or inactive exam profile with id
    function profileActiveExam($id)
    {
		$s = $this->query("select active_exam from profiles where id = $id and deleted_at is null");
		$r = $this->fetch_array($s);
		$active = $r['active_exam'];
		if ($active == 1) {
			$ss = $this->query("update profiles set active_exam = 0 where id = $id");
			$text_active = '<a title="Click để được thi"><i class="fas fa-square btn-danger clsactive_exam" data-id="'.$id.'" style="cursor:pointer;"></i></a>';
		} else {
			$ss = $this->query("update profiles set active_exam = 1 where id = $id");
			$text_active = '<a title="Click để không được thi"><i class="fas fa-check-square btn-success clsactive_exam" data-id="'.$id.'" style="cursor:pointer;"></i></a>';
		}
		return $text_active;
    }
    // count number exams
    function number_exams()
    {
        $s = $this->query("select count(id) as num_exam from exams where deleted_at is null");
        $r = $this->fetch_array($s);
        return $r['num_exam'];
    }
	
	// get data exams
    function getExams()
    {
        $data = array();
        $s = $this->query("select id, name, start_date, end_date, exam_time, exam_code, result, created_by from exams where deleted_at is null order by id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
	}
	// get data exam by id
    function getExamById($id) 
    {
        $s = $this->query("select * from exams where id = $id and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r;        
	}
    // show/hide result exam
    function examActiveResult($id)
    {
		$s = $this->query("select result from exams where id = $id and deleted_at is null");
		$r = $this->fetch_array($s);
		$result = $r['result'];
		if ($result == 1) {
			$ss = $this->query("update exams set result = 0 where id = $id");
			$text_result = '<a title="Click để hiển thị kết quả thi của tất cả thí sinh dự thi kì thi này"><i class="fas fa-square btn-danger clsactive_result" data-id="'.$id.'" style="cursor:pointer;"></i></a>';
		} else {
			$ss = $this->query("update exams set result = 1 where id = $id");
			$text_result = '<a title="Click để ẩn kết quả thi của tất cả thí sinh dự thi kì thi này"><i class="fas fa-check-square btn-success clsactive_result" data-id="'.$id.'" style="cursor:pointer;"></i></a>';
		}
		return $text_result;
	}
	// get data exams block
    function getExamsBlock()
    {
        $data = array();
        $s = $this->query("select * from exam_block where deleted_at is null order by id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
	}
	// get data exam block by id
    function getExamBlockById($id) 
    {
        $s = $this->query("select * from exam_block where id = $id and deleted_at is null");
        $r = $this->fetch_array($s);
        return $r;        
	}
    // update department_id exam block
    function updateDepartmentExamBlock($text_department, $text_replace)
    {
        $s = $this->query("select id, department_id from exam_block where department_id like '%$text_department%'");
        $n = $this->num_rows($s);
        if ($n) {
            while ($r = $this->fetch_array($s)) {
                $data['department_id'] = str_replace($text_department, $text_replace, $r['department_id']);
                $this->update($data, "exam_block", " where id = ".$r['id']);
            }
        }
        
    }
    // update title_id exam block
    function updateTitleExamBlock($text_title, $text_replace)
    {
        $s = $this->query("select id, title_id from exam_block where title_id like '%$text_title%'");
        $n = $this->num_rows($s);
        if ($n) {
            while ($r = $this->fetch_array($s)) {
                $data['title_id'] = str_replace($text_title, $text_replace, $r['title_id']);
                $this->update($data, "exam_block", " where id = ".$r['id']);
            }
        }
        
    }
    // update title_id construct exam
    function updateTitleConstructExam($text_title, $text_replace)
    {
        $s = $this->query("select id, title_id from construct_exam where title_id like '%$text_title%'");
        $n = $this->num_rows($s);
        if ($n) {
            while ($r = $this->fetch_array($s)) {
                $data['title_id'] = str_replace($text_title, $text_replace, $r['title_id']);
                $this->update($data, "construct_exam", " where id = ".$r['id']);
            }
        }
        
    }
    // update knowledge qandas
    function updateKnowledgeQandas($text_knowledge, $text_replace)
    {
        $s = $this->query("select id, knowledge from qandas where knowledge = '$text_knowledge'");
        $n = $this->num_rows($s);
        if ($n) {
            while ($r = $this->fetch_array($s)) {
                $data['knowledge'] = $text_replace;
                $this->update($data, "qandas", " where id = ".$r['id']);
            }
        }
        
    }
    // update knowledge construct exam
    function updateKnowledgeConstructExam($text_knowledge, $text_replace)
    {
        $s = $this->query("select id, construct from construct_exam where construct like '%$text_knowledge%'");
        $n = $this->num_rows($s);
        if ($n) {
            while ($r = $this->fetch_array($s)) {
                $data['construct'] = str_replace($text_title, $text_replace, $r['construct']);
                $this->update($data, "construct_exam", " where id = ".$r['id']);
            }
        }
        
    }
    // get last exam
    function getLastExam()
    {
        $s = $this->query("select * from exams where deleted_at is NULL order by id desc");
        $r = $this->fetch_array($s);
        return $r;
    }
    
    // get results follow exam
    function getResultsByExam($exam_id)
    {
        $data = array();
        $s = $this->query("select * from results where exam_id = $exam_id and deleted_at is null order by point desc, id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
    }
    // get results follow exam and department
    function getResultsByExamDepartment($exam_id, $block_id, $department_id)
    {
        $data = array();
        $s = $this->query("select * from results where exam_id = $exam_id and block_id = $block_id and department_id = $department_id and deleted_at is null order by point desc, id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
    }
    // get results passed follow exam
    function getResultsPassedByExam($exam_id, $point)
    {
        $data = array();
        $s = $this->query("select * from results where exam_id = $exam_id and point >= $point  and deleted_at is null order by point desc, id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
    }
    // get results passed follow exam and department
    function getResultsPassedByExamDepartment($exam_id, $block_id, $department_id, $point)
    {
        $data = array();
        $s = $this->query("select * from results where exam_id = $exam_id and block_id = $block_id and department_id = $department_id and point >= $point and deleted_at is null order by point desc, id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
    }
    // get results failed follow exam
    function getResultsFailedByExam($exam_id, $point)
    {
        $data = array();
        $s = $this->query("select * from results where exam_id = $exam_id and point < $point  and deleted_at is null order by point desc, id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
    }
    // get results failed follow exam and department
    function getResultsFailedByExamDepartment($exam_id, $block_id, $department_id, $point)
    {
        $data = array();
        $s = $this->query("select * from results where exam_id = $exam_id and block_id = $block_id and department_id = $department_id and point < $point and deleted_at is null order by point desc, id desc");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
    }
    
    // get exam profiles
    function getExamProfiles($profile_id)
    {
        $data = array();
        $ss = $this->query("select block_id, department_id, title_id from profiles where id = $profile_id and deleted_at is null");
        $ns = $this->num_rows($ss);
        if ($ns) {
            $rs = $this->fetch_array($ss);
            $block_id = $rs['block_id'];
            $department_id = $rs['department_id'];
            $title_id = $rs['title_id'];
            $dp = $this->getDepartmentById($department_id);
            $dpss = $department_id.'-'.$dp['name'];
            $tt = $this->getTitleById($title_id);
            $ttss = $title_id.'-'.$tt['name'];
            //$s = $this->query("select exam_id, block_id, start_date, end_date, number_questions, number_answer_right, point from exam_block as e INNER JOIN results as r ON e.exam_id = r.exam_id and e.block_id = r.block_id where e.department_id like '%$dpss%' and title_id like '%$ttss%' and e.deleted_at is null");
            $s = $this->query("select id, exam_id, block_id, department_id, start_date, end_date, time_exam from exam_block where block_id = $block_id and department_id like '%$dpss%' and title_id like '%$ttss%' and deleted_at is null order by exam_id desc");
            while ($r = $this->fetch_array($s)){
                $exam_id = $r['exam_id'];
                $sr = $this->query("select number_questions, number_answer_right, point from results where exam_id = $exam_id and block_id = $block_id and department_id = $department_id and profile_id = $profile_id order by id desc");
                $nr = $this->num_rows($sr);
                if ($nr) {
                    $rr = $this->fetch_array($sr);
                    $data1 = array("id"=>$r['id'], "exam_id" => $r['exam_id'], "block_id" => $r['block_id'], "department_id" => $department_id, "title_id" => $title_id, "start_date" => $r['start_date'], "end_date" => $r['end_date'], 'time_exam' => $r['time_exam'], "number_questions" => $rr['number_questions'], "number_answer_right" => $rr['number_answer_right'], "point" => $rr['point']);    
                } else {
                    $data1 = array("id"=>$r['id'], "exam_id" => $r['exam_id'], "block_id" => $r['block_id'], "department_id" => $department_id, "title_id" => $title_id, "start_date" => $r['start_date'], "end_date" => $r['end_date'], 'time_exam' => $r['time_exam'], "number_questions" => 0, "number_answer_right" => 0, "point" => 0);
                }
                array_push($data, $data1);
            }
        }
        return $data;
    }
    
    // get knowledge
    function getKnowledge()
    {
        $data = array();
        $s = $this->query("select id, name from knowledges where deleted_at is null order by id");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
    }
    // get knowledge by id
    function getKnowledgeById($id)
    {
        $s = $this->query("select id, name from knowledges where id = $id and deleted_at is null order by id");
        $r = $this->fetch_array($s);
        return $r;
    }
    // get knowledge not in
    function getKnowledgeNotIn($knowledge)
    {
        $data = array();
        $s = $this->query("select id, name from knowledges where name NOT IN ($knowledge) and deleted_at is null order by id");
        while($r = $this->fetch_array($s)) {
            array_push($data, $r);
        }
        return $data;
    }
    // get ConstructExam
    function getConstructExam($exam_id)
    {
        $data = array();
        $s = $this->query("select id, title_id, construct from construct_exam where active = 1 and exam_id = $exam_id order by id");
        $n = $this->num_rows($s);
        if ($n) {
            while ($r = $this->fetch_array($s)) {
                array_push($data, $r);
            }
        }
        return $data;
    }
    // get ConstructExam Not Id
    function getConstructExamNotId($exam_id, $id)
    {
        $data = array();
        $s = $this->query("select id, title_id, construct from construct_exam where active = 1 and exam_id = $exam_id and id != $id order by id");
        $n = $this->num_rows($s);
        if ($n) {
            while ($r = $this->fetch_array($s)) {
                array_push($data, $r);
            }
        }
        return $data;
    }
    // get ConstructExamById
    function getConstructExamById($id)
    {
        $s = $this->query("select id, exam_id, title_id, construct, active from construct_exam where active = 1 and id = $id order by id");
        $r = $this->fetch_array($s);
        return $r;
    }
}
