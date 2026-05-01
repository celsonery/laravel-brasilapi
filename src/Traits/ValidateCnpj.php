<?php

namespace CelsoNery\BrasilApi\Traits;

trait ValidateCnpj
{
    public function cnpjValid(string $cnpj): bool
    {
        if (empty($cnpj)) {
            return false;
        }

        $cnpj = preg_replace('/\D/', '', $cnpj);

        if (strlen($cnpj) !== 14) {
            return false;
        }

        // Rejeita sequências com todos os dígitos iguais
        if (preg_match('/^(\d)\1{13}$/', $cnpj)) {
            return false;
        }

        // Primeiro dígito verificador
        $soma = 0;
        $pesos = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        for ($i = 0; $i < 12; $i++) {
            $soma += (int) $cnpj[$i] * $pesos[$i];
        }

        $resto = $soma % 11;
        $primeiroDigito = $resto < 2 ? 0 : 11 - $resto;

        if ((int) $cnpj[12] !== $primeiroDigito) {
            return false;
        }

        // Segundo dígito verificador
        $soma = 0;
        $pesos = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        for ($i = 0; $i < 13; $i++) {
            $soma += (int) $cnpj[$i] * $pesos[$i];
        }

        $resto = $soma % 11;
        $segundoDigito = $resto < 2 ? 0 : 11 - $resto;

        return (int) $cnpj[13] === $segundoDigito;
    }
}
