 <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    ?>

 <header class="w-full bg-white border-b">
     <div class="max-w-6xl mx-auto flex items-center justify-between px-6 py-4">
         <a href="index.php">
             <img src="img/logo.png" class="w-20 h-20" alt="BroodjesZaak Logo">
         </a>

         <nav class="space-x-8 text-lg text-gray-700">
             <a href="index.php" class=" <?php echo $currentPage === 'index.php' ? 'font-semibold' : 'hover:text-red-600'; ?> ">Home</a>
             <a href="about.php" class="<?php echo $currentPage === 'about.php' ? 'font-semibold' : 'hover:text-red-600'; ?>">About</a>
             <a href="menu.php" class="<?php echo $currentPage === 'menu.php' ? 'font-semibold' : 'hover:text-red-600'; ?>">Menu</a>
             <a href="contact.php" class="<?php echo $currentPage === 'contact.php' ? 'font-semibold' : 'hover:text-red-600'; ?>">Contact</a>
         </nav>
     </div>
 </header>