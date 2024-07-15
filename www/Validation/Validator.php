<?php

namespace Validation;

class Validator
{
    private array $data;
    private array $errors = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function validate(array $rules): ?array
    {
        foreach ($rules as $name => $rulesArray) {
            if (array_key_exists($name, $this->data)) {
                foreach ($rulesArray as $rule) {
                    switch ($rule) {
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                        case substr($rule, 0, 3) === 'min':
                            $this->min($name, $this->data[$name], $rule);
                            break;
                        case substr($rule, 0, 5) === 'match':
                            $this->match($name, $this->data[$name], $rule);
                            break;
                    }
                }
            }
        }
        return $this->getErrors();
    }

    private function match(string $name, string $value, string $rule): void
    {
        $pattern = substr($rule, 6);
        if (!preg_match($pattern, $value)) {
            switch ($name) {
                case 'email':
                    $this->errors[$name][] = "L'Email saisi n'est pas valide (ex: john.doe@email.fr).";
                    break;
                case 'password':
                    $this->errors[$name][] = "Le mot de passe n'est pas valide, doit contenir : 9 caractères minimum, 1 majuscule, 1 minuscule, 1 chiffre et 2 caractères spéciaux [@$!.%*?&]";
                    break;
            }
        }
    }

    private function required(string $name, string $value): void
    {
        $value = trim($value);
        if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][] = "Le champ {$name} est requis";
        }
    }

    private function min(string $name, string $value, string $rule): void
    {
        preg_match_all('/(\d+)/', $rule, $matches);
        $limit = $matches[0][0]; // => 3

        if (strlen($value) < $limit) {
            $this->errors[$name][] = "Le champ {$name} doit contenir un minimum de {$limit} caractères";
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
