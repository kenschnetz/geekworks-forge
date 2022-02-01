<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class Users extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            DB::table('users')->insert([
                [
                    'name' => 'Ken',
                    'email' => 'ken@syntaxflow.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-11-09 02:27:08',
                    'role_id' => 1,
                    'password' => '$2y$10$PtQpaeM0s5o5LXHvhKvhBuctcX6FvsagxN0ZrVmBqDQrvYXQXENlK',
                    'email_verified_at' => '2021-07-01 04:15:48',
                    'created_at' => '2021-07-01 04:15:48',
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Chris',
                    'email' => 'leviticusx@gmail.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-11-09 03:58:51',
                    'role_id' => 1,
                    'password' => '$2y$10$nzKYqnrSgdvY91AqfkkCKumRFlytu/PjJ1tFrQkSDbtgkTjzBDWKq',
                    'email_verified_at' => null,
                    'created_at' => '2021-07-01 04:15:48',
                    'updated_at' => '2021-12-17 18:03:05',
                ],
                [
                    'name' => 'Jason',
                    'email' => 'jasonstever@yahoo.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-11-09 16:51:49',
                    'role_id' => 1,
                    'password' => '$2y$10$s7JSiXKcq/c47N.9JCsIQ.7s/KVkX3tb1KvJUo62AVBreSn4keZfq',
                    'email_verified_at' => null,
                    'created_at' => '2021-07-01 04:15:48',
                    'updated_at' => '2021-12-23 04:16:05',
                ],
                [
                    'name' => 'Steven',
                    'email' => 'steven@syntaxflow.com',
                    'terms_accepted' => false,
                    'terms_accepted_at' => null,
                    'role_id' => 1,
                    'password' => '$2y$10$7lqC7tZgTOXq7Qa13H3ztu2uE/2lnn49MaZ238WFkVOnXs073lTaG',
                    'email_verified_at' => null,
                    'created_at' => '2021-07-01 04:15:48',
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Samuel Irvin',
                    'email' => 'soldier4jesus55@gmail.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-12-14 03:59:44',
                    'role_id' => 3,
                    'password' => '$2y$10$UMRtDjl6.eTJEGO4tosrWuyllGY3v7MQRW3cH3vyi68Rge8zzC61i',
                    'email_verified_at' => null,
                    'created_at' => null,
                    'updated_at' => '2021-12-22 20:33:44',
                ],
                [
                    'name' => 'Josh Dycus',
                    'email' => 'joshdycus@rocketmail.com',
                    'terms_accepted' => false,
                    'terms_accepted_at' => null,
                    'role_id' => 3,
                    'password' => '$2y$10$3yoAfovB8jYiRvUuky9bTe.GNKXUp8vNyOJVnvfeYzp0a9y98Y5ES',
                    'email_verified_at' => null,
                    'created_at' => null,
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Luke Hill',
                    'email' => 'livingvending@gmail.com',
                    'terms_accepted' => false,
                    'terms_accepted_at' => null,
                    'role_id' => 3,
                    'password' => '$2y$10$OwOx9tnHhPxesca/U55Mp.5wfZABfB8yBhNmt7ZZychgbxfE6u84e',
                    'email_verified_at' => null,
                    'created_at' => null,
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'James Marzullo',
                    'email' => 'jdmarzullo@gmail.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-11-15 19:20:48',
                    'role_id' => 3,
                    'password' => '$2y$10$CWCVJ0MfusaJ9qjxOLZDBe5GANRZnuqUjTE2cbHL7GIkQ6SuVMRaK',
                    'email_verified_at' => null,
                    'created_at' => null,
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Devon Thurgood',
                    'email' => 'thurgood.devon@gmail.com',
                    'terms_accepted' => false,
                    'terms_accepted_at' => null,
                    'role_id' => 3,
                    'password' => '$2y$10$jIt0iYCKY4pqeue9SMOrBO.Zs5W9Ojsk/rfy9J4pUZg6eoTUPAyJS',
                    'email_verified_at' => null,
                    'created_at' => null,
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Kenneth Schnetz',
                    'email' => 'kennyschnetz@gmail.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-11-09 06:13:00',
                    'role_id' => 1,
                    'password' => '$2y$10$PtQpaeM0s5o5LXHvhKvhBuctcX6FvsagxN0ZrVmBqDQrvYXQXENlK',
                    'email_verified_at' => '2021-11-06 01:42:54',
                    'created_at' => '2021-11-06 01:42:54',
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Jeff Lopez',
                    'email' => 'jalopez001128@gmail.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-11-09 05:34:55',
                    'role_id' => 3,
                    'password' => '$2y$10$ug274.h2tMH.mbD6Z50X6.UvTIKJvli0TDSEzSRNkJTbsqNA0DTWG',
                    'email_verified_at' => null,
                    'created_at' => '2021-11-09 04:06:50',
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Michael Neal',
                    'email' => 'mneal1975@gmail.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-11-09 04:54:30',
                    'role_id' => 3,
                    'password' => '$2y$10$i4pcWYr5t.1lDdPHmiTCKunrSEt.2mROaNa2cNxw1ug6wDwh.OsDe',
                    'email_verified_at' => null,
                    'created_at' => '2021-11-09 04:15:19',
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Jason Young',
                    'email' => 'reverentbeing@gmail.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-12-09 18:26:13',
                    'role_id' => 3,
                    'password' => '$2y$10$WowuZfnoP2kDNMd/wdAC8um9idrzJyGK775lG9fz0izez/dRjh1Nu',
                    'email_verified_at' => null,
                    'created_at' => '2021-11-09 04:50:01',
                    'updated_at' => '2021-12-14 21:05:41',
                ],
                [
                    'name' => 'Jordan Moulton',
                    'email' => 'moultonj18@gmail.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-11-09 19:11:57',
                    'role_id' => 3,
                    'password' => '$2y$10$lts53LZALwstYNuBmzIOa.mOcRi3sG9zJZMhFIYrCaYXpxg.kGREC',
                    'email_verified_at' => null,
                    'created_at' => '2021-11-09 15:56:17',
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Anthony Langley',
                    'email' => 'anthonylangley56@gmail.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-11-23 16:19:17',
                    'role_id' => 3,
                    'password' => '$2y$10$tk8gXA.it56B5CEnV.OUteR/GoYOx0LWamnzpOrJuXrplI.6VOdey',
                    'email_verified_at' => null,
                    'created_at' => '2021-11-13 02:12:54',
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Hrafnkell Karlsson',
                    'email' => 'hrafnkell.k@hotmail.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-11-13 19:09:17',
                    'role_id' => 3,
                    'password' => '$2y$10$PpAD1ijy7aYE6aFhiciD9OsF5zlHTlZdU.SWWm3G/L0.T05cuzaoa',
                    'email_verified_at' => null,
                    'created_at' => '2021-11-13 15:41:18',
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Cory Hinch',
                    'email' => 'coryhinch@gmail.com',
                    'terms_accepted' => false,
                    'terms_accepted_at' => null,
                    'role_id' => 3,
                    'password' => '$2y$10$6HQyrQ/i.b1UNXiJjKeGzec0Ujhhh2IUaCBQCYcYHzv.2x.A3v0Ne',
                    'email_verified_at' => null,
                    'created_at' => '2021-11-15 01:27:30',
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Brandon Findlay',
                    'email' => 'brandon.j.findlay@gmail.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-11-21 08:16:03',
                    'role_id' => 3,
                    'password' => '$2y$10$Je3fssG3DIX6jOwrmMswP.COR.w4guH8Yk.tYmzGuf80tM6N36Jn.',
                    'email_verified_at' => null,
                    'created_at' => '2021-11-20 19:49:59',
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Brad Sampson',
                    'email' => 'bsampson0330@yahoo.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-12-07 19:31:15',
                    'role_id' => 3,
                    'password' => '$2y$10$86ee7fCfzP0Mkem5OLqUTegoRtzOzh1GCSMyLcS9K5HysyZtarZyq',
                    'email_verified_at' => null,
                    'created_at' => '2021-12-07 15:40:07',
                    'updated_at' => '2021-12-17 19:16:19',
                ],
                [
                    'name' => 'Hannah Amos',
                    'email' => 'hannah.bear.amos@gmail.com',
                    'terms_accepted' => false,
                    'terms_accepted_at' => null,
                    'role_id' => 3,
                    'password' => '$2y$10$TolUBdZSlGuiKRLWZesGJe.t8KWj43ZCrtbAqRDXqawVwzWcQsyyG',
                    'email_verified_at' => null,
                    'created_at' => '2021-12-07 22:48:16',
                    'updated_at' => '2021-12-16 00:28:11',
                ],
                [
                    'name' => 'Cassie Greutman',
                    'email' => 'cgreutman@yahoo.com',
                    'terms_accepted' => true,
                    'terms_accepted_at' => '2021-12-08 19:57:24',
                    'role_id' => 3,
                    'password' => '$2y$10$08Rdsqu1BiFjLaC.GB73u.9/uU5e2ThMWFBeGNG2JZXo7Cv8KMzqC',
                    'email_verified_at' => null,
                    'created_at' => '2021-12-08 03:54:25',
                    'updated_at' => '2021-12-16 00:28:11',
                ],
            ]);
        }
    }
