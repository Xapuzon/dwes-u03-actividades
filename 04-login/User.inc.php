<?php
require_once __DIR__ . '/../common/Accessors.inc.php';

class User
{
    use Accessors;

    private bool $logged = false;

    public function __construct(
        private string $username,
        private string $email,
        private string $password
    ) {
    }

    public function login(string $password): bool
    {
        if ($this->logged) {
            return false;
        }
        if ($this->password === $password) {
            $this->logged = true;
            return true;
        }
        return false;
    }

    public function logout(): void
    {
        $this->logged = false;
    }

    public function __toString(): string
    {
        return "{$this->username} ({$this->email})";
    }
}


function userExists(string $username, array $users): mixed
{
    foreach ($users as $user) {
        if ($user->username === $username) {
            return $user;
        }
    }
    return false;
}
