<?php

namespace Tests\Feature;

use App\Concert;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewConcertListingTest extends TestCase
{

       /** @test */
       public function user_can_view_a_concert_listing()
       {
           // Test
           /**For any test one need to arrange things that are needed to handle the test
            * For example, one need to have a geometry set to handle math test
            *
            * Test have phases, for instance 3 phases that we are going to handle[ArrangePhase, ActionPhase, AssertPahse]
            */

            //Arrange Phase->do any setup work that is needed for our test, i.e gather geometry set and index table
                //Now, here, ask youself what is needed for a user to view a concert list:
                    //1.Create a concert ->so that there's a concert for a user to view

                    $concert = Concert::create([
                        'title' => 'Through Thick & Thin (TNT)',
                        'subtitle' => 'with Njugush and Celestine',
                        'date' => Carbon::parse('February 14, 2020 8:00pm'),
                        'ticket_price' => 2050,
                        'venue' => 'Garden City',
                        'venue_address' => '0142 Thika Road',
                        'city' => 'Nairobi',
                        'state' => 'Kasarani',
                        'zip' => '4120',
                        'additional_information' =>'For tickets, call (0727 057 310).'

                    ]);

            //Action Phase->actual code that we wanna test:
                //Here we're testing if a user can view the concert listing:
                    //1.View the concert listing
                    $this->visit('/concerts/'.$concert->id);

            //Assert Phase->where we make assertions about what happens to verify that we had the outcome that we expected:
                //Assertain that we have actual seen the concert details:
                    //1.See the concert details
                    $this->see('Through Thick & Thin (TNT)');
                    $this->see('with Njugush and Celestine');
                    $this->see('February 14, 2020');
                    $this->see('8:00pm');
                    $this->see('20.50');
                    $this->see('Garden City');
                    $this->see('0142 Thika Road');
                    $this->see('Nairobi, Kasarani 4120');
                    $this->see('For tickets, call (0727 057 310).');

       }


}