<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: registrazione.php");
        exit;
    }
?>

<html>
    <head>
        <title>goodreads</title>
        <link rel="stylesheet" href="homepage.css" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <header> 
            <div id="sfondo">
                <nav>
                    <div id="links">
                        <a href="logout.php" class="button">Logout</a>
                    </div>
                </nav>

                <div id="saluto">
                    ciao<strong><?php echo $_SESSION["username"];?></strong>
                </div>
            </div>
        </header>

        <main>
           <!--<section>
               <div class="grande" id="rubrica">
                    <a href="rubrica.html" id="titolo">
                        rubrica<strong>letteraria</strong>
                    </a>
                    <p>
                        Immergiti nella lettura di articoli, interviste, curiosità, approfondimenti sugli autori e molto altro ancora!
                    </p>

                    <h3>Contribuisci anche tu alla rubrica!</h3>
                    <p>
                        Ti piace scrivere? Vorresti che un tuo articolo venisse pubblicato su goodreads? Inviaci il tuo elaborato e ti faremo sapere!
                    </p>

                    <article>
                        <span>
                            <a href="rubrica.html" class="icone">
                                <i class="fa-brands fa-readme"></i>
                                Vai alla rubrica
                            </a> 
                        </span>
                        <span>
                            <a href="mailto:silviagarozzo@icloud.com" class="icone">
                                <i class="fa-solid fa-envelope-open-text"></i>
                                Scrivi una mail
                            </a> 
                        </span> 
                    </article>
               </div>

               <div class="piccolo" id="libroperfetto">
                    <a href="libroperfetto.php" id="titolo">
                        libro<strong>perfetto</strong>
                    </a>

                    <p>
                        Regalare un libro non è sempre facile, soprattutto se il destinatario ha dei gusti diversi dai nostri. Ecco perché abbiamo messo a tua disposizione libroperfetto: rispondendo a una serie di cinque semplici domande otterrai una selezione di 10 libri perfetta per la persona a cui intendi fare questo regalo. Allora cosa aspetti? Provalo, non te ne pentirai!
                    </p>

                    <span>
                        <a href="libroperfetto.php" class="icone">
                            <i class="fa-solid fa-gift"></i>
                            Prova libroperfetto
                        </a> 
                    </span>
                </div>
           </section>-->

           <section>
                <div id="libreria">
                    <a href="mybooks.php" id="titolo">
                        my<strong>books</strong>
                    </a>
                    <p>
                        Cerca in una grande selezioni di libri la tua prossima lettura e dai vita alla tua libreria personale con tutti i titoli che desideri leggere in futuro.
                    </p>
                    
                    <span>
                        <a href="mybooks.php" class="icone">
                            <i class="fa-solid fa-book"></i>
                            Vai alla tua libreria
                        </a> 
                    </span> 
                </div>
                
                <div id="recensioni">
                    <a href="recensioni.php" id="titolo">
                        recensioni<strong>libri</strong>
                    </a>
                    <p>
                        Se desideri condividere con altri lettori le sensazioni, emozioni e opinioni che la lettura di un libro ti ha suscitato, recensionilibri fa al caso tuo: scrivi una recensione oppure lasciati ispirare da quelle di altri lettori per scegliere il tuo prossimo libro.
                    </p>

                    <span>
                        <a href="recensioni.php" class="icone">
                            <i class="fa-solid fa-feather-pointed"></i>
                            Vai alle recensioni
                        </a> 
                    </span>
                </div>
           </section>
        </main>
    </body>
</html>