<?php
$today = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
$days = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];
$months = ['January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April', 'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'];
$dateLabel = $days[$today->format('l')] . ', ' . $today->format('j') . ' ' . $months[$today->format('F')] . ' ' . $today->format('Y');

require __DIR__ . '/layout/head.php';
require __DIR__ . '/layout/header.php';
require __DIR__ . '/layout/navigation.php';
?>

<main class="container main-content">
  <?php
  require __DIR__ . '/pages/reservation-page.php';
  require __DIR__ . '/pages/management-page.php';
  require __DIR__ . '/pages/table-status-page.php';
  ?>
</main>

<?php require __DIR__ . '/layout/footer.php'; ?>
