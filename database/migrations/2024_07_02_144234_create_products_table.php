<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productname')->comment('Tên sản phẩm');
            $table->integer('category_id')->comment('ID của danh mục sản phẩm');
            $table->decimal('price', 10, 2)->comment('Giá của sản phẩm');
            $table->string('image')->nullable()->comment('Đường dẫn đến ảnh của sản phẩm');
            $table->text('description')->nullable()->comment('Mô tả chi tiết về sản phẩm'); // Thêm trường mô tả
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};