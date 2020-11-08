<?php
// Create connection
$con = mysqli_connect("localhost","root","","ekoaplikacija");
$GLOBALS['con'] = mysqli_connect("localhost","root","","ekoaplikacija");

function getGetUserDataById($userId) {
    $result = $GLOBALS['con']->query("SELECT * FROM user WHERE id = " . $userId . ";");
    $row = $result->fetch_assoc();
    return $row["username"];
}

//TODO: complete
function getUserRang($userId, $actionId) {

}

//TODO: complete
function getUserActionScore($userId, $actionId) {
    
}

function returnRandom($min, $max) {
    return rand($min, $max);
}

function getMonths($noOfMonths) {
    $query = "SELECT DISTINCT MONTHNAME(startTime) as monthName from cleaningaction ORDER BY startTime DESC LIMIT " . $noOfMonths . ";";
    $result = $GLOBALS['con']->query($query);
    while($row = $result->fetch_assoc()) {
        $monthArray[] = $row["monthName"];
    }
    return $monthArray;
}

function getNumberOfHours($userId) {
    $query = "SELECT SUM(b.final) as result FROM (SELECT c.name, ((HOUR(c.endTime)-HOUR(c.startTime))*DATEDIFF(c.endTime, c.startTime)) as final
                FROM cleaningaction c WHERE id in (SELECT p.idAction FROM participation p WHERE p.idUser = " . $userId . ")) as b";
    
    $result = $GLOBALS['con']->query($query);
    $row = $result->fetch_assoc();
    return $row["result"];
}

function getLatestAction($userId) {
    $query = "SELECT DATE_FORMAT(c.endTime, '%d.%m.%Y') as result
                FROM cleaningaction c WHERE c.id IN (SELECT p.idAction FROM participation p WHERE p.idUser = 1) 
                ORDER BY c.endTime DESC LIMIT 1";

    $result = $GLOBALS['con']->query($query);
    $row = $result->fetch_assoc();
    return $row["result"];
}

function getActiveActions() {
    $query = "SELECT c.name, DATE_FORMAT(c.startTime, '%k.%i') as startHour, DATE_FORMAT(c.endTime, '%k.%i') as endHour, DATE_FORMAT(c.startTime, '%d.%m.%Y') as date FROM `cleaningaction` c WHERE startTime > CURDATE()";
    $result = $GLOBALS['con']->query($query);
    while($row = $result->fetch_assoc()) {
        $action[] = $row;
    }

    return $action;
}

function getCurrentAction(){
    $query = "SELECT MONTHNAME(c.startTime) as monthName, c.id FROM cleaningaction c WHERE c.startTime <= CURDATE() AND c.endTime >= CURDATE()";
    $result = $GLOBALS['con']->query($query);
    $row = $result->fetch_assoc();
    return $row;
}

function getCountUsersByAction($actionId) {
    $query = "SELECT COUNT(p.idUser) as noUsers FROM participation p WHERE p.idAction = 1";
    $result = $GLOBALS['con']->query($query);
    $row = $result->fetch_assoc();
    return $row["noUsers"];
}

function getLeaderboardFroAction($actionId) {
    $query = "SELECT u.username FROM user u WHERE u.id in (
        SELECT p.idUser FROM participation p WHERE p.idAction = " . $actionId . ");";

    $result = $GLOBALS['con']->query($query);
    $rowcount = mysqli_num_rows($result)*2;
    $step = 100/$rowcount;
    $base = 100;
    
    while($row = $result->fetch_assoc()) {
        $min = $base - $step;
        $max = $base + $step;
        $tempArray["name"] =  $row["username"];
        $tempArray["score"] = rand($min, $max);
        $users[] = $tempArray;

        $base -= 7.5;
    }

    return $users;
}

function getUsersTrashCount($actionId) {
    $query = "SELECT u.username FROM user u WHERE u.id in (
        SELECT p.idUser FROM participation p WHERE p.idAction = " . $actionId . ");";

    $result = $GLOBALS['con']->query($query);
    while($row = $result->fetch_assoc()) {
        $tempArray["name"] =  $row["username"];
        $thrashcount = rand(1, 5);
        $thrashData = [];
        for($i = 0; $i < $thrashcount; $i++) {
            $thrashData[] = rand(0, 1);
        }
        $tempArray["thrashCount"] = $thrashData;
        
        $users[] = $tempArray;
    }

    return $users;
}

?> 