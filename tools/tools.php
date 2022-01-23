<?php 
function _log($string) {
    echo "<script>"."console.log('$string')"."</script>";
}

function sql_connect(){
    $conn = mysqli_connect('localhost', 'root', 'root', 'blog');
    //display error if u cant connect to sql server
    // _log(gettype(['a' => 'string']));
    // _log(gettype($conn));
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    return $conn;
}

function printSqlResult($result,$connect) {
    if (!$result){
        echo "Error number:".mysqli_errno($connect);
        echo "Error: " .mysqli_error($connect);
        exit();
    }
    //mysqli_fetch_array get next row, stop when no rows to return
    while($row = mysqli_fetch_array($result))
    {
       print_r($row);
    } 
}



function check_if_user_exists_and_return($user_name, $print_result = false) {
    $link = sql_connect();
    $safe_variable = mysqli_real_escape_string($link,$user_name);
    //use your sql editor to check your query first
    $sql = "SELECT * FROM users where Email='$user_name'";
    //You can print _log($sql) to check query
    $result = mysqli_query($link,$sql);
    //print result to understand it , remove it after
    //printSqlResult($result, $link);
    if (!$result || $result->num_rows == 0 || $result->num_rows>1) {
        return null;
    }
        // output data of each row to array
        $row = mysqli_fetch_array($result);
        //we interested in the first value of the row only 
        if ($print_result) {
            print_r($row);
        }
       return $row;

}
?>