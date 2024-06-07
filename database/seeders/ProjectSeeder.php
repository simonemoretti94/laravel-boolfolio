<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $technologies = [
        //     'archology',
        //     'biometrics',
        //     'blockchain',
        //     'exocortex',
        //     'magnonics',
        //     'neuromophic engineering',
        //     'three-dimensionals integrated circuit',
        //     'twistronics'
        // ];
        $projects = [
            [
                'title' => 'dragon ball z',
                'description' => 
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, beatae laboriosam. Sint nulla dolores dolorum voluptate quibusdam nemo nisi inventore ut doloremque facilis? Dolor, aliquid. Nulla ad eos quia a assumenda cumque deleniti dolorum cum beatae et quos esse officiis, eligendi aliquam natus autem! Aperiam id minima libero ex consequuntur voluptatum sapiente ut voluptatibus blanditiis non, quidem placeat quibusdam accusantium harum deserunt, autem facilis amet debitis laboriosam. Modi mollitia, explicabo consequatur vel commodi enim deserunt assumenda optio consequuntur est doloribus at nesciunt delectus quisquam. Quasi reprehenderit vel sint in voluptatem eos perspiciatis recusandae culpa iure molestiae natus, excepturi unde nulla.',

                'cover_image' => 'https://th.bing.com/th/id/OIP.tjAYf8zyDs4LDJyexBJwNQHaE8?rs=1&pid=ImgDetMain',
            ],
            [
                'title' => 'princess mononoke',
                'description' => 
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, beatae laboriosam. Sint nulla dolores dolorum voluptate quibusdam nemo nisi inventore ut doloremque facilis? Dolor, aliquid. Nulla ad eos quia a assumenda cumque deleniti dolorum cum beatae et quos esse officiis, eligendi aliquam natus autem! Aperiam id minima libero ex consequuntur voluptatum sapiente ut voluptatibus blanditiis non, quidem placeat quibusdam accusantium harum deserunt, autem facilis amet debitis laboriosam. Modi mollitia, explicabo consequatur vel commodi enim deserunt assumenda optio consequuntur est doloribus at nesciunt delectus quisquam. Quasi reprehenderit vel sint in voluptatem eos perspiciatis recusandae culpa iure molestiae natus, excepturi unde nulla.',

                'cover_image' => 'https://th.bing.com/th/id/OIP.RQsB-5k_lnXW5OHlHrkF0gHaHa?w=500&h=500&rs=1&pid=ImgDetMain',
            ],
            [
                'title' => 'psycho pass',
                'description' => 
                'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, beatae laboriosam. Sint nulla dolores dolorum voluptate quibusdam nemo nisi inventore ut doloremque facilis? Dolor, aliquid. Nulla ad eos quia a assumenda cumque deleniti dolorum cum beatae et quos esse officiis, eligendi aliquam natus autem! Aperiam id minima libero ex consequuntur voluptatum sapiente ut voluptatibus blanditiis non, quidem placeat quibusdam accusantium harum deserunt, autem facilis amet debitis laboriosam. Modi mollitia, explicabo consequatur vel commodi enim deserunt assumenda optio consequuntur est doloribus at nesciunt delectus quisquam. Quasi reprehenderit vel sint in voluptatem eos perspiciatis recusandae culpa iure molestiae natus, excepturi unde nulla.',

                'cover_image' => 'https://th.bing.com/th/id/OIP.rC9jxCRLmtVuzNEKF-YJrgHaFQ?rs=1&pid=ImgDetMain',
            ],
        ];

        foreach ($projects as $key => $project) {
            $newProject = new Project($project);
            $newProject['slug'] = Str::slug($project['title'], '-');
            $newProject->save();
        }
    }
}
