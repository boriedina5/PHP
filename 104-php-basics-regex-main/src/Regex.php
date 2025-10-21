<?php

namespace App;

class Regex
{
    /* TODO: Ide dolgozz */

    /* 0. feladat - Példa - Tartalmaz-e a szöveg kis "a" betűt? */
    public static function containsLetterA($text)
    {
        return (bool)preg_match('/[a]/', $text);
    }
    //1-10
    public function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    public function containsNumber($str)
    {
        return preg_match('/\d/', $str) === true;
    } //    /d - bármilyen számjegy, preg_match - reguláris kifejezéssel keres mintát a szövegben

    public function containsOnlyLetters($str)
    {
        return preg_match('/^[a-zA-Z]+$/', $str) === true;
    } // $ - szöveg végét jelöli
    public function isUppercase($str)
    {
        return $str === strtoupper($str) && $str !== '';
    }
    public function isLowercase($str)
    {
        return $str === strtolower($str) && $str !== '';
    }
    public function startsWithDigit($str)
    {
        return preg_match('/^\d/', $str) === true;
    } // ^-szöveg elejét jelöli
    public function endsWithPunctuation($str)
    {
        return preg_match('/[.!?]$/', $str) === 1;
    } //[.!?] → a szögletes zárójelben lévő karakterek közül bármelyik
    public function containsWord($str, $word)
    {
        return preg_match('/\b' . preg_quote($word, '/') . '\b/', $str) === 1;
    } // \b → szóhatár, biztosítja, hogy a szó ne legyen részben másik szó része
    //preg_quote($word, '/') → megvédi a speciális karaktereket a szóban
    public function replaceSpacesWithUnderscore($str)
    {
        return str_replace(' ', '_', $str);
    }
    public function removeDigits($str)
    {
        return preg_replace('/\d/', '', $str);
    }
    //11-20
    public function extractNumbers($str)
    {
        preg_match_all('/\d+/', $str, $matches);
        return $matches[0];
    }

    public function countWordsStartingWithA($str)
    {
        preg_match_all('/\b[aA]\w*/', $str, $matches);
        return count($matches[0]);
    }
    public function hasPhoneNumber($str)
    {
        $pattern = '/(\+36\s?\d{2}\s?\d{3}\s?\d{4}|06\d{9})/';
        return preg_match($pattern, $str) === true;
    } //s → a karakter s; ? → előtte lévő elem opcionális, azaz 0 vagy 1 előfordulás

    public function isPostalCode($str)
    {
        return preg_match('/^\d{4}$/', $str) === true;
    }

    public function extractHashtags($str)
    {
        preg_match_all('/#\w+/', $str, $matches);
        return $matches[0];
    } // w - bármely betű, szám vagy aláhúzás (a-zA-Z0-9_); +  előtte lévő karakter legalább 1-szer szerepeljen, de többször is lehet
    // preg_match_all($pattern, $subject, $matches); - egy PHP függvény, ami regex-szel keres mintákat a szövegben.



    public function extractEmails($str)
    {
        preg_match_all('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $str, $matches);
        return $matches[0];
    }
    public function validateUsername($str)
    {
        return preg_match('/^[a-zA-Z0-9_]{3,16}$/', $str) === true;
    }
    public function replaceMultipleSpaces($str)
    {
        return preg_replace('/\s+/', ' ', $str);
    }
    function extractDomain($email)
    {
        return substr(strrchr($email, "@"), 1);
    }
    public function maskEmail($email)
    {
        $parts = explode("@", $email);
        $masked = str_repeat("*", strlen($parts[0]));
        return $masked . "@" . $parts[1];
    }
}
