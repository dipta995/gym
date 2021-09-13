<?php 
include_once 'db.php';
class EmployeeClass extends DB
{
        public $db;
        public function __construct()
        {
            $conn = $this->connect();
        }

        public function createnewEmployee($data,$file)
        {
            $emp_name = mysqli_real_escape_string($this->conn, $data['emp_name']);
            $emp_job_status = mysqli_real_escape_string($this->conn, $data['emp_job_status']);
            $emp_email = mysqli_real_escape_string($this->conn, $data['emp_email']);
            $emp_phone = mysqli_real_escape_string($this->conn, $data['emp_phone']);
            $emp_salary = mysqli_real_escape_string($this->conn, $data['emp_salary']);
            $emp_address = mysqli_real_escape_string($this->conn, $data['emp_address']);
            $def="+8801";
            $mobileno = $def.$emp_phone;
            $query = "SELECT * FROM employee_table WHERE emp_email='$emp_email' OR emp_phone='$emp_phone'";
            $res = $this->conn->query($query);
            // $querya = "SELECT * FROM employee_table WHERE  mobile='$mobile'";
            // $resa = $this->conn->query($querya);
        
    
            if (empty($emp_name) || empty($emp_job_status) || empty($emp_email) || empty($emp_phone) || empty($emp_salary) || empty($emp_address)) {
                    $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                    return $txt;
            }elseif (!preg_match ("/^[a-zA-z ]*$/", $emp_name) ){
                $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</span>";
                return $txt;
            } elseif (mysqli_num_rows($res)>0){
                $txt = "<span style='color:red; font-size: 15px;'>This Email Already been Registered </span>";
                return $txt;
            }
             elseif ( strlen ($emp_phone) != 9) {  
                return "<span style = 'color:red';>Mobile must have 9 digits.</span>";  
                         
            } elseif ( strlen ($emp_address) > 200) {  
                return "<span style = 'color:red';>200 Degit limitation</span>";  
                         
            } 
            
            else{
    
                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $file['image']['name'];
                $file_size = $file['image']['size'];
                $file_temp = $file['image']['tmp_name'];
    
                $div            = explode('.', $file_name);
                $file_ext       = strtolower(end($div));
                $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "img/".$unique_image;
                $move_image = "img/".$unique_image;
               
    
               
               if(empty($file_ext)){
                    $txt = "<span style='color:red; font-size: 15px;'>Image is required</span>";
                    return $txt;
               }else{
                    move_uploaded_file($file_temp, $move_image);
               
                    $qry = "INSERT into employee_table(emp_name,emp_job_status,emp_email,emp_phone,emp_image,emp_salary,emp_address) values('$emp_name','$emp_job_status','$emp_email','$mobileno','$uploaded_image','$emp_salary','$emp_address')";
                    $result = $this->conn->query($qry);
                    if($result){
                        $txt = "<div class='alert alert-success'>Successfully Employee Created</div>";
                        return $txt;
                    }
                }
                }
        }

        public function viewEmployee()
        {
            $qry = "SELECT * FROM employee_table ";
            $result = $this->conn->query($qry);
            return $result;
        }

        // public function Payemployee($id)
        // {
        //     $month = mysqli_real_escape_string($this->db, $data['month']);
		// 	$year = mysqli_real_escape_string($this->db, $data['year']);
		// 	if (empty($month)|| empty($year)) {
		// 		$txt = "<span style = 'color:red';>No result Found</span>";
		// 		return $txt;
		// 	}else{
		// 		$qry = "SELECT * from salary_table LEFT JOIN employee_table ON employee_table.ID = salary_table.e_ID where  month like '%{$month}%' and  year like '%{$year}%' ";
		// 	$result = $this->db->query($qry);
		// 	return $result;
		// 	}
            
        // }
        public function viewSalary($month,$year){
			$qry = "SELECT * FROM salary_table LEFT JOIN employee_table ON employee_table.emp_id = salary_table.emp_id  where  month like '%{$month}%' and  year like '%{$year}%' ";
			$result = $this->conn->query($qry);
			return $result;
		}
        public function employeeViewbyid($id){
			$qry = "SELECT * from employee_table where emp_id = '$id'";
			$result = $this->conn->query($qry);
			$value = mysqli_fetch_assoc($result);
			return $value;
		}
        public function salaraycheck($emp_id)
        {
            $month = date('F');
            $year = date('Y');
            $result = $this->conn->query("SELECT * FROM salary_table WHERE month = '$month' && year = '$year' && emp_id = '$emp_id'");
            return mysqli_num_rows($result);
        }
        public function insertSalary($data){
			$emp_id = mysqli_real_escape_string($this->conn, $data['emp_id']);
			$month = mysqli_real_escape_string($this->conn, $data['month']);
			$salary = mysqli_real_escape_string($this->conn, $data['salary']);
			$year = mysqli_real_escape_string($this->conn, $data['year']);

			if (empty($salary) || empty($year)) {
				$txt = "<span style = 'color:red';>Field must not be empty</span>";
				return $txt;
			}else{
				$result = $this->conn->query("SELECT * FROM salary_table WHERE month = '$month' && year = '$year' && emp_id = '$emp_id'");
                
                if(mysqli_num_rows($result)>0){
                    $txt = "<div class='alert alert-danger'>Month and Year already exist</div>";
                    return $txt;
                }else{
					$qry = "INSERT into salary_table(emp_id,month,salary,year)
                	values('$emp_id','$month','$salary','$year')";
                	$result = $this->conn->query($qry);
					if($result){
						$txt = "<div class='alert alert-success'>Successfully inserted</div>";
                    	return $txt;
					}
					
				}
            }
		}
        public function trainer()
        {
            $qry = "SELECT * from employee_table where emp_job_status = 'Instructtor'";
			$result = $this->conn->query($qry);
            return $result;
        }

        public function deleteSalary($id){
			$qry = "DELETE FROM salary_table WHERE salary_id='$id'";
			$delsalary =$this->conn->query($qry);
			if($delsalary){
                $txt = "<span style='color:green; font-size: 15px;'>Successfully Deleted</span>";
                return $txt;
            }
		}
}