<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Onze Broodjes - BroodjesZaak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen font-serif bg-amber-50 flex flex-col">

    <?php include __DIR__ . '/components/navbar.php'; ?>

    <main class="max-w-6xl mx-auto px-6 py-12 flex-grow">
        <div class="text-center mb-12">
            <span class="text-red-600 font-semibold uppercase tracking-wider text-sm">
                Onze menu
            </span>
        </div>

        <section class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">
                    Broodjes
                </h1>

                <p class="text-gray-600">
                    Dagelijks vers bereid met liefde en de beste ingrediënten
                </p>
            </div>

            <?php foreach ($broodjes as $broodje): ?>

                <form action="order.php" method="post"
                    class="group bg-white rounded-2xl shadow-md flex flex-col
                           transform transition-all duration-300 ease-out
                           hover:-translate-y-1 hover:shadow-xl">

                    <input type="hidden" name="sandwich_id" value="<?= $broodje->getId() ?>">

                    <div class="overflow-hidden rounded-t-2xl">
                        <img
                            src="img/broodjes/<?= $broodje->getPicture() ?>"
                            alt="<?= htmlspecialchars($broodje->getName()) ?>"
                            class="h-40 w-full object-cover transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="flex flex-col flex-1 p-5 text-center">

                        <h2 class="text-xl font-semibold mb-1 text-gray-800">
                            <?= htmlspecialchars($broodje->getName()) ?>
                        </h2>
                        <p class="text-sm text-gray-600 mb-3">
                            <?= htmlspecialchars($broodje->getDescription()) ?>
                        </p>
                        <p class="text-lg font-bold text-red-700 mb-4">
                            €<?= number_format($broodje->getPrice(), 2) ?>
                        </p>

                        <button
                            type="submit"
                            class="mt-auto bg-red-600 text-white py-2 rounded-xl
                                   hover:bg-red-700 transition font-semibold">
                            Bestellen
                        </button>
                    </div>
                </form>
            <?php endforeach; ?>
        </section>
    </main>

    <?php include __DIR__ . '/components/footer.php'; ?>

</body>
</html>