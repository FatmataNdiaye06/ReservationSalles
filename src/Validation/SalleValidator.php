<?php
namespace App\Validation;

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

class SalleValidator implements ValidatorInterface {
    public function validate(array $data): ValidationResult {
        $normalized = $data;

        if (isset($normalized['capacite']) && is_string($normalized['capacite']) && is_numeric($normalized['capacite'])) {
            $normalized['capacite'] = (int) $normalized['capacite'];
        }

        if (isset($normalized['active'])) {
            $normalized['active'] = filter_var($normalized['active'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            if ($normalized['active'] === null) {
                $normalized['active'] = in_array($normalized['active'], ['1', 1, 'true', true], true);
            }
        }

        $errors = [];
        $rules = [
            'nom' => v::stringType()->length(2, 100),
            'batiment' => v::stringType()->length(1, 100),
            'capacite' => v::intType()->between(1, 1000),
            'type' => v::in(['cours', 'informatique', 'laboratoire', 'amphitheatre', 'reunion']),
            'active' => v::boolVal(),
        ];

        foreach ($rules as $field => $rule) {
            try {
                v::key($field, $rule)->assert($normalized);
            } catch (NestedValidationException $e) {
                $errors[$field] = $e->getMessages();
            }
        }

        return new ValidationResult(empty($errors), $errors, $data);
    }
}