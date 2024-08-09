<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id(); 
            //foreignId('customer_id')->constrained() と記述することで、Laravelは自動的に customer_idカラムが customersテーブルのid カラムを参照する外部キーであると認識します。
            //onUpdate('cascade')参照先のテーブルの id が更新されたときに、このテーブルの customer_id も自動的に更新されるようにする設定です。
            $table->foreignId('customer_id')->constrained()->onUpdate('cascade'); 
            $table->boolean('status'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
