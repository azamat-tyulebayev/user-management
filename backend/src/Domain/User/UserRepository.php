<?php
declare(strict_types=1);

namespace App\Domain\User;

interface UserRepository
{
    /**
     * @return User[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return User
     * @throws UserNotFoundException
     */
    public function findUserOfId(int $id): array;

    /**
     * @param string $userName
     * @param string $firstName
     * @param string $lastName
     *
     * @return User
     * @throws UserNotFoundException
     */
    public function createUser(string $userName, string $firstName, string $lastName): array;

    /**
     * @param string $userName
     * @param string $firstName
     * @param string $lastName
     *
     * @return User
     * @throws UserNotFoundException
     */
    public function updateUser(int $id, string $userName, string $firstName, string $lastName): int;

    /**
     * @param int $id
     * @return bool
     * @throws UserNotFoundException
     */
    public function deleteUserOfId(int $id): bool;
}
