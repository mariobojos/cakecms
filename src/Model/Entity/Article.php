<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Article extends Entity
{
    // control what proeperties can be modified by 'mass assignment'
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
}
