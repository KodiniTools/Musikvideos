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
    $videos = glob($videoDir . "*.{mp4,webm}", GLOB_BRACE);

    if (empty($videos)) {
        echo "<p style='text-align:center;'>Trenutno nema video zapisa u mapi.</p>";
    } else {
        // Sortieren: Neueste Videos zuerst
        array_multisort(array_map('filemtime', $videos), SORT_DESC, $videos);

        foreach ($videos as $video) {
            $filename = basename($video);
            $baseName = pathinfo($filename, PATHINFO_FILENAME);
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $mimeType = ($extension === 'webm') ? 'video/webm' : 'video/mp4';
            $title = str_replace("_", " ", $baseName);
            
            // Pfad zur passenden Textdatei suchen (z.B. Rijeka.txt oder Rijeka.pdf)
            $txtFile = $videoDir . $baseName . ".txt";
            $pdfFile = $videoDir . $baseName . ".pdf";
            $lyricsContent = "Tekst pjesme trenutno nije dostupan.";
            $pdfDownload = null;

            if (file_exists($txtFile)) {
                $lyricsContent = nl2br(htmlspecialchars(file_get_contents($txtFile)));
            }
            if (file_exists($pdfFile)) {
                $pdfDownload = $pdfFile;
                if (!file_exists($txtFile)) {
                    $lyricsContent = "Tekst je dostupan kao PDF dokument.";
                }
            }
            ?>
            <section class="video-card">
                <div class="video-wrapper">
                    <video controls preload="metadata">
                        <source src="<?php echo $video; ?>" type="<?php echo $mimeType; ?>">
                    </video>
                </div>
                <div class="video-info">
                    <h2><?php echo htmlspecialchars($title); ?></h2>
                    <div class="lyrics-box">
                        <span class="lyrics-label">Hrvatski Tekst:</span>
                        <p class="lyrics"><?php echo $lyricsContent; ?></p>
                    </div>
                    <div class="button-group">
                        <a href="<?php echo $video; ?>" download class="btn-download">Preuzmi Video</a>
                        <?php if ($pdfDownload): ?>
                            <a href="<?php echo $pdfDownload; ?>" download class="btn-download btn-pdf">Preuzmi PDF</a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <?php
        }
    }
    ?>
</main>

</body>
</html>