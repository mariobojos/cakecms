<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Event\EventInterface;
use Cake\Validation\Validator;
use Cake\Utility\Text;

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

    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug(strtolower($entity->title));
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }

    /**
     * Validation function
     *
     * @param \App\Model\Table\Cake\Validation\Validator $validator parameter
     * @return Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('title')
            ->minLength('title', 10)
            ->maxLength('title', 255)
            ->notEmptyString('body')
            ->minLength('body', 10);

        return $validator;
    }
}
