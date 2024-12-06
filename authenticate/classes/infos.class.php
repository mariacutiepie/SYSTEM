<?php
require_once "database.class.php";

class Infos
{
    public $user_id = '';
    public $lastname = "";
    public $firstname = "";
    public $middleini = "";
    public $section = "";
    public $birthday = "";
    public $bio = "";
    public $contact = "";
    public $email = "";
    public $elem = "";
    public $high = "";
    public $college = "";
    public $shs = "";
    private $conn;
   
    function __construct()
    {
        $db = new Database;
        $this->conn = $db->connect();
    }
    function add()
    {
        $sql = "INSERT INTO infos(user_id, lastname, firstname, middleini, section, birthday, bio, contact, email, elem, high, shs, college) VALUES (:user_id, :lastname, :firstname, :middleini, :section, :birthday, :bio, :contact, :email, :elem, :high, :shs, :college)";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':user_id', $this->user_id);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middleini', $this->middleini);
        $query->bindParam(':section', $this->section);
        $query->bindParam(':birthday', $this->birthday);
        $query->bindParam(':bio', $this->bio);
        $query->bindParam(':contact', $this->contact);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':elem', $this->elem);
        $query->bindParam(':high', $this->high);
        $query->bindParam(':shs', $this->shs);
        $query->bindParam(':college', $this->college);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function account(){
        $sql = "SELECT * FROM infos WHERE user_id = :user_id";
        $query = $this->conn->prepare($sql);
        $query->bindParam(':user_id', $this->user_id);

        $query->execute();
        return $query->fetch(); 
    }
}
