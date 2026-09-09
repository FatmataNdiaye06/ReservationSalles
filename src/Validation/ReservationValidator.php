<?php
namespace App\Validation;

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

class ReservationValidator implements ValidatorInterface {
    public function validate(array $data): ValidationResult {
        $errors = [];

        try {
            v::key('salle_id', v::intType()->positive())->assert($data);
        } catch (NestedValidationException $e) {
            $errors['salle_id'] = $e->getMessages();
        }

        try {
            v::key('responsable', v::stringType()->length(2, 120))->assert($data);
        } catch (NestedValidationException $e) {
            $errors['responsable'] = $e->getMessages();
        }

        try {
            v::key('email', v::email())->assert($data);
        } catch (NestedValidationException $e) {
            $errors['email'] = $e->getMessages();
        }

        try {
            v::key('motif', v::stringType()->length(5, 255))->assert($data);
        } catch (NestedValidationException $e) {
            $errors['motif'] = $e->getMessages();
        }

        try {
            v::key('date_debut', v::date())->assert($data);
        } catch (NestedValidationException $e) {
            $errors['date_debut'] = $e->getMessages();
        }

        try {
            v::key('date_fin', v::date())->assert($data);
        } catch (NestedValidationException $e) {
            $errors['date_fin'] = $e->getMessages();
        }

        return new ValidationResult(empty($errors), $errors, $data);
    }
}