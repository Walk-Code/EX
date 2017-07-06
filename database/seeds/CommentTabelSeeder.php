<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $faker = \Faker\Factory::create();

        $uuids = ["C86943FC-A080-4C71-98A8-B9E3DB2F10D7","80c358be-bf59-3249-a645-c6d0d94e81e7","dad5c6b3-6632-367e-9a39-9a4712a78ef8","f8b67aa3-809d-32d5-ba27-fddae13b09f6","7a3e20f8-6f82-3501-8324-343e1cd913f5","44762bff-04ca-37db-9a8e-a609e9daf950","d611f988-8451-3b0f-986e-423574c7e4c8","f5a536cb-a2e7-37c3-9fdd-a1b30f3bcb30","a8a1e96f-934d-3c06-bb2d-fbbc50f740aa","4ee39b78-b1b9-3500-9680-b88f44d1b301","9b2cb93d-a6f5-35b4-87dc-85d92b43cd6a","8892bc83-3d92-3548-8345-75475cb8ddac","fdbe6d33-25f6-36dd-96e5-f85240b54df8","c83cddef-58af-3392-a3c3-219e3d718bb6","b46af509-49ae-398d-90a0-1823293dfbbb","5a284040-c46b-389f-b900-59ea3a77422f","c714cb73-3d6c-3425-98b2-48dedc215237","5ca90d72-76dc-3d7a-9b97-66a8a70871c6","b78e13f7-43cc-3dd4-baa9-cb6a35c6fa6b","50ef9acd-9ce1-3a40-8d6f-097f24ffb314","e0397c44-1bd6-3e3d-ac42-ea7b62dd4377","4f85c628-f8bd-3b35-9879-359e6100e260","6eb66bdd-eaaf-3589-bdf2-0dc405c33d22","a4306e7c-e480-3004-a7e1-37150258654a","d4c726a8-38d3-35b1-a989-f215f12ff316","395f5ff6-2537-3e3e-833a-3e61fcbb4bbd","c3cd7d74-df67-3df8-bfe4-559d2285098a","4ef2c55f-c0fe-3c4e-b6dc-8ad7035cdf3f","5d3cd5f9-771a-372e-83a8-4c63ab79b50b","4f66cdcf-44ca-3c8d-8a18-436fcf977040","07f8acde-c7e1-3a6c-a088-f2b84c0b0217","ac473c41-6172-3bdf-9e01-013977838166","3e5cf992-e696-36bb-9df6-feb1c1d1c273","4204a519-2be8-3ced-90ce-23089b825bfe","8793dd58-19bc-3c64-a2ee-e550fc15e575","927787d2-101d-3f63-9fdd-0886219ed2b5","691d6334-d321-3d52-a7bd-66157c3c28d9","7717a3c5-da23-3b1a-81cd-9b09b881e74a","0fe124b0-43ab-3697-b5ea-ec105308830d","99361455-f31d-360b-9dfb-fe2243b0c433","a07f3b73-c8bc-35be-a58d-b242753727c1","afe45bce-3779-3728-aa2c-2e823d8f58cf","5b17eff5-a1f5-35df-aae0-5e1153b1147e","e5151a99-bd1f-3de7-8f4d-6ba2c89089cd","55f21e1d-8b70-30a0-8966-e1264f466187","1cb9c18c-3e43-33ba-9b62-4da0f36ae07c","abe00ff9-c878-367b-a40a-7189af60691f","050b6f32-9ce5-3757-9965-41b75e7647c5","3c5490e0-a687-3a85-b151-3175a565ee21","1c2edb91-bfcb-3f6b-817f-6a73799f5f22","c9fa5c2b-a43a-3b24-8ad8-67e5639e9061"];



        for($i = 0 ; $i < 50; $i++){
            DB::table("comments")->insert([
                'comment' => $faker->text(200),
                'post_id' => mt_rand(101,150),
                'uuid' => $uuids[array_rand($uuids,1)],
                'created_at' => $faker->dateTime(date('Y-m-d H:i:s'),'PRC'),
                'updated_at' => $faker->dateTime(date('Y-m-d H:i:s'),'PRC')
            ]);
        }*/
    }
}
