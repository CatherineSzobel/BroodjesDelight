<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sandwich Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/orderForm.js" defer></script>
</head>

<body class="bg-gray-900 text-gray-200">

    <!-- Header -->
    <header class="w-full flex justify-center shadow-md bg-gray-800">
        <a href="index.php"><img src="img/logo.png" class="w-24 h-24"></a>
    </header>

    <!-- Progress Bar -->
    <div class="mx-auto w-full max-w-3xl mt-8 px-6">
        <!-- Track -->
        <div class="relative h-2 bg-gray-700 rounded-full">
            <!-- Filled portion -->
            <div class="absolute h-2 bg-red-600 rounded-full transition-all duration-500"
                style="width: <?= $step / 3 * 100 ?>%"></div>
        </div>

        <!-- Step Labels -->
        <div class="flex justify-between mt-2 text-sm font-semibold text-gray-400">
            <span class="<?= $step >= 1 ? 'text-red-500' : '' ?>">Gegevens</span>
            <span class="<?= $step >= 2 ? 'text-red-500' : '' ?>">Overzicht</span>
            <span class="<?= $step >= 3 ? 'text-green-500' : '' ?>">Bevestigd</span>
        </div>
    </div>


    <main class=" mx-auto min-h-screen w-full max-w-4xl px-6 mt-10 flex flex-col gap-10">

        <!-- Step 1: Personal Info -->
        <?php if ($step === 1): ?>
            <form method="post"
                class="bg-gray-800/70 backdrop-blur-md rounded-2xl shadow-lg p-8 flex flex-col gap-6 mx-auto w-full max-w-md transition-all">
                <h2 class="text-2xl font-bold text-gray-100 text-center">Contact Information</h2>

                <div class="space-y-4">
                    <input type="text" name="firstname" required
                        value="<?= htmlspecialchars($response['firstname'] ?? '') ?>"
                        placeholder="First Name"
                        class="w-full p-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-600 transition">

                    <input type="text" name="lastname" required
                        value="<?= htmlspecialchars($response['lastname'] ?? '') ?>"
                        placeholder="Last Name"
                        class="w-full p-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-600 transition">

                    <input type="email" name="email" required
                        value="<?= htmlspecialchars($response['email'] ?? '') ?>"
                        placeholder="E-mail"
                        class="w-full p-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-600 transition">
                </div>

                <h2 class="text-2xl font-bold text-gray-100 text-center mt-6">Delivery Address</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="text" name="city" required
                        value="<?= htmlspecialchars($response['city'] ?? '') ?>"
                        placeholder="City"
                        class="w-full p-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-600 transition">

                    <input type="text" name="postalcode" required
                        value="<?= htmlspecialchars($response['postalcode'] ?? '') ?>"
                        placeholder="Postal Code"
                        class="w-full p-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-600 transition">
                </div>

                <input type="text" name="street" required
                    value="<?= htmlspecialchars($response['street'] ?? '') ?>"
                    placeholder="Street"
                    class="w-full p-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-600 transition">

                <input type="text" name="housenumber" required
                    value="<?= htmlspecialchars($response['housenumber'] ?? '') ?>"
                    placeholder="House Number"
                    class="w-full p-3 border border-gray-600 rounded-lg bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-600 transition">

                <button type="submit"
                    class="w-full bg-red-600 text-white font-semibold py-3 rounded-xl shadow hover:bg-red-700 transition">
                    Next →
                </button>

                <?php if ($sandwich !== null): ?>
                    <input type="hidden" name="sandwich_id" value="<?= $sandwich->getId() ?>">
                <?php endif; ?>

                <input type="hidden" name="step" value="2">
            </form>
        <?php endif; ?>

        <!-- Step 2: Order Summary -->
        <?php if ($step === 2 && $sandwich !== null): ?>
            <form method="post"
                class="w-full max-w-3xl bg-gray-800/70 backdrop-blur-md rounded-2xl shadow-lg p-8 flex flex-col gap-6 mx-auto transition-all">
                <h2 class="text-2xl font-bold text-gray-100 text-center">Review Your Order</h2>

                <div class="flex flex-col sm:flex-row gap-6 items-center bg-gray-700/80 p-5 rounded-xl shadow-md">
                    <img id="sandwichPicture" src="img/broodjes/<?= $sandwich->getPicture() ?>"
                        class="w-32 h-32 object-cover rounded-lg shadow">
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-gray-100" id="sandwichName"><?= htmlspecialchars($sandwich->getName()) ?></h3>
                        <p id="sandwichDescription" class="text-gray-300 mt-1"><?= htmlspecialchars($sandwich->getDescription()) ?></p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-lg font-bold text-red-500" id="sandwichPrice">€<?= number_format($sandwich->getPrice(), 2) ?></span>
                            <button type="button" id="editButton" class="text-xs bg-blue-600 text-white px-3 py-1 rounded-full hover:bg-blue-500 transition">Edit</button>
                        </div>
                    </div>
                </div>

                <select name="sandwich_id" id="editSandwichSelect" class="hidden mt-2 p-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-100">
                    <?php foreach ($sandwiches as $s): ?>
                        <option
                            value="<?= $s->getId() ?>"
                            data-name="<?= htmlspecialchars($s->getName()) ?>"
                            data-price="<?= number_format($s->getPrice(), 2) ?>"
                            data-picture="<?= $s->getPicture() ?>"
                            data-description="<?= htmlspecialchars($s->getDescription()) ?>"
                            <?= $s->getId() === $sandwich->getId() ? 'selected' : '' ?>>
                            <?= htmlspecialchars($s->getName()) ?> - €<?= number_format($s->getPrice(), 2) ?>
                        </option>
                    <?php endforeach; ?>
                </select>


                <div class="bg-gray-700 p-4 rounded-lg shadow mt-4">
                    <h4 class="font-semibold text-gray-100 mb-2">Your Contact Information</h4>
                    <p><?= htmlspecialchars($response['firstname'] . ' ' . $response['lastname']) ?></p>
                    <p><?= htmlspecialchars($response['email']) ?></p>
                    <p><?= htmlspecialchars($response['street'] . ' ' . $response['housenumber'] ?? '') ?>, <?= htmlspecialchars($response['postalcode'] ?? '') ?> <?= htmlspecialchars($response['city'] ?? '') ?></p>
                </div>

                <!-- Hidden inputs to preserve data -->
                <input type="hidden" name="step" value="3">
                <input type="hidden" name="sandwich_id" value="<?= $sandwich->getId() ?>">
                <input type="hidden" name="firstname" value="<?= htmlspecialchars($response['firstname']) ?>">
                <input type="hidden" name="lastname" value="<?= htmlspecialchars($response['lastname']) ?>">
                <input type="hidden" name="email" value="<?= htmlspecialchars($response['email']) ?>">
                <input type="hidden" name="street" value="<?= htmlspecialchars($response['street']) ?>">
                <input type="hidden" name="housenumber" value="<?= htmlspecialchars($response['housenumber']) ?>">
                <input type="hidden" name="postalcode" value="<?= htmlspecialchars($response['postalcode']) ?>">
                <input type="hidden" name="city" value="<?= htmlspecialchars($response['city']) ?>">

                <div class="flex flex-col sm:flex-row gap-4 mt-4">
                    <button type="submit" name="step" value="1"
                        class="w-full sm:w-auto bg-gray-600 text-gray-200 font-semibold py-2 px-4 rounded-lg hover:bg-gray-500 transition">
                        ← Back
                    </button>
                    <button type="submit"
                        class="w-full sm:w-auto bg-green-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                        Place Order
                    </button>
                </div>
            </form>
        <?php endif; ?>

        <!-- Step 3: Confirmation -->
        <?php if ($step === 3 && $response['orderId'] && !$response['orderAlBesteld']): ?>
            <div class="w-full max-w-3xl bg-gray-800/70 backdrop-blur-md rounded-2xl shadow-lg p-8 flex flex-col items-center gap-4 mx-auto text-center transition-all">
                <h2 class="text-2xl font-bold text-green-500">Order Confirmed!</h2>
                <p class="text-gray-200">Your order number: <span class="font-semibold"><?= $response['orderId'] ?></span></p>
                <p class="text-gray-200 mt-2">Thank you, <?= htmlspecialchars($response['firstname']) ?>!</p>
                <a href="index.php" class="mt-4 bg-red-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-red-700 transition">
                    Back to Home
                </a>
            </div>
        <?php endif; ?>


    </main>
    <?php include __DIR__ . '/components/footer.php'; ?>
</body>

</html>