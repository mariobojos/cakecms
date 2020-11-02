<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;

// Table serves as the collection of Cake Entities
class ArticlesTable extends Table
{
    /**
     * Initialize the class
     *
     * @param array $config Configuration settings
     * @return void
     */
    public function initialize(array $config): void
    {
        // populate the 'created' and 'modified' columns of the Article table
        $this->addBehavior('Timestamp');
    }
}
