<?php
namespace App\Helpers;

class QuizHelper
{
    public static function calculateWeightedMatchScore(array $userTraits, array $clusterTraits, array $traitWeights): float
    {
        $score = 0;
        $maxPossibleScore = 0;

        foreach ($clusterTraits as $trait) {
            $weight = $traitWeights[$trait] ?? 1;
            $maxPossibleScore += $weight;

            if (in_array($trait, $userTraits)) {
                $score += $weight;
            }
        }

        if ($maxPossibleScore == 0) return 0;

        return ($score / $maxPossibleScore) * 5; // Skala 0-5
    }
}
