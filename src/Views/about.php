<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Over ons – BroodjesZaak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/index.js" defer></script>
</head>

<body class="min-h-screen font-sans bg-stone-50 flex flex-col">

    <!-- Navigation -->
    <nav aria-label="Hoofdnavigatie">
        <?php include __DIR__ . '/components/navbar.php'; ?>
    </nav>

    <main class="flex-grow bg-amber-50">

        <!-- HERO HEADER -->
        <section class="bg-gradient-to-br from-amber-50 to-white py-28 border-b">
            <div class="max-w-5xl mx-auto px-6 text-center">
                <span class="text-red-600 font-semibold tracking-widest uppercase text-sm">
                    Wie zijn wij
                </span>

                <h1 class="text-4xl md:text-5xl font-extrabold mt-3 mb-4 text-gray-900">
                    Over BroodjesZaak
                </h1>

                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">
                    Vers gemaakt, lokaal geliefd – elke dag opnieuw
                </p>
            </div>
        </section>

        <!-- STORY SECTION -->
        <section class="py-24 bg-white">
            <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

                <div>
                    <span class="text-red-600 font-semibold uppercase tracking-wider text-sm">
                        Ons verhaal
                    </span>

                    <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-6">
                        Met passie voor lekker eten
                    </h2>

                    <p class="text-gray-700 leading-relaxed mb-4">
                        BroodjesZaak begon als een kleine lokale broodjesbar met één eenvoudig doel:
                        heerlijke, eerlijke broodjes maken voor iedereen in de buurt.
                    </p>

                    <p class="text-gray-700 leading-relaxed mb-4">
                        Wat begon als een passie voor lekker eten, groeide uit tot een vaste waarde
                        waar klanten elke dag terecht kunnen voor een verse lunch of een snel ontbijt.
                    </p>

                    <p class="text-gray-700 leading-relaxed">
                        Wij geloven dat goed eten niet ingewikkeld hoeft te zijn – gewoon vers brood,
                        kwaliteitsingrediënten en een glimlach.
                    </p>
                </div>

                <div class="relative">
                    <img 
                        src="img/broodbg.jpg" 
                        alt="Vers bereide broodjes op de toonbank van BroodjesZaak"
                        class="rounded-2xl shadow-xl w-full object-cover"
                    >

                    <div class="absolute -bottom-6 -left-6 bg-red-600 text-white p-4 rounded-xl shadow-lg">
                        <p class="font-semibold">Sinds 2026</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- VALUES SECTION -->
        <section class="py-24">
            <div class="max-w-6xl mx-auto px-6">

                <div class="text-center mb-14">
                    <span class="text-red-600 font-semibold uppercase tracking-wider text-sm">
                        Onze waarden
                    </span>

                    <h2 class="text-3xl font-bold text-gray-900 mt-2">
                        Waar wij voor staan
                    </h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8">

                    <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold mb-3 text-gray-900">
                            Kwaliteit
                        </h3>
                        <p class="text-gray-600">
                            Alleen de beste en meest verse ingrediënten vinden hun weg
                            naar onze broodjes.
                        </p>
                    </div>

                    <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold mb-3 text-gray-900">
                            Eenvoud
                        </h3>
                        <p class="text-gray-600">
                            Geen ingewikkelde recepten – gewoon puur, eerlijk en lekker eten.
                        </p>
                    </div>

                    <div class="p-8 bg-white rounded-2xl shadow hover:shadow-lg transition">
                        <div class="mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold mb-3 text-gray-900">
                            Lokaal
                        </h3>
                        <p class="text-gray-600">
                            We werken waar mogelijk met lokale leveranciers en producten.
                        </p>
                    </div>

                </div>

            </div>
        </section>

        <!-- TEAM SECTION -->
        <section class="py-24 bg-white">
            <div class="max-w-5xl mx-auto px-6">
                <div class="grid md:grid-cols-5 gap-12 items-center">

                    <div class="md:col-span-3">
                        <span class="text-red-600 font-semibold uppercase tracking-wider text-sm">
                            Ons team
                        </span>

                        <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-6">
                            Met liefde gemaakt
                        </h2>

                        <p class="text-gray-700 text-lg leading-relaxed">
                            Ons kleine maar enthousiaste team staat elke dag klaar om je te helpen.
                            Met passie voor eten en aandacht voor service zorgen wij ervoor
                            dat je altijd met een glimlach buiten gaat.
                        </p>
                    </div>

                    <div class="md:col-span-2">
                        <img 
                            src="img/tasty-vegetable-sandwich.jpg" 
                            alt="Team van BroodjesZaak bereidt verse broodjes"
                            class="rounded-2xl shadow-xl w-full object-cover"
                        >
                    </div>

                </div>
            </div>
        </section>

        <!-- CONTACT + MAP SECTION -->
        <section class="py-24">
            <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

                <div>
                    <span class="text-red-600 font-semibold uppercase tracking-wider text-sm">
                        Contact
                    </span>

                    <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-4">
                        Kom langs!
                    </h2>

                    <p class="text-gray-700 mb-6">
                        We verwelkomen je graag in onze zaak voor een vers broodje en een gezellige babbel.
                    </p>

                    <div class="bg-white p-8 rounded-2xl shadow space-y-3">
                        <p class="font-semibold text-gray-900">BroodjesZaak</p>
                        <p class="text-gray-600">Hoofdstraat 1 – 1000 Brussel</p>

                        <p class="text-gray-600">
                            Tel: 
                            <a href="#" class="text-red-600 hover:underline">
                                012 34 56 78
                            </a>
                        </p>

                        <div class="pt-4 border-t mt-4">
                            <p class="text-gray-600">Ma – Vr: 08:00 – 18:00</p>
                            <p class="text-gray-600">Za: 09:00 – 14:00</p>
                            <p class="text-gray-600">Zo: gesloten</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-lg h-[420px]">
                    <iframe
                        class="w-full h-full"
                        src="https://www.google.com/maps?q=Hoofdstraat+1+Brussel&output=embed"
                        loading="lazy">
                    </iframe>
                </div>

            </div>
        </section>

    </main>

    <?php include __DIR__ . '/components/footer.php'; ?>

</body>

</html>
