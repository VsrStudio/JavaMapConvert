<?php

namespace VsrStudio\JavaMapConvert\utils;

use pocketmine\nbt\NBT;

class NBTParser {

    public function parseRegion(string $filePath): string {
        $nbt = new NBT(NBT::BIG_ENDIAN);
        $nbtData = file_get_contents($filePath);

        $parsedData = $nbt->readCompressed($nbtData);

        $convertedData = $this->convertData($parsedData);

        return $nbt->writeCompressed($convertedData);
    }

    private function convertData(array $data): array {
        return $data;
    }
}
