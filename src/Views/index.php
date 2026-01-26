<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>BroodjesZaak – Vers gemaakte broodjes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/index.js" defer></script>
    <script src="https://unpkg.com/heroicons@2.0.13/dist/heroicons.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>

<body class="min-h-screen font-sans bg-stone-50 flex flex-col">

    <!-- Navigation -->
    <?php include __DIR__ . '/components/navbar.php'; ?>

    <!-- HERO -->
    <section class="relative h-[500px] flex items-center justify-center">
        <img src="img/broodjesbg.jpg" class="absolute inset-0 w-full h-full object-cover">
        <div class="relative bg-white bg-opacity-90 p-10 rounded-lg shadow-lg text-center max-w-2xl mx-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gray-800">
                Vers gemaakte broodjes
            </h1>
            <p class="text-gray-700 mb-6 text-lg">
                Dagelijks vers bereid met kwaliteitsingrediënten
            </p>
            <a href="menu.php"
                class="bg-red-600 text-white px-8 py-3 rounded-lg text-lg hover:bg-red-700 transition">
                Bekijk het menu
            </a>
        </div>
    </section>

    <main class="flex-grow">

        <!-- ABOUT SECTION -->
        <section class="bg-white py-20">
            <div class="max-w-5xl mx-auto px-6 md:flex md:items-center md:gap-12">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="img/broodbg.jpg" alt="BroodjesZaak" class="rounded-xl shadow-lg w-full object-cover">
                </div>
                <div class="md:w-1/2 text-center md:text-left">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">Over BroodjesZaak</h2>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        BroodjesZaak is een lokale broodjesbar waar smaak en versheid centraal staan.
                        Elke dag bereiden we onze broodjes met zorg, met aandacht voor kwaliteit en eenvoud.
                        Perfect voor een snelle lunch, een gezellige hap tussendoor of een vers ontbijt.
                    </p>
                </div>
            </div>
        </section>

        <!-- VALUES / WHY CHOOSE US -->
        <section class="py-20 bg-amber-50">
            <div class="max-w-6xl mx-auto px-6 text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Waarom BroodjesZaak?</h2>
                <p class="text-gray-700 max-w-2xl mx-auto">
                    Wij geloven in kwaliteit, eenvoud en lokale producten. Dat proef je in elk broodje.
                </p>
            </div>
            <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-8">
                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition text-center">
                    <div class="mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Kwaliteit</h3>
                    <p class="text-gray-600">Alleen de beste en meest verse ingrediënten vinden hun weg naar onze broodjes.</p>
                </div>
                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition text-center">
                    <div class="mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Eenvoud</h3>
                    <p class="text-gray-600">Geen ingewikkelde recepten – gewoon puur, eerlijk en lekker eten.</p>
                </div>
                <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition text-center">
                    <div class="mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Lokaal</h3>
                    <p class="text-gray-600">We werken waar mogelijk met lokale leveranciers en producten.</p>
                </div>
            </div>
        </section>

        <!-- FEATURED BROODJES -->
        <section class="max-w-6xl mx-auto px-6 py-16">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Onze favorieten</h2>
            <div class="relative">
                <div id="carousel" class="flex overflow-hidden scroll-smooth snap-x snap-mandatory">
                    <?php foreach ($featuredBroodjes as $broodje): ?>
                        <div class="flex-shrink-0 w-80 sm:w-72 md:w-80 lg:w-96 snap-start mx-3 bg-white rounded-lg shadow hover:shadow-md transition flex flex-col">
                            <img src="img/broodjes/<?= $broodje->getPicture() ?>" alt="<?= htmlspecialchars($broodje->getName()) ?>" class="h-44 w-full object-cover rounded-t-lg">
                            <div class="p-5 flex flex-col flex-1 text-center">
                                <h3 class="text-xl font-semibold mb-2 text-gray-800"><?= htmlspecialchars($broodje->getName()) ?></h3>
                                <p class="text-gray-600 mb-4"><?= htmlspecialchars($broodje->getDescription()) ?></p>
                                <p class="text-lg font-bold text-gray-800 mb-4">€<?= number_format($broodje->getPrice(), 2) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow z-10">&#10094;</button>
                <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white p-2 rounded-full shadow z-10">&#10095;</button>
            </div>
            <div class="text-center mt-12">
                <a href="menu.php" class="text-red-600 font-semibold hover:underline">Bekijk het volledige menu →</a>
            </div>
        </section>
        <!-- HOW IT WORKS / PROCESS -->
        <section class="py-20 bg-amber-50">
            <div class="max-w-6xl mx-auto px-6 text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Zo werkt het</h2>
                <p class="text-gray-700 max-w-2xl mx-auto">
                    Bestel snel, ontvang vers en geniet van onze heerlijke broodjes.
                </p>
            </div>

            <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-4 gap-8 text-center">
                <!-- Step 1 -->
                <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                    <div class="mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Kies je broodje</h3>
                    <p class="text-gray-600">Bekijk ons menu en selecteer je favoriete broodje.</p>
                </div>

                <!-- Step 2 -->
                <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                    <div class="mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18v4H3v-4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Bestel online of in de zaak</h3>
                    <p class="text-gray-600">Plaats je bestelling online of kom langs in onze broodjesbar.</p>
                </div>

                <!-- Step 3 -->
                <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                    <div class="mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Wij bereiden het vers</h3>
                    <p class="text-gray-600">Ons team maakt je broodje met de beste ingrediënten.</p>
                </div>

                <!-- Step 4 -->
                <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                    <div class="mb-4 flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">Geniet!</h3>
                    <p class="text-gray-600">Haal af of laat bezorgen en geniet van je vers broodje.</p>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section class="py-20 bg-white">
            <div class="max-w-5xl mx-auto px-6 text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Veelgestelde vragen</h2>
                <p class="text-gray-700 max-w-2xl mx-auto">Hier vind je antwoorden op de meest gestelde vragen over onze broodjes en service.</p>
            </div>

            <div class="max-w-6xl mx-auto px-6 space-y-4">
                <!-- Question 1 -->
                <details class="bg-amber-50 p-6 rounded-xl shadow">
                    <summary class="cursor-pointer font-semibold text-gray-900 text-lg">Kan ik mijn broodje online bestellen?</summary>
                    <p class="mt-2 text-gray-700">Ja, via onze online bestelpagina kun je snel en eenvoudig een broodje bestellen om af te halen.</p>
                </details>

                <!-- Question 2 -->
                <details class="bg-amber-50 p-6 rounded-xl shadow">
                    <summary class="cursor-pointer font-semibold text-gray-900 text-lg">Zijn er vegetarische opties?</summary>
                    <p class="mt-2 text-gray-700">Ja, we hebben verschillende vegetarische en veganistische broodjes in ons menu.</p>
                </details>

                <!-- Question 3 -->
                <details class="bg-amber-50 p-6 rounded-xl shadow">
                    <summary class="cursor-pointer font-semibold text-gray-900 text-lg">Kan ik broodjes laten bezorgen?</summary>
                    <p class="mt-2 text-gray-700">Op dit moment bieden wij alleen afhaal aan in de zaak, maar binnenkort komt er ook bezorging!</p>
                </details>

                <!-- Question 4 -->
                <details class="bg-amber-50 p-6 rounded-xl shadow">
                    <summary class="cursor-pointer font-semibold text-gray-900 text-lg">Wat zijn de openingstijden?</summary>
                    <p class="mt-2 text-gray-700">Ma – Vr: 08:00 – 18:00, Za: 09:00 – 14:00, Zo: gesloten.</p>
                </details>
            </div>
        </section>


        <!-- FOOTER -->
        <?php include __DIR__ . '/components/footer.php'; ?>

    </main>

</body>

</html>