<?php

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Timegridio\Tests\Models\PreferenceableStub;

class PreferenceableTest extends TestCaseDB
{
    use DatabaseTransactions;

    protected $preferenceable;

    /**
     * @test
     */
    public function it_has_preferences()
    {
        $this->arrangeScenario();
 
        $this->assertInstanceOf(MorphMany::class, $this->preferenceable->preferences());
    }

    /**
     * @test
     */
    public function it_sets_and_gets_a_string_preference()
    {
        $this->arrangeScenario();

        $setValue = 'string';

        $this->preferenceable->pref('test-preference', $setValue);

        $getValue = $this->preferenceable->pref('test-preference');

        $this->assertEquals($setValue, $getValue);
    }

    /**
     * @test
     */
    public function it_sets_and_gets_a_bool_preference()
    {
        $this->arrangeScenario();

        $setValue = true;

        $this->preferenceable->pref('test-preference', $setValue, 'bool');

        $getValue = $this->preferenceable->pref('test-preference');

        $this->assertEquals($setValue, $getValue);
    }

    /**
     * @test
     */
    public function it_sets_and_gets_a_int_preference()
    {
        $this->arrangeScenario();

        $setValue = 5;

        $this->preferenceable->pref('test-preference', $setValue, 'int');

        $getValue = $this->preferenceable->pref('test-preference');

        $this->assertEquals($setValue, $getValue);
    }

    /**
     * @test
     */
    public function it_sets_and_gets_a_float_preference()
    {
        $this->arrangeScenario();

        $setValue = 5.9;

        $this->preferenceable->pref('test-preference', $setValue, 'float');

        $getValue = $this->preferenceable->pref('test-preference');

        $this->assertEquals($setValue, $getValue);
    }

    /**
     * @test
     */
    public function it_sets_and_gets_a_array_preference()
    {
        $this->arrangeScenario();

        $setValue = ['element', 7, 'key' => true];

        $this->preferenceable->pref('test-preference', $setValue, 'array');

        $getValue = $this->preferenceable->pref('test-preference');

        $this->assertEquals($setValue, $getValue);
    }

    /////////////
    // Helpers //
    /////////////

    protected function arrangeScenario()
    {
        $this->preferenceable = new PreferenceableStub(['id' => 1]);
    }
}