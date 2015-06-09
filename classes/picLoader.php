<?php
/*
 * Class picLoader
 */

class picLoader {

    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getProfilePicByUser($userId) {
        $sqlPicId = "SELECT profilePicId FROM tbl_users WHERE id=?";
        $result = $this->database->query_execute($sqlPicId, [$userId]);

        if(isset($result->profilePicId)) {
            $profilePicId = $result->profilePicId;
            $sqlProfilePicPath = "SELECT picPath FROM tbl_pic WHERE id=?";
            $profilePic = $this->database->query_execute($sqlProfilePicPath, [$profilePicId]);

            return $profilePic->picPath;
        }

        return null;
    }

    public function getAllPicsOffUser($userId) {

        $sql = "SELECT picPath FROM tbl_pic WHERE userId=?";
        $allPics = $this->database->query_execute($sql, $userId);

        while ($row = $allPics->fetch_object())
        {
            $arrayPic = array_fill(0,1,$row);
        }

        return $arrayPic;
    }

    public function getAllPics(){
        $sql = "SELECT picPath FROM tbl_pic";
        $allPics = $this->database->query_execute($sql);

        foreach($allPics as $pic){
            $arrayPic = array_fill(0,1,$pic);
        }

        return $allPics;
    }
}