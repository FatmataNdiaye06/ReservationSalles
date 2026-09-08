<?php
namespace App\Validator;

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

class SalleValidator implements ValidatorInterface {
    public function validate(array $data): ValidationResult {
        $errors = [];

        try {
            v::key('nom', v::stringType()->length(2, 100))->assert($data);
        } catch (NestedValidationException $e) {
            $errors['nom'] = $e->getMessages();
        }

        try {
            v::key('batiment', v::stringType()->length(2, 100))->assert($data);
        } catch (NestedValidationException $e) {
            $errors['batiment'] = $e->getMessages();
        }

        try {
            v::key('capacite', v::intType()->between(1, 1000))->assert($data);
        } catch (NestedValidationException $e) {
            $errors['capacite'] = $e->getMessages();
        }

        try {
            v::key('type', v::in(['cours', 'informatique', 'laboratoire', 'amphitheatre', 'reunion']))->assert($data);
        } catch (NestedValidationException $e) {
            $errors['type'] = $e->getMessages();
        }

        try {
            v::key('active', v::boolVal())->assert($data);
        } catch (NestedValidationException $e) {
            $errors['active'] = $e->getMessages();
        }

        return new ValidationResult(empty($errors), $errors, $data);
    }
}