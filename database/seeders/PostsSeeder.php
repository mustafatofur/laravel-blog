<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Models\posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $posts = [[

      'title' => "Lorem Ipsum",
      'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu nisl massa. Phasellus a mollis ipsum. Donec sollicitudin rutrum massa. Nam vel sem fermentum, ornare lacus a, rhoncus enim.',
      'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu nisl massa. Phasellus a mollis ipsum. Donec sollicitudin rutrum massa. Nam vel sem fermentum, ornare lacus a, rhoncus enim. Mauris nec metus porta, posuere purus a, suscipit mauris. Cras a vehicula risus. Duis a elementum nunc. Morbi sed maximus nibh, quis facilisis orci. Nam ultrices erat vel velit placerat lobortis. Aenean id tempus neque.
<br />
Cras ipsum turpis, fermentum eu dolor ullamcorper, rutrum sagittis odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam nec nulla ac orci aliquam scelerisque at eget lorem. Pellentesque non purus eu ligula facilisis pretium. In volutpat vitae leo eu malesuada. In justo justo, porta a varius et, lobortis ut elit. Suspendisse vestibulum a elit eget aliquam. Cras non semper metus, sed luctus neque. Sed non metus odio. Vivamus commodo lorem id mattis laoreet. Duis eu tellus vel nunc pretium semper vitae id dolor. Nulla ac neque sed est egestas finibus. Donec at nibh pulvinar, vestibulum dui vitae, auctor ante. Donec lobortis dapibus lorem, ac blandit tortor dignissim condimentum. In ut tempor magna. Sed sed nunc condimentum, mollis lectus eu, lobortis tellus.
<br />
Proin lobortis mi tellus, ac accumsan erat convallis quis. Curabitur eros est, auctor vel fermentum nec, rhoncus et orci. Cras quis nulla nisl. Ut tellus lectus, elementum ultricies aliquam non, pulvinar ut magna. Curabitur vitae sodales leo. Maecenas commodo euismod tristique. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas eget ante id justo ultricies lacinia.
<br />
Maecenas rhoncus luctus mi et pellentesque. Sed suscipit fringilla molestie. In ligula sem, gravida in ipsum quis, ultrices molestie eros. Quisque gravida accumsan eros eget ultricies. Suspendisse mattis viverra lacinia. Maecenas vel efficitur erat. Suspendisse potenti.
',

    'keywords' => 'lorem, ipsum, dolor, sit, amet',
    'slug' => Str::slug("Lorem Ipsum"),
    'counter' => 1,
    'image' => 'image.png',
    'active' => 1,
    'cat_id' => 1,
    'created_at' => date("Y-m-d H:i:s"),
    'updated_at' => date("Y-m-d H:i:s")


  ],

  [

  'title' => "Lorem Ipsum 2",
  'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu nisl massa. Phasellus a mollis ipsum. Donec sollicitudin rutrum massa. Nam vel sem fermentum, ornare lacus a, rhoncus enim.',
  'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu nisl massa. Phasellus a mollis ipsum. Donec sollicitudin rutrum massa. Nam vel sem fermentum, ornare lacus a, rhoncus enim. Mauris nec metus porta, posuere purus a, suscipit mauris. Cras a vehicula risus. Duis a elementum nunc. Morbi sed maximus nibh, quis facilisis orci. Nam ultrices erat vel velit placerat lobortis. Aenean id tempus neque.
<br />
Cras ipsum turpis, fermentum eu dolor ullamcorper, rutrum sagittis odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam nec nulla ac orci aliquam scelerisque at eget lorem. Pellentesque non purus eu ligula facilisis pretium. In volutpat vitae leo eu malesuada. In justo justo, porta a varius et, lobortis ut elit. Suspendisse vestibulum a elit eget aliquam. Cras non semper metus, sed luctus neque. Sed non metus odio. Vivamus commodo lorem id mattis laoreet. Duis eu tellus vel nunc pretium semper vitae id dolor. Nulla ac neque sed est egestas finibus. Donec at nibh pulvinar, vestibulum dui vitae, auctor ante. Donec lobortis dapibus lorem, ac blandit tortor dignissim condimentum. In ut tempor magna. Sed sed nunc condimentum, mollis lectus eu, lobortis tellus.
<br />
Proin lobortis mi tellus, ac accumsan erat convallis quis. Curabitur eros est, auctor vel fermentum nec, rhoncus et orci. Cras quis nulla nisl. Ut tellus lectus, elementum ultricies aliquam non, pulvinar ut magna. Curabitur vitae sodales leo. Maecenas commodo euismod tristique. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas eget ante id justo ultricies lacinia.
<br />
Maecenas rhoncus luctus mi et pellentesque. Sed suscipit fringilla molestie. In ligula sem, gravida in ipsum quis, ultrices molestie eros. Quisque gravida accumsan eros eget ultricies. Suspendisse mattis viverra lacinia. Maecenas vel efficitur erat. Suspendisse potenti.
',

'keywords' => 'lorem, ipsum, dolor, sit, amet',
'slug' => Str::slug("Lorem Ipsum 2"),
'counter' => 1,
'image' => 'image2.png',
'active' => 1,
'cat_id' => 1,
'created_at' => date("Y-m-d H:i:s"),
'updated_at' => date("Y-m-d H:i:s")


],

[

'title' => "Lorem Ipsum 3",
'short_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu nisl massa. Phasellus a mollis ipsum. Donec sollicitudin rutrum massa. Nam vel sem fermentum, ornare lacus a, rhoncus enim.',
'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu nisl massa. Phasellus a mollis ipsum. Donec sollicitudin rutrum massa. Nam vel sem fermentum, ornare lacus a, rhoncus enim. Mauris nec metus porta, posuere purus a, suscipit mauris. Cras a vehicula risus. Duis a elementum nunc. Morbi sed maximus nibh, quis facilisis orci. Nam ultrices erat vel velit placerat lobortis. Aenean id tempus neque.
<br />
Cras ipsum turpis, fermentum eu dolor ullamcorper, rutrum sagittis odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam nec nulla ac orci aliquam scelerisque at eget lorem. Pellentesque non purus eu ligula facilisis pretium. In volutpat vitae leo eu malesuada. In justo justo, porta a varius et, lobortis ut elit. Suspendisse vestibulum a elit eget aliquam. Cras non semper metus, sed luctus neque. Sed non metus odio. Vivamus commodo lorem id mattis laoreet. Duis eu tellus vel nunc pretium semper vitae id dolor. Nulla ac neque sed est egestas finibus. Donec at nibh pulvinar, vestibulum dui vitae, auctor ante. Donec lobortis dapibus lorem, ac blandit tortor dignissim condimentum. In ut tempor magna. Sed sed nunc condimentum, mollis lectus eu, lobortis tellus.
<br />
Proin lobortis mi tellus, ac accumsan erat convallis quis. Curabitur eros est, auctor vel fermentum nec, rhoncus et orci. Cras quis nulla nisl. Ut tellus lectus, elementum ultricies aliquam non, pulvinar ut magna. Curabitur vitae sodales leo. Maecenas commodo euismod tristique. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Maecenas eget ante id justo ultricies lacinia.
<br />
Maecenas rhoncus luctus mi et pellentesque. Sed suscipit fringilla molestie. In ligula sem, gravida in ipsum quis, ultrices molestie eros. Quisque gravida accumsan eros eget ultricies. Suspendisse mattis viverra lacinia. Maecenas vel efficitur erat. Suspendisse potenti.
',

'keywords' => 'lorem, ipsum, dolor, sit, amet',
'slug' => Str::slug("Lorem Ipsum 3"),
'counter' => 1,
'image' => 'image3.png',
'active' => 1,
'cat_id' => 1,
'created_at' => date("Y-m-d H:i:s"),
'updated_at' => date("Y-m-d H:i:s")


]];
      foreach ($posts as $post) {
          DB::table('posts')->insert($post);
      }

    }
}
