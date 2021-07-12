<?php

namespace Database\Factories;

use App\Models\Agency;
use App\Models\Deed;
use App\Models\Pole;
use App\Models\Warranty;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Deed::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client'                         => $this->faker->name(),
            'notary'                         => $this->faker->name(),
            'purpose_of_the_credit'          => $this->faker->paragraph(1),
            'reference_of_credit_decision'   => $this->faker->unique()->numberBetween(1, 1000),
            'date_of_receipt_of_the_request' => $this->faker->dateTimeBetween('-2 years'),
            'debit_advice_notified'          => $this->faker->randomElement([null, 'oui', 'non']),
            'tax_notice_reference'           => $this->faker->unique()->word(),
            'writting_end_date'              => $this->faker->dateTimeBetween('-2 years'),
            'signature_date'                 => $this->faker->dateTimeBetween('-2 years'),
            'writting_completion_date'       => $this->faker->dateTimeBetween('-2 years'),
            'registration_sending_date'      => $this->faker->dateTimeBetween('-2 years'),
            'registration_return_date'       => $this->faker->dateTimeBetween('-2 years'),
            'registration_amount'            => $this->faker->numberBetween(100000, 10000000),
            'file_completion_date'           => $this->faker->dateTimeBetween('-2 years'),
            'filing_date'                    => $this->faker->dateTimeBetween('-2 years'),
            'file_withdrawal_date'           => $this->faker->dateTimeBetween('-2 years'),
            'date_of_transmission_to_the_BO' => $this->faker->dateTimeBetween('-2 years'),
            'inscription_amount'             => $this->faker->numberBetween(100000, 10000000),
            'pole_id'                        => Pole::getRandomId(),
            'warranty_id'                    => Warranty::getRandomId(),
            'agency_id'                      => Agency::getRandomId(),
        ];
    }
}
