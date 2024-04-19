<?php
/*---------------------------------------------------------------------------------------------------------------------
File: User.php
Written by: Jorge Siverio 2024
Description: This class is responsible for handling the user object.
---------------------------------------------------------------------------------------------------------------------*/
class User{

    //Properties
    private $id;
    private $name;
    private $lastname;
    private $badge;
    private $phone;
    private $email;
    private $wrongPasswordCount;
    private $role;
    private $status;
    private $agency;

    //Constructor
    function __construct($id = null, $name = null, $lastname = null, $badge = null, $phone = null, $email = null, $role = null, $status = null, $agency = null){
        $this->id = $id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->badge = $badge;
        $this->phone = $phone;
        $this->email = $email;
        $this->role = $role;
        $this->status = $status;
        $this->agency = $agency;
    }

    //getters and setters
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = strtolower($name);
    }
    public function getLastname(){
        return $this->lastname;
    }
    public function setLastname($lastname){
        $this->lastname = strtolower($lastname);
    }
    public function getBadge(){
        return $this->badge;
    }
    public function setBadge($badge){
        $this->badge = $badge;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getWrongPasswordCount(){
        return $this->wrongPasswordCount;
    }
    public function setWrongPasswordCount($wrongPasswordCount){
        $this->wrongPasswordCount = $wrongPasswordCount;
    }
    public function getRole(){
        return $this->role;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }

    public function updateUser($conn, $id, $name, $lastname, $badge, $phone, $email, $role, $status, $agency){
        //Standarizing some inputs to follow the DB structure
        $name = strtolower($name);
        $lastname = strtolower($lastname);
        $phone = str_replace(['(',')','-'], '', $phone);

        $sql = "UPDATE users SET name = ?, last_name = ?, badge = ?, phone_number = ?, email = ?, user_type = ?, user_status = ?, agency = ? WHERE users_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "sssssiiii", $name, $lastname, $badge, $phone, $email, $role, $status, $agency, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    public function updateProfile($conn, $id, $name, $lastname, $badge, $phone, $email){
        //Standarizing some inputs to follow the DB structure
        $name = strtolower($name);
        $lastname = strtolower($lastname);
        $phone = str_replace(['(',')','-'], '', $phone);

        $sql = "UPDATE users SET name = ?, last_name = ?, badge = ?, phone_number = ?, email = ? WHERE users_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "sssssi", $name, $lastname, $badge, $phone, $email, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    public function unlockUser($conn, $id){
        $sql = "UPDATE users SET user_status = 1 WHERE users_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }  


    public function suspendUser($conn, $id){
        $sql = "UPDATE users SET user_status = 3 WHERE users_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error";
        }
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function printUserInfo(){
        echo "ID: " . $this->id . "<br>";
        echo "Name: " . $this->name . "<br>";
        echo "Lastname: " . $this->lastname . "<br>";
        echo "Badge: " . $this->badge . "<br>";
        echo "Phone: " . $this->phone . "<br>";
        echo "Email: " . $this->email . "<br>";
        echo "Role: " . $this->role . "<br>";
        echo "Status: " . $this->status . "<br>";
        echo "Agency: " . $this->agency . "<br>";
    } 
}