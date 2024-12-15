<?php

namespace VsrStudio\JavaMapConvert\tasks;

use pocketmine\scheduler\AsyncTask;
use VsrStudio\JavaMapConvert\utils\MapConverter;

class ConvertTask extends AsyncTask {

    private string $source;
    private string $destination;

    public function __construct(string $source, string $destination) {
        $this->source = $source;
        $this->destination = $destination;
    }

    public function onRun(): void {
        $converter = new MapConverter();
        $regionFiles = glob($this->source . "/region/*.mca");
        $totalFiles = count($regionFiles);

        $completed = 0;
        foreach ($regionFiles as $file) {
            $converter->convertRegion($file, $this->destination);
            $completed++;
            $progress = ($completed / $totalFiles) * 100;
            $this->publishProgress(round($progress));
        }
    }

    public function onProgressUpdate($progress): void {
        echo "Progres konversi: $progress% selesai.";
    }

    public function onCompletion(): void {
        echo "Konversi selesai!";
    }
}
