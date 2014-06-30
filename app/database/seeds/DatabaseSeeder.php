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
                'email' => User::find(1)->email,
                'phone' => '2032165433',
                'user_id' => User::find(1)->id),
            array(
                'firstName' => 'Chip',
                'lastName' => 'Dipkus',
                'email' => User::find(2)->email,
                'phone' => '2064945849',
                'user_id' => User::find(2)->id),
            array(
                'firstName' => 'Jimes',
                'lastName' => 'Tooper',
                'email' => User::find(3)->email,
                'phone' => '303745849',
                'user_id' => User::find(3)->id),
            array(
                'firstName' => 'Donna',
                'lastName' => 'Gust',
                'email' => User::find(4)->email,
                'phone' => '594945849',
                'user_id' => User::find(4)->id),
            array(
                'firstName' => 'Will',
                'lastName' => 'Grello',
                'email' => User::find(5)->email,
                'phone' => '2064945849',
                'user_id' => User::find(5)->id),
            array(
                'firstName' => 'Grum',
                'lastName' => 'Green',
                'email' => User::find(6)->email,
                'phone' => '46745849',
                'user_id' => User::find(6)->id),
            array(
                'firstName' => 'Steve',
                'lastName' => 'McHanahan',
                'email' => User::find(7)->email,
                'phone' => '2064945849',
                'user_id' => User::find(7)->id)
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
                'email' => "dexter@webforwardmedia.com",
                "name" => "Dexter Caffery",
                "password" => Hash::make("codename1"),
                "role" => 1,
                'parent_id' => 0),
            array(
                'email' => 'chipdip@yahoo.com',
                'name' => 'Chip Dipkus',
                'password' => Hash::make('codename1'),
                'role' => 1,
                'parent_id' => 1),
            array(
                'email' => 'drjimes@yahoo.com',
                'name' => 'Doctor Jimes Tooper',
                'password' => Hash::make('codename1'),
                'role' => 4,
                'parent_id' => 1),
            array(
                'email' => 'hdonna@gmail.com',
                'name' => 'H Donna Gust',
                'password' => Hash::make('codename1'),
                'role' => 3,
                'parent_id' => 3),
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
                'parent_id' => 4),
            array(
                'email' => 'smchanahan@gmail.com',
                'name' => 'Steve McHanahan',
                'password' => Hash::make('codename1'),
                'role' => 3,
                'parent_id' => 4)
        );

        foreach ($users as $user)
        {
            $user = User::create($user);
        }
    }
}