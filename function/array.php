<?php

/**
 * Put every array element into an array (format of PHPUnit Data Provider).
 * If element is array, handle its name to the Test as well.
 *
 * @param array $array
 * @return array
 *
 * @tested 1.3.2
 */
function wrap(array $array): array
{
    $wrapped = [];
    foreach ($array as $key => $value) {
        if (!is_array($value)) {
            $wrapped[$value] = [$value];
        } else {
            $wrapped[$key] = [$key, $value];
        }
    }

    return $wrapped;
}

/**
 * @param array $arrayA
 * @param array $arrayB
 * @return array
 *
 * @tested 1.4.3
 */
function arrayDiffAssocRecursive(array $arrayA, array $arrayB): array
{
    ksort($arrayA);
    ksort($arrayB);

    $diff = [];
    foreach ($arrayA as $key => $value) {
        if (is_array($value)) {
            if (!isset($arrayB[$key]) || !is_array($arrayB[$key])) {
                $diff[$key] = $value;
            } else {
                $newDiff = arrayDiffAssocRecursive($value, $arrayB[$key]);
                if (!empty($newDiff))
                    $diff[$key] = $newDiff;
            }
        } else if (!array_key_exists($key, $arrayB) || $arrayB[$key] !== $value) {
            $diff[$key] = $value;
        }
    }

    return $diff;
}
