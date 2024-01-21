<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Deceased;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DeceasedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fname' => $this->faker->firstName,
            'mname' => $this->faker->firstName,
            'lname' => $this->faker->lastName,
            'relationship' => $this->faker->randomElement(['Spouse', 'Parent', 'Sibling', 'Child', 'Friend']),
            'causeofdeath' => $this->faker->sentence,
            'sex' => $this->faker->randomElement(['Male', 'Female']),
            'religion' => $this->faker->word,
            'age' => $this->faker->numberBetween(18, 99),
            'dateofbirth' => $this->faker->date,
            'dateofdeath' => $this->faker->date,
            'placeofdeath' => $this->faker->city,
            'citizenship' => $this->faker->country,
            'address' => $this->faker->address,
            'civilstatus' => $this->faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
            'occupation' => $this->faker->word,
            
            'namecemetery' => $this->faker->word,
            'addresscemetery' => $this->faker->address,
            'nameFather' => $this->faker->name('male'),
            'nameMother' => $this->faker->name('female'),

            'image' => $this->faker->randomElement(['storage/images/old1.jpg', 'storage/images/old2.jpg', 'storage/images/old3.jpg', 'storage/images/old4.jpg', 'storage/images/old5.jpg']),
            'idtype' => null,
            'validid' => null,
            'transferpermit' => $this->faker->randomElement(['storage/images/old1.jpg', 'storage/images/old2.jpg', 'storage/images/old3.jpg', 'storage/images/old4.jpg', 'storage/images/old5.jpg']),
            'swabtest' => $this->faker->randomElement(['storage/images/old1.jpg', 'storage/images/old2.jpg', 'storage/images/old3.jpg', 'storage/images/old4.jpg', 'storage/images/old5.jpg']),
            'proofofdeath' => $this->faker->randomElement(['storage/images/old1.jpg', 'storage/images/old2.jpg', 'storage/images/old3.jpg', 'storage/images/old4.jpg', 'storage/images/old5.jpg']),
            

        ];
    }
}
