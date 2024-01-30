<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class MOD11 implements ValidationRule
{
    /**
     * Indicates whether the rule should be implicit.
     *
     * @var bool
     */
    public $implicit = true;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $actualChecksum = (int) Str::substr($value, -1);
        $calculateChecksum = $this->mod11Calculator(Str::substr($value, 0, -1));

        if ($actualChecksum !== $calculateChecksum) {
            $fail("The {$attribute}'s checksum is invalid.");
        }
    }

    /**
     * @param  mixed  $input_number
     */
    private function mod11Calculator($input_number): int
    {
        // Reverse the number to start processing from the end
        $reversedNumber = strrev($input_number);

        // MOD11 factors repeat from 2 to 7
        $factors = [2, 3, 4, 5, 6, 7];

        $sum = 0;
        $factorIndex = 0;

        // Calculate the sum of products
        for ($i = 0; $i < strlen($reversedNumber); $i++) {
            $sum += intval($reversedNumber[$i]) * $factors[$factorIndex];
            $factorIndex = ($factorIndex + 1) % count($factors);
        }

        $modulus = $sum % 11;

        // Return the checksum digit
        // If modulus is 0 or 1, it's typically replaced with specific values or letters (like 0 or X)
        // depending on the specification you are following.
        return (11 - $modulus) % 11;
    }
}
