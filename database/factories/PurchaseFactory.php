<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

//25行目あたりで、\Customer::count()という記述によって、複数の顧客からランダムにcustomer_idを設定したいため、Customerクラスを呼び込んでおく

use App\Models\Customer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //今いる顧客からランダムにidを設定する
            'customer_id' => rand(1, Customer::count()),
            //ステータス(キャンセルされたかどうか)も、fakerでbooleanを指定する。0か1か
            'status' => $this->faker->boolean,
        ];
    }
}
