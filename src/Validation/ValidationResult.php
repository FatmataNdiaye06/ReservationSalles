<?php
namespace App\Validation;

class ValidationResult {
    private bool $isValid;
    private array $errors;
    private array $data;

    public function __construct(bool $isValid, array $errors = [], array $data = []) {
        $this->isValid = $isValid;
        $this->errors = $errors;
        $this->data = $data;
    }

    public function isValid(): bool {
        return $this->isValid;
    }

    public function errors(): array {
        return $this->errors;
    }

    public function data(): array {
        return $this->data;
    }
}