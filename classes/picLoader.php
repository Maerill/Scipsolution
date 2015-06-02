<?php
/*
 * Class Profilpic
 */

class picLoader {

    public function getProfilPicByCurrentUser(Database $dbconnection, $user) {
        $sqlPicId = "SELECT profilPicId FROM tbl_users WHERE id=?";
        $paramsPicId = $user;
        $profilPicId = $dbconnection->query_execute($sqlPicId, $paramsPicId);

        $sqlProfilPicPath = "SELECT p.picPath FROM tbl_pic p LEFT JOIN tbl_users u ON u.id = p.userId WHERE u.id=? AND p.id=?";
        $paramsPic = [$user, $profilPicId];
        $profilPic = $dbconnection->query_execute($sqlProfilPicPath, $paramsPic);

        return $profilPic;
    }

    public function getAllPicsOffUser(Database $dbconnection, $user) {

        $sql = "SELECT picPath FROM tbl_pic WHERE userId=?";
        $params = $user;
        $allPics = $dbconnection->query_execute($sql, $params);

        foreach($allPics as $pic){
            $arrayPic = array_fill(0,1,$pic);
        }

        return $arrayPic;
    }

    public function getAllPics(Database $dbconnection){
        $sql = "SELECT picPath FROM tbl_pic";
        $allPics = $dbconnection->query_execute($sql);

        foreach($allPics as $pic){
            $arrayPic = array_fill(0,1,$pic);
        }

        return $allPics;
    }
}