<?php

trait Accessors
{
    public function __get(string $property): mixed
    {
        if (!property_exists($this, $property)) {
            throw new InvalidArgumentException("Propiedad desconocida: $property");
        }
        return $this->$property;
    }

    public function __set(string $property, mixed $value): void
    {
        if (!property_exists($this, $property)) {
            throw new InvalidArgumentException("Propiedad desconocida: $property");
        }
        $this->$property = $value;
    }
}
