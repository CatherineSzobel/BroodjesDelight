<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BroodjesZaak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/main.css">
</head>

<body class=" min-h-screen font-serif">

    <!-- Header -->
    <header class="w-full flex justify-center shadow-md">
        <a href="index.php"><img src="img/logo.png" class="w-24 h-24"></a>
    </header>

    <!-- Main -->
    <main class="max-w-6xl mx-auto px-6 py-12">
        <h1 class="text-3xl text-white font-bold text-center mb-12">
            Our sandwiches
        </h1>

        <!-- Grid -->
        <section class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <?php foreach ($broodjes as $broodje): ?>
                <form action="order.php" method="post"
                    class=" group bg-white rounded-xl shadow-md flex flex-col
                        transform transition-all duration-300 ease-out
                        hover:-translate-y-2 hover:scale-105 hover:shadow-2xl">

                    <input type="hidden" name="sandwich_id" value="<?= $broodje->getId() ?>">

                    <!-- Image -->
                    <div class="overflow-hidden rounded-t-xl">
                        <img
                            src="img/broodjes/<?= $broodje->getPicture() ?>"
                            alt="<?= htmlspecialchars($broodje->getName()) ?>"
                            class="h-40 w-full object-cover transition-transform duration-300 ease-out group-hover:scale-110">
                    </div>


                    <!-- Content -->
                    <div class="flex flex-col flex-1 p-4 text-center">
                        <h2 class="text-lg font-semibold mb-1">
                            <?= htmlspecialchars($broodje->getName()) ?>
                        </h2>

                        <p class="text-sm text-gray-600 mb-3">
                            <?= htmlspecialchars($broodje->getDescription()) ?>
                        </p>

                        <p class="text-lg font-bold text-red-600 mb-4">
                            €<?= number_format($broodje->getPrice(), 2) ?>
                        </p>

                        <!-- CTA -->
                        <button
                            type="submit"
                            class="mt-auto bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition font-semibold">
                            Order
                        </button>
                    </div>
                </form>
            <?php endforeach; ?>
        </section>
    </main>

</body>

</html>