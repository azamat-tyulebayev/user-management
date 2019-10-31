<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class UpdateUserAction extends UserAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $id = $this->getFormData()->id;
        $userName = $this->getFormData()->username;
        $firstName = $this->getFormData()->firstname;
        $lastName = $this->getFormData()->lastname;

        $user = $this->userRepository->updateUser($id, $userName, $firstName, $lastName);

        $this->logger->info("User with username `${userName}` was updated.");

        return $this->respondWithData($user);
    }
}
