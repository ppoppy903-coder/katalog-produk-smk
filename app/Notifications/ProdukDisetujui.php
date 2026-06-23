<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ProdukDisetujui extends Notification
{
    use Queueable;

    protected $produk;

    public function __construct($produk)
    {
        $this->produk = $produk;
    }

    public function via($notifiable)
    {
        return ['database']; // Kita pakai database agar muncul di lonceng
    }

    public function toArray($notifiable)
    {
        return [
            'pesan' => 'Produk "' . $this->produk->nama_produk . '" telah disetujui oleh Guru Pembimbing.',
        ];
    }
}