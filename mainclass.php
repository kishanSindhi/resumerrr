<?php 
    class mainclass{
        private $con;
        function __construct()
        {
            try {
                $this->con = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            } catch (MongoDB\Driver\Exception\Exception $e) {
                echo $e->getMessage();
            }
        }
        function regUser($name, $email , $ph, $uname, $password)
        {
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert(array("name"=>$name, "email"=>$email, "ph"=>$ph, "uname"=>$uname, "password"=>$password));
            $r = $this->con->executeBulkWrite("resumer.usermaster", $bulk);
            return $r->getInsertedCount();
        }
        function login($uname, $password) 
        {
            $filter = array("uname"=>$uname, "password"=>$password);
            $query = new MongoDB\Driver\Query($filter);
            $r = $this->con->executeQuery('resumer.usermaster', $query);
            return count($r->toArray());
        }
        function storeData($uname, $name, $post, $address, $ph, $dob, $hobbies, $skills, $languages, $professionalSummary, $empHistory, $educationDetails)
        {
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->insert(array("uname"=>$uname, "name"=>$name, "post"=>$post, "address"=>$address, "ph"=>$ph, "dob"=>$dob, "hobbies"=>$hobbies, "skills"=>$skills, "languages"=>$languages, "professionalSummary"=>$professionalSummary, "empHistory"=>$empHistory, "educationalDetails"=>$educationDetails));
            $r = $this->con->executeBulkWrite("resumer.resume", $bulk);
            return $r->getInsertedCount();
        }
        function showResume($uname)
        {
            $filter = array('uname' => $uname);
            $query = new MongoDB\Driver\Query($filter);
            $r = $this->con->executeQuery("resumer.resume", $query);
            return $r->toArray();
        }
    }
?>