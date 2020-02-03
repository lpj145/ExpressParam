<?php
declare(strict_types=1);

namespace ExpressParams\Types;

class ExpressParams
{
    private $fields = ['*'];

    /**
     * @param array $fields
     */
    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
