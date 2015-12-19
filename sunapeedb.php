<?php

class SunapeeDB
{
    const HOST = "sunapee.cs.dartmouth.edu";
    const USER = "iamlbj";
    const PASS = "910911";
    const DB   = "iamlbj_db";
    private $con = NULL;

    public function connect()
    {
        $this->con = mysql_connect(self::HOST, self::USER, self::PASS);
        if(!$this->con) { die("SQL Error: " . mysql_error()); }
        mysql_select_db(self::DB, $this->con);
        mysql_set_charset("utf8mb4");
    }

    public function get_table($table)
    {
	   if($this->con === NULL) { return; }

	   $result = mysql_query("SELECT * FROM $table;");

	   if(!$result) { die("SQL Error: " . mysql_error()); }

	   if(!strcmp($table,"FLIGHT")) $this->print_flight_table($result);
       else $this->print_table($result);

	   mysql_free_result($result);
    }

    public function insert_student($id, $name, $dept, $credits)
    {
        if($this->con === NULL) { return false; }
        $result = mysql_query("INSERT INTO student (ID, name, dept_name, tot_cred) VALUES (" . $id . ",\"" . $name . "\",\"" . $dept . "\"," . $credits . ");");
        if(!$result) { die("SQL Error: " . mysql_error()); }
        mysql_free_result($result);
        return true;
    }

    private function print_flight_table($result)
    {
        print("<table class='table table-striped'>\n<thead><tr>");
        //print("<th>FLIGHT ID</th>");
        print("<th>FLIGHT CODE</th>");
        print("<th>FLIGHT CAPACITY</th>");
        print("<th>DEPATURE</th>");
        print("<th>ARRIVAL</th>");
        print("<th>LEAVE TIME</th>");
        print("<th>ARRIVE TIME</th>");
        // for($i=0; $i < mysql_num_fields($result); $i++) {
        //     print("<th>" . mysql_field_name($result, $i) . "</th>");
        // }
        print("<th>Action</th>");
        print("</tr></thead>\n");
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            print("\t<tr>\n");
            $i = 0;
            for($i = 1; $i < mysql_num_fields($result); $i++) {
                print("\t\t<td>$row[$i]</td>\n");
            }
            print("<form action='' method='post'>");
            print("\t\t<td><button class='btn btn-sm btn-primary' type=submit name='book' value=$row[0]>Book</button>");
            // print("<button class='btn btn-sm' type=submit name='cancel' value=$row[0]>Cancel</button></td>\n");
            print("</form>");
            print("\t</tr>\n");
        }
        print("</table>\n");
    }

    private function print_emp_flight_table($result)
    {
        print("<table class='table table-striped'>\n<thead><tr>");
        //print("<th>FLIGHT ID</th>");
        print("<th>FLIGHT CODE</th>");
        print("<th>FLIGHT CAPACITY</th>");
        print("<th>DEPATURE</th>");
        print("<th>ARRIVAL</th>");
        print("<th>LEAVE TIME</th>");
        print("<th>ARRIVE TIME</th>");
        // for($i=0; $i < mysql_num_fields($result); $i++) {
        //     print("<th>" . mysql_field_name($result, $i) . "</th>");
        // }
        print("<th>Action</th>");
        print("</tr></thead>\n");
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            print("\t<tr>\n");
            $i = 0;
            for($i = 1; $i < mysql_num_fields($result); $i++) {
                print("\t\t<td>$row[$i]</td>\n");
            }
            print("<form action='passenger.php' method='post'>");
            print("\t\t<td><button class='btn btn-sm btn-primary' type=submit name='retreive' value=$row[0]>Retreive List</button>");
            print("</form>");
            print("\t</tr>\n");
        }
        print("</table>\n");
    }

    private function print_historyORfuture($result)
    {
        print("<table class='table table-striped'>\n<thead><tr>");
        //print("<th>FLIGHT ID</th>");
        print("<th>FLIGHT CODE</th>");
        print("<th>FLIGHT CAPACITY</th>");
        print("<th>DEPATURE</th>");
        print("<th>ARRIVAL</th>");
        print("<th>LEAVE TIME</th>");
        print("<th>ARRIVE TIME</th>");
        // for($i=0; $i < mysql_num_fields($result); $i++) {
        //     print("<th>" . mysql_field_name($result, $i) . "</th>");
        // }
        print("<th>Action</th>");
        print("</tr></thead>\n");
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            print("\t<tr>\n");
            $i = 0;
            for($i = 1; $i < mysql_num_fields($result); $i++) {
                print("\t\t<td>$row[$i]</td>\n");
            }
            print("<form action='' method='post'>");
            print("\t\t<td><button class='btn btn-sm btn-primary' type=submit name='cancel' value=$row[0]>Cancel</button>");
            print("</form>");
            print("\t</tr>\n");
        }
        print("</table>\n");
    }

    private function print_passenger_table($result)
    {
        print("<table class='table table-striped'>\n<thead><tr>");
        //print("<th>FLIGHT ID</th>");
        print("<th>First Name</th>");
        print("<th>Last Name</th>");
        print("<th>Email Address</th>");
        // for($i=0; $i < mysql_num_fields($result); $i++) {
        //     print("<th>" . mysql_field_name($result, $i) . "</th>");
        // }
        print("</tr></thead>\n");
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            print("\t<tr>\n");
            for($i = 0; $i < mysql_num_fields($result); $i++) {
                print("\t\t<td>$row[$i]</td>\n");
            }
        }
        print("</table>\n");
    }

    private function print_popular_table($result)
    {
        print("<table class='table table-striped'>\n<thead><tr>");
        //print("<th>FLIGHT ID</th>");
        print("<th>FLIGHT CODE</th>");
        print("<th>DEPATURE</th>");
        print("<th>ARRIVAL</th>");
        print("<th>LEAVE TIME</th>");
        print("<th>ARRIVE TIME</th>");
        print("<th>RESERVATION TIMES</th>");
        // for($i=0; $i < mysql_num_fields($result); $i++) {
        //     print("<th>" . mysql_field_name($result, $i) . "</th>");
        // }
        print("</tr></thead>\n");
        $count = 0;
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            if($count > 4) continue;
            print("\t<tr>\n");
            for($i = 0; $i < mysql_num_fields($result); $i++) {
                print("\t\t<td>$row[$i]</td>\n");
            }
            $count = $count + 1;
        }
        print("</table>\n");
    }

    private function print_table($result)
    {
        print("<table>\n<thead><tr>");
        for($i=0; $i < mysql_num_fields($result); $i++) {
            print("<th>" . mysql_field_name($result, $i) . "</th>");
        }
        print("</tr></thead>\n");

        while ($row = mysql_fetch_assoc($result)) {
            print("\t<tr>\n");
            foreach ($row as $col) {
                print("\t\t<td>$col</td>\n");
            }
            print("\t</tr>\n");
        }
        print("</table>\n");
    }

    public function disconnect()
    {
        if($this->con != NULL) { mysql_close($this->con);}
    }

    public function isCust($userName, $userPassword){
        $result = mysql_query("SELECT * FROM PEOPLE WHERE PEOPLE_EMAIL = '$userName';");
        if(!$result) return 0;
        else{
            if(!mysql_num_rows($result)){
                echo "<script>alert('no records found');</script>";
                return 0;
            }
            else{
                while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
                    if($row[1] != $userPassword){
                        echo "<script>alert('password wrong');</script>";
                        return 0;
                    }
                    if($row[5] == 0){
                        $_SESSION["user_type"] = 1;
                        $_SESSION["user_id"] = $row[0];
                        //print_r($_SESSION);
                        return 3;
                    }
                    if($row[5] == 1){
                        $_SESSION["user_type"] = 2;
                        $_SESSION["user_id"] = $row[0];
                        //print_r($_SESSION);
                        return 4;
                    }
                    else{
                        return 0;
                    }
                }
            }
        }
        return false;
    }

    public function getFlight($leaveCity, $arriveCity, $startDate, $endDate){
        $result = mysql_query("SELECT FLIGHT_ID, FLIGHT_CODE, FLIGHT_CAP, FLIGHT_FROM, FLIGHT_TO, FLIGHT_LEADATE, FLIGHT_ARRDATE FROM FLIGHT NATURAL JOIN ROUTE WHERE FLIGHT_FROM = '$leaveCity' AND FLIGHT_TO = '$arriveCity' AND FLIGHT_LEADATE BETWEEN '$startDate' AND '$endDate';");
        if(!mysql_num_rows($result)){
            echo "<script>alert('no records found');</script>";
        }
        else{
            $this->print_flight_table($result);
        }
    }

    public function getEmpFlight($leaveCity, $arriveCity, $startDate, $endDate){
        $result = mysql_query("SELECT FLIGHT_ID, FLIGHT_CODE, FLIGHT_CAP, FLIGHT_FROM, FLIGHT_TO, FLIGHT_LEADATE, FLIGHT_ARRDATE FROM FLIGHT NATURAL JOIN ROUTE WHERE FLIGHT_FROM = '$leaveCity' AND FLIGHT_TO = '$arriveCity' AND FLIGHT_LEADATE BETWEEN '$startDate' AND '$endDate';");
        if(!mysql_num_rows($result)){
            echo "<script>alert('no records found');</script>";
        }
        else{
            $this->print_emp_flight_table($result);
        }
    }

    public function book($userID,$flightID){
        // $pre = mysql_query("SELECT * FROM RESERVATION WHERE CUST_ID = $userID AND FLIGHT_ID = $flightID;");
        // if(!empty(pre)){
        //     echo "<script>alert('Already Booked Flight!!!');</script>";
        //     return;
        // }
        $result = mysql_query("INSERT INTO RESERVATION (CUST_ID, FLIGHT_ID, RESV_DATE) VALUES ($userID,$flightID,NOW());");
        if (!$result) {
            $error = mysql_errno();
            //print $error;
            if($error == 1644) echo "<script>alert('Flight already full!!!');</script>";
            else echo "<script>alert('Already Booked Flight!!!');</script>";
        } else {
            // $result0 = mysql_query("SELECT FLIGHT_PAMOUNT FROM FLIGHT WHERE FLIGHT_ID = $flightID;");
            // $cap = 0;
            // $cur = 0;
            // $row = mysql_fetch_array($result0, MYSQL_NUM);
            // $cap = $row[2];
            // $cur = $row[3];
            // if($cur >= $cap){
            //     print $cur;
            //     print $cup;
            //     echo "<script>alert('Flight already full!!!');</script>";
            //     return;
            // }
            echo "<script>alert('Book Successfully');</script>";
        }
    }

    public function cancel($userID,$flightID){
        $result = mysql_query("DELETE FROM RESERVATION WHERE CUST_ID = $userID AND FLIGHT_ID = $flightID;");
        if($result && mysql_affected_rows()) {
            echo "<script>alert('Cancel Successfully');</script>";
        } else{
            echo "<script>alert('No Booking records found, cancel fail.');</script>";
        }
    }

    public function getHistory($userID){
        $result = mysql_query("SELECT FLIGHT_ID, FLIGHT_CODE, FLIGHT_CAP, FLIGHT_FROM, FLIGHT_TO, FLIGHT_LEADATE, FLIGHT_ARRDATE FROM FLIGHT NATURAL JOIN RESERVATION NATURAL JOIN ROUTE WHERE CUST_ID = $userID AND FLIGHT_LEADATE < NOW();");
        if(!mysql_num_rows($result)){
            echo "<script>alert('no records found');</script>";
        }
        else{
            $this->print_historyORfuture($result);
        }
    }

    public function getFuture($userID){
        $result = mysql_query("SELECT FLIGHT_ID, FLIGHT_CODE, FLIGHT_CAP, FLIGHT_FROM, FLIGHT_TO, FLIGHT_LEADATE, FLIGHT_ARRDATE FROM FLIGHT NATURAL JOIN RESERVATION NATURAL JOIN ROUTE WHERE CUST_ID = $userID AND FLIGHT_LEADATE > NOW();");
        if(!mysql_num_rows($result)){
            echo "<script>alert('no records found');</script>";
        }
        else{
            $this->print_historyORfuture($result);
        }
    }

    public function getList($flightID){
        $result = mysql_query("SELECT PEOPLE.PEOPLE_FNAME, PEOPLE.PEOPLE_LNAME, PEOPLE.PEOPLE_EMAIL FROM RESERVATION, PEOPLE WHERE RESERVATION.CUST_ID = PEOPLE.PEOPLE_ID AND RESERVATION.FLIGHT_ID = $flightID;");
        if(!mysql_num_rows($result)){
            echo "<script>alert('this flight is empty');</script>";
        }
        else{
            $this->print_passenger_table($result);
        }
    }

    public function getPopular($startTime,$endTime){
        $result = mysql_query("SELECT FLIGHT.FLIGHT_CODE, ROUTE.FLIGHT_FROM, ROUTE.FLIGHT_TO, FLIGHT.FLIGHT_LEADATE, FLIGHT.FLIGHT_ARRDATE, COUNT(*) AS times FROM (RESERVATION INNER JOIN FLIGHT ON RESERVATION.FLIGHT_ID = FLIGHT.FLIGHT_ID) INNER JOIN ROUTE ON FLIGHT.FLIGHT_CODE = ROUTE.FLIGHT_CODE WHERE FLIGHT.FLIGHT_LEADATE BETWEEN '$startTime' AND '$endTime' GROUP BY RESERVATION.FLIGHT_ID ORDER BY times DESC;");
        if(!mysql_num_rows($result)){
            echo "<script>alert('no flight in the database');</script>";
        }
        else{
            $this->print_popular_table($result);
        }
    }
}
?>
