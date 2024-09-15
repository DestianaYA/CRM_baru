<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WhatsAppQR extends Command
{
    protected $signature = 'node:whatsapp';
    protected $description = 'Start WhatsApp Node.js script';

    public function handle()
    {
        exec('node ../node-whatsapp/index.js');
    }
}