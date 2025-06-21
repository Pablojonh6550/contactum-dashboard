<?php

namespace App\Services\Contact;

use App\Models\Contact;
use App\Interfaces\Contact\ContactInterface;
use Illuminate\Database\Eloquent\Collection;

class ContactService
{
    public function __construct(protected ContactInterface $contactRepository) {}

    public function all(): Collection
    {
        return $this->contactRepository->all();
    }

    public function findById($id): Contact
    {
        return $this->contactRepository->findById($id);
    }

    public function create(array $data): Contact
    {
        return $this->contactRepository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->contactRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->contactRepository->delete($id);
    }

    public function getDeleted(): Collection
    {
        return $this->contactRepository->getDeleted();
    }
    public function restore(int $id): bool
    {
        return $this->contactRepository->restore($id);
    }
}
