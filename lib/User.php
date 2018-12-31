<?php
/**
 * Created by PhpStorm.
 * User: null
 * Date: 12/30/2018
 * Time: 12:33 AM
 */

class User
{

    protected $db;

    /**Init database for class user
     * Heras
     */
    public function __constructs()
    {
        $sql["driver"] = "mysql";
        $sql["host"] = "localhost";
        $sql["user"] = "root";
        $sql["pass"] = "";
        $sql["base"] = "heras";
        $sql["options"] = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );
        $this->bdd = new PDO($sql["driver"] . ":host=" . $sql["host"] . ";dbname=" . $sql["base"], $sql["user"], $sql["pass"], $sql["options"]);
    }

    private function getInfo($user)
    {
        $sql = $this->db->prepare("select * from tUsers where username=?");
        $sql->execute(array($user));
        $data = $sql->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function register($user, $pass, $name, $address, $phone, $email, $city, $country)
    {
        $data = $this->getInfo($user);
        if ($data != false) {
            $sql = $this->db->prepare("insert into tUsers (username,password,address,phone,email,city,country) value(?,?,?,?,?,?,?)");
            $sql->execute(array($user, $pass, $name, $address, $phone, $email, $city, $country));
            return true;
        } else {
            return false;
        }
    }

    public function login($user, $pass)
    {
        $data = $this->getInfo($user);
        if (($data == false) or ($data['password'] != $pass)) {
            return false;
        } elseif ($data['password'] == $pass) {
            return true;
        }
    }

    public function updateInfo($user, $col, $value)
    {
        $query = ("update tUsers set " . $col . "=? where username=?");
        $sql = $this->db->prepare($query);
        $sql->execute(array($value));
    }

    public function checkAndBet($user, $amount)
    {
        $data = $this->getInfo($user);
        if (($data['balance'] - $amount) >= 0) {
            $newBalance = $data['balance'] - $amount;
            updateInfo($user, "balance", $newBalance);
            return true;
        } else {
            return false;
        }
    }

}