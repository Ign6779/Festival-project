<?php
require __DIR__ . '/roles.php';
//code is set up for PHPMyadmin; might have to change if we use a different database
class User implements \JsonSerializable
{

    private int $id;
    // private Role $role;

    private string $role;
    private string $username;
    private string $password;
    private int $phoneNumber;
    private string $address;
    private string $phone;
    private string $email;
    private string $registration;
    private ?string $reset_token;
    private ?DateTime $reset_token_expiration;
    public function __construct(
        string $username, string $password, string $email, string $role, int $phoneNumber, string $address, string $phone, string $registration, ?string $reset_token = null, ?DateTime $reset_token_expiration = null
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
        $this->phone = $phone;
        $this->registration = $registration;
        $this->reset_token = $reset_token;
        $this->reset_token_expiration = $reset_token_expiration;
    }
    #[ReturnTypeWillChange]

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }
    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): self
    {
        $this->password = $password; //password must be encrypted when saved in database
        return $this;
    }

    public function getPhone(): int
    {
        return $this->phoneNumber;
    }
    public function setPhone(int $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }
    public function getRegistration(): string
    {
        return $this->registration;
    }
    public function setRegistration(string $registration): self
    {
        $this->registration = $registration;
        return $this;
    }
    public function getToken(): string
    {
        return $this->reset_token;
    }
    public function setToken(string $reset_token): self
    {
        $this->reset_token = $reset_token;
        return $this;
    }
    public function getTokenExperationDate(): DateTime
    {
        return $this->reset_token_expiration;
    }
    public function setTokenExperationDate(DateTime $date): self
    {
        $this->reset_token_expiration = $date;
        return $this;
    }
}
?>