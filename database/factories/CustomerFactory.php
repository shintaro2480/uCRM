<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //fakerで作る電話番号から、-を削除する
        $tel = str_replace('-', '', $this->faker->phoneNumber);
        //fakerで作る住所先頭の、郵便番号を削除する。先頭9文字目から使う
        $address = mb_substr($this->faker->address, 9);

        return [
            'name' => $this->faker->name, 
            'kana' => $this->faker->kanaName, 
            'tel' => $tel, 
            'email' => $this->faker->email, 
            'postcode' => $this->faker->postcode, 
            'address' => $address,
            'birthday' => $this->faker->dateTime, 
            'gender' => $this->faker->numberBetween(0, 2), 
            'memo' => $this->faker->realText(50), 
        ];
    }
}
