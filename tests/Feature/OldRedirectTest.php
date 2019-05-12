<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OldRedirectTest extends TestCase
{

    /**
     * @return void
     */
    public function testNotFound()
    {
        // main index
        $response = $this->get('/main.php?a=afasfasf');
        $response->assertStatus(404);
    }

    /**
     * @return void
     */
    public function testRedirectsIndex()
    {
        // main index
        $response = $this->get('/main.php');
        $response->assertStatus(302);
        $response->assertLocation('/');
    }

    /**
     * @return void
     */
    public function testRedirectsCategories()
    {
        // categories:

        $response = $this->get('/main.php?a=11');
        $response->assertStatus(302);
        $response->assertLocation('/category/klinovie_remni/variatornie_skorostnie_remni');

        $response = $this->get('/main.php?a=12');
        $response->assertStatus(302);
        $response->assertLocation('/category/klinovie_remni/dvoynie_klinovie_remni');

        $response = $this->get('/main.php?a=13');
        $response->assertStatus(302);
        $response->assertLocation('/category/klinovie_remni/cepnie_remni');

        $response = $this->get('/main.php?a=14');
        $response->assertStatus(302);
        $response->assertLocation('/category/klinovie_remni/ruchyevie_remni');

        $response = $this->get('/main.php?a=15');
        $response->assertStatus(302);
        $response->assertLocation('/category/klinovie_remni/klassicheskie_remni');

        $response = $this->get('/main.php?a=16');
        $response->assertStatus(302);
        $response->assertLocation('/category/klinovie_remni/ruchyevie_remni_bolshogo_profilya');

        $response = $this->get('/main.php?a=17');
        $response->assertStatus(302);
        $response->assertLocation('/category/klinovie_remni/perforirovannie_remni');

        $response = $this->get('/main.php?a=18');
        $response->assertStatus(302);
        $response->assertLocation('/category/klinovie_remni/polyuretanovie_remni_kruglovo_sechenia');

        $response = $this->get('/main.php?a=19');
        $response->assertStatus(302);
        $response->assertLocation('/category/klinovie_remni/uzkie_remni_s_obertkoy_bokovih_graney');

        $response = $this->get('/main.php?a=21');
        $response->assertStatus(302);
        $response->assertLocation('/category/zubchatie_remni/remni_htd_rpp');

        $response = $this->get('/main.php?a=22');
        $response->assertStatus(302);
        $response->assertLocation('/category/zubchatie_remni/neoprenovie_remni');

        $response = $this->get('/main.php?a=23');
        $response->assertStatus(302);
        $response->assertLocation('/category/zubchatie_remni/polyuretanovie_remni');

        $response = $this->get('/main.php?a=24');
        $response->assertStatus(302);
        $response->assertLocation('/category/zubchatie_remni/remni_sts_std');

        $response = $this->get('/main.php?a=31');
        $response->assertStatus(302);
        $response->assertLocation('/category/ploskie_remni/neoprenovie_remni');

        $response = $this->get('/main.php?a=32');
        $response->assertStatus(302);
        $response->assertLocation('/category/ploskie_remni/polyuretanovie_remni');

        $response = $this->get('/main.php?a=40');
        $response->assertStatus(302);
        $response->assertLocation('/category/specialnie_remni');

        $response = $this->get('/main.php?a=50');
        $response->assertStatus(302);
        $response->assertLocation('/category/shkivi');

    }

    /**
     * @return void
     */
    public function testRedirectsPages()
    {
        // pages:

        $response = $this->get('/main.php?a=contact');
        $response->assertStatus(302);
        $response->assertLocation('/page/contacts');

        $response = $this->get('/main.php?a=sati');
        $response->assertStatus(302);
        $response->assertLocation('/page/sati');

        $response = $this->get('/main.php?a=eaton-vickers');
        $response->assertStatus(302);
        $response->assertLocation('/page/eaton-vickers');
    }

}
