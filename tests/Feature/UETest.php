<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\UE;
use App\Models\EC;
use Illuminate\Support\Facades\DB;

class UETest extends TestCase
{
    public function test_create_ue()
    {
        $response = $this->post('/unites_enseignement', [
            'code' => 'UE01',
            'nom' => 'Programmation',
            'credits_ects' => 6,
            'semestre' => 1
        ]);

        $response->assertStatus(302);  // Redirection après une création réussie
        $this->assertDatabaseHas('unites_enseignement', [
            'code' => 'UE01',
            'nom' => 'Programmation',
            'credits_ects' => 6,
            'semestre' => 1
        ]);
    }

    public function test_credits_ects_between_1_and_30()
    {
        $response = $this->post('/unites_enseignement', [
            'code' => 'UE01',
            'nom' => 'Programmation',
            'credits_ects' => 31,  // Crédits incorrects
            'semestre' => 1
        ]);

        $response->assertSessionHasErrors('credits_ects');
    }

    public function test_association_ec_to_ue()
    {
        DB::table('unites_enseignement')->where('code', 'UE01')->delete();

        $ue = UE::create([
            'code' => 'UE01',
            'nom' => 'Programmation',
            'credits_ects' => 6,
            'semestre' => 1
        ]);

        $ec = EC::create([
            'nom' => 'C++, Programmation',
            'coefficient' => 1,
            'ue_id' => $ue->id ,
            'code'=> 'EC01'
        ]);

        $this->assertEquals($ue->id, $ec->ue_id);
    }

    public function test_validate_ue_code_format()
    {
        $response = $this->post('/unites_enseignement', [
            'code' => 'UE1A',  // Code UE invalide
            'nom' => 'Programmation',
            'credits_ects' => 6,
            'semestre' => 1
        ]);

        $response->assertSessionHasErrors('code');
    }

    public function test_valid_semester()
    {
        $response = $this->post('/unites_enseignement', [
            'code' => 'UE01',
            'nom' => 'Programmation',
            'credits_ects' => 6,
            'semestre' => 3  // Semestre invalide
        ]);

        $response->assertSessionHasErrors('semestre');
    }
}
