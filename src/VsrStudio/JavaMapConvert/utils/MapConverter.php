<?php

namespace VsrStudio\JavaMapConvert\utils;

use VsrStudio\JavaMapConvert\utils\NBTParser;

class MapConverter {

    public function convertRegion(string $sourceFile, string $destinationFolder): void {
        $parser = new NBTParser();
        $parsedData = $parser->parseRegion($sourceFile);

        $outputFile = $destinationFolder . "/region/" . basename($sourceFile);
        file_put_contents($outputFile, $parsedData);
    }
}
