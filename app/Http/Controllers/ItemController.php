<?php

namespace App\Http\Controllers;

use App\Models\Item;

use NumberFormatter;
use App\Models\TopUp;

use App\Models\Balance;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ItemController extends Controller
{
    /**
     * Run the migrations.
     *
     * 
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('message');
            $table->string('phone_number', 20);
            $table->enum('status', ['success', 'pending']);
            $table->dateTime('time');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}