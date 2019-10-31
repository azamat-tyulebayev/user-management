<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\User;
use App\Domain\User\UserNotFoundException;
use App\Domain\User\UserRepository;
use NotORM;

class InMemoryUserRepository implements UserRepository
{
    /**
     * @var User[]
     */
    private $users;

    private $notOrm;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $users
     */
    public function __construct(array $users = null)
    {
        $dsn = 'mysql:host=localhost;dbname=usermanagement';
        $username = 'root';
        $password = '';

        $connection = new \PDO($dsn, $username, $password);
        $this->notOrm = new \NotORM($connection);
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return $this->notOrm->users->select('*')->jsonSerialize();
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): array
    {
        return $this->notOrm->users->select('id=' . $id)->jsonSerialize();
    }

    /**
     * {@inheritdoc}
     */
    public function deleteUserOfId(int $id): bool
    {
        return $this->notOrm->users->where('id=' . $id)->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function createUser(string $userName, string $firstName, string $lastName): array
    {
        $data = [
            'username' => $userName,
            'firstname' => $firstName,
            'lastname' => $lastName
        ];

        return $this->notOrm->users->insert($data)->jsonSerialize();
    }

    /**
     * {@inheritdoc}
     */
    public function updateUser(int $id, string $userName, string $firstName, string $lastName): int
    {
        $data = [
            'username' => $userName,
            'firstname' => $firstName,
            'lastname' => $lastName
        ];

        return $this->notOrm->users->where('id=' . $id)->update($data);
    }
}
