<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        form { background-color: #f9f9f9; padding: 20px; border-radius: 8px; max-width: 500px; margin-top: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], input[type="date"], select, textarea {
            width: calc(100% - 22px); /* Adjust for padding and border */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button { background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .error-message { color: red; font-size: 0.9em; margin-top: -10px; margin-bottom: 10px; }
        .back-button { background-color: #6c757d; color: white; padding: 10px 15px; border: none; border-radius: 5px; text-decoration: none; display: inline-block; margin-left: 10px;}
    </style>
</head>
<body>
    <h1>Tambah Transaksi Baru</h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/transactions/store" method="post">
        <?= csrf_field() ?> <label for="type">Tipe Transaksi:</label>
        <select id="type" name="type" required>
            <option value="income" <?= old('type') == 'income' ? 'selected' : '' ?>>Pemasukan</option>
            <option value="expense" <?= old('type') == 'expense' ? 'selected' : '' ?>>Pengeluaran</option>
        </select>

        <label for="amount">Jumlah:</label>
        <input type="number" id="amount" name="amount" step="0.01" required value="<?= old('amount') ?>">

        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" rows="3"><?= old('description') ?></textarea>

        <label for="category">Kategori:</label>
        <input type="text" id="category" name="category" required value="<?= old('category') ?>">
        <small>Contoh: Gaji, Makanan, Transportasi</small>

        <label for="transaction_date">Tanggal Transaksi:</label>
        <input type="date" id="transaction_date" name="transaction_date" required value="<?= old('transaction_date', date('Y-m-d')) ?>">

        <button type="submit">Simpan Transaksi</button>
        <a href="/transactions" class="back-button">Kembali</a>
    </form>
</body>
</html>