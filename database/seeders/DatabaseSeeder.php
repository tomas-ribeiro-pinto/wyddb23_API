<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Day;
use App\Models\EntryDay;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => "Admin",
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'editor']);
        $role3 = Role::create(['name' => 'communicator']);
        $role4 = Role::create(['name' => 'media']);
        $permission1 = Permission::create(['name' => 'send_notification']);
        $permission2 = Permission::create(['name' => 'add']);
        $permission3 = Permission::create(['name' => 'edit']);
        $permission4 = Permission::create(['name' => 'delete']);
        $permission5 = Permission::create(['name' => 'manage_social']);

        $role1->givePermissionTo($permission1, $permission2, $permission3, $permission4, $permission5);
        $role2->givePermissionTo($permission1, $permission2, $permission3, $permission5);
        $role3->givePermissionTo($permission1);
        $role4->givePermissionTo($permission5);

        $admin->assignRole($role1);

        Day::create([
            'day' => date_create('2023-08-01')
        ]);

        $sym_day = Day::create([
            'day' => date_create('2023-08-02')
        ]);

        EntryDay::create([
            'day_id' => $sym_day->id,
            'title_en' => 'Don Bosco Musical',
            'title_pt' => 'Musical Dom Bosco',
            'location' => 'Estoril',
            'start_time' => Carbon::createFromTime(10,30, 0),
            'end_time' => Carbon::createFromTime(11,00, 0)
        ]);

        EntryDay::create([
            'day_id' => $sym_day->id,
            'title_en' => 'SYM Forum',
            'title_pt' => 'SYM Fórum',
            'location' => 'Estoril',
            'start_time' => Carbon::createFromTime(11,00, 0),
            'end_time' => Carbon::createFromTime(11,30, 0)
        ]);

        EntryDay::create([
            'day_id' => $sym_day->id,
            'title_en' => 'Estoril',
            'title_pt' => 'Estoril',
            'location' => 'Estoril',
            'start_time' => Carbon::createFromTime(16,30, 0),
            'end_time' => Carbon::createFromTime(17,00, 0)
        ]);

        EntryDay::create([
            'day_id' => $sym_day->id,
            'title_en' => 'Missionary prayers',
            'title_pt' => 'Orações Missionárias',
            'location' => 'Estoril',
            'start_time' => Carbon::createFromTime(17,30, 0),
            'end_time' => Carbon::createFromTime(18,00, 0)
        ]);

        EntryDay::create([
            'day_id' => $sym_day->id,
            'title_en' => 'General Meeting',
            'title_pt' => 'Reunião Geral',
            'location' => 'Estoril',
            'start_time' => Carbon::createFromTime(18,30, 0),
            'end_time' => Carbon::createFromTime(19,00, 0)
        ]);

        EntryDay::create([
            'day_id' => $sym_day->id,
            'title_en' => 'Rector Major Interview',
            'title_pt' => 'Entrevista Reitor-Mor',
            'location' => 'Estoril',
            'start_time' => Carbon::createFromTime(20,30, 0),
            'end_time' => Carbon::createFromTime(21,00, 0)
        ]);

        EntryDay::create([
            'day_id' => $sym_day->id,
            'title_en' => 'Guided Tour',
            'title_pt' => 'Visita Guiada',
            'location' => 'Estoril',
            'start_time' => Carbon::createFromTime(22,30, 0),
            'end_time' => Carbon::createFromTime(23,00, 0)
        ]);


        Day::create([
            'day' => date_create('2023-08-03')
        ]);

        Day::create([
            'day' => date_create('2023-08-04')
        ]);

        Day::create([
            'day' => date_create('2023-08-05')
        ]);

        Day::create([
            'day' => date_create('2023-08-06')
        ]);
    }
}
