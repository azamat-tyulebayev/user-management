<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class CreateUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $userName = $this->getFormData()->username;
        $firstName = $this->getFormData()->firstname;
        $lastName = $this->getFormData()->lastname;

        $user = $this->userRepository->createUser($userName, $firstName, $lastName);

        $this->logger->info("User with username `${userName}` was created.");

        return $this->respondWithData($user);
    }
}
