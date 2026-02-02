<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KodiniTools | Muzika & Tekstovi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>KodiniTools <span class="highlight">Visualizer</span></h1>
    <p>Automatska galerija tvojih radova i tekstova</p>
</header>

<main class="video-container">
    <?php
    $videoDir = 'videos/';
    $videos = glob($videoDir . "*.mp4");

    if (empty($videos)) {
        echo "<p style='text-align:center;'>Trenutno nema video zapisa u mapi.</p>";
    } else {
        // Sortieren: Neueste Videos zuerst
        array_multisort(array_map('filemtime', $videos), SORT_DESC, $videos);

        foreach ($videos as $video) {
            $filename = basename($video);
            $baseName = pathinfo($filename, PATHINFO_FILENAME);
            $title = str_replace("_", " ", $baseName);
            
            // Pfad zur passenden Textdatei suchen (z.B. Rijeka.txt)
            $lyricsFile = $videoDir . $baseName . ".txt";
            $lyricsContent = "Tekst pjesme trenutno nije dostupan.";

            if (file_exists($lyricsFile)) {
                $lyricsContent = nl2br(htmlspecialchars(file_get_contents($lyricsFile)));
            }
            ?>
            <section class="video-card">
                <div class="video-wrapper">
                    <video controls preload="metadata">
                        <source src="<?php echo $video; ?>" type="video/mp4">
                    </video>
                </div>
                <div class="video-info">
                    <h2><?php echo htmlspecialchars($title); ?></h2>
                    <div class="lyrics-box">
                        <span class="lyrics-label">Hrvatski Tekst:</span>
                        <p class="lyrics"><?php echo $lyricsContent; ?></p>
                    </div>
                    <a href="<?php echo $video; ?>" download class="btn-download">Preuzmi Video</a>
                </div>
            </section>
            <?php
        }
    }
    ?>
</main>

</body>
</html>