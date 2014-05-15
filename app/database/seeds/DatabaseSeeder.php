<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
        $this->command->info("User table seed complete!");

        $this->call('ContactTableSeeder');
        $this->command->info("contact seeding finished");

        $this->call('OfferTableSeeder');
        $this->command->info('offer table finished seeding');

        $this->call('ImageTableSeeder');
        $this->command->info('image table finished');
	}

}

class OfferTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('offers')->delete();

        $offers = array(
            array(
                'offerName' => "FlexHose ADK",
                'network_id' => 2,
                'subjectLines' => 'Great flexhose deal here',
                'fromLine' => 'Your flex hose friends',
                'friendlyFromLines' => 'FlexHose Seller',
                'affiliateLink' => 'www.myafilliatelink.com',
                'offerUnsubscribe' => 'www.unsub.com',
                'user_id' => 3),
            array(
                'offerName' => "UnflexibleHose ADK",
                'network_id' => 2,
                'subjectLines' => 'Crappy stiffhose deal here',
                'fromLine' => 'Your stiff hose friends',
                'friendlyFromLines' => 'StiffHose Seller',
                'affiliateLink' => 'www.myafilliatelink.com',
                'offerUnsubscribe' => 'www.unsub.com',
                'user_id' => 3)
        );

        foreach ($offers as $offer)
        {
            $offer = Offer::create($offer);
        }
    }
}

class ContactTableSeeder extends Seeder
{
    public function run(){
        DB::table('contacts')->delete();

        $contacts = array(
            array(
                'firstName' => 'Dexter',
                'lastName' => 'Caffery',
                'email' => User::find(3)->email,
                'phone' => '2032165433',
                'user_id' => User::find(3)->id),
            array(
                'firstName' => 'Matt',
                'lastName' => 'Kelley',
                'email' => User::find(4)->email,
                'phone' => "(203)-555-5555",
                'user_id' => User::find(4)->id),
            array(
                'firstName' => 'Justin',
                'lastName' => 'Moss',
                'email' => User::find(2)->email,
                'phone' => '203-555-3456',
                'user_id' => User::find(2)->id),
            array(
                'firstName' => 'Chip',
                'lastName' => 'Dipkus',
                'email' => User::find(5)->email,
                'phone' => '2064945849',
                'user_id' => User::find(5)->id),
            array(
                'firstName' => 'Jimes',
                'lastName' => 'Tooper',
                'email' => User::find(6)->email,
                'phone' => '303745849',
                'user_id' => User::find(6)->id),
            array(
                'firstName' => 'Donna',
                'lastName' => 'Gust',
                'email' => User::find(7)->email,
                'phone' => '594945849',
                'user_id' => User::find(7)->id),
            array(
                'firstName' => 'Will',
                'lastName' => 'Grello',
                'email' => User::find(8)->email,
                'phone' => '2064945849',
                'user_id' => User::find(8)->id),
            array(
                'firstName' => 'Grum',
                'lastName' => 'Green',
                'email' => User::find(9)->email,
                'phone' => '46745849',
                'user_id' => User::find(9)->id),
            array(
                'firstName' => 'Steve',
                'lastName' => 'McHanahan',
                'email' => User::find(10)->email,
                'phone' => '2064945849',
                'user_id' => User::find(10)->id)
        );

        foreach ($contacts as $contact)
        {
            $contact = Contact::create($contact);
        }
    }
}

class UserTableSeeder extends Seeder {
    public function run()
    {
        DB::table('users')->delete();

        $users = array(
            array(
                'email' => "test@user.com",
                "name" => "testUser1",
                "password" => Hash::make("codename2"),
                'role' => 4,
                'parent_id' => 2),
            array(
                'email' => "justin@webforwardmedia.com",
                "name" => "Justin Moss",
                "password" => Hash::make("codename1"),
                "role" => 1),
            array(
                'email' => "dexter@webforwardmedia.com",
                "name" => "Dexter Caffery",
                "password" => Hash::make("codename1"),
                "role" => 1,
                'parent_id' => 2),
            array(
                'email' => "matt@webforwardmedia.com",
                "name" => "Matt Kelley",
                "password" => Hash::make("codename1"),
                'role' => 2,
                'parent_id' => 3),
            array(
                'email' => 'chipdip@yahoo.com',
                'name' => 'Chip Dipkus',
                'password' => Hash::make('codename1'),
                'role' => 1,
                'parent_id' => 4),
            array(
                'email' => 'drjimes@yahoo.com',
                'name' => 'Doctor Jimes Tooper',
                'password' => Hash::make('codename1'),
                'role' => 4,
                'parent_id' => 4),
            array(
                'email' => 'hdonna@gmail.com',
                'name' => 'H Donna Gust',
                'password' => Hash::make('codename1'),
                'role' => 3,
                'parent_id' => 2),
            array(
                'email' => 'willgrello@gmail.com',
                'name' => 'Will Grello',
                'password' => Hash::make('codename1'),
                'role' => 3,
                'parent_id' => 2),
            array(
                'email' => 'grum@gmail.com',
                'name' => 'Grum',
                'password' => Hash::make('codename1'),
                'role' => 3,
                'parent_id' => 2),
            array(
                'email' => 'smchanahan@gmail.com',
                'name' => 'Steve McHanahan',
                'password' => Hash::make('codename1'),
                'role' => 3,
                'parent_id' => 2)
        );

        foreach ($users as $user)
        {
            $user = User::create($user);
        }
    }
}

class ImageTableSeeder extends Seeder {
    public function run()
    {
        DB::table('images')->delete();

        $images = array(
            array(
                'imageUrl' => 'onlytesturl.com',
                'offer_id' => Offer::find(2)->id
            )
        );

        foreach ($images as $image)
        {
            $image = Image::create($image);
        }
    }
}
