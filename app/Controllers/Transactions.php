<?php

namespace App\Controllers;

use App\Models\TransactionModel; // Import model yang baru dibuat

class Transactions extends BaseController
{
    protected $transactionModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
    }

    public function index()
    {
        $data['transactions'] = $this->transactionModel->findAll(); // Mengambil semua transaksi
        return view('transactions/index', $data); // Memuat view
    }

    public function create()
    {
        return view('transactions/form'); // Memuat form tambah transaksi
    }

    public function store()
    {
        // Validasi data
        if (! $this->validate([
            'type' => 'required|in_list[income,expense]',
            'amount' => 'required|numeric',
            'description' => 'permit_empty|max_length[255]',
            'category' => 'required|max_length[100]',
            'transaction_date' => 'required|valid_date',
        ])) {
            // Jika validasi gagal, kembali ke form dengan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'type'             => $this->request->getPost('type'),
            'amount'           => $this->request->getPost('amount'),
            'description'      => $this->request->getPost('description'),
            'category'         => $this->request->getPost('category'),
            'transaction_date' => $this->request->getPost('transaction_date'),
        ];

        $this->transactionModel->save($data); // Menyimpan data ke database

        return redirect()->to('/transactions')->with('message', 'Transaksi berhasil ditambahkan!');
    }
}