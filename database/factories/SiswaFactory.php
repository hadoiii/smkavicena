<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class SiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 100,
            'nisn' => '',
            'nama_depan' => $this->faker->name,
            'nama_belakang' => '',
            'jenis_kelamin' => $this->faker->randomElement(['Pria','Wanita']),
            'tempat_lahir' => '',
            'tanggal_lahir' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'agama' => $this->faker->randomElement(['Islam','Kristen','Katholik','Hindu','Budha']),
            'golongan_darah' => $this->faker->randomElement(['A','B','AB','O']),
            'alamat' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'no_ponsel' => '',
            'nama_ayah' => $this->faker->name,
            'pekerjaan_ayah' => '',
            'nama_ibu' => $this->faker->name,
            'pekerjaan_ibu' => '',
            'nama_wali' => $this->faker->name,
            'no_darurat' => '',
            'sekolah_asal' => $this->faker->name,
            'no_ijazah_smp' => '',
        ];
    }
}
