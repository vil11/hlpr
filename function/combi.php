<?php

/**
 * @param array $options
 * @return array
 */
function calculateCartesianProduct(array $options): array
{
    $combinations = [[]];
    foreach ($options as $optionId => $optionValues) {
        $append = [];
        foreach ($optionValues as $optionValueId => $optionValue) {
            foreach ($combinations as $data) {
                $append[] = $data + [$optionId => $optionValueId];
            }
        }
        $combinations = $append;
    }

    return $combinations;
}

//function calculateCartesianProductExamples()
//{
//    $optionA = [11 => 'A1', 12 => 'A2'];
//    $optionB = [21 => 'B1', 22 => 'B2', 23 => 'B3'];
//    $optionC = [31 => 'C1', 32 => 'C2'];
//    $optionD = [41 => 'D1'];
//
//    $combinations2 = calculateCartesianProduct([1 => $optionA]);
//    $combinations23 = calculateCartesianProduct([1 => $optionA, 2 => $optionB]);
//    $combinations232 = calculateCartesianProduct([1 => $optionA, 2 => $optionB, 3 => $optionC]);
//    $combinations2321 = calculateCartesianProduct([1 => $optionA, 2 => $optionB, 3 => $optionC, 4 => $optionD]);
//
//    var_dump($combinations2);
//    var_dump($combinations23);
//    var_dump($combinations232);
//    var_dump($combinations2321);
//}
