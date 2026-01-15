<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Orders view</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/admin.js" defer></script>
</head>

<body class="min-h-screen bg-gray-900 text-gray-200 ">

    <header class="bg-gray-800 shadow-md flex justify-center">
        <img src="img/logo.png" class="w-24 h-24" alt="Logo">
    </header>

    <main class="max-w-6xl mx-auto p-6 space-y-6">

        <?php foreach (['Ordered' => $ordered, 'Ready to be Collected' => $gemaakt] as $title => $ordersGroup): ?>
            <?php if (!empty($ordersGroup)): ?>
                <?php
                $sectionId = strtolower(str_replace(' ', '-', $title)) . '-section';
                ?>
                <section class="mb-6">
                    <button
                        type="button"
                        class="w-full flex justify-between items-center px-4 py-2 bg-gray-800 text-gray-100 rounded-lg font-bold shadow hover:bg-gray-700 transition"
                        data-target="<?= $sectionId ?>">
                        <span><?= $title ?></span>
                        <svg class="w-5 h-5 transition-transform transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="<?= $sectionId ?>" class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 transition-all duration-300">
                        <?php foreach ($ordersGroup as $order):
                            $client = $clientManager->getClientById($order->getClientId());
                            $sandwich = $sandwichManager->getSandwichById($order->getSandwichId());
                            $statusColor = $order->getStatus() === 1 ? 'bg-yellow-600/30 text-yellow-200' : ($order->getStatus() === 2 ? 'bg-blue-600/30 text-blue-200' :
                                'bg-green-600/30 text-green-200');
                        ?>
                            <div class="bg-gray-700 shadow-md rounded-xl p-4 flex flex-col justify-between hover:shadow-lg transition">
                                <div class="space-y-2">
                                    <div class="flex justify-between items-center">
                                        <h3 class="font-semibold text-lg text-gray-100"><?= htmlspecialchars($client->getFullName()) ?></h3>
                                        <span class="px-2 py-1 rounded-full text-sm font-medium <?= $statusColor ?>">
                                            <?= $title ?>
                                        </span>
                                    </div>
                                    <p class="text-gray-300 text-sm"><?= htmlspecialchars($client->getEmail()) ?></p>
                                    <p class="text-gray-200 font-medium">Order: <?= htmlspecialchars($sandwich->getName()) ?></p>
                                    <p class="text-gray-400 text-sm">Ordered Time: <?= $order->getOrderedTime()->format('d-m-Y H:i') ?></p>
                                </div>
                                <form method="post" action="admin.php" class="mt-4">
                                    <input type="hidden" name="id" value="<?= $order->getId() ?>">
                                    <input type="hidden" name="action" value="<?= $title === 'Ordered' ? 'Done' : 'Collected' ?>">
                                    <button class="w-full px-4 py-2 bg-indigo-700 text-gray-100 rounded-lg hover:bg-indigo-600 transition font-medium">
                                        <?= $title === 'Ordered' ? 'Mark as Done' : 'Mark as Collected' ?>
                                    </button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php if (empty($ordered) && empty($gemaakt)): ?>
            <div class="text-center text-xl text-gray-200 font-semibold bg-gray-700 rounded-lg shadow p-8">
                There are currently no orders.
            </div>
        <?php endif; ?>
        <div>
            <a href="index.php" class="px-4 py-2 bg-indigo-700 text-gray-100 rounded-lg hover:bg-indigo-600 transition font-medium">
                Back to Home
            </a>
        </div>
    </main>
    <?php include __DIR__ . '/components/footer.php'; ?>
</body>

</html>