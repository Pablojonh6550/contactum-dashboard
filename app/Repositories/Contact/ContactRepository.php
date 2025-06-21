<?php

namespace App\Repositories\Contact;

use App\Repositories\BaseRepository;
use App\Interfaces\Contact\ContactInterface;
use App\Models\Contact;

class ContactRepository extends BaseRepository implements ContactInterface
{
    public function __construct(Contact $model)
    {
        parent::__construct($model);
    }
}
