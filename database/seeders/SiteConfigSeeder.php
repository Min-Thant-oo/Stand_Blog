<?php

namespace Database\Seeders;

use App\Models\SiteConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            [
                'facebook' => 'https://facebook.com/',
                'twitter' => 'https://twitter.com/',
                'linkedin' => 'http://linkedin.com/',
                'about' => <<<EOT
                    Privacy Policy
                    Practically every single website worth anything out there has a Privacy Policy page that it can turn to whenever issues about privacy come up with users. That's why you really need to have a privacy policy, but it's not exactly that easy to make one, not if you really want to cover all of your bases. This is why you may want to look into the matter of privacy policy template generator (like ours here!) since it comes with quite a few benefits.
                    A privacy policy is a legal document that details how a website gathers, stores, shares, and sells data about its visitors. This data typically includes items such as a user's name, address, birthday, marital status, medical history, and consumer behavior.
                    The specific contents of a privacy policy document depend upon the laws in the legal jurisdiction in which your business operates. Most countries have their own set of guidelines regarding what information is eligible for collection, and how that information may be used. Privacy laws include GDPR, CCPA, CalOPPA, PIPEDA, Australia Privacy Act and many more.
                    When it comes to legal documents, it is best not to take chances. Fortunately, it's easy to get a free privacy policy in just a few minutes. All you have to do is fill up the blank spaces on the right and we will create help you create your own personalized privacy policy template for your business.
                    The accuracy of the generated document on this website is not legally binding. Use at your own risk.
        
                    Looking for a Terms and Conditions Template? Check out Terms and Conditions Generator.
                EOT,
                'phonenumber' => '552-336-5717',
                'email' => 'minthantoo.ardil@gmail.com',
                'address' => 'Istanbul, Turkey'
            ]
        ];

        SiteConfig::insert($rows);
        
    }
}
