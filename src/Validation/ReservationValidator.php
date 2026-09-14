<?php
namespace App\Validation;

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

class ReservationValidator implements ValidatorInterface {
    public function validate(array $data): ValidationResult {
        $normalized = $data;

        if (isset($normalized['salle_id']) && is_string($normalized['salle_id']) && is_numeric($normalized['salle_id'])) {
            $normalized['salle_id'] = (int) $normalized['salle_id'];
        }

        $errors = [];
        $rules = [
            'salle_id' => v::intType()->positive(),
            'responsable' => v::stringType()->length(2, 120),
            'email' => v::email(),
            'motif' => v::stringType()->length(5, 255),
            'date_debut' => v::dateTime(),
            'date_fin' => v::dateTime(),
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