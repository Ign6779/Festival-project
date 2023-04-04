<?php
require __DIR__ . '/roles.php';
//code is set up for PHPMyadmin; might have to change if we use a different database
class User implements \JsonSerializable
{

    private int $id;
    private string $role;
    private string $username;
    private string $password;
    private ?string $address;
    private ?int $phone;
    private string $email;
    private string $registration;
    private ?string $reset_token;
    private ?DateTime $reset_token_expiration;

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

    public function getPhone(): ?int
    {
        return $this->phone ?? null;
    }
    public function setPhone(?int $phoneNumber): void
    {
        $this->phone = $phoneNumber;
    }

    public function getAddress(): ?string
    {
        return $this->address ?? null;
    }
    public function setAddress(?string $address): void
    {
        $this->address = $address;
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
    public function getToken(): ?string
    {
        return $this->reset_token ?? null;
    }
    public function setToken(?string $reset_token): void
    {
        $this->reset_token = $reset_token;
      
    }
    public function getTokenExpirationDate(): ?DateTime
    {
        return $this->reset_token_expiration ?? null;
    }
    public function setTokenExpirationDate(?DateTime $date): void
    {
        $this->reset_token_expiration =  $date;
      
    }
}
?>