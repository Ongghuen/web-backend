<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TransactionDetail;
use App\Models\Product;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // User::factory(10)->create();
    Role::create([
      'name' => "Admin"
    ]);

    User::factory()->create([
      'name' => "Raihan Achmad",
      'email' => "r@r.com",
      'password' => bcrypt("hahaha"),
      'role_id' => 1,
    ]);

    User::factory()->create([
      'name' => "Daffa",
      'email' => "d@d.com",
      'password' => bcrypt("hahaha"),
      'role_id' => 1,
    ]);

    Product::factory(5)->create();

    Transaction::create([
      'user_id' => 1,
    ]);

    TransactionDetail::create([
      'transaction_id' => 1,
      'product_id' => 1,
    ]);

    TransactionDetail::create([
      'transaction_id' => 1,
      'product_id' => 2,
    ]);
    

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
  }
}
