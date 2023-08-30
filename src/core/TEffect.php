<?php

namespace Graymore\SearchEngine\core;

use stdClass;

trait TEffect {
    private function useEffect($data): stdClass
    {
        $objects = [];
        $sr = new stdClass();
        foreach($data as $hit) {
            $objects[] = [
                'id' => $hit->getId(),
                'highlight' => $this->highlight ? $hit->getHighlight() : null,
                'score' => $hit->getScore(),
            ];
        }
        $sr->objects = $objects;
        $sr->count = $data->count();
        $sr->total = $data->getTotal();
        return $sr;
    }

    private function useNullableEffect(): stdClass
    {
        $sr = new stdClass();
        $sr->objects = [];
        $sr->count = 0;
        $sr->total = 0;
        return $sr;
    }
}