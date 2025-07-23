<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .success-message { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 15px; border-radius: 5px; }
        .add-button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 5px; text-decoration: none; display: inline-block; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>Daftar Transaksi</h1>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="success-message">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <a href="/transactions/create" class="add-button">Tambah Transaksi Baru</a>

    <?php if (!empty($transactions) && is_array($transactions)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipe</th>
                    <th>Jumlah</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= esc($transaction['id']) ?></td>
                    <td><?= esc(ucfirst($transaction['type'])) ?></td>
                    <td>Rp <?= number_format(esc($transaction['amount']), 2, ',', '.') ?></td>
                    <td><?= esc($transaction['description']) ?></td>
                    <td><?= esc($transaction['category']) ?></td>
                    <td><?= esc($transaction['transaction_date']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Belum ada transaksi yang dicatat.</p>
    <?php endif; ?>
</body>
</html>