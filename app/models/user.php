<?php
require __DIR__ . '/roles.php';
//code is set up for PHPMyadmin; might have to change if we use a different database
class User implements \JsonSerializable {

    private int $id;
    // private Role $role;
    private string $username;
    private string $password;
    private int $phoneNumber;
    private string $address;
    private date $registrationDate;

    #[ReturnTypeWillChange]

    public function jsonSerialize() {
        $vars = get_object_vars($this);

        return $vars;
    }

    public function getId():int {
        return $this->id;
    }
    public function setId(int $id):self {
        $this->id = $id;
        return $this;
    }

    // public function getRole():Role {
    //     return $this->role;
    // }
    // public function setRole(int $role):self { //i am really not sure if this works; must test
    //     $this->role = Role::tryFrom($role);
    //     return $this;
    // }

    public function getUsername():string {
        return $this->username;
    }
    public function setUsername(string $username):self {
        $this->username = $username;
        return $this;
    }

    public function getPassword():string {
        return $this->password;
    }
    public function setPassword(string $password):self {
        $this->password = $password; //password must be encrypted when saved in database
        return $this;
    }

    public function getPhone():int {
        return $this->phoneNumber;
    }
    public function setPhone(int $phoneNumber):self {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getAddress():string {
        return $this->address;
    }
    public function setAddress(string $address):self {
        $this->address = $address;
        return $this;
    }

    public function getDate():date { //might not be a basic datatype
        return $this->date;
    }
    public function setDate(date $date):self {
        $this->date = $date;
        return $this;
    }
}
?>